<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'task_id';
    protected $fillable = ['task_name', 'task_desc'];

    /**
     * Get the category the category that owns the task
     *
     * @return [type] [description]
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
