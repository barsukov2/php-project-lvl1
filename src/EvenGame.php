<?php

namespace BrainGames\EvenGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\BrainMath\getRandomInt;
use function BrainGames\BrainMath\isEven;

function runEvenGame()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    $answerCount = 0;

    while ($answerCount < 3) {
        $randomNumber = getRandomInt();

        line('Question: %s', $randomNumber);
        $answer = prompt('Your answer: ');

        if ((isEven($randomNumber) ? 'yes' : 'no') === $answer) {
            $answerCount++;
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, (isEven($randomNumber) ? 'yes' : 'no'));
            break;
        }
    } 
    if ($answerCount === 3) {
        line('Congratulations, %s!', $name);
    }
}
