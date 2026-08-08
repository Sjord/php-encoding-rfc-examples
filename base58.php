<?php
 
use Encoding\Base58;
use Encoding\DecodingMode;
 
use function Encoding\base58_encode;
use function Encoding\base58_decode;
 
$data = 'Hello world!';
$encodedBitcoin = "2NEpo7TZRhna7vSvL";
$encodedFlickr = "2nePN7syqGMz7VrVk";
 
echo base58_encode($data);
// returns "2NEpo7TZRhna7vSvL" default to Bitcoin variant

echo base58_encode($data, variant: Base58::Bitcoin);
// returns "2NEpo7TZRhna7vSvL" the variant is explicitly specified

echo base58_encode($data, variant: Base58::Flickr);
// returns "2nePN7syqGMz7VrVk" the flickr variant

echo base58_decode($encodedBitcoin);
// returns 'Hello world!'

echo base58_decode($encodedFlickr);
// depending on the string if it contains only supported
// character from the Bitcoin variant, a meaningless string 
// is returned; otherwise an UnableToDecodeException exception is thrown

echo base58_decode($encodedFlickr, variant: Base58::Flickr);
// returns 'Hello world!'