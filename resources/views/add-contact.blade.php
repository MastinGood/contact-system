@extends('layouts.master')
@section('content')


<div class=" container mx-auto py-10">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Add Contact</h3>
        <p class="mt-1 text-sm text-gray-600">
          Fill out the fields below.
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="{{route('contact.store')}}" method="POST">
      	@csrf
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name"  autocomplete="email" class="bg-gray-100 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-3 block w-full appearance-none">
                 @error('name')
	                <span class="invalid-feedback" role="alert ">
	                    <p class="text-red-500 font-semibold py-1">{{ $message }}</p>
	                </span>
	            @enderror
              </div>
              <div class="col-span-6 sm:col-span-4">
                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                <input type="text" name="company" id="company" autocomplete="company" class="bg-gray-100 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-3 block w-full appearance-none">
              </div>
              <div class="col-span-6 sm:col-span-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">phone</label>
                <input type="text" name="phone" id="phone" autocomplete="company" class="bg-gray-100 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-3 block w-full appearance-none">
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="phone" autocomplete="company" class="bg-gray-100 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-3 block w-full appearance-none">
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



@endsection