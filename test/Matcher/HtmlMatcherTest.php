<?php

namespace Garethellis\HamcrestMatchers\Test\Matcher;

use Garethellis\HamcrestMatchers\Test\TestCase;

class HtmlMatcherTest extends TestCase
{
    public function testHtmlMatcherWorks()
    {
        assertThat("<p>Some html</p>", containsHTML());
        assertThat("no html here", not(containsHTML()));
    }
}
