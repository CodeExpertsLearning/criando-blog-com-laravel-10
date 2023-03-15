<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Post') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{ route('admin.posts.store') }}" method="post">
                    @csrf
                    <!-- input name _token value token-->
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Titulo</label>
                        <input type="text" class="w-full rounded" name="title">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Descrição</label>
                        <input type="text" class="w-full rounded" name="description">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Conteúdo</label>
                        <input type="text" class="w-full rounded" name="body">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Status</label>
                        <div class="flex justify-start gap-3 text-white">
                            <div><input type="radio" class="" name="is_active" value="1" checked> Ativo
                            </div>
                            <div><input type="radio" class="" name="is_active" value="0"> Inativo
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex justify-end">
                        <button
                            class="mt-10 px-4 py-2 shadow rounded text-xl
                    text-white text-bold bg-green-700 hover:bg-green-900
                    transition ease-in-ou duration-300">Criar
                            Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
