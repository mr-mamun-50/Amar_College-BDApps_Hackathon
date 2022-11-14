<?php

namespace App\Http\Controllers\User\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required'
        ]);
        $data = [
            'post_id' => $request->post_id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment,
            'c_date' => now('6.0') . date(''),
        ];

        $notifications = [
            'post_id' => $request->post_id,
            'post_user_id' => DB::table('posts')->where('id', $request->post_id)->value('user_id'),
            'user_id' => Auth::user()->id,
            'type' => 'comment',
            'status' => 'unread',
            'act_time' => now('6.0') . date(''),
        ];

        DB::table('notifications')->insert($notifications);

        DB::table('post_comments')->insert($data);

        $notify = ['message' => 'Commented', 'alert-type' => 'success'];
        return redirect(url()->previous() . '#post' . $request->post_id)->with($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = DB::table('post_comments')->where('id', $id)->first();
        $post = DB::table('posts')->where('id', $comment->post_id)->first();

        DB::table('post_comments')->where('id', $id)->delete();

        $notify = ['message' => 'Comment deteted', 'alert-type' => 'success'];
        return redirect(url()->previous() . '#post' . $post->id)->with($notify);
    }
}
