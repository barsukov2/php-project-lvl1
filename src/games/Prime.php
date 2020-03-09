<?php

namespace BrainGames\Prime;

use function BrainGames\Even\getRandomInt;
use function BrainGames\Engine\engine;

const INTRO = 'Answer "yes" if the number is prime, otherwise answer "no".';

function isPrime(int $number): bool
{
    if ($number === 1) {
        return true;
    }
    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];
    for ($i = 1; $i <= 3; $i++) {
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
