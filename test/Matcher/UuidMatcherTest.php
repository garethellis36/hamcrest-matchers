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

    public function testArrayOfUuidMatcher()
    {
        $faker = Factory::create();
        assertThat([$faker->uuid, $faker->uuid, $faker->uuid], is(anArrayOfUUIDs()));
    }
    
    public function testArrayOfUuidMatcherDoesntMatchAnEmptyArray()
    {
        assertThat([], is(not(anArrayOfUUIDs())));
    }
}
