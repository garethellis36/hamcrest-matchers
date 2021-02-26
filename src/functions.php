<?php
use AsciiSoup\Hamcrest\CallbackMatcher;
use Garethellis\HamcrestMatchers\Matcher\ArrayValuesMatcher;
use Garethellis\HamcrestMatchers\Matcher\ContainsOnlyValuesFromMatcher;
use Garethellis\HamcrestMatchers\Matcher\HtmlMatcher;
use Garethellis\HamcrestMatchers\Matcher\IsEqualIgnoringLineEndings;
use Garethellis\HamcrestMatchers\Matcher\UuidMatcher;
use Garethellis\HamcrestMatchers\Matcher\ValidJSONMatcher;

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

                    if (empty($array)) {
                        return false;
                    }

                    foreach ($array as $value) {
                        if (UuidMatcher::isUuid($value) === false) {
                            return false;
                        }
                    }
                    return true;
                }
            )
        );
    }
}

if (!function_exists("hasEqualValuesTo")) {
    function hasEqualValuesTo($array)
    {
        return new ArrayValuesMatcher($array);
    }
}

if (!function_exists("validJSON")) {
    function validJSON()
    {
        return new ValidJSONMatcher();
    }
}

if (!function_exists("equalToIgnoringLineEndings")) {
    function equalToIgnoringLineEndings($value)
    {
        return new IsEqualIgnoringLineEndings($value);
    }
}

if (!function_exists("containsOnlyValuesFrom")) {
    function containsOnlyValuesFrom($iterable)
    {
        return new ContainsOnlyValuesFromMatcher($iterable);
    }
}
