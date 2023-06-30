<?php
$collection = collect([0, 1, 2, 3, 4, 5]);
$randomNumber = $collection->reject(function ($number) {
    return $number === 0;
})->random();
echo $randomNumber;