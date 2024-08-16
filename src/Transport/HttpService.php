<?php

namespace SrsRegistrar\Transport;

use GuzzleHttp\Client;
use SrsRegistrar\Resources\Resource;
use SrsRegistrar\Service;

class HttpService
{
    public const array DEFAULT_HEADERS = [
        'Content-Type' => 'text/xml; charset=UTF8',
    ];

    protected Service $service;

    protected Resource $resource;

    public function __construct(Service $service, Resource $resource)
    {
        $this->setService($service);
        $this->setResource($resource);
    }

    public function setService(Service $service): void
    {
        $this->service = $service;
    }

    public function setResource(Resource $resource): void
    {
        $this->resource = $resource;
    }

    public function getResource(): Resource
    {
        return $this->resource;
    }

    public function getService(): Service
    {
        return $this->service;
    }

    public function getHttpClient(): Client
    {
        return new Client([
            'base_uri' => $this->getService()->getConfiguration()->getEndpoint(),
        ]);
    }

    public function getHttpHeaders(): array
    {
        return array_merge(self::DEFAULT_HEADERS, $this->getAuthenticationHeaders());
    }

    public function getAuthenticationHeaders(): array
    {
        return [
            'X-Username' => $this->getService()->getConfiguration()->getUsername(),
            'X-Signature' => $this->getSignature(),
        ];
    }

    public function getSignature(): string
    {
        return md5(md5($this->getResource()->getXmlService()->getRequestDocument()->asXml().$this->getService()->getConfiguration()->getApiKey()).$this->getService()->getConfiguration()->getApiKey());
    }

    public function send(): void
    {
        $response = $this->getHttpClient()->request(
            'POST',
            '',
            array_merge(
                ['headers' => $this->getHttpHeaders()],
                ['body' => $this->getResource()->getXmlService()->getRequestDocument()->asXML()]
            )
        );

        $this->getResource()->getXmlService()->createResponseDocument($response->getBody());
    }
}
