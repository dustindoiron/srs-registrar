<?php

namespace SrsRegistrar\Transport;

use SimpleXMLElement;

class XMLService
{
    public const string DEFAULT_PATH = '../../resources/base_request.xml';

    public static function getBaseDocument(string $path): SimpleXMLElement
    {
        return simplexml_load_file($path);
    }
}