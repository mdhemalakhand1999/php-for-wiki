<?php
$data = [1, 2, 3, 4, 5];
echo array_reduce($data, function($oldValue, $newValue) {
    return $oldValue+$newValue;
});