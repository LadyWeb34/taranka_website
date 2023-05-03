<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создание новой новости') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[980px] mx-auto sm:px-6 lg:px-8">
            <x-splade-form :action="route('news.store')" class="max-w-full mx-auto p-4 bg-white rounded-md"> 
                <x-splade-input id="title-input" name="name" :label="__('Введите название новости')" />
                <x-splade-textarea name="content" :label="__('Введите содержание поста')" autosize />
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
