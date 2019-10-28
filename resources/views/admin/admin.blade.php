@extends('layout.app')
@section('content')
	<h4 class="p-4">{{ Auth::user()->firstname.' '. Auth::user()->lastname }}</h4>
@stop

