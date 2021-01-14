<?php

namespace BrainGames\Progression;

use function BrainGames\Utils\getRandomInt;
use function BrainGames\Engine\engine;

use const BrainGames\Engine\ROUNDS_COUNT;

const INTRO = 'What number is missing in the progression?';
const PROGRESSION_COUNT = 7;

function getProgression(int $start, int $diff): array
{
    for ($i = 0; $i < PROGRESSION_COUNT; $i++) {
        $progression[$i] = $start + $diff * $i;
    }

    return $progression;
}

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $start = getRandomInt();
        $diff = getRandomInt();
        $progression = getProgression($start, $diff);

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
