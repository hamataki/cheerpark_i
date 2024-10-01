<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Match') }}
        </h2>
        
        <div class="messageIcon">
          <a href="{{ route('users.index') }}" class="text-blue-500 hover:text-blue-700 mr-2">ユーザー一覧</a>
        </div>
        
    </x-slot>

<div class="matchingPage">
  <header class="header">
    <i class="fas fa-comments fa-3x"></i>

  </header>
  
  
  <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="matchingNum">{{ $match_users_count }}人とマッチしています</div>
    <h2 class="pageTitle">マッチした人一覧</h2>
  </div>
    
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
                @foreach( $matching_users as $user)
                  <div style="flex: 1 0 30%; margin: 10px; background: #f3f4f6; padding: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                   <div class="matchingPerson_name">{{ $user->name }}</div>
                                
                   <a href="{{ route('mypages.show', ['user' => $user->id]) }}" class="text-blue-500 hover:text-blue-700">詳細を見る</a>
                                
                                {{-- <form method="POST" action="{{ route('chat.show') }}">
                                @csrf
                                <input name="user_id" type="hidden" value="{{$user->id}}">
                                <button type="submit" class="chatForm_btn">チャットを開く</button>
                                </form> --}}
                  </div>
                @endforeach
              
          </div>
        </div>
      </div>
    </div>
  </div>
    
</x-app-layout>
