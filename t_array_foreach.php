<?php

require_once __DIR__ . '/populator.php';

$data = [];

// Construct array of [$bitField, $object] pairs

$start = microtime(true);

foreach ($objects as $object) {
    $data[] = [$object->getBitField(), $object];
}

$end = microtime(true);

echo "Construction time: " . ($end - $start) . "\n";

// Find all bitfields that have option 1, 4, and 16 set.

function test_array_foreach($do_calculation = false) {
    global $data;
    
    $resetCounter = 0;

    foreach ($data as $pair) {
        [$bitField, $object] = $pair;
        if (($bitField & 21) === 21) {
            $resetCounter++;
            if ($do_calculation) { 
                $object->resetBitfield();
                $object->setFromBitField($bitField);
            }
        }
    }

    return $resetCounter;
}

$intialMemoryConsumption = memory_get_usage();
$start = microtime(true);

// Run test_array_foreach N times

for ($i = 0; $i < N; $i++) {
    test_array_foreach(DO_CALC);
}

$endMemoryConsumption = memory_get_usage();
$end = microtime(true);

echo "Time: " . ($end - $start) . "\n";
echo "Memory: " . ($endMemoryConsumption - $intialMemoryConsumption) . "\n";
echo "Result length: " . test_array_foreach() . "\n";