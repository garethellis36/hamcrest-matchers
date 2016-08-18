<?php

namespace Garethellis\HamcrestMatchers\Matcher;

use Hamcrest\BaseMatcher;
use Hamcrest\Core\IsEqual;
use Hamcrest\Description;

class IsEqualIgnoringLineEndings extends BaseMatcher
{
    private $value;

    /**
     * IsEqualIgnoringLineEndings constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function matches($item)
    {
        return $this->convertLineEndingsToLinuxStyle($item) == $this->convertLineEndingsToLinuxStyle($this->value);
    }

    public function describeTo(Description $description)
    {
        $description->appendValue($this->value);
    }

    private function convertLineEndingsToLinuxStyle($string)
    {
        //replace windows-style with Classic Mac OS-style
        $string = str_replace("\r\n", "\r", $string);

        //replace mac-style with linux
        return str_replace("\r", "\n", $string);
    }
}