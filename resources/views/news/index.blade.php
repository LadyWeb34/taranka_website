<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Новости') }}
            </h2>
            <Link href={{ route('news.create') }} class="text-sm py-2 px-4 rounded-md font-medium text-indigo-100 hover:bg-violet-600 bg-violet-500">Создать новость</Link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-splade-table :for="$news">
                @cell('image', $new)
                    <img class="h-16" src="{{ Storage::url($new->image) }}" alt="">
                @endcell
                @cell('status', $question)
                    @if($question->status == 'true')
                        <span class="text-blue-500 font-semibod">Активен</span>
                    @else
                        <span class="text-red-500 font-semibod">Скрыт</span>
                    @endif
                @endcell
                @cell('action', $new)
                    <Link href="{{ route('news.edit', $new->id) }}" class="ml-2 inline-flex items text-green-600 font-medium hover:text-green-800">{{ __('Изменить ') }}</Link>
                    <Link  class="ml-2 text-red-700 transition duration-150 ease-in-out hover:text-red-500 focus:text-red-600 active:text-red-500" confirm="Внимание! Запись будет удалена" confirm-text="Вы хотите продолжить?" confirm-button="Да, удалить" cancel-button="Отмена" href="{{ route('news.destroy', $new->id) }}" method="DELETE">
                       {{ __('Удалить') }}
                    </Link>
                @endcell
            </x-splade-table>
        </div>
    </div>
</x-app-layout>
