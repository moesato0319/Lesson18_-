<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <h1 class="text-xl text-blue-600 font-bold mb-4">投稿一覧</h1>

        <!--投稿を検索-->
        <form method="GET" action="{{ route('posts.index') }}" class="mb-4">
            <input type="text" name="keyword" placeholder="投稿を検索" value="{{ $keyword ?? '' }}"
                class="border rounded p-2 w-2/3">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">検索</button>
        </form>

        <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded inline-block mb-4">新規投稿</a>

        @foreach ($posts as $post)
            <div class="bg-white p-4 mb-2 border border-blue-400 rounded">
                <p class="text-sm text-gray-600">{{ $post->user->name ?? '（退会ユーザー）' }}｜{{ $post->created_at->format('Y-m-d H:i') }}</p>
                <p class="text-lg">{{ $post->content }}</p>

                @if ($post->user_id === auth()->id())
                    <div class="mt-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500">編集</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-500 ml-2" onclick="return confirm('削除しますか？')">削除</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
</x-app-layout>
