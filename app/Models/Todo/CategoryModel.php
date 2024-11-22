<?php

namespace App\Models\Todo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ['nama'];
    public $timestamps = false;

    public function todos()
    {
        return $this->hasMany(TodoModel::class, 'category_id');
    }

    public function todosPry()
    {
        return $this->hasMany(TodoPriorityModel::class, 'category_id');
    }
}