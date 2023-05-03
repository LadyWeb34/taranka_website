<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Изменить категорию') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-form method="put" :default="$category" :action="route('admin.category.update', $category->id )" class="max-w-md mx-auto p-4 bg-white rounded-md"> 
                <x-splade-input name="name" :label="__('Введите название категории')" />
                <x-splade-file name="image" :label="__('Изображение')" />
                <img class="h-16 mt-2" src="{{ Storage::url($category->image) }}" alt="">
                <x-splade-submit class="mt-4" :label="__('Сохранить')"/>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
