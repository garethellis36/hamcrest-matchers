<?php

namespace Garethellis\HamcrestMatchers\Matcher;

use Hamcrest\BaseMatcher;
use Hamcrest\Description;

class UuidMatcher extends BaseMatcher
{
    public function matches($uuid)
    {
        return static::isUuid($uuid);
    }

    public function describeTo(Description $description)
    {
        $description
            ->appendText('a valid UUID');
    }

    public static function isUuid(string $uuid): bool
    {
        $uuid = str_replace(['urn:', 'uuid:', '{', '}'], '', $uuid);

        if ($uuid === '00000000-0000-0000-0000-000000000000') {
            return true;
        }

        if (!preg_match('/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/', $uuid)) {
            return false;
        }

        return true;
    }
}
