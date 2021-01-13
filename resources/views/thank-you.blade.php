@extends('layouts.master')
@section('content')
<div class="w-full py-12">
	<div class="container mx-auto">
		<h1 class="font-extrabold text-4xl text-gray-800 py-4 mb-6">Thank you! You successfully registered.</h1>

		<a href="{{route('all-contact')}}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded mt-10">
		  Continue
		</a>
		
	</div>
</div>
@endsection