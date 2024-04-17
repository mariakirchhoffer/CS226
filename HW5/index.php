<?php

$string = "Hello, World!";
$pattern = '/[aeiouAEIOU]/';
$replacement = '-';

$modifiedString = preg_replace($pattern, $replacement, $string);

echo $modifiedString;

?>
