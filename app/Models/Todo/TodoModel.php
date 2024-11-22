<?php

namespace App\Models\Todo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Todo\CategoryModel;

class TodoModel extends Model
{
    use HasFactory;
    protected $table = "todo";
    protected $fillable = ["task", "is_done", "due_date", "category_id"];
    protected $casts = [
        'due_date' => 'date',
    ];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }




}












// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Todo extends Model
// {
//     use HasFactory;

//     protected $table = "todo";
//     protected $fillable = ['task', 'is_done', 'due_date'];

//     public function priorities()
//     {
//         return $this->belongsToMany(TodoPriority::class);
//     }

//     public function categories()
//     {
//         return $this->belongsToMany(Category::class);
//     }
// }

