<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form action="{{ route('message.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <x-jet-label>Asunto</x-jet-label>
                        <x-jet-input type="text" class="w-full" placeholder="Ingrese el asunto" name="subject" value="{{old('subject')}}" />
                        <x-jet-input-error for="subject" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label>Mensaje</x-jet-label>
                        <textarea
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            name="body" placeholder="Ingrese su mensaje" rows="4">{{old('body')}}</textarea>
                            <x-jet-input-error for="body" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label>Mensaje</x-jet-label>
                        <select name="to_user_id"
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            id="">
                            <option value="" {{old('to_user_id') ? '' : 'selected' }} disabled>Seleccione un usuario</option>
                            @foreach ($users as $user)
                                <option {{old('to_user_id') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="to_user_id" />
                    </div>

                    <x-jet-button>Enviar</x-jet-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
