<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Write Your Code..
     *
     * @return string
    */
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'comment'=>'required',
        ]);

        if(!isset(auth()->user()->id)){
            $input['user_type'] = 'guest';
            $input['user_id'] = 0;
        } else {
            $input['user_type'] = 'user';
            $input['user_id'] = auth()->user()->id;
        }
        $input['post_id'] = $request->post_id;
        
        Comment::create($input);

        return back();
    }
}