<?php
 
use Encoding\Base58;
use Encoding\DecodingMode;
 
use function Encoding\base58_encode;
use function Encoding\base58_decode;
 
$data = 'Hello world!';
$encodedBitcoin = "72k1xXWG59fYdzSNoA";
$encodedFlickr = "Z7Pznk19XTTzBtx";
 
echo base58_encode($data);
// returns "72k1xXWG59fYdzSNoA" default to Bitcoin variant

echo base58_encode($data, variant: Base58::Bitcoin);
// returns "72k1xXWG59fYdzSNoA" the variant is explicitly specified

echo base58_encode($data, variant: Base58::Flickr);
// returns "Z7Pznk19XTTzBtx" the flickr variant

echo base58_decode($encodedBitcoin);
// returns 'Hello world!'

echo base58_decode($encodedFlickr);
// depending on the string if it contains only supported
// character from the Bitcoin variant, a meaningless string 
// is returned; otherwise an UnableToDecodeException exception is thrown

echo base58_decode($encodedFlickr, variant: Base58::Flickr);
// returns 'Hello world!'