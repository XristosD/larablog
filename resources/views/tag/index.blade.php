<x-app-layout>
  <x-slot name="header">
    {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2> --}}
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div id="tagcontainer" class="overflow-hidden flex flex-col px-1 md:px-5 md:py-10">
        @foreach ( $tags as $tag )
          <div>{{$tag->title}}</div>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>