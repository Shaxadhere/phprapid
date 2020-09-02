<?php

include_once('rapid.php');



$chartUrl = generateChart(400, 400, array(20,30,30,20), array("PHP", "C", "Java", "Typescript"), array('442C96','7C1E5D','56962C', '7C1E8A'), 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<img class="" src="<?php echo $chartUrl; ?>" alt="avatar">
</body>
</html>