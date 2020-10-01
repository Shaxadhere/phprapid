<?php

include_once('rapid.php');

$next = getNextDays(2);

echo json_encode($next);
?>