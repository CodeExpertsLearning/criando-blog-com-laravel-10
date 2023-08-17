<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Post') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- @error('title') {{$message}} @error --}}

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- input name _token value token-->
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Titulo</label>
                        <input type="text" class="w-full rounded" name="title" value="{{ $post->title }}">
                        @error('title')
                            <div class="mt-2 w-full rounded border border-red-700 bg-red-200 text-red-700 font-bold p-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Descrição</label>
                        <input type="text" class="w-full rounded" name="description"
                            value="{{ $post->description }}">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Conteúdo</label>
                        <input type="text" class="w-full rounded" name="body" value="{{ $post->body }}">
                        @error('body')
                            <div class="mt-2 w-full rounded border border-red-700 bg-red-200 text-red-700 font-bold p-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Status</label>
                        <div class="flex justify-start gap-3 text-white">
                            <div><input type="radio" class="" name="is_active" value="1"
                                    @if ($post->is_active) checked @endif> Ativo
                            </div>
                            <div><input type="radio" class="" name="is_active" value="0"
                                    @if (!$post->is_active) checked @endif> Inativo
                            </div>
                        </div>
                    </div>

                    <div class="w-full mb-6 bg-white p-2 flex">
                        <div class="w-1/2">

                            @if ($post->thumb)
                                <img src="{{ asset('storage/' . $post->thumb) }}"
                                    alt="Capa da Postagem: {{ $post->title }}">
                            @endif

                        </div>
                        <div class="w-1/2 flex items-center justify-center">
                            <label for="" class="block text-white mb-2 text-black">Capa Postagem</label>
                            <input type="file" class="w-full rounded" name="thumb">
                            @error('thumb')
                                <div
                                    class="mt-2 w-full rounded border border-red-700 bg-red-200 text-red-700 font-bold p-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full flex justify-end">
                        <button
                            class="mt-10 px-4 py-2 shadow rounded text-xl
                    text-white text-bold bg-green-700 hover:bg-green-900
                    transition ease-in-ou duration-300">Editar
                            Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
