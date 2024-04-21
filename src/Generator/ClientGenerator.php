<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientGenerator\Generator;

use DoclerLabs\ApiClientException\UnauthorizedResponseException;
use DoclerLabs\ApiClientGenerator\Ast\Builder\MethodBuilder;
use DoclerLabs\ApiClientGenerator\Entity\Operation;
use DoclerLabs\ApiClientGenerator\Input\Specification;
use DoclerLabs\ApiClientGenerator\Naming\ClientNaming;
use DoclerLabs\ApiClientGenerator\Naming\CopiedNamespace;
use DoclerLabs\ApiClientGenerator\Naming\RequestNaming;
use DoclerLabs\ApiClientGenerator\Naming\SchemaMapperNaming;
use DoclerLabs\ApiClientGenerator\Output\Copy\Request\Mapper\RequestMapperInterface;
use DoclerLabs\ApiClientGenerator\Output\Copy\Request\RequestInterface;
use DoclerLabs\ApiClientGenerator\Output\Copy\Response\ResponseHandler;
use DoclerLabs\ApiClientGenerator\Output\Copy\Serializer\ContentType\ContentTypeSerializerInterface;
use DoclerLabs\ApiClientGenerator\Output\Php\PhpFileCollection;
use PhpParser\Builder\Method;
use PhpParser\Comment\Doc;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Expression;
use PhpParser\Node\Stmt\Property;
use Pimple\Container;
use Pimple\Psr11\Container as Psr11Container;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Vanengers\GpWebtechApiPhpClient\Generated\ServiceProvider;

class ClientGenerator extends GeneratorAbstract
{
    public function generate(Specification $specification, PhpFileCollection $fileRegistry): void
    {
        $classBuilder = $this->builder
            ->class('ApiClient')
            ->makeAbstract()
            ->addStmts($this->generateProperties())
            ->addStmt($this->generateConstructor())
            ->addStmt($this->generateSendRequestMethod())
            ->addStmt($this->generateGetTokenMethod())
            ->addStmt($this->generateSetTokenMethod())
            ->addStmt($this->generateInitMethod())
        ;

        foreach ($specification->getOperations() as $operation) {
            $classBuilder->addStmt($this->generateAction($operation));
        }

        $classBuilder->addStmt($this->generateHandleResponse());

        $abstract = new Method(
            'login'
        );
        $abstract->makeAbstract();
        $classBuilder->addStmt($abstract);

        $this->registerFile($fileRegistry, $classBuilder);
    }

    protected function generateSendRequestMethod(): ClassMethod
    {
        $requestVariable = $this->builder->var('request');
        $methodParameter = $this->builder
            ->param('request')
            ->setType('RequestInterface')
            ->getNode();

        $mapMethodCall = $this->builder->methodCall(
            $this->builder->methodCall(
                $this->builder->localPropertyFetch('container'),
                'get',
                [$this->builder->classConstFetch('RequestMapperInterface', 'class')]
            ),
            'map',
            $this->builder->args([$requestVariable])
        );

        $clientCall = $this->builder->methodCall(
            $this->builder->localPropertyFetch('client'),
            'sendRequest',
            [$mapMethodCall]
        );

        return $this->builder
            ->method('sendRequest')
            ->makePublic()
            ->addParam($methodParameter)
            ->addStmt($this->builder->return($clientCall))
            ->setReturnType('ResponseInterface')
            ->composeDocBlock([$methodParameter], 'ResponseInterface')
            ->getNode();
    }

