<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактировать новость') }} - {{ $news->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[980px] mx-auto sm:px-6 lg:px-8">
            <x-splade-form :action="route('news.update', $news->id)" :default="$news" method="PUT" class="max-w-full mx-auto p-4 bg-white rounded-md"> 
                <x-splade-input name="name" :label="__('Введите название категории')" />
                <x-splade-input name="slug" :label="__('URL - ссылка')" />
                <x-splade-textarea name="content" :label="__('Введите содержание поста')" autosize />
                <img class="h-16 mt-2" src="{{ Storage::url($news->image) }}" alt="">
                <x-splade-file name="image" :label="__('Изображение')" />
                <x-splade-select name="status" :label="__('Отображать новость')">
                    <option value="false">Не отображать</option>
                    <option value="true">Отображать</option>
                 </x-splade-select>
                <x-splade-submit class="mt-4" :label="__('Сохранить')"/>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
