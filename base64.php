<?php
 
use Encoding\Base64;
use Encoding\PaddingMode;
use Encoding\DecodingMode;
 
use function Encoding\base64_encode;
use function Encoding\base64_decode;
 
$data = 'This is an encoded string';
 
echo base64_encode($data);
// "VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw=="

echo base64_encode($data, paddingMode: PaddingMode::StripPadding);
// "VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw"

echo base64_decode("VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw");
// throws a UnableToDecodeException exception
// by default the Base64::Standard is used 
// and expect padding characters when application

echo base64_decode("VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw", decodingMode: DecodingMode::Forgiving);
// returns 'This is an encoded string'
// the Forgiving mode allow decoding in absence of padding string.
 
$data = chr(0xFF) . chr(0xFF);
echo base64_encode($data); // "//8="
echo base64_encode($data, variant: Base64::UrlSafe); // "__8"
echo base64_encode($data, paddingMode: PaddingMode::StripPadding); // "//8"