    protected function generateAction(Operation $operation): ClassMethod
    {
        $requestClassName = RequestNaming::getClassName($operation);

        $this->addImport(
            sprintf(
                '%s%s\\%s',
                $this->baseNamespace,
                RequestGenerator::NAMESPACE_SUBPATH,
                $requestClassName
            )
        );

        $requestVar  = $this->builder->var('request');

        $methodParam = $this->builder
            ->param('request')
            ->setType($requestClassName)
            ->getNode();

        if (strpos($operation->getName(), 'login') === false) {
            if (count($operation->getSecurity()) > 0) {
                $stmts[] = $this->builder->localMethodCall('init');
                $stmts[] = $this->builder->methodCall($requestVar, 'setBearerToken',
                    $this->builder->args([$this->builder->localPropertyFetch('bearerToken')])
                );
            }
        }

        $responseStmt = $this->builder->localMethodCall('sendRequest', [$requestVar]);

        $handleResponseStmt = $this->builder->localMethodCall(
            'handleResponse',
            $this->builder->args([$responseStmt])
        );

        $tryCatch = $this->builder->tryCatch([$handleResponseStmt], [
            $this->builder->catch(
                [ $this->builder->className(UnauthorizedResponseException::class) ],
                $this->builder->var('e'),
                [
                    $this->builder->localMethodCall('login'),
                    $this->builder->methodCall($requestVar, 'setBearerToken',
                        $this->builder->args([$this->builder->localPropertyFetch('bearerToken')])
                    ),
                    $handleResponseStmt
                ]
            )
        ]);

        $responseBody = $operation->getSuccessfulResponse()->getBody();
        if ($responseBody === null) {
            return $this->builder
                ->method($operation->getName())
                ->makePublic()
                ->addParam($methodParam)
                ->addStmt($handleResponseStmt)
                ->setReturnType(MethodBuilder::RETURN_TYPE_VOID)
                ->composeDocBlock([$methodParam])
                ->getNode();
        }

        $this->addImport(UnauthorizedResponseException::class);

        $tryCatchResponse = $this->builder->tryCatch(
            [
                new Expression($this->builder->assign($this->builder->var('response'), $handleResponseStmt))
            ],
            [
                $this->builder->catch(
                    [
                        $this->builder->className('UnauthorizedResponseException')
                    ],
                    $this->builder->var('e'),
                    [
                        new Expression($this->builder->localMethodCall('login')),
                        new Expression($this->builder->methodCall($requestVar, 'setBearerToken',
                            $this->builder->args([$this->builder->localPropertyFetch('bearerToken')])
                        )),
                        new Expression($this->builder->assign($this->builder->var('response'), $handleResponseStmt))
                    ]
            )
        ]);

        if (strpos($operation->getName(), 'login') !== false) {
            $stmts[] = $this->builder->assign($this->builder->var('response'), $handleResponseStmt);
        } else {
            $stmts[] = $tryCatchResponse;
        }

        $responseVariable = $this->builder->var('response');
        //$stmts[]          = $this->builder->assign($this->builder->var('response'), $handleResponseStmt);
        if ($responseBody->isComposite()) {
            $mapperClassName = SchemaMapperNaming::getClassName($responseBody);
            $this->addImport(
                sprintf(
                    '%s%s\\%s',
                    $this->baseNamespace,
                    SchemaMapperGenerator::NAMESPACE_SUBPATH,
                    $mapperClassName
                )
            );

            $getMethod = $this->builder->methodCall(
                $this->builder->localPropertyFetch('container'),
                'get',
                [$this->builder->classConstFetch($mapperClassName, 'class')]
            );

            $mapMethod = $this->builder->methodCall($getMethod, 'toSchema', [$responseVariable]);
            $stmts[]   = $this->builder->return($mapMethod);

            $this->addImport(
                sprintf(
                    '%s%s\\%s',
                    $this->baseNamespace,
                    SchemaGenerator::NAMESPACE_SUBPATH,
                    $responseBody->getPhpClassName()
                )
            );
        } else {
            $this->addImport(CopiedNamespace::getImport($this->baseNamespace, ContentTypeSerializerInterface::class));
            $literalValue = $this->builder->getArrayItem(
                $responseVariable,
                $this->builder->classConstFetch('ContentTypeSerializerInterface', 'LITERAL_VALUE_KEY')
            );

            $stmts[] = $this->builder->return($literalValue);
        }
        $this->addImport(ContainerInterface::class);
        $this->addImport(NotFoundExceptionInterface::class);
        $this->addImport(ContainerExceptionInterface::class);
    return $this->builder
        ->method($operation->getName())
        ->makePublic()
        ->addParam($methodParam)
        ->addStmts($stmts)
        ->setReturnType($responseBody->getPhpTypeHint(), $responseBody->isNullable())
       // ->composeDocBlock([$methodParam], $responseBody->getPhpTypeHint(), [], [$operation->getName()])
           ->setDocComment(new Doc(implode("\n", [
               '/**',
               ' * '. $operation->getName(),
               ' * @param '. $requestClassName .' $'. $methodParam->var->name,
               ' * @return '. $responseBody->getPhpTypeHint(),
               ' * @throws UnauthorizedResponseException',
               ' */'
           ])))
        ->getNode();
    }

