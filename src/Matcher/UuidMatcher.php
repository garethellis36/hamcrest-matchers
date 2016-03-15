<?php

namespace Garethellis\HamcrestMatchers\Matcher;

use Assert\Assertion;
use Assert\InvalidArgumentException;
use Hamcrest\BaseMatcher;
use Hamcrest\Description;

class UuidMatcher extends BaseMatcher
{
    public function matches($uuid)
    {
        try {
            Assertion::uuid($uuid);
            return true;
        } catch (InvalidArgumentException $e) {
            return false;
        }
    }

    public function describeTo(Description $description)
    {
        $description
            ->appendText('a valid UUID');
    }
}
