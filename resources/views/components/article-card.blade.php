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