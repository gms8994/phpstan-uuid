<?php

namespace App;

use PHPStan\Analyser\NameScope;
use PHPStan\PhpDoc\TypeNodeResolverExtension;
use PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode;
use PHPStan\PhpDocParser\Ast\Type\TypeNode;
use PHPStan\Type\Type;

class UuidStringTypeNodeResolverExtension implements TypeNodeResolverExtension
{
    public function resolve(TypeNode $typeNode, NameScope $nameScope): ?Type
    {
        if ($typeNode instanceof IdentifierTypeNode && $typeNode->__toString() === 'uuid-string') {
            return new UuidStringType();
        }

        return null;
    }
}
