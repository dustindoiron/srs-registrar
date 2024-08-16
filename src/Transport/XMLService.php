<?php

namespace SrsRegistrar\Transport;

use SimpleXMLElement;

class XMLService
{
    public const string DEFAULT_PATH = __DIR__.'/../../resources/base_request.xml';

    protected SimpleXMLElement $requestDocument;

    protected SimpleXMLElement $responseDocument;

    public static function getBaseDocument(string $path = self::DEFAULT_PATH): SimpleXMLElement|bool
    {
        return simplexml_load_file($path);
    }

    public function __construct(?SimpleXMLElement $document = null)
    {
        if (! $document) {
            $document = self::getBaseDocument();
        }
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

    public function createNewResource(string $protocol, string $object, string $action): SimpleXMLElement
    {
        /**
         * The base request document needs to be created before we can begin adding items.
         * Other createItem and createContainer calls end up in the attributes body and can use the method below.
         */
        $body = $this->getRequestDocument()->body[0]->data_block[0]->dt_assoc[0];

        $this->createItem('protocol', $protocol, body: $body);
        $this->createItem('object', $object, body: $body);
        $this->createItem('action', $action, body: $body);
        $this->createItem('attributes', body: $body);

        return $this->getRequestDocument();
    }

    public function createContainer(
        string $type = 'dt_assoc',
        ?string $xpath = null,
        ?SimpleXMLElement $body = null): SimpleXMLElement
    {
        if (! isset($body)) {
            $body = $this->getRequestDocumentBody($xpath);
        }

        return $body->addChild($type);
    }

    public function createItem(string $key,
        ?string $value = null,
        ?string $xpath = null,
        ?SimpleXMLElement $body = null): SimpleXMLElement
    {
        if (! isset($body)) {
            $body = $this->getRequestDocumentBody($xpath);
        }

        $body = $body->addChild('item', $value);
        $body->addAttribute('key', $key);

        return $body;
    }

    public function getRequestDocumentBody(?string $xpath = null): SimpleXMLElement
    {
        $body = $this->getRequestDocument()->body[0]->data_block[0]->dt_assoc[0]->item[3]; // item key=attributes

        if ($xpath) {
            $body->xpath($xpath);
        }

        return $body;
    }

    public function createResponseDocument(string $document): SimpleXMLElement
    {
        $this->setResponseDocument(new SimpleXMLElement($document));

        return $this->getResponseDocument();
    }

    public function setResponseDocument(SimpleXMLElement $document): void
    {
        $this->responseDocument = $document;
    }

    public function getResponseDocument(): SimpleXMLElement
    {
        return $this->responseDocument;
    }
}
