<?php

require_once __DIR__ . '/populator.php';

$data = new \SplObjectStorage();

// Construct of the object and the bitfield as the info object

$start = microtime(true);

foreach ($objects as $object) {
    $data->attach($object, $object->getBitField());
}

$end = microtime(true);

echo "Construction time: " . ($end - $start) . "\n";

// Find all bitfields that have option 1, 4, and 16 set.

function test_object_foreach($do_calculation = false) {
    global $data;
    $resetCounter = 0;

    foreach ($data as $object) {
        /** @var int */
        $bitField = $data->getInfo();
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

// Run N times 

$initialMemoryConsumption = memory_get_usage();
$start = microtime(true);


for ($i = 0; $i < N; $i++) {
    test_object_foreach(DO_CALC);
}

$endMemoryConsumption = memory_get_usage();
$end = microtime(true);

echo "Time: " . ($end - $start) . "\n";
echo "Memory: " . ($endMemoryConsumption - $initialMemoryConsumption) . "\n";
echo "Result length: " . test_object_foreach() . "\n";