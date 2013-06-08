<?php

namespace pascaldevink\PHPCommons\Lang;

use pascaldevink\PHPCommons\Exception\NotAStringException;

/**
 * 
 * @author pascaldevink
 */
class StringUtils
{
    const INDEX_NOT_FOUND = -1;


    /**
     * Checks if a string is empty ("") or null. Throws NotAStringException if input is not null and not a string.
     *
     * StringUtils.isEmpty(null)      = true
     * StringUtils.isEmpty("")        = true
     * StringUtils.isEmpty(" ")       = false
     * StringUtils.isEmpty("bob")     = false
     * StringUtils.isEmpty("  bob  ") = false
     *
     * @static
     * @param  $str - The string to check, may be null
     * @return bool - If the string is empty or null
     */
    public static function isEmpty($str)
    {
        if ($str == null) {
            return true;
        }
        if (!is_string($str)) {
            throw new NotAStringException();
        }
        if ($str == "") {
            return true;
        }

        return false;
    }

    /**
     * Checks if a String is not empty ("") and not null. Throws NotAStringException if input is not null and not a string.
     *
     * StringUtils.isNotEmpty(null)      = false
     * StringUtils.isNotEmpty("")        = false
     * StringUtils.isNotEmpty(" ")       = true
     * StringUtils.isNotEmpty("bob")     = true
     * StringUtils.isNotEmpty("  bob  ") = true
     *
     * @static
     * @param  $str - the String to check, may be null
     * @return bool - if the String is not empty and not null
     */
    public static function isNotEmpty($str)
    {
        return !self::isEmpty($str);
    }

    /**
     * Checks if a String is whitespace, empty ("") or null. Throws NotAStringException if input is not null and not a string.
     *
     * StringUtils.isBlank(null)      = true
     * StringUtils.isBlank("")        = true
     * StringUtils.isBlank(" ")       = true
     * StringUtils.isBlank("bob")     = false
     * StringUtils.isBlank("  bob  ") = false
     *
     * @static
     * @throws NotAStringExeption
     * @param  $str
     * @return bool
     */
    public static function isBlank($str)
    {
        if ($str == null) {
            return true;
        }
        if (!is_string($str)) {
            throw new NotAStringException();
        }
        if (trim($str) == "") {
            return true;
        }

        return false;
    }

    /**
     * Checks if a String is not empty (""), not null and not whitespace only.
     *
     * StringUtils.isNotBlank(null)      = false
     * StringUtils.isNotBlank("")        = false
     * StringUtils.isNotBlank(" ")       = false
     * StringUtils.isNotBlank("bob")     = true
     * StringUtils.isNotBlank("  bob  ") = true
     *
     * @static
     * @param  $str - the String to check, may be null
     * @return bool - if the String is not empty and not null and not whitespace
     */
    public static function isNotBlank($str)
    {
        return !self::isBlank($str);
    }

    /**
     * Removes control characters (char <= 32) from both ends of this String, handling null by returning null.
     * The string is trimmed using trim(). Trim removes start and end characters <= 32. To strip whitespace use
     * strip($str)
     * To trim your choice of characters, use the strip($str, $charlist) methods.
     *
     * StringUtils.trim(null)          = null
     * StringUtils.trim("")            = ""
     * StringUtils.trim("     ")       = ""
     * StringUtils.trim("abc")         = "abc"
     * StringUtils.trim("    abc    ") = "abc"
     *
     * @static
     * @param  $str - the String to be trimmed, may be null
     * @return string - the trimmed string, null if null String input
     */
    public static function trim($str)
    {
        if ($str == null) {
            return null;
        }
        if (!is_string($str)) {
            throw new NotAStringException();
        }

        return trim($str);
    }

    public static function trimToNull($str)
    {
        $trimmedStr = self::trim($str);

        if (self::isEmpty($trimmedStr)) {
            return null;
        }

        return $trimmedStr;
    }

