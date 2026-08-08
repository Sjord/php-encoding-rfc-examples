<?php
 
use Encoding\Base32;
use Encoding\DecodingMode;
use Encoding\PaddingMode;
 
use function Encoding\base32_encode;
use function Encoding\base32_decode;
 
$data = 'Hello world!';
$encodedAscii = "JBSWY3DPEB3W64TMMQQQ====";
$encodedCrockFord = "91JPRV3F41VPYWKCCGGG";
 
echo base32_encode($data);
// returns "JBSWY3DPEB3W64TMMQQQ===="

echo base32_encode($data, variant: Bas32::Ascii);
// returns "JBSWY3DPEB3W64TMMQQQ===="

echo base32_encode($data, paddingMode: PaddingMode::StripPadding);
// returns "JBSWY3DPEB3W64TMMQQQ"

echo base32_encode($data, variant: Bas32::CrockFord);
// returns "91JPRV3F41VPYWKCCGGG"

echo base32_encode($data, variant: Bas32::CrockFord, paddingMode: PaddingMode::PreservePadding);
// throw ValueError the variant does not support the padding mode

echo base32_decode($encodedAscii);
// returns 'Hello world!'

echo base32_decode("JBSWY3DPEB3W64TMMQQQ");
// throws a UnableToDecodeException exception the padding character is missing

echo base32_decode("JBSWY3DPEB3W64TMMQQQ", decodingMode: DecodingMode::Forgiving);
// returns 'Hello world!'

echo base32_decode($encodedAscii, variant: Bas32::CrockFord);
// throws a UnableToDecodeException exception if the encoding string contains
// invalid characters may returns a meaningless string if the characters are
// all supported, but the data was encoded with a different variant.

echo base32_decode($encodedCrockFord, variant: Bas32::CrockFord);
// returns 'Hello world!'