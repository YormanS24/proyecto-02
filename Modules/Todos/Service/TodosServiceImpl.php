<?php

namespace Modules\Category\Modules\Todos\Service;

use Modules\Category\Modules\Todos\Dto\TodosRequest;
use Modules\Category\Modules\Todos\Repository\TodosRepository;

class TodosServiceImpl implements TodosService
{
    private TodosRepository $todosRepository;


    /**
     * @param TodosRepository $todosRepository
     */
    public function __construct(TodosRepository $todosRepository)
    {
        $this->todosRepository = $todosRepository;
    }


    function createTodo(TodosRequest $todosRequest)
    {
        return $this->todosRepository->createTodo([
            'title' => $todosRequest->getTitle(),
            'category_id' => $todosRequest->getIdCategory()
        ]);
    }

    function getAllTodos()
    {
        return $this->todosRepository->getAllTodos();
    }

    function getTodoById($id)
    {
        return $this->todosRepository->getTodosById($id);
    }

    function updateTodo($id, TodosRequest $todosRequest)
    {
        $this->todosRepository->updateTodo($id, [
            'title' => $todosRequest->getTitle()
        ]);
    }
}