    public static function trimToEmpty($str)
    {
        $trimmedStr = self::trim($str);

        if (self::isEmpty($trimmedStr)) {
            return "";
        }

        return $trimmedStr;
    }

    public static function strip($str, $charlist = ' ')
    {
        if ($str == null) {
            return null;
        }
        if (!is_string($str)) {
            throw new NotAStringException();
        }

        return trim($str, $charlist);
    }

    public static function stripToNull($str, $charlist = ' ')
    {
        $strippedStr = self::strip($str, $charlist);
        if (self::isEmpty($strippedStr)) {
            return null;
        }

        return $strippedStr;
    }

    public static function stripToEmpty($str, $charlist = ' ')
    {
        $strippedStr = self::strip($str, $charlist);
        if (self::isEmpty($strippedStr)) {
            return "";
        }

        return $strippedStr;
    }

    public static function stripStart($str, $charlist = ' ')
    {
        if ($str == null) {
            return null;
        }
        if (!is_string($str)) {
            throw new NotAStringException();
        }

        $strippedStr = ltrim($str, $charlist);
        return $strippedStr;
    }

    public static function stripEnd($str, $charlist = ' ')
    {
        if ($str == null) {
            return null;
        }
        if (!is_string($str)) {
            throw new NotAStringException();
        }

        $strippedStr = rtrim($str, $charlist);
        return $strippedStr;
    }

    public static function equals($str1, $str2)
    {
        if ($str1 == null && $str2 == null) {
            return true;
        }
        if ($str1 == null || $str2 == null) {
            return false;
        }

        if (!is_string($str1) || !is_string($str2)) {
            throw new NotAStringException();
        }

        return $str1 == $str2;
    }

    public static function equalsIgnoreCase($str1, $str2)
    {
        if ($str1 == null && $str2 == null) {
            return true;
        }
        if ($str1 == null || $str2 == null) {
            return false;
        }

        if (!is_string($str1) || !is_string($str2)) {
            throw new NotAStringException();
        }

        return strtolower($str1) == strtolower($str2);
    }

    public static function indexOf($str, $searchStr, $startPos = 0)
    {
        if (is_null($str) || is_null($searchStr)) {
            return self::INDEX_NOT_FOUND;
        }

        if (!is_string($str) || !is_string($searchStr)) {
            throw new NotAStringException();
        }

        if (mb_strlen($str) < $startPos) {
            return self::INDEX_NOT_FOUND;
        }

        if ($str == "" || $searchStr == "") {
            return 0;
        }

        if (!is_int($startPos) || $startPos < 0) {
            $startPos = 0;
        }

        return strpos($str, $searchStr, $startPos);
    }

    public static function ordinalIndexOf($str, $searchStr, $ordinal = 1)
    {
        if (is_null($searchStr) || is_null($str)) {
            return self::INDEX_NOT_FOUND;
        }

        if (!is_string($str) || !is_string($searchStr)) {
            throw new NotAStringException();
        }

        if (!is_int($ordinal) || $ordinal < 1) {
            $ordinal = 1;
        }

        if ($str == "" || $searchStr == "") {
            return 0;
        }

        $strLength = mb_strlen($str);
        $wordPos = 0;

        for ($i = 0; $i < $ordinal; $i++) {
            $pos = strpos($str, $searchStr);
            if ($pos !== false) {
                $wordPos += $pos + $i;
                $str = substr($str, $pos + 1, $strLength);
            }
        }

        return $wordPos;
    }

    public static function indexOfIgnoreCase($str, $searchStr, $startPos = 0)
    {
        if (is_null($searchStr) || is_null($str)) {
            return self::INDEX_NOT_FOUND;
        }

        if (!is_string($str) || !is_string($searchStr)) {
            throw new NotAStringException();
        }

        return self::indexOf(strtolower($str), strtolower($searchStr), $startPos);
    }

