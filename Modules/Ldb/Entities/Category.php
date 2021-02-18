<?php

namespace Modules\Ldb\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Ldb\Database\factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function subcategories(){
        return $this->hasMany(Category::class, 'parent_id');
    }
}
