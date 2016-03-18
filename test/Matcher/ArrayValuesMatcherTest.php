<?php

namespace Garethellis\HamcrestMatchers\Test\Matcher;

class ArrayValuesMatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testArrayValuesMatcherWithAnArray()
    {
        $expected = ["foo", "bar", "baz"];
        $actual = [1 => "foo", 3 => "bar", 4 => "baz"];
        assertThat($actual, hasEqualValuesTo($expected));
    }

    public function testArrayValuesMatcherWithATraversableInstance()
    {
        $expected = ["foo", "bar", "baz"];
        $actual = new \ArrayObject([1 => "foo", 3 => "bar", 4 => "baz"]);
        assertThat($actual, hasEqualValuesTo($expected));
    }

    public function testArrayValuesMatcherOnlyAcceptsArraysAndTraversable()
    {
        $expected = "foo";
        $actual = new \ArrayObject([1 => "foo", 3 => "bar", 4 => "baz"]);
        $this->expectException(\InvalidArgumentException::class);
        assertThat($actual, hasEqualValuesTo($expected));
    }
}
