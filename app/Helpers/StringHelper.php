<?php

namespace App\Helpers;


class StringHelper
{

    public static function splitText(string $text) : array
    {
        $sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $text);

        return $sentences;
    }

    public static function compareStrings(string $str1, string $str2) : float
    {
        similar_text($str1, $str2, $perc);

        return $perc;
    }

    public static function compareTexts(array $text1, array $text2, float $compareRate) : array
    {
        $text1Count = sizeof($text1);
        $text2Count = sizeof($text2);

        $maxLengths = [];
        for ($i = 0; $i < $text1Count; $i++) {
            $maxLengths[$i] = [];
            for ($j = 0; $j < $text2Count; $j++) {
                if (self::compareStrings($text1[$i], $text2[$j]) >= $compareRate) {
                    $maxLengths[$i][$j] = 1 + (isset($maxLengths[$i-1][$j-1]) ? $maxLengths[$i-1][$j-1] : 0);
                } else {
                    $maxLengths[$i][$j] = max(
                        (isset($maxLengths[$i-1][$j]) ? $maxLengths[$i-1][$j] : 0),
                        (isset($maxLengths[$i][$j-1]) ? $maxLengths[$i][$j-1] : 0)
                    );
                }
            }
        }

        $i = 0;
        $j = 0;
        $longestIntersection = [];
        while ($i < $text1Count && $j < $text2Count) {
            if (self::compareStrings($text1[$i], $text2[$j]) >= $compareRate) {
                $longestIntersection[] = $text1[$i];
                $i++;
                $j++;
            } elseif (
                (isset($maxLengths[$i + 1][$j]) ? $maxLengths[$i + 1][$j] : 0) >=
                (isset($maxLengths[$i][$j + 1]) ? $maxLengths[$i][$j + 1] : 0)
            ) {
                $i++;
            } else {
                $j++;
            }
        }

        $result = [];
        $k = 0;
        for ($i = 0, $j = 0; $i < $text1Count || $j < $text2Count;) {
            if (isset($text1[$i]) && isset($text2[$j]) && isset($longestIntersection[$k]) && $text1[$i] === $longestIntersection[$k] && $text1[$i] === $text2[$j]) {
                $result[] = $text1[$i];
                $i++;
                $j++;
                $k++;
            } elseif (isset($text1[$i]) && isset($text2[$j]) && self::compareStrings($text1[$i], $text2[$j]) >= $compareRate && isset($longestIntersection[$k]) && $text1[$i] === $longestIntersection[$k] && $text1[$i] !== $text2[$j]) {
                $result[] = '<span class="text-warning txt-hover" data-original-text=" ' . $text1[$i] . '" data-new-text=" ' . $text2[$j] . '">' . $text2[$j] . '</span>';
                $i++;
                $j++;
                $k++;
            } elseif (isset($text1[$i]) && ((isset($longestIntersection[$k]) && $text1[$i] !== $longestIntersection[$k]) || !isset($longestIntersection[$k]))) {
                $result[] = '<span class="text-danger">' . $text1[$i] . '</span>';
                $i++;
            } elseif (isset($text2[$j]) && ((isset($text1[$i]) && self::compareStrings($text1[$i], $text2[$j]) < $compareRate) || !isset($text1[$i]))) {
                $result[] = '<span class="text-success">' . $text2[$j] . '</span>';
                $j++;
            } else {
                $result[] = $text1[$i];
                $i++;
                $j++;
                $k++;
            }
        }

        return $result;
    }
}