    public static function lastIndexOf($str, $searchStr, $startPos = 0)
    {
        if (is_null($str) || is_null($searchStr)) {
            return self::INDEX_NOT_FOUND;
        }

        if (!is_string($str) || !is_string($searchStr)) {
            throw new NotAStringException();
        }

        $len = mb_strlen($str);
        if ($len <= $startPos) {
            $startPos = 0;
        }

        if ($startPos < 0) {
            return self::INDEX_NOT_FOUND;
        }

        if (!is_int($startPos) || $startPos < 0) {
            $startPos = 0;
        }

        $str = substr($str, $startPos);
        $pos = strrpos($str, $searchStr);
        return $pos == false ? self::INDEX_NOT_FOUND : $pos;
    }

    public static function lastOrdinalIndexOf($str, $searchStr, $ordinal = 1)
    {
        if (is_null($searchStr) || is_null($str)) {
            return self::INDEX_NOT_FOUND;
        }

        if (!is_string($str) || !is_string($searchStr)) {
            throw new NotAStringException();
        }

        if (!is_int($ordinal) || $ordinal < 1) {
            $ordinal = 1;
        }

        if ($str == "" || $searchStr == "") {
            return self::INDEX_NOT_FOUND;
        }

        $strLength = mb_strlen($str);
        $wordPos = $strLength;

        for ($i = 0; $i < $ordinal; $i++) {
            $pos = strrpos($str, $searchStr);
            if ($pos !== false) {
                $wordPos = $pos;
                $str = substr($str, 0, $pos);
            }
            else if ($i == 0) {
                $wordPos == self::INDEX_NOT_FOUND;
            }
        }

        return $wordPos;
    }

    public static function lastIndexOfIgnoreCase($str, $searchStr, $startPos = 0)
    {
        return self::lastIndexOf(strtolower($str), strtolower($searchStr), $startPos);
    }

    public static function contains($str, $searchStr)
    {
        if (!is_null($searchStr) && $searchStr == "") {
            return true;
        }

        $pos = strpos($str, $searchStr);
        if (is_int($pos)) {
            return true;
        } else {
            return false;
        }
    }

    public static function containsIgnoreCase($str, $searchStr)
    {
        if (is_null($str) || is_null($searchStr)) {
            return false;
        }

        return self::contains(strtolower($str), strtolower($searchStr));
    }

    public static function indexOfAny($str, $searchChars)
    {
        if ($str == null || $searchChars == null) {
            return -1;
        }

        $chars = str_split($str);
        $intersected = array_intersect($chars, $searchChars);

        if (count($intersected) < 1) {
            return -1;
        }

        return key($intersected);
    }

    public static function lastIndexOfAny($str, $searchChars)
    {
        if ($str == null || $searchChars == null) {
            return -1;
        }

        $chars = str_split($str);
        $intersected = array_intersect($chars, $searchChars);

        if (count($intersected) < 1) {
            return -1;
        }

        $intersected = array_reverse($intersected, true);
        return key($intersected);
    }

    public static function containsAny($str, $searchChars)
    {

    }

    public static function indexOfAnyBut($str, $searchChars)
    {

    }

    public static function containsOnly($str, $validChars)
    {

    }

    public static function containsNone($str, $searchChars)
    {

    }

    public static function substring($str, $start, $end = null)
    {

    }

    public static function left($str, $len)
    {

    }

    public static function right($str, $len)
    {

    }

    public static function mid($str, $pos, $len)
    {

    }

    public static function substringBefore($str, $seperator)
    {

    }

    public static function substringAfter($str, $seperator)
    {

    }

    public static function substringBeforeLast($str, $seperator)
    {

    }

    public static function substringAfterLast($str, $seperator)
    {

    }

    public static function substringBetween($str, $tag, $close)
    {

    }

    public static function substringsBetween($str, $open, $close)
    {

    }

    public static function getNestedString($str, $tag)
    {

    }

    public static function split($str, $seperatorChar = ' ', $max = null)
    {

    }

    public static function splitByWholeSeperator($str, $seperator, $max = null)
    {

    }

}
