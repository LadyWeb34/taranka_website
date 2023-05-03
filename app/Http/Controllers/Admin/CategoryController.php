<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\SpladeTable;
use App\Http\Requests\CategoryRequest;
use ProtoneMedia\Splade\Facades\Toast;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index', [
            'categories' => SpladeTable::for(Category::class)
                ->column('name',label: 'Название',  canBeHidden:false, sortable:true)
                ->withGlobalSearch(columns: ['name'])
                ->column('slug', label:'URL')
                ->column('image', label:'Изображение')
                ->column('action', label:'Действие', canBeHidden:false)
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->image = $request->file('image')->store('public');
        $category->save();
        Toast::title('Новая категория успешно добавлена!');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->storeAs('public', $filename);
            $category->image = $filename;
        }

        $category->save();
        Toast::title('Категория обновлена!');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Toast::title('Категория была удалена!');
        return redirect()->route('admin.category.index');
    }
}
