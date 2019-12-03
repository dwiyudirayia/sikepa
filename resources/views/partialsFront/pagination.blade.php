@if ($paginator->hasPages())
    <nav class="pagination-nav text-center">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="next disabled"><a><i class="mdi mdi-arrow-left"></i></a></li>
            @else
                <li class="next"><a href="{{ $paginator->previousPageUrl() }}"><i class="mdi mdi-arrow-left"></i></a></li>
            @endif
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><a href="#!" >{{ $page }}</a></li>
                        @else
                            <li aria-current="page"><a href="{{ $url }}" >{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="next"><a href="{{ $paginator->nextPageUrl() }}"><i class="mdi mdi-arrow-right"></i></a></li>
            @else
                <li class="next disabled"><a href="{{ $paginator->nextPageUrl() }}"><i class="mdi mdi-arrow-right"></i></a></li>
            @endif
        </ul>
    </nav>
@endif
