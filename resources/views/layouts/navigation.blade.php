<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- ナビゲーション -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- 左側 -->
            <div class="flex">
                <!-- ロゴ -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('posts.index') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- ナビリンク -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link
                        :href="route('posts.index')"
                        :active="request()->routeIs('posts.*')">
                        投稿一覧
                    </x-nav-link>

                    <x-nav-link
                        :href="route('posts.create')"
                        :active="request()->routeIs('posts.create')">
                        新規投稿
                    </x-nav-link>
                </div>
            </div>

            <!-- 右側（ユーザー・ログアウト） -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <span class="text-sm text-gray-600 mr-4">
                    {{ Auth::user()->name }}
                </span>

                <!-- ログアウト -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-sm text-gray-600 hover:text-blue-600">
                        ログアウト
                    </button>
                </form>
            </div>

            <!-- ハンバーガー -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                              class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- モバイル -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link
                :href="route('posts.index')"
                :active="request()->routeIs('posts.*')">
                投稿一覧
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('posts.create')"
                :active="request()->routeIs('posts.create')">
                新規投稿
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}
                </div>
                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        ログアウト
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
