<?php

namespace BrainGames\Progression;

use function BrainGames\Even\getRandomInt;
use function BrainGames\Engine\engine;
use const BrainGames\Engine\ROUNDS_COUNT;

const INTRO = 'What number is missing in the progression?';

function getProgression(): array
{
    $start = getRandomInt();
    $increase = getRandomInt();
    $progression[0] = $start;

    for ($i = 1; $i <= 8; $i++) {
        $progression[$i] = $progression[$i - 1] + $increase;
    }

    return $progression;
}

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $progression = getProgression();
        $maskedKey = array_rand($progression);
        $maskedValue = $progression[$maskedKey];
        $maskedProgression = array_replace($progression, [$maskedKey => '..']);

        $questionsAndAnswers[$i]['question'] = implode(' ', $maskedProgression);
        $questionsAndAnswers[$i]['answer'] = $maskedValue;
    }

    return $questionsAndAnswers;
}

function runGame(): void
{
    $questionsAndAnswers = getQuestionsAndAnswers();
    engine(INTRO, $questionsAndAnswers);
}
