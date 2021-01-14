<?php

namespace BrainGames\Utils;

function getRandomInt(): int
{
    $minNumber = 1;
    $maxNumber = 30;

    return random_int($minNumber, $maxNumber);
}
