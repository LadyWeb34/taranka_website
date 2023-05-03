<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Партнеры') }}
            </h2>
            <Link href={{ route('partners.create') }} class="text-sm py-2 px-4 rounded-md font-medium text-indigo-100 hover:bg-violet-600 bg-violet-500">{{ __('Добавить запись') }}</Link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-table :for="$partners">
                @cell('image', $partner)
                    <img class="h-16" src="{{ Storage::url($partner->image) }}" alt="">
                @endcell
                @cell('action', $partner)
                <Link  class="ml-2 text-red-700 transition duration-150 ease-in-out hover:text-red-500 focus:text-red-600 active:text-red-500" confirm="Внимание! Изображение будет удалено" confirm-text="Вы хотите продолжить?" confirm-button="Да, удалить" cancel-button="Отмена" href="{{ route('partners.destroy', $partner->id) }}" method="DELETE">
                    {{ __('Удалить') }}
                 </Link>
                @endcell
            </x-splade-table>
        </div>
    </div>
</x-app-layout>
 