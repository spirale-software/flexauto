<?php

$request = $_REQUEST['nom'] . ' ' .$_REQUEST['email'];

$myFile = fopen("testFile.txt", "w") or die("Unable to open file!");
fwrite($myFile, $request);
fclose($myFile);