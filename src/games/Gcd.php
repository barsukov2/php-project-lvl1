<?php

namespace BrainGames\Gcd;

use function BrainGames\Even\getRandomInt;
use function BrainGames\Engine\engine;

const INTRO = 'Find the greatest common divisor of given numbers.';

function getGcd(int $a, int $b): int
{
    return ($a % $b) ? getGcd($b, $a % $b) : $b;
}

function getQuestionsAndAnswers()
{
    $questionsAndAnswers = [];
    for ($i = 1; $i <= 3; $i++) {
        $number1 = getRandomInt();
        $number2 = getRandomInt();

        $questionsAndAnswers[$i]['question'] = "{$number1} {$number2}";
        $questionsAndAnswers[$i]['answer'] = getGcd($number1, $number2);
    }

    return $questionsAndAnswers;
}

function runGame()
{
    $questionsAndAnswers = getQuestionsAndAnswers();
    engine(INTRO, $questionsAndAnswers);
}
