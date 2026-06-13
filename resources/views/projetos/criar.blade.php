<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cadastrar Projeto</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('projetos.store') }}" method="POST" class="bg-white p-6 shadow rounded">
                @csrf
                <input type="text" name="titulo" placeholder="Título" class="block w-full border-gray-300 mb-4">
                <textarea name="descricao" placeholder="Descrição" class="block w-full border-gray-300 mb-4"></textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
            </form>
        </div>
    </div>
</x-app-layout>