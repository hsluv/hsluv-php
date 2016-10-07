<?php

  require '../src/HUSL.class.php';

  $out = HUSL::fromHex( '#fabada' );
  var_dump( $out );
  echo '<br>';

  $out = HUSL::fromHex( '#FABADA' );
  var_dump( $out );
  echo '<br>';

  $out = HUSL::fromRgb( 250, 186, 218 );
  var_dump( $out );
  echo '<br>';

  $out = HUSL::fromRgb( 250.0, 186.0, 218.0 );
  var_dump( $out );
  echo '<br>';

  $out = HUSL::fromRgb( array( 250, 186, 218 ) );
  var_dump( $out );
  echo '<br>';

  $out = HUSL::fromRgb( array(250.0, 186.0, 218.0 ) );
  var_dump( $out );
  echo '<br>';

  echo '----------------------------------------<br>';
  $husl = array( 336.87558941192, 89.200531317385, 82.112136084095 );

  var_dump( HUSL::toRgb( $husl ) );
  echo '<br>';
  var_dump( HUSL::toRgb( $husl[0], $husl[1], $husl[2] ) );
  echo '<br>';
  var_dump( HUSL::toHex( $husl ) );
  echo '<br>';
  var_dump( HUSL::toHex( $husl[0], $husl[1], $husl[2] ) );
  echo '<br>';

?>
