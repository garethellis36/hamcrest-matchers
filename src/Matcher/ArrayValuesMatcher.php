<?php

namespace Garethellis\HamcrestMatchers\Matcher;

use Hamcrest\BaseMatcher;
use Hamcrest\Description;

class ArrayValuesMatcher extends BaseMatcher
{
    /**
     * @var array|\Traversable
     */
    private $expected;

    /**
     * ArrayValuesMatcher constructor.
     * @param \Traversable|array $array
     */
    public function __construct($array)
    {
        $this->expected = $array;
    }

    public function matches($actual)
    {
        return $this->getValues($actual) === $this->getValues($this->expected);
    }

    public function describeTo(Description $description)
    {
        $description->appendText($this->expected);
    }

    protected function getValues($arrayLike)
    {
        if (!is_array($arrayLike)) {
            $arrayLike = iterator_to_array($arrayLike);
        }
        return array_values($arrayLike);
    }
}