    /**
     * @return Property[]
     */
    protected function generateProperties(): array
    {
        return [
            $this->builder->localProperty('client', 'ClientInterface', 'ClientInterface'),
            $this->builder->localProperty('container', 'ContainerInterface', 'ContainerInterface'),
            $this->builder->localProperty('bearerToken', 'string', 'string', true,
                $this->builder->val('')
            ),
        ];
    }

    protected function generateConstructor(): ClassMethod
    {
        $this
            ->addImport(ClientInterface::class)
            ->addImport(ResponseInterface::class)
            ->addImport(ContainerInterface::class)
            ->addImport(CopiedNamespace::getImport($this->baseNamespace, RequestMapperInterface::class))
            ->addImport(CopiedNamespace::getImport($this->baseNamespace, ResponseHandler::class))
            ->addImport(CopiedNamespace::getImport($this->baseNamespace, RequestInterface::class));

        $parameters[] = $this->builder
            ->param('client')
            ->setType('ClientInterface')
            ->getNode();

        $inits[] = $this->builder->assign(
            $this->builder->localPropertyFetch('client'),
            $this->builder->var('client')
        );

        $this->addImport(\Pimple\Container::class, 'PimpleContainer');
        $this->addImport(\Pimple\Psr11\Container::class, 'Psr11PimpleContainer');
        $this->addImport(ServiceProvider::class);

        $inits[] = $this->builder->assign(
            $this->builder->var('pimple'),
            $this->builder->new('PimpleContainer')
        );

        $inits[] = $this->builder->assign(
            $this->builder->localPropertyFetch('container'),
            $this->builder->new('Psr11PimpleContainer',
            [
                $this->builder->var('pimple')
            ])
        );

        $inits[] = $this->builder->assign(
            $this->builder->var('serviceProvider'),
            $this->builder->new('ServiceProvider')
        );

        $inits[] = $this->builder->methodCall(
            $this->builder->var('serviceProvider'),
            'register',
            [
                $this->builder->var('pimple')
            ]
        );

        return $this->builder
            ->method('__construct')
            ->makePublic()
            ->addParams($parameters)
            ->addStmts($inits)
            ->composeDocBlock($parameters)
            ->getNode();
    }

    public function generateHandleResponse(): ClassMethod
    {
        $parameters[] = $this->builder
            ->param('response')
            ->setType('ResponseInterface')
            ->getNode();
        $response     = $this->builder->var('response');

        $handleResponseStatement = $this->builder->return(
            $this->builder->methodCall(
                $this->builder->methodCall(
                    $this->builder->localPropertyFetch('container'),
                    'get',
                    [$this->builder->classConstFetch('ResponseHandler', 'class')]
                ),
                'handle',
                $this->builder->args([$response])
            )
        );

        return $this->builder
            ->method('handleResponse')
            ->makeProtected()
            ->addParams($parameters)
            ->addStmt($handleResponseStatement)
            ->composeDocBlock($parameters)
            ->getNode();
    }

    private function generateGetTokenMethod()
    {
        $method = new Method('getToken');
        $method->makePublic();
        $method->addStmt($this->builder->return($this->builder->localPropertyFetch('bearerToken')));
        return $method;
    }

    private function generateSetTokenMethod()
    {
        $method = new Method('setToken');
        $method->makePublic();
        $method->addParam($this->builder->param('bearerToken')->setType('string'));
        $method->addStmt($this->builder->assign($this->builder->localPropertyFetch('bearerToken'), $this->builder->var('bearerToken')));
        return $method;
    }

    private function generateInitMethod()
    {
        $method = new Method('init');
        $method->makePrivate();

        $ifCondition = $this->builder->funcCall(
            'empty',
            [
                $this->builder->localPropertyFetch('bearerToken')
            ]
        );
        $ifStmt = new Expression(
            $this->builder->localMethodCall('login')
        );

        $method->addStmts([$this->builder->if($ifCondition, [$ifStmt])]);

        return $method;
    }
}
