<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\engine;
use function BrainGames\Utils\getRandomInt;

use const BrainGames\Engine\ROUNDS_COUNT;

const INTRO = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    if ($number === 1 || $number <= 0) {
        return false;
    }
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $questionsAndAnswers[$i]['question'] = getRandomInt();
        $questionsAndAnswers[$i]['answer'] = isPrime($questionsAndAnswers[$i]['question']) ? 'yes' : 'no';
    }

    return $questionsAndAnswers;
}
function runGame(): void
{
    $questionsAndAnswers = getQuestionsAndAnswers();
    engine(INTRO, $questionsAndAnswers);
}
