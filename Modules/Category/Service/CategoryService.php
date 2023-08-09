<?php

namespace Modules\Category\Modules\Category\Service;
use Illuminate\Support\Facades\Log;
use Modules\Category\Dto\CategoryDto;
use Modules\Category\Repository\CategoryRepository;
use Modules\Category\Service\CategoryInterface;

class CategoryService implements CategoryInterface
{
    private CategoryRepository $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function create($categoryDto){

        return $this->categoryRepository->create([
            'name' => $categoryDto->getName(),
            'color' => $categoryDto->getColor(),
        ]);
    }

    public function getAllCategory(){
        return $this->categoryRepository->getAllCategory();
    }

    public function deleteCategory($id){
        return $this->categoryRepository->deleteCategory($id);
    }


    public function showCategory($id)
    {
        return $this->categoryRepository->showCategory($id);
    }

    public function updateCategory($id,CategoryDto $categoryDto){
        $this->categoryRepository->updateCategory($id,[
            'name' => $categoryDto->getName(),
            'color' => $categoryDto->getColor()
        ]);
    }
}
