 ------ --------------------------------------------------------------------------- 
  Line   tests/data/UuidStringTypes.php                                             
 ------ --------------------------------------------------------------------------- 
  15     Expected type uuid-string, actual: '7302f570-b4ff-499c-ba6b-e3d8c486ad3e'  
 ------ --------------------------------------------------------------------------- 


 [ERROR] Found 1 error                                                                                                  

PHPUnit 11.0.2 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.15
Configuration: phpstan-uuid/phpunit.xml

.F                                                                  2 / 2 (100%)

Time: 00:00.008, Memory: 46.00 MB

There was 1 PHPUnit test runner deprecation:

1) Metadata found in doc-comment for method Tests\UuidStringTypeTest::testFileAsserts(). Metadata in doc-comments is deprecated and will no longer be supported in PHPUnit 12. Update your test code to use attributes instead.

--

There was 1 failure:

1) Tests\UuidStringTypeTest::testFileAsserts with data set "phpstan-uuid/tests/data/UuidStringTypes.php:15" ('type', 'es.php', PHPStan\Type\Constant\ConstantStringType Object (...), PHPStan\Type\Constant\ConstantStringType Object (...), 15)
Expected type uuid-string, got type '7302f570-b4ff-499c-ba6b-e3d8c486ad3e' in phpstan-uuid/tests/data/UuidStringTypes.php on line 15.
Failed asserting that two strings are identical.
--- Expected
+++ Actual
@@ @@
-'uuid-string'
+''7302f570-b4ff-499c-ba6b-e3d8c486ad3e''

phar://phpstan-uuid/vendor/phpstan/phpstan/phpstan.phar/src/Testing/TypeInferenceTestCase.php:64
phpstan-uuid/tests/UuidStringTypeTest.php:26

FAILURES!
Tests: 2, Assertions: 4, Failures: 1, Deprecations: 1.
