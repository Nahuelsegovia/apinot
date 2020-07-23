<?php
/**
 * Simple class used to validate a variety of data
 *
 * @version     1.0.0
 * @link        https://github.com/bayfrontmedia/php-validator
 * @license     MIT https://opensource.org/licenses/MIT
 * @copyright   2020 Bayfront Media https://www.bayfrontmedia.com
 * @author      John Robinson <john@bayfrontmedia.com>
 */

namespace Bayfront\Utilities\Validator;

class Validate
{

    /*
     * ############################################################
     * Strings
     * ############################################################
     */

    /**
     * Is string empty
     *
     * @param string $string
     *
     * @return bool
     */

    public static function empty(string $string): bool
    {
        return ($string == '') ? true : false;
    }

    /**
     * Checks if two strings match
     *
     * @param string $string
     * @param string $matches
     *
     * @return bool
     */

    public static function matches(string $string, string $matches): bool
    {
        return ($string == $matches) ? true : false;
    }

    /**
     * Checks if string length is greater than or equal to a given length
     *
     * @param string $string
     * @param int $length
     *
     * @return bool
     */

    public static function minLength(string $string, int $length): bool
    {
        return (strlen($string) >= $length) ? true : false;
    }

    /**
     * Checks if string length is less than or equal to a given length
     *
     * @param string $string
     * @param int $length
     *
     * @return bool
     */

    public static function maxLength(string $string, int $length): bool
    {
        return (strlen($string) <= $length) ? true : false;
    }

    /**
     * Checks if string length is equal to a given length
     *
     * @param string $string
     * @param int $length
     *
     * @return bool
     */

    public static function lengthEquals(string $string, int $length): bool
    {
        return (strlen($string) == $length) ? true : false;
    }

    /**
     * Checks if string length is between min and max length
     *
     * @param string $string
     * @param int $min
     * @param int $max
     *
     * @return bool
     */

    public static function lengthBetween(string $string, int $min, int $max): bool
    {
        return (strlen($string) >= $min && strlen($string) <= $max) ? true : false;
    }

    /**
     * Checks if string contains case-sensitive needle(s)
     *
     * @param string $string
     * @param $needles string|array
     *
     * @return bool
     */

    public static function contains(string $string, $needles): bool
    {
        $needles = (array)$needles;

        foreach ($needles as $needle) {

            if (strpos($string, $needle) === false) {

                return false;

            }

        }

        return true;

    }

    /**
     * Checks if string begins with a given needle
     *
     * @param string $string
     * @param string $needle
     *
     * @return bool
     */

    public static function startsWith(string $string, string $needle): bool
    {
        return substr($string, 0, strlen($needle)) === $needle;
    }

    /**
     * Checks if string ends with a given needle
     *
     * @param string $string
     * @param string $needle
     *
     * @return bool
     */

    public static function endsWith(string $string, string $needle): bool
    {
        return substr($string, -strlen($needle)) === $needle;
    }

    /**
     * Checks if string validates as email
     *
     * @param string $string
     *
     * @return bool
     */

