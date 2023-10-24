<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientGenerator\Input;

use DoclerLabs\ApiClientGenerator\Ast\PhpVersion;
use DoclerLabs\ApiClientGenerator\Generator\Implementation\ContainerImplementationStrategy;
use DoclerLabs\ApiClientGenerator\Generator\Implementation\HttpMessageImplementationStrategy;
use Webmozart\Assert\Assert;

class Configuration
{
    public const DEFAULT_CODE_STYLE_CONFIG      = __DIR__ . '/../../.php_cs.php';
    public const DEFAULT_TEMPLATE_DIRECTORY     = __DIR__ . '/../../template';
    public const DEFAULT_PHP_VERSION            = PhpVersion::VERSION_PHP74;
    public const DEFAULT_SOURCE_DIRECTORY       = 'src';
    public const DEFAULT_HTTP_MESSAGE           = HttpMessageImplementationStrategy::HTTP_MESSAGE_GUZZLE;
    public const DEFAULT_CONTAINER              = ContainerImplementationStrategy::CONTAINER_PIMPLE;
    public const STATIC_PHP_FILE_BASE_NAMESPACE = 'DoclerLabs\\ApiClientGenerator\\Output\\Copy';
    public const STATIC_PHP_FILE_DIRECTORY      = __DIR__ . '/../Output/Copy';
    private string $specificationFilePath;
    private string $baseNamespace;
    private string $outputDirectory;
    private string $phpVersion;
    private ?string $generatorVersion;
    private string $httpMessage;
    private string $container;

    public function __construct(
        string $specificationFilePath,
        string $baseNamespace,
        string $outputDirectory,
        string $phpVersion,
        ?string $generatorVersion,
        string $httpMessage,
        string $container
    ) {
        Assert::notEmpty($specificationFilePath, 'Specification file path is not provided.');
        Assert::notEmpty($baseNamespace, 'Namespace for generated code is not provided.');
        Assert::notEmpty($outputDirectory, 'Output directory is not provided.');
        Assert::notEmpty($phpVersion, 'Php version is not provided.');
        Assert::notEmpty($httpMessage, 'Http message implementation(PSR-7) is not provided.');
        Assert::notEmpty($container, 'Container implementation(PSR-11) is not provided.');

        $this->specificationFilePath   = $specificationFilePath;
        $this->baseNamespace           = $baseNamespace;
        $this->outputDirectory         = $outputDirectory;
        $this->phpVersion              = $phpVersion;
        $this->generatorVersion        = $generatorVersion;
        $this->httpMessage             = $httpMessage;
        $this->container               = $container;
    }

    public function getSpecificationFilePath(): string
    {
        return $this->specificationFilePath;
    }

    public function getBaseNamespace(): string
    {
        return $this->baseNamespace;
    }

    public function getOutputDirectory(): string
    {
        return $this->outputDirectory;
    }

    public function getPhpVersion(): string
    {
        return $this->phpVersion;
    }

    public function getGeneratorVersion(): ?string
    {
        return $this->generatorVersion;
    }

    public function getStaticPhpFilesBaseNamespace(): string
    {
        return self::STATIC_PHP_FILE_BASE_NAMESPACE;
    }

    public function getStaticPhpFilesDirectory(): string
    {
        return self::STATIC_PHP_FILE_DIRECTORY;
    }

    public function getHttpMessage(): string
    {
        return $this->httpMessage;
    }

    public function getContainer(): string
    {
        return $this->container;
    }
}
