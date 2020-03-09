<?php

namespace BrainGames\Even;

use function BrainGames\Engine\engine;

const INTRO = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num): bool
{
    return ($num % 2 === 0);
}

function getRandomInt(): int
{
    $minNumber = 0;
    $maxNumber = 100;
    return random_int($minNumber, $maxNumber);
}

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];
    for ($i = 1; $i <= 3; $i++) {
        $questionsAndAnswers[$i]['question'] = getRandomInt();
        $questionsAndAnswers[$i]['answer'] = isEven($questionsAndAnswers[$i]['question']) ? 'yes' : 'no';
    }

    return $questionsAndAnswers;
}

function runGame()
{
    $questionsAndAnswers = getQuestionsAndAnswers();
    engine(INTRO, $questionsAndAnswers);
}
