<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function engine(string $intro, array $questionsAndAnswers)
{
    line('Welcome to the Brain Game!');
    line($intro);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    foreach ($questionsAndAnswers as ['question' => $question, 'answer' => $answer]) {
        line('Question: %s', $question);
        $userAnswer = prompt('Your answer: ');

        if ($userAnswer == $answer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $answer);
            return;
        }

        line('Congratulations, %s!', $name);
    }
}
