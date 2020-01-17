<?php

namespace BrainGames\BrainMath;

function getRandomInt()
{
    $minNumber = 0;
    $maxNumber = 100;
    return random_int($minNumber, $maxNumber);
}

function getRandomOperation()
{
    $operations = ['+', '-', '*'];
    $arrRand = array_rand($operations, 1);
    return $operations[$arrRand];
}

function getExpressionAnswer($operand1, $operand2, $operation) : string
{
    switch ($operation) {
        case '+':
            return $operand1 + $operand2;
            break;
        case '-':
            return $operand1 - $operand2;
            break;
        case '*':
            return $operand1 * $operand2;
            break;
    }
}

function isEven($num)
{
    return ($num % 2 === 0);
}
