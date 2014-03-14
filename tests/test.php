<?php

use \GoogleWalletDigitalGoods\SellerInfo;
use \GoogleWalletDigitalGoods\Payload;
use \GoogleWalletDigitalGoods\JWT;

require __DIR__ . '/../src/autoload.php';

$payload = new Payload();
$payload->setIssuedAt(time());
$payload->setExpiration(time() + 3600);
$payload->addProperty("name", "Piece of Cake");
$payload->addProperty(
    "description",
    "Virtual chocolate cake to fill your virtual tummy"
);
$payload->addProperty("price", "10.50");
$payload->addProperty("currencyCode", "USD");
$payload->addProperty(
    "sellerData",
    "user_id:1224245,offer_code:3098576987,affiliate:aksdfbovu9j"
);

// Creating payload of the product.
$Token = $payload->createPayload(SellerInfo::$issuerId);

// Encoding payload into JWT format.
$jwtToken = JWT::encode($Token, SellerInfo::$secretKey);