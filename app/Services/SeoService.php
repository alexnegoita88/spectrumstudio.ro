<?php

namespace App\Services;

class SeoService
{
    public static function generateKeywords($text, $limit = 10)
    {
        $stopWords = [
            'the', 'and', 'a', 'to', 'of', 'in', 'is', 'it', 'that', 'with', 'as', 'for', 'was', 'on', 'at', 'by',
            'și', 'un', 'o', 'la', 'de', 'în', 'este', 'ea', 'aceasta', 'cu', 'ca','că', 'pentru', 'a fost', 'pe', 'la', 'de către',
            'si', 'in', 'această', 'de catre'
        ];

        $words = str_word_count(strtolower($text), 1);
        $filteredWords = array_filter($words, function ($word) use ($stopWords) {
            return !in_array($word, $stopWords) && strlen($word) > 2;
        });
        $wordCounts = array_count_values($filteredWords);
        arsort($wordCounts);
        $keywords = array_slice(array_keys($wordCounts), 0, $limit);
        return implode(', ', $keywords);
    }
}
