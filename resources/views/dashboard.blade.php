<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HOME') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ここは海外挑戦の情報不足を実際に行ってる選手に直接相談することで解決するマッチングサイトです。") }}
                </div>
                <div class="p-6 text-gray-900">
                {{ __("選手は海外生活や自分の思い、試合結果などの投稿をお願いします。") }}
                </div>
                <div class="p-6 text-gray-900">
                    {{ __("学生はサッカーノートとして投稿してみてください。") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

