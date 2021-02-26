# 3.0 [2021-02-26]
  * Removes `beberlei/assert` from composer dependencies
  * Upgrades testing dependencies for PHPUnit 9
  * Drops support for PHP versions below 7.3 and adds support for up to 8.0

# 2.2 [2016-10-03]
  * Adds containsOnlyInAnyOrder matcher

# 2.1 [2016-08-18]
  * Adds EqualToIgnoringLineEndings matcher ('equalToIgnoringLineEndings()')

# 2.0 
  * Updates Hamcrest to 2.0
  
# 0.5 [2016-03-29]
  * Valid JSON matcher (`validJSON()`)
# 0.4 [2016-03-23]
  * Bug fix: `ArrayValuesMatcher` previously threw `InvalidArgumentException` if you tried to use it with a 
  non-array-like structure. Now it will just fail the match instead.
  * Possibly breaking bug fix: `anArrayOfUUIDs` will now fail the match if an empty array is passed in
  * Bug fix: `anArrayOfUUIDs` will now handle `InvalidArgumentException` thrown by `Assertion::uuid()` library so that 
  Hamcrest can properly handle the failed match
  
  
# 0.3 [2016-03-18]
  * Array values matcher (`hasValuesEqualTo`)

# 0.2 [2016-03-18]
  * Callback matcher
  * Array of UUID matcher (using callback matcher + UUID matcher)
  
# 0.1 [2016-03-15]
  * UUID matcher
  * HTML matcher
