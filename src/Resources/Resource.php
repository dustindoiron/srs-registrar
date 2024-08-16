<?php

namespace SrsRegistrar\Resources;

use SimpleXMLElement;

abstract class Resource
{
    public const string DEFAULT_RESOURCE_PROTOCOL = 'XCP';

    abstract public function getObject(): string;
    abstract public function getAction(): string;

    protected $xmlDocument;

    public function getProtocol(): string
    {
        return self::DEFAULT_RESOURCE_PROTOCOL;
    }

    public function setXmlDocument(SimpleXMLElement $document): void
    {
        $this->xmlDocument = $document;
    }

    public function getXmlDocument(): SimpleXMLElement
    {
        return $this->xmlDocument;
    }
}