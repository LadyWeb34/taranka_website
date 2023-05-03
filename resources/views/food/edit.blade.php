<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Изменить позицию') }} - {{ $food->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-form method="PUT" :action="route('admin.food.update', $food->id)" :default="$food" class="max-w-md mx-auto p-4 bg-white rounded-md"> 
                <x-splade-select name="category_id" :label="__('Выберите категорию')" :options="$categories" />
                <x-splade-input name="name" :label="__('Введите название блюда')" />
                <x-splade-input name="price" :label="__('Укажите цену')" />
                <x-splade-file name="image" :label="__('Изображение')" />
                <img class="h-16 mt-2" src="{{ Storage::url($food->image) }}" alt="">
                <x-splade-submit class="mt-4" :label="__('Сохранить')"/>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