    public static function email(string $string): bool
    {
        return filter_var($string, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Checks if string validates as a URL
     *
     * @param string $string
     *
     * @return bool
     */

    public static function url(string $string): bool
    {
        return filter_var($string, FILTER_VALIDATE_URL);
    }

    /**
     * Checks if string validates as an IP address
     *
     * @param string $string
     *
     * @return bool
     */

    public static function ip(string $string): bool
    {
        return filter_var($string, FILTER_VALIDATE_IP);
    }

    /**
     * Checks if string validates as an IPv4 address
     *
     * @param string $string
     *
     * @return bool
     */

    public static function ipv4(string $string): bool
    {
        return filter_var($string, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }

    /**
     * Checks if string validates as an IPv6 address
     *
     * @param string $string
     *
     * @return bool
     */

    public static function ipv6(string $string): bool
    {
        return filter_var($string, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }

    /**
     * Checks if string only contains alpha characters
     *
     * @param string $string
     *
     * @return bool
     */

    public static function alpha(string $string): bool
    {
        return (ctype_alpha($string)) ? true : false;
    }

    /**
     * Checks if string only contains alphanumeric characters
     *
     * @param string $string
     *
     * @return bool
     */

    public static function alphaNumeric(string $string): bool
    {
        return (ctype_alnum($string)) ? true : false;
    }

    /*
     * ############################################################
     * Numbers
     * ############################################################
     */

    /**
     * Checks if value is less than a given number
     *
     * @param int $value
     * @param int $compare
     *
     * @return bool
     */

    public static function lessThan(int $value, int $compare): bool
    {
        return ($value < $compare) ? true : false;
    }

    /**
     * Checks if value is greater than a given number
     *
     * @param int $value
     * @param int $compare
     *
     * @return bool
     */

    public static function greaterThan(int $value, int $compare): bool
    {
        return ($value > $compare) ? true : false;
    }

    /**
     * Checks if value is less than or equal to a given number
     *
     * @param int $value
     * @param int $compare
     *
     * @return bool
     */

    public static function lessThanOrEqual(int $value, int $compare): bool
    {
        return ($value <= $compare) ? true : false;
    }

    /**
     * Checks if value is greater than or equal to a given number
     *
     * @param int $value
     * @param int $compare
     *
     * @return bool
     */

    public static function greaterThanOrEqual(int $value, int $compare): bool
    {
        return ($value >= $compare) ? true : false;
    }

    /**
     * Checks if values are equal
     *
     * @param int $value
     * @param int $compare
     *
     * @return bool
     */

    public static function equals(int $value, int $compare): bool
    {
        return ($value == $compare) ? true : false;
    }

    /**
     * Checks if value is between given min and max values
     *
     * @param int $value
     * @param int $min
     * @param int $max
     *
     * @return bool
     */

    public static function between(int $value, int $min, int $max): bool
    {
        return ($value >= $min && $value <= $max) ? true : false;
    }

    /*
     * ############################################################
     * Types
     * ############################################################
     */

    /**
     * Checks if value is an integer
     *
     * @param mixed $value
     *
     * @return bool
     */

    public static function integer($value): bool
    {
        return is_int($value);
    }

    /**
     * Checks if value is a float
     *
     * @param mixed $value
     *
     * @return bool
     */

    public static function float($value): bool
    {
        return is_float($value);
    }

    /**
     * Checks if value is a boolean
     *
     * @param mixed $value
     *
     * @return bool
     */

    public static function boolean($value): bool
    {
        return is_bool($value);
    }

    /**
     * Checks if value is an object
     *
     * @param mixed $value
     *
     * @return bool
     */

    public static function object($value): bool
    {
        return is_object($value);
    }

    /**
     * Checks if value is an array
     *
     * @param mixed $value
     *
     * @return bool
     */

    public static function array($value): bool
    {
        return is_array($value);
    }

    /**
     * Checks if value is a string
     *
     * @param mixed $value
     *
     * @return bool
     */

    public static function string($value): bool
    {
        return is_string($value);
    }

    /**
     * Checks if value is a JSON string
     *
     * @param mixed $value
     *
     * @return bool
     */

    public static function json($value): bool
    {

        if (self::string($value)) {

            json_decode($value);

            return (json_last_error() == JSON_ERROR_NONE);

        }

        return false;

    }

    /*
     * ############################################################
     * Dates & times
     *
     * Dates used can be any valid date/time format
     *
     * See: https://www.php.net/manual/en/datetime.formats.php
     * ############################################################
     */

    /**
     * Checks if string is a valid timezone identifier
     *
     * See: https://www.php.net/manual/en/timezones.php
     *
     * @param string $timezone
     *
     * @return bool
     */

    public static function timezone(string $timezone): bool
    {
        return (in_array($timezone, \DateTimeZone::listIdentifiers())) ? true : false;
    }

    /**
     * Checks if value is a given dateTime format
     *
     * @param string $date
     * @param string $format (Required date format)
     * @param bool $strict
     *
     * @return bool
     */

    public static function dateFormat(string $date, string $format = '', $strict = true): bool
    {
        $dateTime = \DateTime::createFromFormat($format, $date);

        if ($strict) {

            $errors = \DateTime::getLastErrors();

            if (!empty($errors['warning_count'])) {

                return false;

            }

        }

        return $dateTime !== false;

    }

    /**
     * Checks if date/time is in past
     *
     * @param string $date
     *
     * @return bool
     */

    public static function inPast(string $date): bool
    {
        return (strtotime($date) < time()) ? true : false;
    }

    /**
     * Checks if date/time is in past
     *
     * @param string $date
     *
     * @return bool
     */

    public static function inFuture(string $date): bool
    {
        return (strtotime($date) > time()) ? true : false;
    }

    /**
     * Checks if date/time is before a given date/time
     *
     * @param string $date
     * @param string $before
     *
     * @return bool
     */

    public static function before(string $date, string $before): bool
    {
        return (strtotime($date) < strtotime($before)) ? true : false;
    }

    /**
     * Checks if date/time is after a given date/time
     *
     * @param string $date
     * @param string $after
     *
     * @return bool
     */

    public static function after(string $date, string $after): bool
    {
        return (strtotime($date) > strtotime($after)) ? true : false;
    }

}