<?php

class DataStoreObject {
    public bool $field1   = false;
    public bool $field2   = false;
    public bool $field4   = false;
    public bool $field8   = false;
    public bool $field16  = false;
    public bool $field32  = false;
    public bool $field64  = false;
    public bool $field128 = false;

    public function getBitField() {
        $int = 0;
        $int += $this->field1   ? 1   : 0;
        $int += $this->field2   ? 2   : 0;
        $int += $this->field4   ? 4   : 0;
        $int += $this->field8   ? 8   : 0;
        $int += $this->field16  ? 16  : 0;
        $int += $this->field32  ? 32  : 0;
        $int += $this->field64  ? 64  : 0;
        $int += $this->field128 ? 128 : 0;
        return $int;
    }

    public function resetBitfield() {
        $this->field1   = false;
        $this->field2   = false;
        $this->field4   = false;
        $this->field8   = false;
        $this->field16  = false;
        $this->field32  = false;
        $this->field64  = false;
        $this->field128 = false;
    }

    public function setFromBitField(int $bitField) {
        $this->field1   = ($bitField & 1)   === 1;
        $this->field2   = ($bitField & 2)   === 2;
        $this->field4   = ($bitField & 4)   === 4;
        $this->field8   = ($bitField & 8)   === 8;
        $this->field16  = ($bitField & 16)  === 16;
        $this->field32  = ($bitField & 32)  === 32;
        $this->field64  = ($bitField & 64)  === 64;
        $this->field128 = ($bitField & 128) === 128;
    }
}


$start = microtime(true);

$objects = [];

foreach (range(1, S) as $i) {
    $object = new DataStoreObject();
    $object->field1   = rand(0, 1) === 1;
    $object->field2   = rand(0, 1) === 1;
    $object->field4   = rand(0, 1) === 1;
    $object->field8   = rand(0, 1) === 1;
    $object->field16  = rand(0, 1) === 1;
    $object->field32  = rand(0, 1) === 1;
    $object->field64  = rand(0, 1) === 1;
    $object->field128 = rand(0, 1) === 1;
    $objects[] = $object;
}

$end = microtime(true);

echo "Populating time: " . ($end - $start) . "\n";