# levenshtein-array-sort
Sorts given array of strings by Levenshtein distance.

Simply use:
```php
$needle = 'text';
$haystack = array('texas', 'test', 'random');

$sorter = new ArraySort();
$result = $sorter->sort($needle, $haystack);

print_r($result);
```

The result will be represented as ordered array with keys as Levenshtein distance to needle:
```
Array
(
    [1] => test
    [2] => texas
    [6] => random
)
```

In case there are same distances to needle, the nested array will be created:
```php
$needle = 'text';
$haystack = array('texas', 'test', 'texts', 'random');

$result = $sorter->sort($needle, $haystack);

print_r($result);
```

```
Array
(
    [1] => Array
        (
            [0] => test
            [1] => texts
        )

    [2] => texas
    [6] => random
)
```
#Installation: 
`composer require v-bartusevicius/levenshtein-array-sort`
