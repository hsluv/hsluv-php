# HSLuv-php

[![Build Status](https://github.com/hsluv/hsluv-php/actions/workflows/test.yml/badge.svg)](https://github.com/hsluv/hsluv-php/actions/workflows/test.yml)

Port to PHP (5.6+) from Python / JS of [HSLuv](http://www.hsluv.org/) (revision 4).

To run the tests:
```
composer install
./vendor/bin/phpunit
```

# Usage

```
composer require "hsluv/hsluv"
```

# From RGB / hex to HSLuv

````php
// From hex upper / lowercase
$out = HSLuv::fromHex( '#fabada' );
$out = HSLuv::fromHex( '#FABADA' );

// From RGB (float) in 0.0 - 1.0 range
$out = HSLuv::fromRgb( 0.9803921568627451, 0.7294117647058823, 0.8549019607843137 );
$out = HSLuv::fromRgb( array( 0.9803921568627451, 0.7294117647058823, 0.8549019607843137 ) );

// From RGB (int) in 0 - 255 range
$out = HSLuv::fromRgbInt( 250, 186, 218 );
$out = HSLuv::fromRgbInt( 250.0, 186.0, 218.0 );
$out = HSLuv::fromRgbInt( array( 250, 186, 218 ) );
$out = HSLuv::fromRgbInt( array( 250.0, 186.0, 218.0 ) );
````

Returns HSLuv an array of **float** values ( H, S, L ).

# From HSLuv to RGB / hex

Parameters are float H, S, L componets or an array.

```php
// Rgb: returns array of (float) in 0.0 - 1.0 range
$out = HSLuv::toRgb( $h, $s, $l )
$out = HSLuv::toRgb( array( $h, $s, $l ) )

// Rgb: returns array if (int) in 0 - 255 range
$out = HSLuv::toRgbInt( $h, $s, $l )
$out = HSLuv::toRgbInt( array( $h, $s, $l ) )

// Hex: returns lowercase string including "#"
$out = HSLuv::toHex( $h, $s, $l )
$out = HSLuv::toRgb( array( $h, $s, $l ) )
```

# Authors

- Port by Carlos Cabo ([carloscabo](https://github.com/carloscabo))
- Support with tests and packaging ([tasugo](https://github.com/tasugo))
- Original HSLuv author: Alexei Boronine ([boronine](http://github.com/boronine))
