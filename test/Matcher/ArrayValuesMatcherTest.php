<?php

namespace Garethellis\HamcrestMatchers\Test\Matcher;

use Garethellis\HamcrestMatchers\Test\TestCase;

class ArrayValuesMatcherTest extends TestCase
{
    public function testArrayValuesMatcherWithAnArray()
    {
        $expected = ["foo", "bar", "baz"];
        $actual   = [1 => "foo", 3 => "bar", 4 => "baz"];
        assertThat($actual, hasEqualValuesTo($expected));
    }

    public function testArrayValuesMatcherWithATraversableInstance()
    {
        $expected = ["foo", "bar", "baz"];
        $actual   = new \ArrayObject([1 => "foo", 3 => "bar", 4 => "baz"]);
        assertThat($actual, hasEqualValuesTo($expected));
    }

    public function testArrayValuesMatcherOnlyAcceptsArraysAndTraversable()
    {
        $expected = "foo";
        $actual   = new \ArrayObject([1 => "foo", 3 => "bar", 4 => "baz"]);
        assertThat($actual, not(hasEqualValuesTo($expected)));
    }
}
