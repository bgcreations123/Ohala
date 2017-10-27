@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $post->title }}

					<a href="{{ route('list_posts') }}" class="btn btn-sm btn-default pull-right">Return</a>
				</div>

				<!-- Flesh begins -->
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
		        
				            <div class="row">
				                <div class="col-md-12">
				                    <img src="http://placehold.it/210x210" class="img-rounded" alt="Cinque Terre" width="210" height="210">    
				                </div>
				            </div>

				        </div>
				        <div class="col-md-8">
					         <div class="product-title">Iphone 7</div>
					    			<div class="product-desc">New generation iphone</div>
					                <div class="product-desc">New generation iphone</div>
					                <div class="product-desc">New generation iphone</div>
					                <div class="product-desc">New generation iphone</div>
									<hr>
									<div class="product-price">$ 1234.00</div>
							</div>   
					    </div>

					    <hr>
						<div class="row">
						    <div class="col-md-12">
								<ul class="nav nav-tabs">
								  <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
								  <li><a data-toggle="tab" href="#reviews">Reviews</a></li>
								  <li><a data-toggle="tab" href="#add_review">Add Review</a></li>
								</ul>

								<div class="tab-content">
								  <div id="description" class="tab-pane fade in active">
								    <h3>{{ $post->title }}</h3>
								    <p>{{ $post->body }}</p>
								  </div>
								  <div id="reviews" class="tab-pane fade">
								  	<div class="col-md-12">

								  		@foreach($reviews as $review)
									  		<div class="row">
									  			<h4>Reviewer</h4>
										  		<div class="ratings pull-right">
							                        @for ($i=1; $i <= 5 ; $i++)
							                          <span class="fa fa-star{{ ($i <= $review->rating ) ? '' : '-o'}}"></span>
							                        @endfor
							                    </div>
										  		<h6>Date</h6>
										    	<p>{{ $review->comment }}</p>
									  		</div>
									  		<hr>
								  		@endforeach

								  	</div>
								  </div>
								  <div id="add_review" class="tab-pane fade">
								    
								    <div class="col-md-12">
					                    <form class="form-horizontal" role="form" method="POST" action="{{ route('review_post', ['id' => $post->id]) }}">
					                        {{ csrf_field() }}

					                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
											    <label for="comment"><h4>Comment:</h4></label>
											    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" placeholder="Enter your review here..." required>{{ old('comment', $post->comment) }}</textarea>
				                                @if ($errors->has('comment'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('comment') }}</strong>
				                                    </span>
				                                @endif
											</div>

											<input type="hidden" id="ratings-hidden" name="rating" />

											<span class="stars starrr" data-rating="{{ old('rating',0) }}"></span>								

					                        <div class="form-group">
					                            <div class="col-md-12">

					                                <button type="submit" class="btn btn-primary">
					                                    Save
					                                </button>

					                                <a href="#" class="pull-right btn btn-danger">
					                                    cancel
					                                </a>

					                            </div>
					                        </div>
					                    </form>
					                </div>
								  </div>
								</div>
						    </div>
						</div>
					</div>
				</div>

				<!-- Flesh ends -->

			</div>
		</div>
	</div>
</div>
@endsection