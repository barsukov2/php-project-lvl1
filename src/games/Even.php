<?php

namespace BrainGames\Even;

use function BrainGames\Engine\engine;

use const BrainGames\Engine\ROUNDS_COUNT;

const INTRO = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num): bool
{
    return ($num % 2 === 0);
}

function getRandomInt(): int
{
    $minNumber = 1;
    $maxNumber = 30;
    return random_int($minNumber, $maxNumber);
}

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $questionsAndAnswers[$i]['question'] = getRandomInt();
        $questionsAndAnswers[$i]['answer'] = isEven($questionsAndAnswers[$i]['question']) ? 'yes' : 'no';
    }

    return $questionsAndAnswers;
}

function runGame(): void
{
    $questionsAndAnswers = getQuestionsAndAnswers();
    engine(INTRO, $questionsAndAnswers);
}
