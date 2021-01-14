<?php

namespace BrainGames\Even;

use function BrainGames\Engine\engine;
use function BrainGames\Utils\getRandomInt;

use const BrainGames\Engine\ROUNDS_COUNT;

const INTRO = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num): bool
{
    return ($num % 2 === 0);
}

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
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
