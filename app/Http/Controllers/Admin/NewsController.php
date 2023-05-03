<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\NewsStoreRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('news.index', [
            'news' => SpladeTable::for(News::class)
                ->column('name',label: 'Название',  canBeHidden:false, sortable:true)
                ->withGlobalSearch(columns: ['name'])
                ->column('slug', label:'URL')
                ->column('image', label:'Изображение')
                ->column('status', label:'Отображение')
                ->column('action', label:'Действие', canBeHidden:false)
                ->selectFilter(key: 'status', label: 'Статус', options: [
                    'false' => 'Не активные',
                    'true' => 'Активные',
                ])
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsStoreRequest $request)
    {
        $news = new News();
        $news->name = $request->input('name');
        $news->content = $request->input('content');
        $news->status = $request->input('status');
        $news->slug = Str::slug($request->input('name'));
        $news->image = $request->file('image')->store('public/news');
        $news->save();
        Toast::title('Новый вопрос был добавлен');
        return redirect()->route('news.index');
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
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsStoreRequest $request, News $news)
    {
        $news->name = $request->input('name');
        $news->slug = Str::slug($request->input('name'));
        $news->status = $request->input('status');
        $news->content = $request->input('content');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->storeAs('public', $filename);
            $news->image = $filename;
        }
        $news->save();
        Toast::title('Новость обновлена!');
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        Toast::title('Новость была удалена!');
        return redirect()->route('news.index');
    }
}
