<?php
 
use Encoding\Base16;
use Encoding\DecodingMode;
 
use function Encoding\base16_encode;
use function Encoding\base16_decode;
 
$data = 'Hello world!';
$encodedUpper = "48656C6C6F20776F726C6421"; // using uppercase characters
$encodedLower = "48656c6c6f20776f726c6421"; // using lowercase characters
$encodedUpperWithSpaces = "48 65\n6C\t6C\r6F 20 57 6F 72 6C 64 21";
$encodedWithSpaces = "48 65\n6C\t6C\r6F 20 57 6f 72 6C 64 21";

echo base16_encode($data);
// returns "48656C6C6F20776F726C6421" the letters are uppercased by default

echo base16_encode($data, variant: Base16::Lower);
// returns "48656c6c6f20776f726c6421" with lowercased letters

echo base16_decode($encodedUpper);
// returns 'Hello world!'

echo base16_decode($encodedUpperWithSpaces);
// returns 'Hello world!'

echo base16_decode($encodedLower);
// throws a UnableToDecodeException exception
// by default value is expected with uppercased letters


echo base16_decode($encodedWithSpaces);
// throws a UnableToDecodeException exception
// by default value is expected with uppercased letters
// the example contains lowercased letters (the space do not affect decoding)


echo base16_decode($encodedLower, variant: Base16::Lower);
// 'Hello world!' the selected variant is in accordance with the data.

echo base16_decode($encodedLower, variant: Base16::Upper, decodingMode: DecodingMode::Forgiving);
// 'Hello world!' the decoding is case-insensitive.

echo base16_decode($encodedWithSpaces, variant: Base16::Upper, decodingMode: DecodingMode::Forgiving);
// 'Hello world!' the decoding is case-insensitive and is not affected by the whitespaces.
