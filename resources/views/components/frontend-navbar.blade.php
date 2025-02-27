<nav class="py-1 bg-[#0b1b63] text-white mt-1 mb-4 pl-8 sticky top-0">
    <div class="container">
        <div class="md:hidden">
            <button class="" type="button" data-drawer-target="drawer-left-example"
                data-drawer-show="drawer-left-example" data-drawer-placement="left" aria-controls="drawer-left-example">
                <i class="fas fa-align-justify text-2xl"></i>
            </button>
        </div>
    </div>
    <ul class="gap-6 hidden md:flex text-2xl">
        <li>
            <a href="{{ route('home') }}" class="gap-6 font-semibold text-[#fb1b05] hover:text-[#fb1b05] hover:font-bold hover:no-underline">गृहपृष्ठ</a>
        </li>
        @php
            $f_categories = $categories->take(8);
            $l_categories = $categories->skip(8);
        @endphp
        @foreach ($f_categories as $category)
            <li>
                <a href="{{route('category',$category->slug)}}"
                    class="hover:font-bold item-center hover:text-[#fb1b05] hover:no-underline">{{ $category->nepali_title }}</a>
            </li>
        @endforeach
        @if (count($l_categories) > 0)
            <button class="hover:font-bold hover:text-[#fb1b05] hover:no-underline" id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button">थप<svg
                    class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-[#0b1b63] text-white divide-y
                divide-gray-100 rounded-lg shadow w-30">
                <ul class="py-2 mx-6 text-m" aria-labelledby="dropdownDefaultButton">
                    @foreach ($l_categories as $category)
                        <li>
                            <a href=""
                                class="hover:text-[#fb1b05] hover:no-underline hover:font-bold">{{ $category->nepali_title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

        @endif
    </ul>
    </div>
</nav>
<div id="drawer-left-example"
    class="fixed top-0 left-0 z-40 p-4 overflow-y-auto
     transition-transform -translate-x-full bg- bg-[#0b1b63] font-2xl text-white w-30"
    tabindex="-1" aria-labelledby="drawer-left-label">
    <h5 class="text-3xl mb-4 justify-center ">Menu</h5>
    <button type="button" data-drawer-hide="drawer-left-example" aria-controls="drawer-left-example"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-4 h-4
        absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Menu</span>
    </button>
    <ul class="space-y-4font-semibold">
        <li>
            <a href="{{ route('home') }}" class="gap-6 text-pink-600 hover:text-pink-600 font-semibold">Home</a>
        </li>
        @foreach ($f_categories as $category)
            <li>
                <a href=""
                    class="item-center hover:text-pink-600 hower:no-underline">{{ $category->nepali_title }}</a>
            </li>
        @endforeach
    </ul>
</div>
