<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name', 'category_desc'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
