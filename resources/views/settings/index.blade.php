<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Настройки сайта') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-splade-form :action="route('settings.update', $setting->id)" method="put" :default="$setting"  class="max-w-full mx-auto p-4 bg-white rounded-md"> 
                    <x-splade-input name="phone" :label="__('Номер телефона')"/>
                    <x-splade-input name="time" :label="__('Время работы')"/>
                    <x-splade-input name="adress" :label="__('Адрес')"/>
                    <x-splade-textarea name="about" :label="__('Информация о баре')" autosize />
                    <x-splade-file name="main_image" :label="__('Изображение')" />
                    <img class="w-full min-h-22 object-cover mt-2" src="{{ Storage::url($setting->main_image) }}" alt="">
                <x-splade-submit class="mt-4" :label="__('Обновить')"/>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
