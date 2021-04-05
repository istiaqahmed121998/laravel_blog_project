<div class="card card-custom">
    <div class="card-body py-7">
        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap mr-3">
                @if ($paginator->onFirstPage())
                @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                </a>
                @endif
                @foreach ($elements as $element)
                @if (is_string($element))
                    <a class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">{{ $element }}</a>
                @endif
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">{{ $page }}</a>
                @else
                <a href="{{ $url }}" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">{{ $page }}</a>
                @endif
                @endforeach
                @endif
                @endforeach
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                    <i class="ki ki-bold-arrow-next icon-xs"></i>
                </a>
                @else
                @endif
            </div>
        </div>
        <!--end:: Pagination-->
    </div>
</div>