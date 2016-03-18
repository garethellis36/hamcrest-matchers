<?php
use AsciiSoup\Hamcrest\CallbackMatcher;
use Assert\Assertion;
use Garethellis\HamcrestMatchers\Matcher\HtmlMatcher;
use Garethellis\HamcrestMatchers\Matcher\UuidMatcher;

if (!function_exists("aUUID")) {
    function aUUID()
    {
        return new UuidMatcher();
    }
}

if (!function_exists("containsHTML")) {
    function containsHTML()
    {
        return new HtmlMatcher();
    }
}

if (!function_exists("anArrayOfUUIDs")) {
    function anArrayOfUUIDs()
    {
        return describedAs(
            "an array of UUIDs",
            new CallbackMatcher(
                function (array $array) {
                    foreach ($array as $value) {
                        Assertion::uuid($value);
                    }
                    return true;
                }
            )
        );
    }
}