@extends('layouts.master')

@section('title', 'Quotes')

@section('content')
	<div class="row"  >
		@for($i = 0; $i < count($quotes); $i++)
			<div class="col-sm-6" style="padding-bottom: 20px;">
				<div class="card">
				<a href="{{ route('delete', ['quote_id' => $quotes[$i]->id]) }}" class="text-right" style="margin-right: 2px;">x</a>
		          <div class="card-body">
		           <blockquote class="blockquote">
					  <p class="mb-2">{{ $quotes[$i]->quote }}</p>
					  <footer class="blockquote-footer">Created by <cite title="Author"><a href="{{ route('index', ['author' => $quotes[$i]->author->name])}}">{{ $quotes[$i]->author->name }}</a></cite> at {{$quotes[$i]->created_at }}</footer>
					</blockquote>
		          </div>
		    	</div>
			</div>
		@endfor
	</div>
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			@if($quotes->currentPage() !== 1)
				<li class="page-item">
					<a class="page-link" href="{{$quotes->previousPageUrl()}}" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
			@endif
			@if($quotes->currentPage() !== $quotes->lastPage() && $quotes->hasPages())
				<li class="page-item">
					<a class="page-link" href="{{$quotes->nextPageUrl()}}" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			@endif
				
		</ul>
	</nav>
	
 
	<section class="edit-quote text-center">
		<h1>Add Quote</h1>
		<form action="{{ route('create')}}" method="post">
			@csrf
			<div class="form-group">
				<label for="author">Author</label> 
				<input type="text" id="author" name="author" placeholder="Author">
			</div>
			<div class="form-group">
				<label for="quote">Quote</label> 
				<textarea name="quote" id="quote" cols="30" rows="5"></textarea>
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
		</form>
	</section>
    
@endsection