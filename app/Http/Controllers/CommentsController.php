<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token','comment_post_ID','comment_parent');
        $data['article_id'] = $request->input('comment_post_ID');
        $data['parent_id'] = $request->input('comment_parent');

        $validate = Validator::make($data,[
            'article_id' => 'integer|required',
            'parent_id' => 'integer|required',
            'text' => 'string|required',
        ]);

        $validate->sometimes(['name','email'],'required|max:255', function($input)
        {
            return !Auth::check();
        });

        if($validate->fails()) {
            return Response::json(['error'=>$validate->errors()->all()]);
        }

        $user = Auth::user();

        $comment = new Comment($data);
        if($user) {
            $comment->user_id = $user->id;
        }

        $post = Article::find($data['article_id']);
        $post->comments()->save($comment);

        // add comment display
        $comment->load('user');

        $data['id'] = $comment->id;
        $data['email'] = (!empty($data['email'])) ? $data['email'] : $comment->user->email;
        $data['name'] = (!empty($data['name'])) ? $data['name'] : $comment->user->name;
        $data['hash'] = md5($data['email']);

        $view_comment = view('corporate.content_comment',compact('data'))->render();
        return Redirect::back()->with('error','Не удалось сохранить комментарий');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
