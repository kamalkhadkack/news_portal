<x-frontend-layout>
    <section>
        <div class="container grid md:grid-cols-12 gap-5">

           <div class="md:col-span-9 space-y-4">
                @foreach ($posts as $post)
                    <div class="grid grid-cols-12 gap-5 items-center hover:shadow-lg border rounded-lg">
                        <div class="col-span-5">
                            <a href="{{ route('news', $post->id) }}">
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="col-span-7">
                            <a href="{{ route('news', $post->id) }}">
                                <h1 class="hover:font-bold hover:text-[#48bd0e] text-xl md:text-2xl lg:text-2xl font-semibold">{{ $post->title }}</h1>
                            </a>
                            <div class="h-20 font-2xl overflow-hidden hidden md:block w-[100%] object-cover">
                                {!! $post->description !!}
                            </div>
                            <small>प्रकाशित मिति: {{nepalidate($post->created_at)}} | {{$post->views}} पटक पढिएकाे</small>
                            <a href="{{ route('news', $post->id) }}">
                                <h1 class="{{ $post->title }}">पुरा पढनुहाेस</h1>
                            </a>
                        </div>
                    </div>
                @endforeach
                {{$posts->links()}}
           </div>
           <div class="md:col-span-3">
            @foreach ($advertises as $ad)
                <div>
                    <a href="{{$ad->redirect_url}}" target="_blank">
                        <img class="w-full" src="{{asset($ad->banner)}}" alt="">
                    </a>
                </div>
            @endforeach
           </div>
        </div>
    </section>

</x-frontend-layout>
