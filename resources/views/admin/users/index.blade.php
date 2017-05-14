@extends('layouts.app')
@section('content')
<div class="col-md-6 col-md-offset-3">
	<h3>{{$users->total()}} Total Users</h3>
	<b>in This Page ({{$users->count()}} Users )</b>
	<p>This is page {{$users->currentPage()}} Of {{$users->lastPage()}}</p>
	
		<ul class="list-group-">
		@forelse($users as $user)
			<li class="list-group-item" style="margin-top: 20px">
				<span>
					{{$user->name}}
				</span>
				<span class="pull-right clearfix">
					Joined ({{$user->created_at->diffForHumans()}})

					<button class="btn btn-xs btn-primary">Follow</button>
				</span>
			</li>
		@empty
			<p>No Users Available !</p>
			
		@endforelse
		{{$users->links()}}
	</ul>
	
 	
</div>
@endsection