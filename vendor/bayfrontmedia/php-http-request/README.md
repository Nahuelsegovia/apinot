## PHP HTTP request

 Handles incoming HTTP requests, including all forms of HTTP request methods, request headers, and data from superglobals $_COOKIE, $_GET, $_POST and $_SERVER.

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

- PHP > 7.1.0

## Installation

```
composer require bayfrontmedia/php-http-request
```

## Usage

**Request methods**

- [validateMethod](#validatemethod)
- [getMethod](#getmethod)
- [isDelete](#isdelete)
- [isGet](#isget)
- [isHead](#ishead)
- [isPatch](#ispatch)
- [isPost](#ispost)
- [isPut](#isput)

**Data types**

- [getQuery](#getquery)
- [hasQuery](#hasquery)
- [getPost](#getpost)
- [hasPost](#haspost)
- [getServer](#getserver)
- [hasServer](#hasserver)
- [getCookie](#getcookie)
- [hasCookie](#hascookie)
- [getHeader](#getheader)
- [hasHeader](#hasheader)
- [getContent](#getcontent)
- [hasContent](#hascontent)

**Specific values**

- [getUserAgent](#getuseragent)
- [getReferer](#getreferer)
- [getIp](#getip)
- [isHttps](#ishttps)
- [getRequest](#getrequest)
- [getUrl](#geturl)

<hr />

### validateMethod

**Description:**

Returns valid request method with fallback to `GET`.

Valid request methods include:

- `DELETE`
- `GET`
- `HEAD`
- `PATCH`
- `POST`
- `PUT`

**Parameters:**

- `$method` (string)

**Returns:**

- (string)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

echo Request::validateMethod('GET');
```

<hr />

### getMethod

**Description:**

Returns current request method.

**Parameters:**

- None

**Returns:**

- (string)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

echo Request::getMethod();
```

<hr />

### isDelete

**Description:**

Is current request method `DELETE`.

**Parameters:**

- None

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::isDelete()) {
    // Do something
}
```

<hr />

### isGet

**Description:**

Is current request method `GET`.

**Parameters:**

- None

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::isGet()) {
    // Do something
}
```

<hr />

### isHead

**Description:**

Is current request method `HEAD`.

**Parameters:**

- None

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::isHead()) {
    // Do something
}
```

<hr />

### isPatch

**Description:**

Is current request method `PATCH`.

**Parameters:**

- None

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::isPatch()) {
    // Do something
}
```

<hr />

### isPost

**Description:**

Is current request method `POST`.

**Parameters:**

- None

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::isPost()) {
    // Do something
}
```

<hr />

### isPut

**Description:**

Is current request method `PUT`.

**Parameters:**

- None

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::isPut()) {
    // Do something
}
```

<hr />

### getQuery

**Description:**

Returns value of single `$_GET` array key in dot notation or entire array, with optional default value.

**Parameters:**

- `$key = NULL` (string)
- `$default = NULL` (mixed): Default value to return if array key is not found

**Returns:**

- (mixed)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

print_r(Request::getQuery());
```

<hr />

### hasQuery

**Description:**

Checks if `$_GET` array key exists in dot notation.

**Parameters:**

- `$key` (string)

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::hasQuery('page')) {
    // Do something
}
```

<hr />

### getPost

**Description:**

Returns value of single `$_POST` array key in dot notation or entire array, with optional default value.

**Parameters:**

- `$key = NULL` (string)
- `$default = NULL` (mixed): Default value to return if array key is not found

**Returns:**

- (mixed)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

print_r(Request::getPost());
```

<hr />

### hasPost

**Description:**

Checks if `$_POST` array key exists in dot notation.

**Parameters:**

- `$key` (string)

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::hasPost('username')) {
    // Do something
}
```

<hr />

### getServer

**Description:**

Returns value of single `$_SERVER` array key in dot notation or entire array, with optional default value.

**Parameters:**

- `$key = NULL` (string)
- `$default = NULL` (mixed): Default value to return if array key is not found

**Returns:**

- (mixed)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

print_r(Request::getServer());
```

<hr />

### hasServer

**Description:**

Checks if `$_SERVER` array key exists in dot notation.

**Parameters:**

- `$key` (string)

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::hasServer('SERVER_NAME')) {
    // Do something
}
```

<hr />

### getCookie

**Description:**

Returns value of single `$_COOKIE` array key in dot notation or entire array, with optional default value.

**Parameters:**

- `$key = NULL` (string)
- `$default = NULL` (mixed): Default value to return if array key is not found

**Returns:**

- (mixed)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

print_r(Request::getCookie());
```

<hr />

### hasCookie

**Description:**

Checks if `$_COOKIE` array key exists in dot notation.

**Parameters:**

- `$key` (string)

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::hasCookie('cart_id')) {
    // Do something
}
```

<hr />

### getHeader

**Description:**

Returns value of single header array key in dot notation or entire array, with optional default value.

**Parameters:**

- `$key = NULL` (string)
- `$default = NULL` (mixed): Default value to return if array key is not found

**Returns:**

- (mixed)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

print_r(Request::getHeader());
```

<hr />

### hasHeader

**Description:**

Checks if header array key exists in dot notation.

**Parameters:**

- `$key` (string)

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::hasHeader('Content-Type')) {
    // Do something
}
```

<hr />

### getContent

**Description:**

Returns content body of a request.

**Parameters:**

- None

**Returns:**

- (string)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

print_r(Request::getContent());
```

<hr />

### hasContent

**Description:**

Checks if content body of a request exists.

**Parameters:**

- None

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::hasContent()) {
    // Do something
}
```

<hr />

### getUserAgent

**Description:**

Returns client's user agent.

**Parameters:**

- None

**Returns:**

- (mixed): string|null

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

echo Request::getUserAgent();
```

<hr />

### getReferer

**Description:**

Returns client's referring URL.

**Parameters:**

- None

**Returns:**

- (mixed): string|null

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

echo Request::getReferer();
```

<hr />

### getIp

**Description:**

Returns the most probable IP of client with optional default value.

**Parameters:**

- `$default = ''` (string): Default IP address to return if none detected

**Returns:**

- (string)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

echo Request::getIp();
```

<hr />

### isHttps

**Description:**

Is connection HTTPS.

**Parameters:**

- None

**Returns:**

- (bool)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

if (Request::isHttps()) {
    // Do something
}
```

<hr />

### getRequest

**Description:**

Returns array containing details of the client's request, or string of a specific part of the request.

**Parameters:**

- `$part = ''` (string): Which part of the request to return. Leaving this blank will return the entire array.

Valid `$part` values are:

- `method`
- `protocol`
- `host`
- `path`
- `query`
- `query_string`
- `url`
- `full_url`

**Returns:**

- (mixed): array|string

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

echo Request::getRequest('url');
```

<hr />

### getUrl

**Description:**

Returns current URL.

**Parameters:**

- `$include_query = false` (bool): Include the query string, if existing

**Returns:**

- (string)

**Example:**

```
use Bayfront\Utilities\HttpRequest\Request;

echo Request::getUrl();
```