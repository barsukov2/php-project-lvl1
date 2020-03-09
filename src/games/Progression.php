<?php

namespace BrainGames\Progression;

use function BrainGames\Even\getRandomInt;
use function BrainGames\Engine\engine;

const INTRO = 'Find the missing number of progression.';

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
    for ($i = 1; $i <= 3; $i++) {
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
