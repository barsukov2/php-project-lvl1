<?php

namespace BrainGames\BrainMath;

function getRandomInt()
{
    $minNumber = 0;
    $maxNumber = 100;
    return random_int($minNumber, $maxNumber);
}

function isEven($num)
{
    return ($num % 2 === 0);
}
