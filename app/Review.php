<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function post()
	{
		return $this->belongsTo('App\Post');
	}

	public function scopeApproved($query)
	{
		return $query->where('approved', true);
	}

	public function scopeSpam($query)
	{
		return $query->where('spam', true);
	}

	public function scopeNotSpam($query)
	{
		return $query->where('spam', false);
	}

	// this function takes in product ID, comment and the rating and attaches the review to the product by its ID, then the average rating for the product is recalculated
	public function storeReviewForPost($postID, $comment, $rating)
	{
		$post = Post::find($postID);

		// this will be added when we add user's login functionality
		//$this->user_id = Auth::user()->id;

		$this->comment = $comment;
		$this->rating = $rating;
		$post->reviews()->save($this);

		// recalculate ratings for the specified product
		$post->recalculateRating();
	}
}
