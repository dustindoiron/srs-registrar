<?php

namespace SrsRegistrar\Resources\Traits;

trait UseClassnameForAction
{
    public function getAction(): string
    {
        return strtoupper(
            preg_replace(
                '/(?<=\\w)(?=[A-Z])|(?<=[a-z])(?=[0-9])/', '_', get_called_class()
            )
        );
    }
}