@if ($paginator->hasPages())
  <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="mt-2">
    <div class="flex justify-center btn-group sm:hidden">
      @if ($paginator->onFirstPage())
        <span class="btn w-32 btn-disabled">
          {!! __('pagination.previous') !!}
        </span>
      @else
        <a href="{{ $paginator->previousPageUrl() }}" class="btn w-32 btn-active">
          {!! __('pagination.previous') !!}
        </a>
      @endif

        <span class="btn w-32 btn-active">
          {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
        </span>

      @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="btn w-32 btn-active">
          {!! __('pagination.next') !!}
        </a>
      @else
        <span class="btn w-32 btn-disabled">
          {!! __('pagination.next') !!}
        </span>
      @endif
    </div>

    <div class="hidden sm:flex-1 sm:flex sm:justify-between sm:items-center">
      <div>
        {{-- <p class="text-sm text-gray-700 leading-5">
          {!! __('Showing') !!}
          @if ($paginator->firstItem())
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
          @else
            {{ $paginator->count() }}
          @endif
          {!! __('of') !!}
          <span class="font-medium">{{ $paginator->total() }}</span>
          {!! __('results') !!}
        </p> --}}
      </div>

      <div class="btn-group flex">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <button aria-disabled="true" class="btn btn-sm btn-disabled" aria-label="{{ __('pagination.previous') }}">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </button>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-sm" aria-label="{{ __('pagination.previous') }}">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span aria-disabled="true" class="btn btn-sm">
              {{ $element }}
            </span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <span class="btn btn-sm btn-active" aria-current="page">{{ $page }}</span>
            @else
              <a href="{{ $url }}" class="btn btn-sm" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
            @endif
            @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-sm aria-label="{{ __('pagination.next') }}">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
        </a>
        @else
        <span class="btn btn-sm btn-disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
            <span  aria-hidden="true">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            </span>
        </span>
        @endif
      </div>
    </div>
  </nav>
@endif
