<?php

namespace Garethellis\HamcrestMatchers\Test\Matcher;

use Garethellis\HamcrestMatchers\Test\TestCase;

class IsEqualIgnoringLineEndingsTest extends TestCase
{
    /**
     * @return void
     */
    public function test_it_can_detect_two_strings_which_are_equal_besides_having_win_and_linux_line_endings()
    {
        $stringWithWindowsEnding = "some\r\nstring\r\n";
        $stringWithLinuxEnding   = "some\nstring\n";

        assertThat($stringWithLinuxEnding, is(equalToIgnoringLineEndings($stringWithWindowsEnding)));
    }

    /**
     * @return void
     */
    public function test_it_can_detect_two_strings_which_are_equal_besides_having_classic_mac_and_linux_line_endings()
    {
        $stringWithWindowsEnding = "some\rstring\r";
        $stringWithLinuxEnding   = "some\nstring\n";

        assertThat($stringWithLinuxEnding, is(equalToIgnoringLineEndings($stringWithWindowsEnding)));
    }

    /**
     * @return void
     */
    public function test_it_can_detect_two_strings_which_both_have_linux_endings()
    {
        $stringWithWindowsEnding = "some\nstring\n";
        $stringWithLinuxEnding   = "some\nstring\n";

        assertThat($stringWithLinuxEnding, is(equalToIgnoringLineEndings($stringWithWindowsEnding)));
    }

    /**
     * @return void
     */
    public function test_it_can_detect_two_strings_which_dont_have_line_endings()
    {
        $stringWithWindowsEnding = "some string";
        $stringWithLinuxEnding   = "some string";

        assertThat($stringWithLinuxEnding, is(equalToIgnoringLineEndings($stringWithWindowsEnding)));
    }
}
