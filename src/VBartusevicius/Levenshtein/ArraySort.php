<?php

namespace VBartusevicius\Levenshtein;

/**
 * Class ArraySort
 *
 * Sorts haystack with strings by Levenshtein distance to needle
 */
class ArraySort
{
    /**
     * @param string $needle
     * @param array  $haystack
     * @return array
     */
    public function sort($needle, array $haystack)
    {
        $distances = array();

        foreach ($haystack as $string) {
            $dist = levenshtein($needle, $string);
            if (array_key_exists($dist, $distances)) {
                if (is_array($distances[$dist])) {
                    $distances[$dist][] = $string;
                } else {
                    $distances[$dist] = array($distances[$dist], $string);
                }
            } else {
                $distances[$dist] = $string;
            }
        }

        ksort($distances);

        return $distances;
    }
}
