<?php

namespace Garethellis\HamcrestMatchers\Test;

use Hamcrest\MatcherAssert;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function assertPostConditions(): void
    {
        $this->addToAssertionCount(MatcherAssert::getCount());
        MatcherAssert::resetCount();
    }
}
