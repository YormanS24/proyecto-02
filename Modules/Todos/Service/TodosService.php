<?php

namespace Modules\Category\Modules\Todos\Service;

use Modules\Category\Modules\Todos\Dto\TodosRequest;

interface TodosService
{
    function createTodo(TodosRequest $todosRequest);
    function getAllTodos();
    function getTodoById($id);
    function updateTodo($id,TodosRequest $todosRequest);
}
