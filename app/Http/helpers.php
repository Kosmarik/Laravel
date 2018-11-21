<?php
/**
 * Created by PhpStorm.
 * User: ivasko
 * Date: 06/11/2018
 * Time: 18:55
 */
use NumberToWords\NumberToWords;

require_once 'Numbers/Words.php';

    if(! function_exists('time_helper')){
        function time_helper($integer){
            $toHours = $integer/60;
            $hours = floor($toHours);
            $min = $integer - $hours*60;
            $rezas = $hours . 'h' . ' ' . $min . 'min';
            return $rezas;
        }
    }

    function gauti_zodzius($integer){
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('lt');
        $number = $numberTransformer->toWords($integer);
        echo $number;
    }
