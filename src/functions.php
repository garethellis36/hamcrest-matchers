<?php
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
