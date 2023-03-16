@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="tw-text-center">
    <div class="tw-btn-group lg:tw-hidden">
        @if ($paginator->onFirstPage())
        <span class="tw-btn tw-btn-disabled">
            {!! __('pagination.previous') !!}
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="tw-btn">
            {!! __('pagination.previous') !!}
        </a>
        @endif

        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="tw-btn">
            {!! __('pagination.next') !!}
        </a>
        @else
        <span class="tw-btn tw-btn-disabled">
            {!! __('pagination.next') !!}
        </span>
        @endif
    </div>
    <div class="tw-btn-group tw-hidden lg:tw-inline-flex">
        @if ($paginator->onFirstPage())
        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}" class="tw-btn tw-btn-disabled" aria-hidden="true">
            <svg class="tw-w-5 tw-h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="tw-btn" aria-label="{{ __('pagination.previous') }}">
            <svg class="tw-w-5 tw-h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </a>
        @endif
        @foreach ($elements as $element)
        @if (is_string($element))
        <span aria-disabled="true" class="tw-btn tw-btn-disabled">{{ $element }}</span>
        @endif
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span aria-current="page" class="tw-btn tw-btn-disabled">{{ $page }}</span>
        @else
        <a href="{{ $url }}" class="tw-btn" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="tw-btn" aria-label="{{ __('pagination.next') }}">
            <svg class="tw-w-5 tw-h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
        </a>
        @else
        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}" class="tw-btn tw-btn-disabled" aria-hidden="true">
            <svg class="tw-w-5 tw-h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
        </span>
        @endif
    </div>
</nav>
@endif