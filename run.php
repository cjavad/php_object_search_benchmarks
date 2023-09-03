<?php

define("N", 100);
define("S", 1000000);
define("DO_CALC", false);

require_once __DIR__ . '/populator.php';

$n = N;
$s = S;
echo "Runnning $n times on $s elements.\n";
echo DO_CALC ? "With calculation.\n" : "Without calculation.\n";

echo "Array foreach:\n";
include_once __DIR__ . '/t_array_foreach.php';
echo "SPLObj foreach:\n";
include_once __DIR__ . '/t_spl_object_foreach.php';
echo "SPLObj iterator:\n";
include_once __DIR__ . '/t_spl_object_iterator.php';
