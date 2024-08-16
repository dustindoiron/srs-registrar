<?php

namespace SrsRegistrar\Resources\Domain;

use SrsRegistrar\Resources\Resource;
use SrsRegistrar\Resources\Traits\DomainObject;
use SrsRegistrar\Resources\Traits\UseClassnameForAction;

class NameSuggest extends Resource
{
    use DomainObject;
    use UseClassnameForAction;
}