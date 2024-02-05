<?php

namespace AssertFunction;

use function PHPStan\Testing\assertType;

/**
 * @param uuid-string $uuid
 */
function foo($uuid) : void
{
    assertType('uuid-string', $uuid);
}

assertType('uuid-string', '7302f570-b4ff-499c-ba6b-e3d8c486ad3e');
