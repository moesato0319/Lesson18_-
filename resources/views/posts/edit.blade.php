<x-app-layout>
    <div class="max-w-xl mx-auto">
        <h2 class="text-xl font-bold mb-4 text-blue-600">投稿編集</h2>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            <textarea name="content" class="w-full border p-2 rounded mb-4" rows="5">{{ old('content', $post->content) }}</textarea>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">更新</button>
        </form>
    </div>
</x-app-layout>
