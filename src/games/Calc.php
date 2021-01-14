<?php

namespace BrainGames\Calc;

use function BrainGames\Utils\getRandomInt;
use function BrainGames\Engine\engine;

use const BrainGames\Engine\ROUNDS_COUNT;

const INTRO = 'What is the result of the expression?';
const OPERATIONS = ['+', '-', '*'];

function getRandomOperation(): string
{
    $randOperationIndex = array_rand(OPERATIONS, 1);

    return OPERATIONS[$randOperationIndex];
}

function getRandomQuestionAndAnswer(): array
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
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $questionsAndAnswers[$i] = getRandomQuestionAndAnswer();
    }

    return $questionsAndAnswers;
}

function runGame()
{
    $questionsAndAnswers = getQuestionsAndAnswers();
    engine(INTRO, $questionsAndAnswers);
}
