<?php

namespace BrainGames\Calc;


use function BrainGames\BrainMath\getRandomInt;
use function BrainGames\BrainMath\getRandomOperation;
use function BrainGames\BrainMath\getExpressionAnswer;


function getCalcQuestion() 
{
    $operand1 = getRandomInt();
    $operand2 = getRandomInt();
    $operation = getRandomOperation();

    return "{$operand1} {$operation} {$operand2}";
}

function getCalcIntro()
{
    return 'What is the result of the expression?';
}

function getCalcCorrectAnswer(string $expr)
{
    $arr = explode(" ", $expr);
    return getExpressionAnswer($arr[0], $arr[2], $arr[1]);

}
