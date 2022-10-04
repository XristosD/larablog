<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden grid md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-3 shadow-sm sm:rounded-lg">
        @foreach ($articles as $article)
         <div class="card bg-base-100 shadow-xl">
          <a href="#" class="card-body">
            <p class="text-sm">{{ $article->created_at->format('d M Y') }}</p>
            <h2 class="card-title">{{ $article->title }}</h2>
            <p>Author {{ $article->user->name }}</p>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
