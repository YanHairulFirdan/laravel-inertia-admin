<?php

namespace App\Enums\Traits;

/**
 * 
 */
trait BackedEnum
{
    public static function randomCase()
    {
        /**@var array $cases */
        $cases = static::cases();
        $caseCount = count($cases);
        
        $caseNames = array_map(function ($case){
          return $case->name;
        }, $cases);

        $selectedCase = $caseNames[rand(0, $caseCount - 1)];

        return constant("static::{$selectedCase}");
    }

    public static function toArray()
    {
        $arrayOfCase = [];

        foreach (static::cases() as $key => $case) {
            $arrayOfCase[$case->name] = $case->value;
        }

        return $arrayOfCase;
    }
}
