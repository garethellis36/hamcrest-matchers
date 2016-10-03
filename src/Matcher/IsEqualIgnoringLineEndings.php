<?php

namespace Garethellis\HamcrestMatchers\Matcher;

use Hamcrest\BaseMatcher;
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
        $this->value = $this->convertLineEndingsToLinuxStyle($value);
    }

    public function matches($item)
    {
        return $this->convertLineEndingsToLinuxStyle($item) == trim($this->value);
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
        $string = str_replace("\r", "\n", $string);

        //replace all the things
        return trim(str_replace(PHP_EOL, "\n", $string));
    }
}