<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 border-l-4 border-blue-600 pl-2">ログイン</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- ユーザー名（email） -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">ユーザー名</label>
                    <input id="email" type="email" name="email" required autofocus
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        value="{{ old('email') }}" />
                </div>

                <!-- パスワード -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">パスワード</label>
                    <input id="password" type="password" name="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                </div>

                <!-- ログインボタン -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        ログイン
                    </button>
                </div>

                <!--新規登録リンク-->
            <div class="mt-4 text-center">
                @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:underline">新規登録はこちら</a>
             @endif
            </div>
            </form>
        </div>
    </div>
</x-guest-layout>
