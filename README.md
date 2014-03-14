# GoogleWalletDigitalGoods

A PHP library for interacting with [Google Wallet for Digital Goods](https://developers.google.com/wallet/digital/) .

## Composer Installation

GoogleWalletDigitalGoods can be installed with Composer (http://getcomposer.org/).  Add the following to your
composer.json file.  Composer will handle the autoloading.

```json
{
    "require": {
        "kesar/googlewalletdigitalgoods": ">=1.0.0"
    }
}
```

## Usage

```php
use \GoogleWalletDigitalGoods\SellerInfo;
use \GoogleWalletDigitalGoods\Payload;
use \GoogleWalletDigitalGoods\JWT;

$payload = new Payload();
$payload->SetIssuedAt(time());
$payload->SetExpiration(time() + 3600);
$payload->AddProperty("name", "Piece of Cake");
$payload->AddProperty(
    "description",
    "Virtual chocolate cake to fill your virtual tummy"
);
$payload->AddProperty("price", "10.50");
$payload->AddProperty("currencyCode", "USD");
$payload->AddProperty(
    "sellerData",
    "user_id:1224245,offer_code:3098576987,affiliate:aksdfbovu9j"
);

// Creating payload of the product.
$Token = $payload->CreatePayload(SellerInfo::$issuerId);

// Encoding payload into JWT format.
$jwtToken = JWT::encode($Token, SellerInfo::$secretKey);
```

## Testing

To test the library itself, run the PHPUnit tests:

    phpunit --configuration phpunit.xml.dist
