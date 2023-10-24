<?php

declare(strict_types=1);
namespace Vanengers\GpWebtechApiPhpClient\Generated\Request\Mapper;

use Vanengers\GpWebtechApiPhpClient\Generated\Request\RequestInterface;
use Psr\Http\Message\RequestInterface as PsrRequestInterface;

interface RequestMapperInterface
{
    public function map(RequestInterface $request) : PsrRequestInterface;
}
