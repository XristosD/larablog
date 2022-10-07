<x-app-layout>
  <x-slot name="header">
    <h2 class="max-w-5xl mx-auto font-semibold py-5 text-3xl sm:text-5xl text-center leading-tight">
      {{ $article->title }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden shadow-sm sm:rounded-lg">
        <div class="py-1">
          <span class="font-bold text-md">
            {{$article->created_at->format('d M Y')}}, by {{$article->author->name}}
          </span>
        </div>
        <div class="text-xl max-w-prose text-base-content">
          {{$article->body}}
        </div>
        
        

      </div>
    </div>
  </div>
</x-app-layout>