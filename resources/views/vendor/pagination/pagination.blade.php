<div class="pagination">
    <ul>
        @if ($paginator->onFirstPage())
        @else
        <li>
            <a class="previous" rel="prev" href="{{ $paginator->previousPageUrl() }}">
                < </a>
        </li>
        @endif
        @foreach ($elements as $element)
        @if (is_string($element))
        <li>
            <a class="previous">
                {{ $element }}</a>
        </li>
        @endif
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active"><a href="javascript:void(0)">{{ $page }}</a></li>
        @else
        <li class="pagination__page-number"><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <li><a class="next" href="{{ $paginator->nextPageUrl() }}">&gt;</a></li>
        @else
        @endif
    </ul>
</div>