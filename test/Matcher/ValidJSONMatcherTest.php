<?php

namespace Garethellis\HamcrestMatchers\Test\Matcher;

class ValidJSONMatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testValidJsonMatcher()
    {
        $array = ["foo", "bar"];
        assertThat(json_encode($array), is(validJSON()));

        $array = [
            "foo" => "\xB1\x31",
            "baz" => "bat",
        ];
        assertThat(json_encode($array), is(not(validJSON())));

        assertThat("A random string in HTML tags", is(not(validJSON())));
    }
}