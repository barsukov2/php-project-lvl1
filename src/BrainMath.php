<?php

namespace BrainGames\BrainMath;

function getRandomInt() 
{
    $minNumber = 0;
    $maxNumber = 100;
    return random_int($minNumber, $maxNumber);
}

function isEven($num) 
{
    return ($num % 2 === 0);
}



























/*
function correctAnswer(int $num) : string
{
    $isEven = ($num % 2 === 0);

    if ($isEven) {
        $correct = 'yes';
    } else {
        $correct = 'no';
    }

    return $correct;
}

function evenGame ()
{
    while ($answerCount < 3) {
        $randomNumber = random_int($minNumber, $maxNumber);

        line('Question: %s', $randomNumber);
        $answer = prompt('Your answer: '); 

        if ($answer === correctAnswer($randomNumber)) {
            $answerCount++;
            line('Correct!'); 
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, correctAnswer($randomNumber));
            break;
        }
    } 

    if ($answerCount === 3) {
        line('Congratulations, %s!', $name);
    }
}
*/

    /*$minNumber = 0;
    $maxNumber = 100;
    $answerCount = 0;*/
