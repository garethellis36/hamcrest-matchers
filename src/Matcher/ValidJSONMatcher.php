<?php

namespace Garethellis\HamcrestMatchers\Matcher;

use Hamcrest\BaseMatcher;
use Hamcrest\Description;

class ValidJSONMatcher extends BaseMatcher
{
    public function matches($item)
    {
        if (!is_string($item)) {
            return false;
        }
        json_decode($item);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public function describeTo(Description $description)
    {
        $description->appendText("a valid JSON string");
    }
}
