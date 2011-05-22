<?php

namespace nl\inpiggy\commons\lang;

use nl\inpiggy\commons\exception\NotAStringException;

/**
 * 
 * @author pascaldevink
 */
class StringUtils
{
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
}
