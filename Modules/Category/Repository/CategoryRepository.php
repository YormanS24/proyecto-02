<?php

namespace Modules\Category\Repository;

use Modules\Category\Entities\Category;

class CategoryRepository
{
    public function create(array $data)
    {
        return Category::create($data);
    }
}
