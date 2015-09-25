<?php

$total_imagenes = count(glob("Facturas/{*.pdf}",GLOB_BRACE));
echo "total_imagenes = ".$total_imagenes;
}
?>
