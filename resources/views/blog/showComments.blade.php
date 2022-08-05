@if($comments->count() > 0)
    <h4 style="padding: 20px;" class="text-gray-700 font-bold text-2xl  py-05 pb-8">Display Comments</h4> 
    <hr />
@endif
<?php $i=1; ?>
@foreach($comments as $comment)
    <hr />
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200" @if($comment->post_id != null) style="margin-left:40px;" @endif>
        
        <h3>{{$i}} - {{ $comment->comment }} <br /><span> Commented on : {{ date('jS M Y', strtotime($post->updated_at)) }} </span></h3><br />
        
    </div>
    <hr />
    <?php $i++; ?>
@endforeach