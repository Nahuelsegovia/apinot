## PHP array helpers

PHP helper class to provide useful array functions.

- [License](#license)
- [Author](#author)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)

## License

This project is open source and available under the [MIT License](https://github.com/bayfrontmedia/php-array-helpers/blob/master/LICENSE).

## Author

John Robinson, [Bayfront Media](https://www.bayfrontmedia.com)

## Requirements

* PHP > 7.1.0

## Installation

```
composer require bayfrontmedia/php-array-helpers
```

## Usage

- [keysMissing](#keysmissing)
- [returnKeys](#returnkeys)
- [removeKeys](#removekeys)
- [dot](#dot)
- [undot](#undot)
- [get](#get)
- [has](#has)
- [set](#set)
- [forget](#forget)
- [multisort](#multisort)
- [query](#query)

<hr />

### keysMissing

#### Description:

Checks if multiple array keys exist (needles) on another array (haystack), and returns array of missing keys, or `null` if none found.

#### Parameters:

- `$needles` (array): Array keys to check
- `$haystack` (array): Original array

#### Returns:

- (array|null)

#### Example:

```
use Bayfront\Utilities\ArrayHelpers\Arr;

$needles = [
    'first_name',
    'middle_name',
    'last_name'
];

$haystack = [
    'first_name' => 'John',
    'last_name' => 'Doe'
];

$missing = Arr::keysMissing($needles, $haystack);
```

<hr />

### returnKeys

#### Description:

Returns only desired keys (needles) from an array (haystack).

#### Parameters:

- `$needles` (array): Array keys to return
- `$haystack` (array): Original array

#### Returns:

- (array|false)

#### Example:

```
use Bayfront\Utilities\ArrayHelpers\Arr;

$needles = [
    'first_name'
];

$haystack = [
    'first_name' => 'John',
    'last_name' => 'Doe'
];

$return = Arr::returnKeys($needles, $haystack);
```

<hr />

### removeKeys

#### Description:

Removes specified keys (needles) from an array if they exist.

#### Parameters:

- `$needles` (array): Array keys to remove
- `$haystack` (array): Original array

#### Returns:

- (array|false)

#### Example:

```
use Bayfront\Utilities\ArrayHelpers\Arr;

$needles = [
    'first_name'
];

$haystack = [
    'first_name' => 'John',
    'last_name' => 'Doe'
];

$removed = Arr::removeKeys($needles, $haystack);
```

<hr />

### dot

#### Description:

Converts a multidimensional array to a single depth "dot" notation array, optionally prepending a string to each array key.

The key values will never be an array, even if empty. Empty arrays are dropped.

#### Parameters:

- `$array` (array): Original array
- `$prepend` (string): String to prepend

#### Returns:

- (array)

#### Example:

```
use Bayfront\Utilities\ArrayHelpers\Arr;

$array = [
    'name' => [
        'first_name' => 'John',
        'last_name' => 'Doe'
    ],
    'hobbies' => [ // This empty array will be dropped

    ]
];

$dot = Arr::dot($array);
```

<hr />

### undot

#### Description:

Converts array in "dot" notation to a standard multidimensional array.

The key values will never be an array, even if empty. Empty arrays are dropped.

#### Parameters:

- `$array` (array): Original array in "dot" notation

#### Returns:

- (array)

#### Example:

```
use Bayfront\Utilities\ArrayHelpers\Arr;

$array = [
    'name.first_name' => 'John',
    'name.last_name' => 'Doe'
];

$undot = Arr::undot($array);
```

<hr />

### get

#### Description:

Get an item from an array using "dot" notation.

#### Parameters:

- `$array` (array): Array in "dot" notation
- `$key` (string): Key to return
- `$default = null` (mixed): Default value to return

#### Returns:

- (mixed)

#### Example:

```
use Bayfront\Utilities\ArrayHelpers\Arr;

$array = [
    'name.first_name' => 'John',
    'name.last_name' => 'Doe'
];

echo Arr::get($array, 'name.first_name');
```

<hr />

### has

#### Description:

Checks if key exists and not null in array using "dot" notation.

#### Parameters:

- `$array` (array): Array in "dot" notation
- `$key` (string): Key to check

#### Returns:

- (bool)

#### Example:

```
use Bayfront\Utilities\ArrayHelpers\Arr;

$array = [
    'name.first_name' => 'John',
    'name.last_name' => 'Doe'
];

if (Arr::has($array, 'name.first_name')) {
    // Do something
}
```

<hr />

### set

#### Description:

Set an array item to a given value using "dot" notation.

#### Parameters:

- `$array` (array): Original array
- `$key` (string): Key to set in "dot" notation
- `$value` (mixed): Value of key

#### Returns:

- (array): Modified array

#### Example:

```
use Bayfront\Utilities\ArrayHelpers\Arr;

$array = [
    'name' => [
        'first_name' => 'John',
        'last_name' => 'Doe'
    ]
];

$array = Arr::set($array, 'name.middle_name', 'Middle');
```

<hr />

### forget

#### Description:

Remove a single or an array of items from a given array using "dot" notation.

#### Parameters:

- `$array` (array): Original array
- `$keys` (string|array): Key(s) to forget in "dot" notation

#### Returns:

- (void)

#### Example:

```
use Bayfront\Utilities\ArrayHelpers\Arr;

$array = [
    'name' => [
        'first_name' => 'John',
        'middle_name' => 'Middle',
        'last_name' => 'Doe'
    ]
];

Arr::forget($array, 'name.middle_name');
```

<hr />

### multisort

#### Description:

Sort a multidimensional array by a given key in ascending (optionally, descending) order.

#### Parameters:

- `$array` (array): Original array
- `$key` (string): Key name to sort by
- `$descending = false` (bool): Sort descending

#### Returns:

- (array)

#### Example:

```
use Bayfront\Utilities\ArrayHelpers\Arr;

$people = [
    [
        'first_name' => 'John',
        'last_name' => 'Doe'
    ],
    [
        'first_name' => 'Jane',
        'last_name' => 'Doe'
    ]
];

$people = Arr::multisort($clients, 'first_name');
```

<hr />

### query

#### Description:

Convert array into a query string.

#### Parameters:

- `$array` (array): Original array

#### Returns:

- (string)

#### Example:

```
use Bayfront\Utilities\ArrayHelpers\Arr;

$array = [
    'first_name' => 'Jane',
    'last_name' => 'Doe'
];

echo Arr::query($array);
```