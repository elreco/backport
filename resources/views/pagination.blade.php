<div class="bp-pagination d-flex justify-content-between align-items-center">

    <div>
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
        <div class="bp-pagination-item "><span class="bp-pagination-link bp-previous border-right disabled">&laquo;</span></div>
        @else
        <div class="bp-pagination-item"><a class="bp-pagination-link bp-previous border-right" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></div>
        @endif
    </div>

    <div class="d-flex justify-content-center flex-wrap">
        <!-- Pagination Elements -->
        @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
        <span class="bp-pagination-item "><span class="bp-pagination-link disabled">{{ $element }}</span></span>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span class="bp-pagination-item"><span class="bp-pagination-link active">{{ $page }}</span></span>
        @else
        <span class="bp-pagination-item"><a class="bp-pagination-link" href="{{ $url }}">{{ $page }}</a></span>
        @endif
        @endforeach
        @endif
        @endforeach
    </div>

    <div>
        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
        <div class="bp-pagination-item"><a class="bp-pagination-link bp-next border-left" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></div>
        @else
        <div class="bp-pagination-item "><span class="bp-pagination-link bp-next border-left disabled">&raquo;</span></div>
        @endif
    </div>
</div>
