<?php

session_start();

$_SESSION['a'] = null;
$_SESSION['a']['a'] = 'AAAAAAAA';

echo $_SESSION['a']['a'];