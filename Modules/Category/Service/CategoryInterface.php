<?php

namespace Modules\Category\Service;

use Modules\Category\Dto\CategoryDto;

interface CategoryInterface
{
    public function create(CategoryDto $categoryDto);
    public function getAllCategory();
    public function deleteCategory($id);

    public function showCategory($id);

    public function updateCategory($id,CategoryDto $categoryDto);

}
