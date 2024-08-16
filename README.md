# SrsRegistrar

Quick and dirty OpenSRS Domain Registrar client.

See: https://domains.opensrs.guide/docs/quickstart

```php
use SrsRegistrar\Resources\Domains\Lookup;
use SrsRegistrar\Service;
use SrsRegistrar\Configuration;

$configuration = new Configuration('apiKey', 'username', 'endpoint');
$service = new Service($configuration);

$lookup = new Lookup($service);

$parameters = [
    'domain' => 'dustindoiron.com',
    'no_cache' => 1,
];

$lookup->createRequestFromArray($parameters)->send();

$response = $lookup->getXmlService()->getResponseDocumentBody();
/**
  SimpleXMLElement {#8574
    +"item": [
      "211",
      "Domain taken",
      SimpleXMLElement {#8570
        +"@attributes": [
          "key" => "attributes",
        ],
        +"dt_assoc": SimpleXMLElement {#8568
          +"item": "taken",
        },
      },
      "DOMAIN",
      "1",
      "REPLY",
      "XCP",
    ],
  }
*/
```
