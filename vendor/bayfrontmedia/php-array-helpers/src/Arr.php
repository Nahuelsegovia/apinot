<?php
/**
 * Helper class to provide useful array functions
 *
 * @version     1.0.0
 * @link        https://github.com/bayfrontmedia/php-array-helpers
 * @license     MIT https://opensource.org/licenses/MIT
 * @copyright   2020 Bayfront Media https://www.bayfrontmedia.com
 * @author      John Robinson <john@bayfrontmedia.com>
 */

namespace Bayfront\Utilities\ArrayHelpers;

class Arr
{

    /**
     * Checks if multiple array keys exist (needles) on another array (haystack),
     * and returns array of missing keys or null if none found
     *
     * @param array $needles (Array keys to check)
     * @param array $haystack (Original array)
     *
     * @return array|null
     */

    public static function keysMissing(array $needles, array $haystack): ?array
    {

        $missing = array_values(array_flip(array_diff_key(array_flip($needles), $haystack)));

        if (!$missing) {

            return NULL;

        }

        return $missing;

    }

    /**
     * Returns only desired keys (needles) from an array (haystack)
     *
     * @param array $needles (Array keys to return)
     * @param array $haystack (Original array)
     *
     * @return array|false
     */

    public static function returnKeys(array $needles, array $haystack)
    {
        return array_intersect_key($haystack, array_flip($needles));
    }

    /**
     * Removes specified keys (needles) from an array if they exist
     *
     * @param array $needles (Array keys to remove)
     * @param array $haystack (Original array)
     *
     * @return array|false
     */

    public static function removeKeys(array $needles, array $haystack)
    {
        return array_diff_key($haystack, array_flip($needles));
    }

    /**
     * Converts a multidimensional array to a single depth "dot" notation array,
     * optionally prepending a string to each array key
     *
     * The key values will never be an array, even if empty. Empty arrays are dropped.
     *
     * See also: https://stackoverflow.com/a/10424516
     *
     * @param array $array (Original array)
     * @param string $prepend (String to prepend)
     *
     * @return array
     */

    public static function dot(array $array, string $prepend = ''): array
    {

        $results = [];

        foreach ($array as $key => $value) {

            if (is_array($value)) {

                $results = array_merge($results, self::dot($value, $prepend . $key . '.'));

            } else {

                $results[$prepend . $key] = $value;

            }

            // Empty arrays are not returned

        }

        return $results;

    }

    /**
     * Converts array in "dot" notation to a standard multidimensional array
     *
     * @param array $array (Original array in "dot" notation)
     *
     * @return array
     */

    public static function undot(array $array): array
    {

        $return = [];

        foreach ($array as $key => $value) {

            self::set($return, $key, $value);

        }

        return $return;

    }

    /**
     * Get an item from an array using "dot" notation
     *
     * @param array $array (Array in "dot" notation)
     * @param string $key (Key to return)
     * @param mixed $default (Default value to return)
     *
     * @return mixed
     */

    public static function get(array $array, string $key, $default = NULL)
    {

        if (is_null($key)) {

            return $array;

        }

        if (isset($array[$key])) {

            return $array[$key];

        }

        foreach (explode('.', $key) as $segment) {

            if (!is_array($array) || !array_key_exists($segment, $array)) {

                return $default;

            }

            $array = $array[$segment];

        }

        return $array;

    }

    /**
     * Checks if key exists and not null in array using "dot" notation
     *
     * @param array $array (Array in "dot" notation)
     * @param string $key (Key to check)
     *
     * @return bool
     */

    public static function has(array $array, string $key): bool
    {
        return (NULL !== self::get($array, $key)) ? true : false;
    }

    /**
     * Set an array item to a given value using "dot" notation
     * See: https://github.com/laravel/framework/blob/5.6/src/Illuminate/Support/Arr.php
     *
     * @param array $array (Original array)
     * @param string $key (Key to set in "dot" notation)
     * @param mixed $value (Value of key)
     *
     * @return array (Modified array)
     */

    public static function set(&$array, string $key, $value): array
    {

        $keys = explode('.', $key);

        while (count($keys) > 1) {

            $key = array_shift($keys);

            /*
             * If the key doesn't exist at this depth, an empty array is created
             * to hold the next value, allowing to create the arrays to hold final
             * values at the correct depth. Then, keep digging into the array.
             */

            if (!isset($array[$key]) || !is_array($array[$key])) {

                $array[$key] = [];

            }

            $array = &$array[$key];

        }

        $array[array_shift($keys)] = $value;

        return $array;

    }

    /**
     * Remove a single or an array of items from a given array using "dot" notation
     *
     * @param array $array (Original array)
     * @param string|array $keys (Key(s) to forget in "dot" notation)
     *
     * @return void
     */

    public static function forget(array &$array, $keys): void
    {

        $original =& $array;

        foreach ((array)$keys as $key) {

            $parts = explode('.', $key);

            while (count($parts) > 1) {

                $part = array_shift($parts);

                if (isset($array[$part]) && is_array($array[$part])) {

                    $array =& $array[$part];

                }

            }

            unset($array[array_shift($parts)]);

            // Clean up after each iteration

            $array =& $original;

        }
    }

    /**
     * Sort a multidimensional array by a given key in ascending (optionally, descending) order
     *
     * @param array $array (Original array)
     * @param string $key (Key name to sort by)
     * @param bool $descending (Sort descending)
     *
     * @return array
     */

    public static function multisort(array $array, string $key, bool $descending = false): array
    {

        $columns = array_column($array, $key);

        if (false === $descending) {

            array_multisort($columns, SORT_ASC, $array);

        } else {

            array_multisort($columns, SORT_DESC, $array);

        }

        return $array;

    }

    /**
     * Convert array into a query string
     *
     * @param array $array (Original array)
     *
     * @return string
     */

    public static function query(array $array): string
    {
        return http_build_query($array, NULL, '&amp;', PHP_QUERY_RFC3986);
    }

}