<?php

foreach ($apagar as $key => $value)
{
    $numerodocumento[$value->apagar_id][] = $value;
}

debug($apagar);
?>

