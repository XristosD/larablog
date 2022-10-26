<x-app-layout>
  <x-slot name="header">
    {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2> --}}
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div id="tagContainer" class="overflow-hidden px-1 md:px-5 md:py-10">
        <div class="flex items-center gap-2">
          <div class="text-lg">You see articles written by </div><h2 class="text-3xl ">{{$author->name}}</h2>
        </div>
        <div class="overflow-hidden grid md:grid-cols-2 lg:grid-cols-3 gap-y-4 md:gap-x-4 md:gap-y-6 px-1 md:px-5 md:py-10">
          @foreach ($articles as $article)
            <x-article-card :article="$article"/>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-app-layout>