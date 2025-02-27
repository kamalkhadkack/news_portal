<x-frontend-layout>
    <section class="py1">
        <div class="container m-auto">
            @foreach ($latest_posts as $latest_posts)
                <a href="{{ route('news', $latest_posts->id) }}">
                    <div class="text-center my-2">
                        <h1 class="text-center font-semibold md:text-5xl font-semibold mt-2 mb-2">
                            {{ $latest_posts->title }}</h1>
                        <div class="text-medium t-2 "><i class="fa-regular fa-clock"></i>
                            {{ $latest_posts->created_at->diffForHumans() }}
                            <img src="{{ $latest_posts->image }}" width="100%" alt=" {{ $latest_posts->title }}">
                        </div>
                        <div class=" text-[22px]">
                            {!! Str::words($latest_posts->description, 25, '...') !!}
                        </div>
                    </div>
                </a>
            @endforeach
            <img class="h-[5px] md:h-[10px] lg:h-[12px] w-full font- bold" src="/images/line.JPG" alt="line">
        </div>
    </section>
    <section>
        <div class="container grid md:grid-cols-12 gap-5">
            <div class="md:col-span-8 w-[100%] border ">
                <div class="md:text-3xl font-bold text-[#c406c1] text-center" style="font-family: 'Arial', sans-serif;">
                    समाचारहरू<img class="h-[5px] md:h-[10px] lg:h-[12px] w-full font- bold" src="/images/line.JPG"
                        alt="line"></div>
                <div class="grid md:grid-cols-12 gap-3">
                    @foreach ($recentNews as $recentnews)
                        <div class="md:col-span-4  space-y-4 text-center">
                            <a href="{{ route('news', $recentnews->id) }}">
                                <img src="{{ asset($recentnews->image) }}" class=""
                                    alt="{{ $recentnews->title }}">
                                <small><i class="bg-[#fae820] text-[#0317fc]"></i>
                                    {{ nepalidate($recentnews->created_at) }}
                                </small>
                                <h1
                                    class="hover:font-bold hover:text-[#c406c1] hover:no-underline text-3xl text-center font-semibold md:text-2xl font-semibold mt-2 mb-2">
                                    {{ $recentnews->title }}
                                </h1>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="md:col-span-4 border space-y-4">
                <h1 class="bg-[#e2e3ff] px-3 py-1 text-4xl font-bold mt-4 border-l-4 border-[#4000ff]">ट्रेन्डिङ
                </h1>
                @foreach ($trending_posts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="container border py-10 space-y-5">
            @foreach ($categories as $category)
                @if (count($category->posts) - 0)
                    <div class="container mx-auto">
                        <div class="">
                            <img class="h-[5px] md:h-[10px] lg:h-[12px] w-full font- bold" src="/images/line.JPG"
                                alt="line">

                            <h1 class="text_primary text-3xl font-semibold">{{ $category->nepali_title }}</h1>
                            <img class="h-[5px] md:h-[10px] lg:h-[12px]" src="\images\redline.png" alt="line">
                        </div>
                        <div class="grid md:grid-cols-3 lg:grid-cols-3 gap-4">
                            <div>
                                @foreach ($category->posts as $postFirst => $post)
                                    @if ($postFirst <= 2)
                                        @if ($postFirst == 0)
                                            <a href="{{ route('news', $post->id) }}">
                                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                                <h1 class="text-2xl font-semibold py-2">
                                                    {{ $post->title }}
                                                </h1>
                                            </a>
                                        @else
                                            <x-post-card :post="$post" />
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="pb-2">
                                @foreach ($category->posts as $postSecond => $post)
                                    @if ($postSecond > 2 && $postSecond <= 7)
                                        <x-post-card :post="$post" />
                                    @endif
                                @endforeach
                            </div>
                            <div class="pb-2">
                                @foreach ($category->posts as $postThird => $post)
                                    @if ($postThird > 2 && $postThird <= 12)
                                        <x-post-card :post="$post" />
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <img class="h-[5px] md:h-[10px] lg:h-[12px] w-full font- bold" src="/images/line.JPG" alt="line">
        </div>
    </section>
</x-frontend-layout>
