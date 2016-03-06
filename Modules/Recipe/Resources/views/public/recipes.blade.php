@extends('layouts.master')
@section('content')
<div class="container">
@foreach ($recipes as $recipe)
	<h2>{{ $recipe->name }}</h2>
   
  	@foreach ($recipe->gallery as $image)
  		<img src="{{url($image->path)}}" alt="">
  	@endforeach


@endforeach
  </div>


@stop