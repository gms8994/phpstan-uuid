<?php

namespace Tests;

use PHPStan\Testing\TypeInferenceTestCase;

class UuidStringTypeTest extends TypeInferenceTestCase
{
    /**
     * @return iterable<mixed>
     */
    public static function dataFileAsserts(): iterable
    {
        // path to a file with actual asserts of expected types:
        yield from self::gatherAssertTypes(__DIR__ . '/data/UuidStringTypes.php');
    }

    /**
     * @dataProvider dataFileAsserts
     */
    public function testFileAsserts(
        string $assertType,
        string $file,
        mixed ...$args
    ): void {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

    public static function getAdditionalConfigFiles(): array
    {

        // path to your project's phpstan.neon, or extension.neon in case of custom extension packages
        return [__DIR__ . '/../phpstan.neon'];
    }
}
