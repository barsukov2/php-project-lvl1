<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function engine(string $intro, array $questionsAndAnswers): void
{
    line('Welcome to the Brain Game!');
    line($intro);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        line('Question: %s', $questionsAndAnswers[$i]['question']);
        $userAnswer = prompt('Your answer: ');

        if ($userAnswer == $questionsAndAnswers[$i]['answer']) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $questionsAndAnswers[$i]['answer']);
            break;
        }
        if ($i === 3) {
            line('Congratulations, %s!', $name);
        }
    }
}
