<?php

namespace BrainGames\BrainInterface;

use function cli\line;
use function cli\prompt;
use function BrainGames\Calc\getCalcCorrectAnswer;
use function BrainGames\Calc\getCalcIntro;
use function BrainGames\Calc\getCalcQuestion;


function runGame($intro, $question, $correctAnswer)
{
    line('Welcome to the Brain Game!');
    line($intro);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    $answerCount = 0;

    while ($answerCount < 3) {

        $currentQuestion = $question();
        $currentAnswer = $correctAnswer($currentQuestion);

        line('Question: %s', $currentQuestion); 
        $answer = prompt('Your answer: ');

        if ($currentAnswer == $answer) {
            $answerCount++;
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $currentAnswer);
            break;
        }
    }
    if ($answerCount === 3) {
        line('Congratulations, %s!', $name);
    }
}

