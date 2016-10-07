# husl-php-class

A port fron Python / JS of [HUSL](http://www.husl-colors.org/) (revision 3).

**WARNING: Tests are still not integrated**

# Usage

Include the class in your project.

# From rgb / hex to HUSL

````php
// From hex
$out = HUSL::fromHex( '#fabada' );
$out = HUSL::fromHex( '#FABADA' );

// From rgb (int) in 0 - 255 range
$out = HUSL::fromRgb( 250, 186, 218 );
$out = HUSL::fromRgb( 250.0, 186.0, 218.0 );
$out = HUSL::fromRgb( array( 250, 186, 218 ) );
$out = HUSL::fromRgb( array( 250.0, 186.0, 218.0 ) );
````

Returns HUSL an array of **float** values ( H, S, L ).

# From HUSL to rgb / hex

Parameters are float H, S, L componets or an array.

```php
// rgb output
$out = HUSL::toRgb( $h, $s, $l )
$out = HUSL::toRgb( array( $h, $s, $l ) )

// hex output
$out = HUSL::toHex( $h, $s, $l )
$out = HUSL::toRgb( array( $h, $s, $l ) )
```

Returns lowercase string for **hex** and array of **int** (0-255 range) for **rgb**.

# Authors

- Carlos Cabo ([carloscabo](https://github.com/carloscabo))
- Original HUSL author: Alexei Boronine ([boronine](http://github.com/boronine))
