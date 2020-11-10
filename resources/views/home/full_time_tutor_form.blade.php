@extends('app')
@section('content')

	<form action="{{route('full_time_email')}}" method="post">
		{{csrf_field()}}
		<label>
			Email
		</label>
		<input type="email" name="email">
		<label>
			Message
		</label>
		<input type="text" name="message">
		<input type="submit" name="submit">
	</form>

@endsection