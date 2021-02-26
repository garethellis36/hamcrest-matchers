A simple collection of custom Hamcrest matchers for use with `hamcrest/hamcrest-php`.

[![Code Climate](https://codeclimate.com/github/garethellis36/hamcrest-matchers/badges/gpa.svg)](https://codeclimate.com/github/garethellis36/hamcrest-matchers)

# Installation

Install with composer:

`composer require --dev garethellis/hamcrest-matchers`

## Matchers

### UUID matcher

Matches a valid [UUID](https://en.wikipedia.org/wiki/Universally_unique_identifier). Example usage:
```php
<?php
/** ... **/
assertThat($uuid, is(aUUID()));
```

To match an array of UUIDs:
```php
<?php
/** ... **/
assertThat([$uuid1, $uuid2, $uuid3], is(anArrayOfUUIDs()));
```

This matcher uses the callback matcher (see below) from 
[Nils Luxton](https://github.com/ascii-soup/hamcrest-callback-matcher).

### HTML matcher

Matches a string containing HTML. Example usage;
```php
<?php
/** ... **/
assertThat($html, containsHTML());
```

### Valid JSON matcher

Matches a valid JSON string. Example usage:
```php
<?php
/** .. **/
assertThat($json, is(validJSON()));
```

### Array values matcher

Match the values of an array or `Traversable` instance. Note - ignores keys.
```php
assertThat($aTraversableInstance, hasEqualValuesTo($anArray));
```

### Callback Matcher

Callback matching is achieved thanks to [Nils Luxton](https://github.com/ascii-soup/hamcrest-callback-matcher) and his
callback matcher lib (included as a composer dependency in this library).
Example usage:
```php
assertThat("hello", matchesUsing(function($value) { return $value === "hello"; }));
```

#### Creating new custom callback matchers
You can create your own custom matchers with the callback matcher by using `describedAs()` to provide a better 
description for the expectation.

```php
function isSomething()
{
    return describedAs('a custom value', new CallbackMatcher(
        function($value) {
            return $value === 'my custom value';
        }
    )
}
assertThat($foo, isSomething());
```
```
