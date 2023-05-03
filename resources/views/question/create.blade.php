<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добавить новый вопрос') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-form :action="route('question.store')" class="max-w-md mx-auto p-4 bg-white rounded-md"> 
                <x-splade-input name="question" :label="__('Введите текст вопроса')" />
                <x-splade-textarea name="description" :label="__('Введите ответ на вопрос')" autosize />
                <x-splade-select name="status" :label="__('Отображать вопрос')">
                    <option value="false">Не отображать</option>
                    <option value="true">Отображать</option>
                 </x-splade-select>
                <x-splade-submit class="mt-4" :label="__('Сохранить')"/>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
