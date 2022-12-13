@if ($is_saved)
    <div class="font-bold text-[20px] text-[gray] tracking-[3px]" wire:key="drop-{{$author_id}}">
        <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal_{{$author_id}}__{{Auth::user()->id}}" class="inline-flex items-center px-1 text-sm font-sm text-center rounded-md hover:bg-gray-100 focus:ring-1 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-[#f6941c] dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
        </button>

        <div id="dropdownDotsHorizontal_{{$author_id}}__{{Auth::user()->id}}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-white-700">
            
            <ul class="py-1 text-sm text-[#f6941c] dark:text-dark-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                <li>
                    <a wire:click="unsave" class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-grey-600 dark:hover:text-dark hover:cursor-pointer">Unsave</a>
                </li>
                @if (Auth::user()->id == $author_id)
                    <li>
                        <a class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Edit</a>
                    </li>
                @endif
                <li>
                    <a class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Report</a>
                    
                </li>
                
            </ul>
        </div>
    </div>
    @else
    <div class="font-bold text-[20px] text-[gray] tracking-[3px]">
        <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal_{{$author_id}}__{{Auth::user()->id}}" class="inline-flex items-center px-1 text-sm font-sm text-center rounded-md hover:bg-gray-100 focus:ring-1 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-[#f6941c] dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
        </button>

        <div id="dropdownDotsHorizontal_{{$author_id}}__{{Auth::user()->id}}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-white-700">
            <ul class="py-1 text-sm text-[#f6941c] dark:text-dark-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                <li>
                    <a wire:click="save" class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-grey-600 dark:hover:text-dark hover:cursor-pointer">Save</a>
                </li>
                @if (Auth::user()->id == $author_id)
                    <li>
                        <a class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Edit</a>
                    </li>
                @endif
                <li>
                    <a  class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Report</a>
                    
                </li>
                
            </ul>
        </div>
    </div>
@endif 