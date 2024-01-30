<div class="join grid grid-cols-2">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination" class="pagination">
            {{-- Previous Page Link --}}
            <button class="join-item btn btn-outline">
                @if ($paginator->onFirstPage())
                    <span class="pagination__link pagination__link--disabled">Previous</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination__link">Previous</a>
                @endif
            </button>

            {{-- Next Page Link --}}
            <button class="join-item btn btn-outline">
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination__link">Next</a>
                @else
                    <span class="pagination__link pagination__link--disabled">Next</span>
                @endif
            </button>
        </nav>
    @endif
</div>
