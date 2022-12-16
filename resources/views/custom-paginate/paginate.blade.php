@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="inline-flex">
            @if ($paginator->onFirstPage())
                <button class="h-10 px-5 text-indigo-300 transition-colors duration-150 bg-white rounded-l-lg" disabled>Prev</button>
            @else
                <button class="h-10 px-5 text-indigo-600 transition-colors duration-150 bg-white rounded-l-lg focus:shadow-outline hover:bg-indigo-100"  wire:click="previousPage" wire:loading.attr="disabled" rel="prev" >Prev</button>
            @endif

                

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><button class="h-10 px-5 text-white transition-colors duration-150 bg-[#f6941c] focus:shadow-outline" wire:click='gotoPage({{ $page }})'>{{ $page }}</button></li>
                        @else
                            <li><button class="h-10 px-5 text-indigo-600 transition-colors duration-150 bg-white focus:shadow-outline hover:bg-indigo-100" wire:click='gotoPage({{ $page }})'>{{ $page }}</button></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <button class="h-10 px-5 text-indigo-600 transition-colors duration-150 bg-white rounded-r-lg focus:shadow-outline hover:bg-indigo-100" wire:click='nextPage'>Next</button>
            @else
                <button class="h-10 px-5 text-indigo-300 transition-colors duration-150 bg-white rounded-r-lg" disabled>Next</button>
            @endif

        </ul>
    </nav>
@endif
{{-- <button class="btn btn-success ml-1">3</button>
<button class="btn btn-success ml-1">4</button> --}}