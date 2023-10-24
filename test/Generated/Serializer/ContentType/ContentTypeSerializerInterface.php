<?php

declare(strict_types=1);
namespace Vanengers\GpWebtechApiPhpClient\Generated\Serializer\ContentType;

use Vanengers\GpWebtechApiPhpClient\Generated\Schema\SerializableInterface;
use Psr\Http\Message\StreamInterface;

interface ContentTypeSerializerInterface
{
    const LITERAL_VALUE_KEY = '__literalResponseValue';
    public function encode(SerializableInterface $body) : string;
    public function decode(StreamInterface $body) : array;
    public function getMimeType() : string;
}
