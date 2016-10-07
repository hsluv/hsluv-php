<?php

  require '../src/HUSL.class.php';

  $out = HUSL::fromHex( '#fabada' );
  var_dump( $out );
  echo '<br>';

  $out = HUSL::fromRgb( 250, 186, 218 );
  var_dump( $out );
  echo '<br>';

  $out = HUSL::fromRgb( array(250, 186, 218) );
  var_dump( $out );
  echo '<br>';

?>
