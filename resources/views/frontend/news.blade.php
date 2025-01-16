<x-frontend-layout>
    <section>
        <div class="container grid md:grid-cols-12 gap-5">

           <div class="md:col-span-8 space-y-4">
               प्रकाशित मिति: {{nepalidate($news->created_at)}} |<i data-feather="book-open"></i> {{$news->views}} पटक पढिएकाे
            </p>
               <h1 class="text-3xl text-center font-semibold md:text-5xl font-semibold mt-2 mb-2">
                    {{$news->title}}
               </h1>
               <div class="sharethis-inline-share-buttons"></div>
               <img src="{{asset($news->image)}}" alt="{{$news->title}}" class="w-full">
               <div class="description">
                {!!$news->description!!}
               </div>
               <div class="sharethis-inline-reaction-buttons"></div>
           </div>
           <div class="md:col-span-4">
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
