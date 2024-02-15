<?php

namespace Tests;

use App\UuidStringType;
use PHPStan\Testing\PHPStanTestCase;
use PHPStan\Type\NeverType;
use PHPStan\Type\NullType;
use PHPStan\Type\StringType;
use PHPStan\Type\TypeCombinator;
use PHPStan\Type\UnionType;
use PHPStan\Type\VerbosityLevel;

class UuidStringTypeCombinatorTest extends PHPStanTestCase
{
    #[\PHPUnit\Framework\Attributes\DataProvider('typeUnionDataProvider')]
    public function testUnionType($typeToUnion, string $expectedTypeClass, string $expectedTypeDescription) : void
    {
        $result = TypeCombinator::union($typeToUnion, new UuidStringType());
        $this->assertSame($expectedTypeDescription, $result->describe(VerbosityLevel::precise()));
        $this->assertInstanceOf($expectedTypeClass, $result);
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('typeIntersectDataProvider')]
    public function testIntersectType($typeToIntersect, string $expectedTypeClass, string $expectedTypeDescription) : void
    {
        $result = TypeCombinator::intersect($typeToIntersect, new UuidStringType());
        $this->assertSame($expectedTypeDescription, $result->describe(VerbosityLevel::precise()));
        $this->assertInstanceOf($expectedTypeClass, $result);
    }

    public static function typeUnionDataProvider()
    {
        return [
            [ new NullType(), UnionType::class, 'uuid-string|null'],
            [ new StringType(), StringType::class, 'string'],
        ];
    }

    public static function typeIntersectDataProvider()
    {
        return [
            [ new NullType(), NeverType::class, '*NEVER*'],
            [ new StringType(), UuidStringType::class, 'uuid-string'],
        ];
    }
}
