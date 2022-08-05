@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-5">
        <h1 class="text-2xl">
            Update Post -> "{{ ucwords($post->title) }}"
        </h1>
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form 
        action="/blog/{{ $post->slug }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="w-54 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">Title: </label>
        <input 
            type="text"
            name="title"
            value="{{ $post->title }}"
            class=" w-full h-10 text-2xl outline-none">

        <br /><br />
        <label class="w-54 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">Short Desciption </label>
        <textarea 
            name="short_description"
            id="summary-ckeditor"
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">{{ $post->short_description }}</textarea> 

        <br /><br />
        <label class="w-54 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">Desciption </label>
        <textarea 
            name="description"
            id="details-ckeditor"
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">{{ $post->description }}</textarea> 
        
        
        <div class="bg-grey-lighter pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                   Upload an Image
                </span>
                <input 
                    type="file"
                    name="image"
                    class="hidden">
            </label>
        </div>

        <button    
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit Post
        </button>
        <a href ="/"
            class="uppercase mt-15 bg-red-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Back
        </a>
    </form>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
CKEDITOR.replace( 'details-ckeditor' );
</script>
@endsection