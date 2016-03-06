@extends('layouts.master')
@section('content')
<div class="container">
@foreach ($testimonials as $testimonial)
	<h2>{{ $testimonial->name }}</h2>
   
  	@foreach ($testimonial->gallery as $image)
  		<img src="{{url($image->path)}}" alt="">
  	@endforeach


@endforeach
  </div>


@stop