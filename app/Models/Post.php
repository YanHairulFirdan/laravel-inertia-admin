<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'content'];
    
    protected $fillable = ['title', 'content'];

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
}
