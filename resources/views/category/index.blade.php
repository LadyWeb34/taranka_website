<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Категории меню') }}
            </h2>
            <Link href={{ route('admin.category.create') }} class="text-sm py-2 px-4 rounded-md font-medium text-indigo-100 hover:bg-violet-600 bg-violet-500">Новая категория</Link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-table :for="$categories">
                @cell('action', $category)
                    <Link href="{{ route('admin.category.edit', $category->id) }}" class="inline-flex items text-green-600 font-medium hover:text-green-800">{{ __('Изменить ') }}</Link>
                    <Link  class="ml-2 text-red-700 transition duration-150 ease-in-out hover:text-red-500 focus:text-red-600 active:text-red-500" confirm="Внимание! Запись будет удалена" confirm-text="Вы хотите продолжить?" confirm-button="Да, удалить" cancel-button="Отмена" href="{{ route('admin.category.destroy', $category->id) }}">
                       {{ __('Удалить') }}
                    </Link>
                @endcell
                @cell('image', $category)
                    <img class="h-16" src="{{ Storage::url($category->image) }}" alt="">
                @endcell
            </x-splade-table>
        </div>
    </div>
</x-app-layout>
