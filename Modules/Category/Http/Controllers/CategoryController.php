<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;
use Modules\Category\Dto\CategoryDto;
use Modules\Category\Modules\Category\Service\CategoryService;
use Modules\Category\Service\CategoryInterface;
use Throwable;

class CategoryController extends Controller
{
    private CategoryInterface $categoryInterface;

    /**
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = $this->categoryInterface->getAllCategory();
        return view('category::index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
//    public function create()
//    {
//        return view('category::index');
//    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'color' => 'required|max:7'
        ]);

        $category = new CategoryDto($request->name, $request->color);

        $this->categoryInterface->create($category);

        return redirect()->route('indexCategory')->with('success', 'Nueva categoria agregada');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $category = $this->categoryInterface->showCategory($id);
        return view('category::show', ['category' => $category]);
//        $category = Category::find($id);
//        return view('categories.show',['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
//    public function edit($id)
//    {
//        return view('category::edit');
//    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
//        $request->validate([
//            'name' => 'required|unique:categories,name|max:255',
//            'color' => 'required|max:7'
//        ]);
        $categoryDto = new CategoryDto($request->name, $request->color);

        $this->categoryInterface->updateCategory($id, $categoryDto);

        return redirect()->route('indexCategory')->with('success', 'Categoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        return ($this->categoryInterface->deleteCategory($id)) ? redirect()->route('indexCategory')->with('success', 'Categoria eliminada') : redirect()->route('indexCategory')->with('error', 'Tenemos problemas, reintente mas tarde...');

    }
}
