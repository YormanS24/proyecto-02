<?php

namespace Modules\Category\Modules\Todos\Repository;

use Modules\Todos\Entities\Todos;

class TodosRepository
{
    function createTodo(array $data)
    {
        return Todos::create($data);
    }

    function getAllTodos()
    {
        return Todos::all();
    }

    function getTodosById($id)
    {
        return Todos::find($id);
    }

    function updateTodo($id,array $data)
    {
        Todos::where('id',$id)->update($data);
    }
}
