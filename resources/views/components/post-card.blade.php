@props(['post'])
<div class="grid grid-cols-12 gap-2 items-center text-justify rounded-lg overflow-hidden hover:shadow-lg duration-500">
    <div class="col-span-5">
        <a href="{{route('news',$post->id)}}">
            <img class="w-full" src="{{ asset($post->image) }}" alt="post->title">
        </a>
    </div>
    <div class="col-span-7">
        <a href="{{route('news',$post->id)}}">
            <h1 class="hover:font-bold hover:text-[#c406c1] hover:no-underline font-bold">{{ $post->title }}</h1>
        </a>
        <small>{{ nepalidate($post->created_at) }} | {{$post->views}} पटक पढिएकाे </small>
    </div>
</div>
