<?php

namespace SrsRegistrar\Resources\Domain;

use SrsRegistrar\Resources\Resource;
use SrsRegistrar\Resources\Traits\DomainObject;
use SrsRegistrar\Resources\Traits\UseClassnameForAction;

class Register extends Resource
{
    use DomainObject;
    use UseClassnameForAction;
}