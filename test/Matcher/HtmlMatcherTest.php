<?php

namespace Garethellis\HamcrestMatchers\Test\Matcher;

class HtmlMatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testHtmlMatcherWorks()
    {
        assertThat("<p>Some html</p>", containsHTML());
        assertThat("no html here", not(containsHTML()));
    }
}
