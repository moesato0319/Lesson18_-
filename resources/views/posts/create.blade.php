<x-app-layout>
    <div class="max-w-xl mx-auto py-6">
        <h2 class="text-xl font-bold text-blue-600 mb-4 border-l-4 border-blue-600 pl-2">
            新規投稿
        </h2>

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            <textarea name="content" rows="5"
                class="w-full border rounded p-3 mb-4"
                placeholder="投稿内容を入力">{{ old('content') }}</textarea>

            @error('content')
                <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
            @enderror

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                投稿する
            </button>
        </form>
    </div>
</x-app-layout>
