<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryStoreRequest;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('gallery.index', [
            'galleries' => SpladeTable::for(Gallery::class)
                ->column('image', label:'Изображение')
                ->column('image_alt', label:'Подпись')
                ->column('action', label:'Действие', canBeHidden:false)
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryStoreRequest $request)
    {
        $gallery = new Gallery();
        $gallery->image_alt = $request->input('image_alt');
        $gallery->image = $request->file('image')->store('public/gallery');
        $gallery->save();
        Toast::title('Изображение было успешно добавлено!');
        return redirect()->route('gallery.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        Toast::title('Изображение было удалено');
        return redirect()->route('gallery.index');
    }
}
