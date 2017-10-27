<?php

namespace App\Http\Controllers;

use App\{Post, Review};
use Session;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
    public function store(Request $request, $id)
    {
        //dd($request);

        $this->validate($request, array(
            'comment' => 'required|min:5|max:2000',
            'rating'  => 'required|integer|between:1,5',
        ));

        $post = Post::find($id);

        $review = new Review;
        $review->comment = $request->name;
        $review->rating  = $request->rating;
        $review->approved = true;
        $review->user_id = auth()->user()->id;
        $review->post()->associate($post);

        $review->save();

        Session::flash('success', 'Comment added successfully');

        return redirect()->uri('/post/show/'.$post->id.'#add_review');
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
        //
    }
}
