<?php

namespace SrsRegistrar\Resources\Domain;

use SrsRegistrar\Resources\Resource;
use SrsRegistrar\Resources\Traits\DomainObject;
use SrsRegistrar\Resources\Traits\UseConstForAction;

class Register extends Resource
{
    use DomainObject;
    use UseConstForAction;

    public const string ACTION = 'SW_REGISTER';
}
