<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ユーザー一覧') }}
        </h2>
        
        <div class="messageIcon">

            <a href="{{ route('users.matching') }}" class="text-blue-500 hover:text-blue-700 mr-2">Match</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
                        @foreach ($users as $user)
                             <div style="flex: 1 0 30%; margin: 10px; background: #f3f4f6; padding: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                <p>{{ $user->name }}</p>
                                
                                <a href="{{ route('mypages.show', ['user' => $user->id]) }}" class="text-blue-500 hover:text-blue-700">詳細を見る</a>
                                
                                <div class="flex text-center">
                                <!-- Like/Dislikeボタンは自分自身のユーザーではない場合のみ表示 -->
                                @if ($user->id !== auth()->user()->id)
                                
                                    <!-- Likeボタン -->
                                    <div class="">
                                    <form method="POST" action="{{ route('reaction.create') }}">
                                        @csrf
                                        <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="from_user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="reaction" value="like">
                                        <button type="submit" class="bg-sky-500 hover:bg-sky-400 text-white font-bold px-4 rounded">相談する</button>
                                    </form>
                                    </div>
                                    
                                    <!-- Dislikeボタン -->
                                    <div class="px-2">
                                    <form method="POST" action="{{ route('reaction.create') }}">
                                        @csrf
                                        <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="from_user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="reaction" value="dislike">
                                        <button type="submit" class="px-4 rounded">キャンセル</button>
                                    </form>
                                    </div>
                                
                                @endif
                                </div>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <style>

        @media (min-width: 769px) and (max-width: 1024px) {
            .user-card {
                flex: 1 0 45%; /* 2列 */
            }
        }
    </style>


</x-app-layout>





