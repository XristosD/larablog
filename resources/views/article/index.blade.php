<x-app-layout>
  <x-slot name="header">
    {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2> --}}
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden grid md:grid-cols-2 lg:grid-cols-3 gap-y-4 md:gap-x-4 md:gap-y-6 px-1 md:px-5 md:py-10">
        @foreach ($articles as $article)
         <div class="card bg-base-100 shadow-xl">
            <a href='{{route('article.show', ['article' => $article])}}' class="block">
              <figure><img src="{{asset($article->image->path)}}" alt="{{$article->author->name}}" /></figure>
              <div class="card-body">
                <p class="text-sm">{{ $article->created_at->format('d M Y') }}</p>
                <h2 class="card-title">{{ $article->title }}</h2>
                <p>Author {{ $article->author->name }}</p>
                <div class="card-actions">
                  @foreach ($article->tags as $tag)
                    <div class="badge badge-outline">#{{$tag->title}}</div> 
                  @endforeach
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
      <div class="overflow-hidden px-1 md:px-5 py-2">
        {{$articles->onEachSide(2)->links()}}
      </div>
    </div>
  </div>
</x-app-layout>
