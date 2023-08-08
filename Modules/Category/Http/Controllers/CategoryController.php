<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;
use Modules\Category\Dto\CategoryDto;
use Modules\Category\Modules\Category\Service\CategoryService;
use Throwable;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    /**
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('category::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('category::index');
    }

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

        $category = new CategoryDto($request->name,$request->color);

        $this->categoryService->create($category);

        return redirect()->route('category.index')->with('success','Nueva categoria agregada');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show',['category' => $category]);
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
//            'name' => 'required|unique:categories|max:255',
//            'color' => 'required|max:7'
//        ]);

        Category::where('id', $id)
            ->update([
                'name' => $request->name,
                'color' => $request->color
            ]);

        return redirect()->route('categories.index')->with('success', 'Categoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {

            $category = Category::find($id);
            $category->todos()->each(function ($todo) {
                $todo->delete();
            });
            $category->delete();

            return redirect()->route('categories.index')->with('success', 'Categoria eliminada');
        } catch (Throwable) {
            return redirect()->route('categories.index')->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }
}
