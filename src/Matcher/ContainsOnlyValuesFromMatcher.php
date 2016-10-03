<?php

namespace Garethellis\HamcrestMatchers\Matcher;

use Hamcrest\BaseMatcher;
use Hamcrest\Description;
use Traversable;

class ContainsOnlyValuesFromMatcher extends BaseMatcher
{
    private $iterable;

    /**
     * ContainsOnlyInAnyOrderMatcher constructor.
     * @param $iterable
     */
    public function __construct($iterable)
    {
        $this->assertArrayOrTraversable($iterable);

        $this->iterable = $this->getValues($iterable);
    }

    public function matches($iterable)
    {
        $this->assertArrayOrTraversable($iterable);

        $values = $this->getValues($iterable);
        return count($values) === count($this->iterable) && !array_diff($values, $this->iterable);
    }

    public function describeTo(Description $description)
    {
        $description->appendText("Only ");
        $description->appendValue($this->iterable);
        $description->appendText(" in any order");
    }

    private function assertArrayOrTraversable($item)
    {
        assertThat($item, is(either(arrayValue())->orElse(anInstanceOf(Traversable::class))));
    }

    private function getValues($iterable)
    {
        if ($iterable instanceof Traversable) {
            $iterable = iterator_to_array($iterable);
        }
        return array_values($iterable);
    }
}
