<?php

namespace App\Http\Controllers;

use Gate;
use App\{Post, Review};
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
    	$posts = Post::where('published', true)->paginate(10);
    	return view('posts.index', compact('posts'));
    }

    public function create(){
    	return view('posts.create');
    }

    public function show($id){
    	$post = Post::where('published', true)->findOrFail($id);

        $reviews = $post->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(100);

    	return view('posts.show', compact('post', 'reviews'));
    }

    public function show_draft($id){
        $post = Post::where(['published' => false]);

        if(Gate::denies('see-all-drafts')){
            $post = $post->where(['user_id' => auth()->user()->id]);
        }
        
        $post = $post->findOrFail($id);

        return view('posts.show_draft', compact('post'));
    }

    public function store(Request $request){
    	//store data
    	$data = $request->only('title', 'body');
    	$data['slug'] = str_slug($data['title']);
    	$data['user_id'] = auth()->user()->id;
    	$post = Post::create($data);

    	return redirect()->route('edit_post', ['id' => $post->id]);
    }

    public function edit(Post $post){

    	return view('posts.edit', compact('post'));

    }

    public function update(Post $post, Request $request){
    	$data = $request->only('title', 'body');
    	$data['slug'] = str_slug($data['title']);
    	$post->fill($data)->save();

    	return back();
    }

    public function drafts(){
    	if(Gate::denies('see-all-drafts')){
    		$draftsQuery = Post::where(['published' => false, 'user_id' => auth()->user()->id]);
    	}else{
            $draftsQuery = Post::where(['isLive' => false, 'published' => false]);
        }

    	$drafts = $draftsQuery->get();

    	return view('posts.drafts', compact('drafts'));
    }

    public function published_posts(){
        $posts = Post::where(['published' => true, 'user_id' => auth()->user()->id])->get();

        return view('posts.published', compact('posts'));
    }

    public function publish(Post $post){
        $post->published = true;
    	$post->save();

    	return back();
    }

    public function unpublish(Post $post){
        $post->published = false;
    	$post->save();

    	return back();
    }

    public function activate(Post $post){
    	$post->isLive = true;
    	$post->save();

    	return back();
    }

    public function deactivate(Post $post){
        $post->isLive = false;
        $post->published = false;
        $post->save();

        return back();
    }

    public function delete($id){
        $post = Post::find( $id );
        
        // Unpublish and Deactivate the post.
        $post->isLive = false;
        $post->published = false;
        $post->save();

        // SoftDelete the post
        $post->delete();

        

        return redirect()->back();
    }

    public function deleted(){
        $posts = Post::onlyTrashed()->get();

        return view('posts.deleted', compact('posts'));
    }

    public function restore($id) 
    {
        $id = Post::withTrashed()->find($id)->restore();

        $drafts = Post::where(['isLive' => false, 'published' => false])->get();

        return view('posts.drafts', compact('drafts'));    }
}
