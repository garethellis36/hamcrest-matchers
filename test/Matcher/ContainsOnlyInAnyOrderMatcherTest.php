<?php

namespace Garethellis\HamcrestMatchers\Test\Matcher;

use Garethellis\HamcrestMatchers\Test\TestCase;

class ContainsOnlyValuesFromMatcherTest extends TestCase
{
    /**
     * @return void
     */
    public function test_matches_arrays_with_same_elements_in_same_order()
    {
        $arr1 = ["foo", "bar", "bat"];
        $arr2 = ["foo", "bar", "bat"];

        assertThat($arr1, containsOnlyValuesFrom($arr2));
        assertThat($arr2, containsOnlyValuesFrom($arr1));
    }

    /**
     * @return void
     */
    public function test_matches_arrays_with_same_elements_in_different_order()
    {
        $arr1 = ["foo", "bar", "bat"];
        $arr2 = ["bar", "bat", "foo"];

        assertThat($arr1, containsOnlyValuesFrom($arr2));
        assertThat($arr2, containsOnlyValuesFrom($arr1));
    }

    /**
     * @return void
     */
    public function test_does_not_match_array_with_different_elements()
    {
        $arr1 = ["foo", "bar", "bat", "barry"];
        $arr2 = ["bar", "bat", "foo", "bazza"];

        assertThat($arr1, not(containsOnlyValuesFrom($arr2)));
        assertThat($arr2, not(containsOnlyValuesFrom($arr1)));
    }

    /**
     * @return void
     */
    public function test_matches_traversables_with_same_elements_in_different_order()
    {
        $trav1 = new \ArrayObject(["foo", "bar", "bat"]);
        $trav2 = new \ArrayObject(["bar", "bat", "foo"]);

        assertThat($trav1, containsOnlyValuesFrom($trav2));
        assertThat($trav2, containsOnlyValuesFrom($trav1));
    }
}
