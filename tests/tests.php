<?php

  require '../src/HUSL.class.php';

  $out = HUSL::rgbToXyz( array(250, 186, 218) );
  var_dump( $out );

?>
