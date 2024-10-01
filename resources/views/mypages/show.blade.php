<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            @isset($user)
            <p class="font-semibold p-1 text-xl text-gray-800 leading-tight">{{ $user->name }}{{ __(" s' page") }}</p>
            <p class="font-semibold p-1 text-xl text-gray-800 leading-tight">{{ $user->country }}</p>
            @endisset
            
            
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          @foreach ($tweets as $tweet)
          <div class="mb-4 p-4 bg-gray-100 rounded-lg">
            <p class="text-gray-800">{{ $tweet->tweet }}</p>
            <p class="text-gray-600 text-sm">投稿者: {{ $tweet->user->name }}</p>
            <a href="{{ route('tweets.show', $tweet) }}" class="text-blue-500 hover:text-blue-700">詳細を見る</a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
    
  </div>
</div>
</x-app-layout>