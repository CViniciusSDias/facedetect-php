<?php

declare(strict_types=1);

use CV\CascadeClassifier;
use CV\Scalar;
use function CV\imread;
use function CV\rectangleByRect;
use function CV\imwrite;

$image = imread(__DIR__ . '/galera.jpg');

$classifier = new CascadeClassifier();
$classifier->load(__DIR__ . '/haarcascade_frontalface_alt.xml');

$classifier->detectMultiScale($image, $faces);

$red = new Scalar(0, 0, 255);
foreach ($faces as $face) {
    rectangleByRect($image, $face, $red, 3);
}

imwrite(__DIR__ . '/face-detection.jpg', $image);
