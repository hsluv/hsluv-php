# husl-php-class

[![Build Status](https://travis-ci.org/husl-colors/husl-php.svg?branch=master)](https://travis-ci.org/husl-colors/husl-php)

A port to PHP (5.6+) from Python / JS of [HUSL](http://www.husl-colors.org/) (revision 3) .

To run the tests:
```
composer install
./vendor/bin/phpunit
```

# Usage

```
composer require "carloscabo/husl"
```

# From rgb / hex to HUSL

````php
// From hex upper / lowercase
$out = HUSL::fromHex( '#fabada' );
$out = HUSL::fromHex( '#FABADA' );

// From rgb (float) in 0.0 - 1.0 range
$out = HUSL::fromRgb( 0.9803921568627451, 0.7294117647058823, 0.8549019607843137 );
$out = HUSL::fromRgb( array( 0.9803921568627451, 0.7294117647058823, 0.8549019607843137 ) );

// From rgb (int) in 0 - 255 range
$out = HUSL::fromRgbInt( 250, 186, 218 );
$out = HUSL::fromRgbInt( 250.0, 186.0, 218.0 );
$out = HUSL::fromRgbInt( array( 250, 186, 218 ) );
$out = HUSL::fromRgbInt( array( 250.0, 186.0, 218.0 ) );
````

Returns HUSL an array of **float** values ( H, S, L ).

# From HUSL to rgb / hex

Parameters are float H, S, L componets or an array.

```php
// Rgb: returns array of (float) in 0.0 - 1.0 range
$out = HUSL::toRgb( $h, $s, $l )
$out = HUSL::toRgb( array( $h, $s, $l ) )

// Rgb: returns array if (int) in 0 - 255 range
$out = HUSL::toRgbInt( $h, $s, $l )
$out = HUSL::toRgbInt( array( $h, $s, $l ) )

// Hex: returns lowercase string including "#"
$out = HUSL::toHex( $h, $s, $l )
$out = HUSL::toRgb( array( $h, $s, $l ) )
```

# Authors

- Port by Carlos Cabo ([carloscabo](https://github.com/carloscabo))
- Support with tests and packaging ([codewrong](https://github.com/codewrong))
- Original HUSL author: Alexei Boronine ([boronine](http://github.com/boronine))
