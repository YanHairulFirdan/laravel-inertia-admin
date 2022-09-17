<?php

namespace App\Supports\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class RupiahCurrency implements CastsAttributes
{
    /** {@inheritDoc} */
    public function get($model, $key, $value, $attributes)
    {
        return "Rp." . number_format($value, 2, ',', '.');
    }
    
    /** {@inheritDoc} */
    public function set($model, $key, $value, $attributes)
    {
        
    }
}
