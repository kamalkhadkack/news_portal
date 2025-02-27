<x-frontend-layout :meta_words="$news->meta_words" :meta_description="$news->meta_description" :url="route('news', $news->id)">
    <section>
        <div class="container grid md:grid-cols-12 gap-5">

            <div class="md:col-span-8 space-y-4">
                <i class="fa-solid fa-calendar-days bg-[#fae820] text-[#0317fc]"></i>प्रकाशित मिति:
                {{ nepalidate($news->created_at) }} <i class="fa-regular fa-newspaper bg-[#0317fc] text-white"></i>
                {{ $news->views }} पटक पढिएकाे

                <h1 class="text-3xl text-center font-semibold md:text-5xl font-semibold mt-2 mb-2">
                    {{ $news->title }}
                </h1>
                <div class="sharethis-inline-share-buttons"></div>
                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="w-full">
                <div class="description">
                    {!! $news->description !!}
                </div>
                <div class="sharethis-inline-reaction-buttons"></div>
            </div>
            <div class="md:col-span-4 w-[100%]">
                @foreach ($advertises as $ad)
                    <div>
                        <a href="{{ $ad->redirect_url }}" target="_blank">
                            <img class="w-full h-full" src="{{ asset($ad->banner) }}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <img class="h-[5px] md:h-[10px] lg:h-[12px] w-full font- bold" src="/images/line.JPG" alt="line">
    <section>
        <div class="container",>
            <div class=" md:col-span-4 space-y-4 mb-0">
                <h1 class="text-4xl text-[#fc0404] font-family: 'Courier New', Courier, monospace font-bold md:text-3xl font-semibold mb-0 mt-0">सम्बन्धित खबरहरू</h1>
                <img class="h-[5px] md:h-[10px] lg:h-[25px]" src="\images\redline.png" alt="line">
            </div>
            <div class=" grid md:grid-cols-4 gap-5 mt-2">
                @foreach ($related_posts as $related_post)
                    <a href="{{ route('news', $related_post->id) }}">
                        <img src="{{ asset($related_post->image) }}" alt="{{ $related_post->title }}" class="w-full h-[50%]">
                        <div>
                            <h1 class="hover:font-bold hover:text-[#48bd0e] text-xl md:text-2xl lg:text-2xl font-semibold">
                                {{ $related_post->title }}</h1>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-frontend-layout>
