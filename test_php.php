<?php

//Дана строка текста.
//
//Написать программу на рнр, которая определяет является ли строка текста палиндромом (читается с обоих сторон одинаково) и осуществляет вывод строки следующим способом:
//
//а) если строка является палиндромом, то она выводится полностью.
//
//б) если строка не является палиндромом - выводится самый длинный
//под-палиндром этой строки, т.е. самая длинная часть строки, являющаяся
//палиндромом
//
//в) если подпалиндромы отсутствуют в строке - выводится первый
//символ строки.
//
//Примеры палиндромов:
//- Аргентина манит негра
//- Sum summus mus

/**
 * Main function
 */
function run(string $string)
{
    $preparedString = prepareString($string);

    if (isPalindrome($preparedString)) {
        return $string;
    }

    $palindromeInOriginalString = searchForOtherPalindromes($preparedString);

    if ($palindromeInOriginalString) {
        return $palindromeInOriginalString;
    }

    return mb_substr($preparedString, 0, 1);
}

function prepareString(string $string)
{
    $string = str_replace(' ', '', $string);

    $string = preg_replace('/[^а-яa-z0-9]/ui', '', $string);

    $string = mb_strtolower($string);

    return $string;
}

function mb_strrev($str){
    $r = '';
    for ($i = mb_strlen($str); $i>=0; $i--) {
        $r .= mb_substr($str, $i, 1);
    }
    return $r;
}

function isPalindrome(string $string)
{
    if (mb_strlen($string) > 2 && $string == mb_strrev($string)) {
        return true;
    }

    return false;
}

function searchForOtherPalindromes(string $string)
{
    $arrayOfChars = mb_str_split($string);
    $amountOfChars = count($arrayOfChars);

    for ($i = 1; $i <= $amountOfChars; $i++) {
        $arrayOfCharsForCheckingFromLeft = $arrayOfChars;
        $amountOfCharsForCheckingFromLeft = count($arrayOfCharsForCheckingFromLeft);

        for ($j = 0; $j < $amountOfCharsForCheckingFromLeft; $j++) {
            $word = implode('', $arrayOfCharsForCheckingFromLeft);
            if (isPalindrome($word)) {
                return $word;
            }

            // remove first character
            array_shift($arrayOfCharsForCheckingFromLeft);
        }

        // remove last character
        array_pop($arrayOfChars);
    }

    return null;
}