<?php

declare(strict_types=1);

namespace App;

use Exception;
use PHPStan\TrinaryLogic;
use PHPStan\Type\CompoundType;
use PHPStan\Type\StringType;
use PHPStan\Type\Type;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

use function count;

/**
 * The custom 'uuid-string' type class. It's a subset of the string type. Every string that passes the
 * Uuid::fromString($string) test is a valid uuid-string type.
 */
class UuidStringType extends StringType
{
    public function describe(\PHPStan\Type\VerbosityLevel $level): string
    {
        return 'uuid-string';
    }

    public function accepts(Type $type, bool $strictTypes): TrinaryLogic
    {
        if ($type instanceof CompoundType) {
            return $type->isAcceptedBy($this, $strictTypes);
        }

        $constantStrings = $type->getConstantStrings();

        if (count($constantStrings) === 1) {
            $uuid = null;

            try {
                $uuid = Uuid::fromString($constantStrings[0]->getValue());
            } catch (Exception $e) {
                // swallow
            }

            return TrinaryLogic::createFromBoolean($uuid instanceof UuidInterface);
        }

        if ($type instanceof self) {
            return TrinaryLogic::createYes();
        }

        if ($type->isString()->yes()) {
            return TrinaryLogic::createMaybe();
        }

        return TrinaryLogic::createNo();
    }

    public function isSuperTypeOf(Type $type): TrinaryLogic
    {
        $constantStrings = $type->getConstantStrings();

        if (count($constantStrings) === 1) {
            $uuid = null;

            try {
                $uuid = Uuid::fromString($constantStrings[0]->getValue());
            } catch (Exception $e) {
                // swallow
            }

            return TrinaryLogic::createFromBoolean($uuid instanceof UuidInterface);
        }

        if ($type instanceof self) {
            return TrinaryLogic::createYes();
        }

        if ($type->isString()->yes()) {
            return TrinaryLogic::createMaybe();
        }

        if ($type instanceof CompoundType) {
            return $type->isSubTypeOf($this);
        }

        return TrinaryLogic::createNo();
    }

    /**
     * @param  mixed[]  $properties
     */
    public static function __set_state(array $properties): Type
    {
        return new self();
    }
}
