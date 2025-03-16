# PHP SDK for Whatsapp Marketing - Hyperzod

This is the official PHP SDK for Whatsapp Marketing.

## Installation

You can install the package via composer:

```bash
composer require hyperzod/whatsapp-marketing-sdk-php
```

## Usage

You can use the sdk to call the Whatsapp Marketing API (Eg: Sending a message).

```php
// $client = WhatsappMarketingClient($api_key, $env, $token = null);
// $response = $client->message->sendUtilityMessage($payload);
```

```php
// Creating data objects
$messageData = new UtilityMessageData(
    'tenant123',
    'template_abc',
    'TEXT',
    919876543210,
    ['1' => 'A1005', '2' => 'Accepted']
);

// Or from request data
$messageData = UtilityMessageData::fromArray($request->all());

// Using with services
$messageService->sendUtilityMessage($messageData->toArray());
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
