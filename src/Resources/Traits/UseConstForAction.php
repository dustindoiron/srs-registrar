<?php

namespace SrsRegistrar\Resources\Traits;

trait UseConstForAction
{
    public function getAction(): string
    {
        return self::ACTION;
    }
}
