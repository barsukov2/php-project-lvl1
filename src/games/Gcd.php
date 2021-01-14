<?php

namespace BrainGames\Gcd;

use function BrainGames\Utils\getRandomInt;
use function BrainGames\Engine\engine;

use const BrainGames\Engine\ROUNDS_COUNT;

const INTRO = 'Find the greatest common divisor of given numbers.';

function getGcd(int $a, int $b): int
{
    return ($a % $b) ? getGcd($b, $a % $b) : $b;
}

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number1 = getRandomInt();
        $number2 = getRandomInt();

        $questionsAndAnswers[$i]['question'] = "{$number1} {$number2}";
        $questionsAndAnswers[$i]['answer'] = getGcd($number1, $number2);
    }

    return $questionsAndAnswers;
}

function runGame(): void
{
    $questionsAndAnswers = getQuestionsAndAnswers();
    engine(INTRO, $questionsAndAnswers);
}
