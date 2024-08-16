<?php

namespace SrsRegistrar\Resources;

use SrsRegistrar\Service;
use SimpleXMLElement;

abstract class Resource
{
    public const string DEFAULT_RESOURCE_PROTOCOL = 'XCP';

    abstract public function getObject(): string;
    abstract public function getAction(): string;

    protected SimpleXMLElement $xmlDocument;

    protected Service $service;

    public function __construct(Service $service)
    {
        $this->setService($service);
    }

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

    public function setService(Service $service): void
    {
        $this->service = $service;
    }

    public function getService(): Service
    {
        return $this->service;
    }
}