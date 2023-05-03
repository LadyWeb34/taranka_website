<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\QuestionStoreRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('question.index', [
            'questions' => SpladeTable::for(Question::class)
                ->column('question',label: 'Название вопроса',  canBeHidden:false, sortable:true)
                ->withGlobalSearch(columns: ['question'])
                ->column('description', label:'Текст вопроса')
                ->column('status', label:'Статус вопроса')
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
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionStoreRequest $request)
    {
        $question = new Question();
        $question->question = $request->input('question');
        $question->description = $request->input('description');
        $question->status = $request->input('status');
        $question->save();
        Toast::title('Новый вопрос был добавлен');
        return redirect()->route('question.index');
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
    public function edit(Question $question)
    {
        return view('question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionStoreRequest $request, Question $question)
    {
        $question->question = $request->input('question');
        $question->description = $request->input('description');
        $question->status = $request->input('status');
        $question->save();
        Toast::title('Вопрос обновлен!');
        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        Toast::success('Вопрос был удален!');
        return redirect()->back();
    }
}
