A simple collection of custom Hamcrest matchers for use with `hamcrest/hamcrest-php`.

# Installation

Install with composer:

`composer require garethellis/hamcrest-matchers`

## Matchers

### UUIDMatcher

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

### HTMLMatcher

Matches a string containing HTML. Example usage;
```php
<?php
/** ... **/
assertThat($html, containsHTML());
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