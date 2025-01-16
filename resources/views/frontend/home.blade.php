<x-frontend-layout>
    <section>
        <div class="container grid md:grid-cols-12 gap-5">

            <div class="md:col-span-12 w-[100%]">
                <a href="{{ route('news', $latest_post->id) }}">
                    <h1
                        class="hover:font-bold hover:text-[#c406c1] hover:no-underline text-3xl text-center font-semibold md:text-5xl font-semibold mt-2 mb-2">
                        {{ $latest_post->title }} </h1>
                </a>
                <a href="{{ route('news', $latest_post->id) }}">
                    <img src="{{ asset($latest_post->image) }}" class="w-full" alt="{{ $latest_post->title }}">
                </a>
                <div class="h-20 text-3xl overflow-hidden w-[100%] object-cover description">
                    {!! html_entity_decode($latest_post->description) !!}
                </div>
            </div>
            <div class="md:col-span-4 w-[100%]">
                <a href="{{ route('news', $latest_post->id) }}">
                    <img src="{{ asset($latest_post->image) }}" class="w-full" alt="{{ $latest_post->title }}">
                </a>
                <a href="{{ route('news', $latest_post->id) }}">
                    <h1
                        class="hover:font-bold hover:text-[#c406c1] text-2xl text-center font-semibold md:text-2xl font-semibold mt-2 mb-2">
                        {{ $latest_post->title }}
                    </h1>
                </a>
            </div>
            <div class="md:col-span-4 w-[100%]">
                <div class="grid md:grid-cols-2">
                    <h1 class="">

                    </h1>
                    <img src="" alt="">
                    @foreach ($trending_posts as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                </div>
                <div class="grid md:grid-cols-2">

                </div>
            </div>
                <div class="md:col-span-4 space-y-4">
                    <h1 class="bg-[#e2e3ff] px-3 py-1 text-4xl font-bold mt-4 border-l-4 border-[#4000ff]">ट्रेन्डिङ
                    </h1>
                    @foreach ($trending_posts as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                </div>

            </div>
    </section>
    <section>
        <div class="container py-10 space-y-5">
            @foreach ($categories as $category)
                @if (count($category->posts) - 0)
                    <div>
                        <h1 class="text_primary text-3xl font-semibold">{{ $category->nepali_title }}</h1>
                        <img class="h-[5px] md:h-[10px] lg:h-[12px]" src="\images\redline.png" alt="line">
                    </div>
                    <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-5">
                        @foreach ($category->posts as $post)
                            <x-post-card :post="$post" />
                        @endforeach
                    </div>
                @endif
            @endforeach

        </div>
    </section>
</x-frontend-layout>
