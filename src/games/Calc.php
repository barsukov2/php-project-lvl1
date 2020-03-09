<?php

namespace BrainGames\Calc;

use function BrainGames\Even\getRandomInt;
use function BrainGames\Engine\engine;

const INTRO = 'What is the result of the expression?';
const OPERATIONS = ['+', '-', '*'];

function getRandomOperation(): string
{
    $arrRand = array_rand(OPERATIONS, 1);
    return OPERATIONS[$arrRand];
}

function getExpressionAndResult(): array
{
    $operand1 = getRandomInt();
    $operand2 = getRandomInt();
    $operation = getRandomOperation();

    switch ($operation) {
        case '+':
            $result =  $operand1 + $operand2;
            break;
        case '-':
            $result = $operand1 - $operand2;
            break;
        case '*':
            $result = $operand1 * $operand2;
            break;
    }

    return [
        'question' => "{$operand1} {$operation} {$operand2}",
        'answer' => $result
    ];
}

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];
    for ($i = 1; $i <= 3; $i++) {
        $questionsAndAnswers[$i] = getExpressionAndResult();
    }

    return $questionsAndAnswers;
}

function runGame()
{
    $questionsAndAnswers = getQuestionsAndAnswers();
    engine(INTRO, $questionsAndAnswers);
}
