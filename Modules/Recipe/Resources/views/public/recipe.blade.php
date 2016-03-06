@extends('layouts.master')
@section('content')
<div class="container">

	<h2>{{ $recipe->name }}</h2>

	<p>{!! $recipe->content !!}</p>
   
  	@foreach ($recipe->gallery as $image)
  		<img src="{{url($image->path)}}" alt="">
  	@endforeach



  </div>


@stop