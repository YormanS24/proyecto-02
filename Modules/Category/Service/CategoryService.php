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


    public function create(CategoryDto $categoryDto){

        return $this->categoryRepository->create([
            'name' => $categoryDto->getName(),
            'color' => $categoryDto->getColor(),
        ]);
    }

    public function getAllCategory(){
        return $this->categoryRepository->getAllCategory();
    }

    public function deleteCategory($id){
        //Log::info($this->categoryRepository->deleteCategory($id));
        return $this->categoryRepository->deleteCategory($id);
    }
}
