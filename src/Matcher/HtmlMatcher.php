<?php

namespace Garethellis\HamcrestMatchers\Matcher;

use Hamcrest\BaseMatcher;
use Hamcrest\Description;

class HtmlMatcher extends BaseMatcher
{
    public function matches($item)
    {
        return strip_tags($item) !== $item;
    }

    public function describeTo(Description $description)
    {
        $description
            ->appendText('valid HTML');
    }
}
