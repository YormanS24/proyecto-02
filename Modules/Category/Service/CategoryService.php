<?php

namespace Modules\Category\Modules\Category\Service;
use Modules\Category\Dto\CategoryDto;
use Modules\Category\Repository\CategoryRepository;

class CategoryService
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
}
