<?php

namespace App\Http\Controllers\User\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikesController extends Controller
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
        $data = [
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id
        ];

        $post_user_id = DB::table('posts')->where('id', $request->post_id)->value('user_id');

        $notification = [
            'post_id' => $request->post_id,
            'post_user_id' => $post_user_id,
            'user_id' => Auth::user()->id,
            'type' => 'like',
            'status' => 'unread',
            'act_time' => now('6.0') . date(''),
        ];

        DB::table('notifications')->insert($notification);

        DB::table('post_likes')->insert($data);

        return redirect(url()->previous() . '#post' . $request->post_id);

        // return response()->json([
        //     'success' => 'You have liked this post'
        // ], 200);
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
        $like = DB::table('post_likes')->where('id', $id)->first();
        $post = DB::table('posts')->where('id', $like->post_id)->first();

        DB::table('post_likes')->where('id', $id)->delete();

        return redirect(url()->previous() . '#post' . $post->id);

        // return response()->json([
        //     'success' => 'You have unliked this post'
        // ], 200);
    }
}
