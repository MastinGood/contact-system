@extends('layouts.master')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
     
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        {{ __('Register') }}
      </h2>
    
    </div>
    <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
    @csrf
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="name" class="sr-only">Full Name</label>
          <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-3 block w-full appearance-none" placeholder="Email address">
           @error('name')
                <span class="invalid-feedback" role="alert ">
                    <p class="text-red-500 font-semibold py-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
        <div class="pt-4">
          <label for="email" class="sr-only">Email Address</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-3 block w-full appearance-none" placeholder="Email address">
           @error('email')
                <span class="invalid-feedback" role="alert ">
                    <p class="text-red-500 font-semibold py-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
        <div class="pt-4">
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-3 block w-full appearance-none" placeholder="Password">
          @error('password')
                <span class="invalid-feedback" role="alert ">
                    <p class="text-red-500 font-semibold py-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
        <div class="pt-4">
          <label for="password-confirm" class="sr-only">Confirm Password</label>
          <input id="password-confirm" name="password_confirmation" type="password" autocomplete="current-password" required class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-3 block w-full appearance-none" placeholder="Confirm Password">
          @error('password_confirmation')
                <span class="invalid-feedback" role="alert ">
                    <p class="text-red-500 font-semibold py-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
      </div>

      <div class="flex items-center justify-between">
      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: lock-closed -->
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Register
        </button>
      </div>
    </form>
  </div>
</div>
@endsection