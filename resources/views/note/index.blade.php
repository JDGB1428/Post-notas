@extends('layouts.app')

@section('title')
Pagina principal
@endsection

@section('content')
    <div class="flex flex-row flex-wrap gap-11">
        @foreach ($notes as $note )
            <div class="max-w-sm p-6 mt-20 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $note->titulo }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $note->descripcion }}</p>
                <form method="POST" action="{{ route('destroy.nota', $note) }}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Eliminar" class="px-2 py-2 text-white bg-red-700 rounded-lg cursor-pointer">
                </form>
            </div>
        @endforeach
    </div>

    <a data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="transition-all cursor-pointer hover:border-b-4 hover:border-blue-700"> Agregar nota</a>
    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Crear notas
                    </h3>
                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="{{ route('store.nota') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="titulo" class="block">Titulo</label>
                            <input type="text" name="titulo" id="titulo" class="block w-full rounded-lg">
                        </div>
                        <div class="mb-5">
                            <label for="descripcion" class="block">Descripcion</label>
                            <textarea class="block w-full rounded-lg" id="descripcion" name="descripcion" placeholder=" Escribe aqui"></textarea>
                        </div>
                        <input data-modal-hide="defaultModal" type="submit" value="Agregar" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
