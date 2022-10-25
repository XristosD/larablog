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
            {{$article->created_at->format('d M Y')}}, by <a href="/authors/{{$article->author->id}}">{{$article->author->name}}</a>
          </span>
        </div>
        <div class="pb-3 overflow-hidden">
          <img class="rounded-lg" src="{{asset($article->image->path)}}" alt="{{$article->author->name}}" />
        </div>
        <div class="flex gap-1 pb-9">
          @foreach ($article->tags as $tag)
            <a href="/tags/{{$tag->id}}" class="btn btn-outline btn-sm btn-ghost">#{{$tag->title}}</a>
          @endforeach
        </div>
        <div class="text-xl max-w-[75ch] text-base-content">
          {{$article->body}}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>