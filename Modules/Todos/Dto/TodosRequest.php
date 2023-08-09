<?php

namespace Modules\Category\Modules\Todos\Dto;

class TodosRequest
{
    private string $title;

    private int $idCategory;

    /**
     * @param string $title
     * @param int $idCategory
     */
    public function __construct(string $title, int $idCategory)
    {
        $this->title = $title;
        $this->idCategory = $idCategory;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getIdCategory(): int
    {
        return $this->idCategory;
    }


}
