<?php
 
use Encoding\Base85;
use Encoding\PaddingMode;
use Encoding\DecodingMode;
 
use function Encoding\base85_encode;
use function Encoding\base85_decode;
 
$data = 'Hello world!';
$encodedAdobe = "<~87cURD]j7BEbo80~>";
$encodedAdobeNoPadding = "87cURD]j7BEbo80";
$encodedZ85 = "nm=QNzY<mxA+]nf";
 
echo base85_encode($data, variant: Base85::Adobe);
// "<~87cURD]j7BEbo80~>"

echo base85_encode($data, variant: Base85::Adobe, paddingMode: PaddingMode::StripPadding);
// "87cURD]j7BEbo80"

echo base85_encode($data, variant: Base85::Z85, paddingMode: PaddingMode::StripPadding);
// throw a ValueError

echo base85_decode("87cURD]j7BEbo80", variant: Base85::Adobe);
// throws a UnableToDecodeException exception
// the Base85::Adobe is used 
// and expect by default padding characters to be used

echo base85_decode("87cURD]j7BEbo80", variant: Base85::Adobe, decodingMode: DecodingMode::Forgiving);
// returns 'Hello world!'
// the Forgiving mode allows decoding in absence of padding string.

echo base85_decode($encodedZ85, variant: Base85::Adobe);
// depending on the string if it contains only supported
// character from the Adobe variant, a meaningless string 
// is returned; otherwise an UnableToDecodeException exception is thrown

echo base85_decode($encodedZ85, variant: Base85::Z85);
// returns 'Hello world!'