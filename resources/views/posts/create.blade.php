@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Post
				</div>

				<div class="pane-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('store_post') }}">

						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title" class="col-md-4 control-label">
								Title
							</label>
							<div class="col-md-6">
								<input id="title" type="text" name="title" class="form-control" value="{{ old('title')  }}" required autofocus />

								@if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
							<label for="body" class="col-md-4 control-label">
								Body
							</label>
							<div class="col-md-6">
								<textarea id="body" name="body" cols="30" rows="10" class="form-control" required>
									{{ old('body') }}
								</textarea>

								@if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Create
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection