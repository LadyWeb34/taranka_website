<?php

namespace App\Http\Controllers\Admin;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\FoodStoreRequest;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('food.index', [
            'food' => SpladeTable::for(Food::class)
                ->column('name',label: 'Название',  canBeHidden:false, sortable:true)
                ->withGlobalSearch(columns: ['name'])
                ->selectFilter('category_id', $categories, label:'Сортировать по категории')
                ->column('slug', label:'URL')
                ->column('price', label:'Цена')
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
        $categories = Category::pluck('name', 'id')->toArray();
        return view('food.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodStoreRequest $request)
    {
        $food = new Food();
        $food->category_id = $request->input('category_id');
        $food->name = $request->input('name');
        // $food->slug = $request->input('slug');
        $food->slug = Str::slug($request->input('name'));
        $food->price = $request->input('price');
        $food->image = $request->file('image')->store('public');
        $food->save();
        Toast::title('Новая позиция успешно добавлена!');
        return redirect()->route('admin.food.index');
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
    public function edit(Food $food)
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('food.edit', compact('food', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodStoreRequest $request, Food $food)
    {
        $food->name = $request->input('name');
        $food->slug = Str::slug($request->input('name'));
        $food->price = $request->input('price');
        $food->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->storeAs('public', $filename);
            $food->image = $filename;
        }
        $food->save();
        Toast::title('Позиция меню обновлена!');
        return redirect()->route('admin.food.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $food->delete();
        Toast::title('Позиция меню была удалена!');
        return redirect()->route('admin.food.index');
    }
}
