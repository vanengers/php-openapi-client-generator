<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientGenerator\Generator\Security;

use DoclerLabs\ApiClientGenerator\Ast\Builder\CodeBuilder;
use DoclerLabs\ApiClientGenerator\Entity\Operation;
use DoclerLabs\ApiClientGenerator\Input\Specification;
use PhpParser\Node\Expr;

class BearerAuthenticationSecurityStrategy extends SecurityStrategyAbstract
{
    private const PROPERTY_NAME = 'bearerToken';
    private const SCHEME        = 'bearer';
    private const TYPE          = 'http';

    private CodeBuilder $builder;

    public function __construct(CodeBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function getProperties(Operation $operation, Specification $specification): array
    {
        return [];
    }

    public function getConstructorParams(Operation $operation, Specification $specification): array
    {
        return [];
    }

    public function getConstructorParamInits(Operation $operation, Specification $specification): array
    {
        return [];
    }

    protected function getScheme(): string
    {
        return self::SCHEME;
    }

    protected function getType(): string
    {
        return self::TYPE;
    }

    protected function getAuthorizationHeader(): Expr
    {
        return $this->builder->funcCall(
            'sprintf',
            ['Bearer %s', $this->builder->localPropertyFetch(self::PROPERTY_NAME)]
        );
    }
}
