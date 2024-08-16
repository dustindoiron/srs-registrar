<?php

namespace SrsRegistrar\Resources;

use SrsRegistrar\Service;
use SrsRegistrar\Transport\XMLService;

abstract class Resource
{
    public const string DEFAULT_RESOURCE_PROTOCOL = 'XCP';

    abstract public function getObject(): string;

    abstract public function getAction(): string;

    protected XMLService $xmlService;

    protected Service $service;

    public function __construct(Service $service, XMLService $xmlService = new XMLService())
    {
        $this->setService($service);
        $this->setXmlService($xmlService);
    }

    public function setXmlService(XMLService $service): void
    {
        $this->xmlService = $service;
    }

    public function getXmlService(): XMLService
    {
        return $this->xmlService;
    }

    public function getProtocol(): string
    {
        return self::DEFAULT_RESOURCE_PROTOCOL;
    }

    public function setService(Service $service): void
    {
        $this->service = $service;
    }

    public function getService(): Service
    {
        return $this->service;
    }

    public function createRequestFromArray(array $parameters, string $xpath = ''): void
    {
        foreach ($parameters as $key => $value) {
            $this->getXmlService()->createItem($key, $value);
        }
    }
}
