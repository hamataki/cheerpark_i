<!-- resources/views/tweets/edit.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Monologue編集') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <a href="{{ route('tweets.show', $tweet) }}" class="text-blue-500 hover:text-blue-700 mr-2">詳細に戻る</a>
          <form method="POST" action="{{ route('tweets.update', $tweet) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
              <label for="tweet" class="block text-gray-700 text-sm font-bold mb-2">Edit Monologue</label>
              <textarea type="text" name="tweet" id="tweet" class="shadow appearance-none border rounded w-4/5 text-sm py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="4">{{ $tweet->tweet }}</textarea>
              @error('tweet')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
              @enderror
            </div>
            <button type="submit" class="bg-sky-500 hover:bg-sky-950 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>