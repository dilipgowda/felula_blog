@extends('layouts.app')

@section('content')
<div class="w-1/5 m-auto text-left">
    <div class="py-5">
        <h1 class="text-6xl">
            {{ ucwords($post->title) }}
        </h1>
    </div>
</div>
<div class="sm:grid  w-1/5 m-auto">
    <img  style="width:100%;height:200px;text-align:center;margin: auto;" src="{{ asset('images/' . $post->image_path) }}" alt="">
</div>
<div class="w-4/5 m-auto pt-20">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {!! strip_tags($post->description) !!}
    </p>
</div>

@if($post->id != '')
    <hr />
    
    @include('blog.showComments', ['comments' => $comment])
    <hr />
    <div div class="w-4/5 m-auto pt-20">
        <h4>Add comment</h4> <br />
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div >
                <textarea class="" cols=50 rows=10 name="comment"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                <input type="hidden" name="post_slug" value="{{ $post->slug }}" />
            </div>
            <div class="form-group">
                <button type="submit" class="uppercase mt-5 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-3 rounded-2xl">Submit Comment</button>
            </div>
        </form>
    </div>
    <br /> <br /> <br />
    <div style="margin:auto;text-align:center">
    <a href ="/"
                class="uppercase mt-15 bg-red-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Back to the list
        </a>
    </div>
@endif
@endsection 