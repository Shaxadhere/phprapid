<?php

include_once('rapid.php');

$ipdata = trackIP('72.255.31.23');
print($ipdata['country_name']);
?>