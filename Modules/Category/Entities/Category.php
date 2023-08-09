<?php

namespace Modules\Category\Entities;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Todos\Entities\Todos;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'color'
    ];

    public function todos(){
        return $this->hasMany(Todos::class,'category_id','id');
    }

//    protected static function newFactory()
//    {
//        return \Modules\Category\Database\factories\CategoryFactory::new();
//    }
}
