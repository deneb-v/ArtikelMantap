<?php

use Faker\Generator as Faker;

class ParagraphGenerator
{
    static public function generateHTMLParagraph($sentence ,$parLen, Faker $faker){
        $par="";
        $x=0;
        while($x < $parLen){
            $par .= '<p>'.$faker->paragraph($nbSentences = $sentence).'</p><br>';
            $x++;
        }
        return $par;
    }
}
