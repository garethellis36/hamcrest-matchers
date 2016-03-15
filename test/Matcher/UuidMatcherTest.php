<?php

namespace Garethellis\HamcrestMatchers\Test\Matcher;

use Faker\Factory;

class UuidMatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testUuidMatcher()
    {
        $faker = Factory::create();
        assertThat($faker->uuid, is(aUUID()));
    }
}
