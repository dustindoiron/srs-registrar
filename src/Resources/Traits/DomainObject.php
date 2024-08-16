<?php

namespace SrsRegistrar\Resources\Traits;

trait DomainObject
{
    public const string OBJECT = 'DOMAIN';

    public function getObject(): string
    {
        return self::OBJECT;
    }
}
