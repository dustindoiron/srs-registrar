<?php

namespace SrsRegistrar\Transport;

use SimpleXMLElement;

class XMLService
{
    public const string DEFAULT_PATH = __DIR__.'/../../resources/base_request.xml';

    protected SimpleXMLElement $requestDocument;

    public static function getBaseDocument(string $path = self::DEFAULT_PATH): SimpleXMLElement|bool
    {
        return simplexml_load_file($path);
    }

    public function __construct(SimpleXMLElement $document = new SimpleXMLElement())
    {
        $this->setRequestDocument($document);
    }

    public function setRequestDocument(SimpleXMLElement $document): void
    {
        $this->requestDocument = $document;
    }

    public function getRequestDocument(): SimpleXMLElement
    {
        return $this->requestDocument;
    }

    public function createItem(mixed $key, mixed $value, mixed $xpath = null, ?string $dataType = 'dt_assoc'): SimpleXMLElement
    {
        return $this->getRequestDocument()->addChild($key, $value, $xpath);
    }
}
