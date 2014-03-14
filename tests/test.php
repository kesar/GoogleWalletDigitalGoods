<?php

use \GoogleWalletDigitalGoods\SellerInfo;
use \GoogleWalletDigitalGoods\Payload;
use \GoogleWalletDigitalGoods\JWT;

require __DIR__ . '/../src/autoload.php';

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