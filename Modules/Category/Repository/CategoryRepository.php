<?php

namespace Modules\Category\Repository;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Modules\Category\Entities\Category;
use Throwable;

class CategoryRepository
{
    public function create(array $data)
    {
        return Category::create($data);
    }

    public function getAllCategory(){
        return Category::all();
    }

    public function deleteCategory($id){
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return true;
        }catch (ModelNotFoundException $exception){
            Log::info("errore");
            return false;
        }
    }

    public function showCategory($id){
        return Category::find($id);
    }

    public function updateCategory($id,array $data){
        Category::where('id',$id)
            ->update($data);
    }
}
