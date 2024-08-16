<?php

namespace SrsRegistrar;

class Service
{
    protected $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->setConfiguration($configuration);
    }

    public function setConfiguration(Configuration $configuration): void
    {
        $this->configuration = $configuration;
    }

    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }
}
