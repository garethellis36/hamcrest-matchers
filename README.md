A simple collection of custom Hamcrest matchers for use with `hamcrest/hamcrest-php`.

# Usage

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

### HTMLMatcher

Matches a string containing HTML. Example usage;
```php
<?php
/** ... **/
assertThat($html, containsHTML());
```