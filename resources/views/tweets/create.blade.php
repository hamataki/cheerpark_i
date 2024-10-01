<!-- resources/views/tweets/create.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Monologue作成') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <form method="POST" action="{{ route('tweets.store') }}">
            @csrf
            <div class="mb-4">
              <label for="tweet" class="block text-gray-700 text-sm font-bold mb-2">Monologue</label>
              <textarea name="tweet" id="tweet" class="shadow appearance-none border rounded w-4/5 text-sm py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="4"></textarea>
              @error('tweet')
              <span class="text-red-500 text-xs italic">{{ $message }}</span>
              @enderror
            </div>
            <button type="submit" class="bg-sky-500 hover:bg-sky-950 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Post</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

