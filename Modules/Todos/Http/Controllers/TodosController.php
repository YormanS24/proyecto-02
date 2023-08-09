<?php

namespace Modules\Todos\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Category\Modules\Todos\Dto\TodosRequest;
use Modules\Category\Modules\Todos\Service\TodosService;
use Modules\Category\Service\CategoryInterface;

class TodosController extends Controller
{
    private TodosService $todosService;
    private CategoryInterface $category;

    /**
     * @param TodosService $todosService
     * @param CategoryInterface $category
     */
    public function __construct(TodosService $todosService, CategoryInterface $category)
    {
        $this->todosService = $todosService;
        $this->category = $category;
    }

    /**
     * @param TodosService $todosService
     */


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $todos = $this->todosService->getAllTodos();
        $categories = $this->category->getAllCategory();
        return view('todos::index', ['todos' => $todos, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('todos::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:4|unique:todos,title',
            'category_id' => 'required'
        ]);

        $todoRequesDto = new TodosRequest($request->title, $request->category_id);

        $this->todosService->createTodo($todoRequesDto);

        return redirect()->route('storeTodos')->with('success', 'Tarea creada correctamente');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $todo = $this->todosService->getTodoById($id);
        return view('todos::show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('todos::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $requestTodoDto = new TodosRequest($request->title,$id);

        $this->todosService->updateTodo($id,$requestTodoDto);

        return redirect()->route('storeTodos')->with('success', 'Tarea actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

    }
}
