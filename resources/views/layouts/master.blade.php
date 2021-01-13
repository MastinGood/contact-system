<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<link href="{{asset('css/custom.css')}}" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	 
</head>

<body>
<div id="app">
	<nav class="bg-gray-800" x-data="{ open: false, nav: false }">
	  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
	    <div class="relative flex items-center justify-between h-16">
	      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
	        <!-- Mobile menu button-->
	        <button x-on:click="nav = !nav" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
	          <span class="sr-only">Open main menu</span>
	          <!-- Icon when menu is closed. -->
	          <!--
	            Heroicon name: menu

	            Menu open: "hidden", Menu closed: "block"
	          -->
	          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
	            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
	          </svg>
	          <!-- Icon when menu is open. -->
	          <!--
	            Heroicon name: x

	            Menu open: "block", Menu closed: "hidden"
	          -->
	          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
	            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
	          </svg>
	        </button>
	      </div>
	      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
	        <div class="flex-shrink-0 flex items-center">
	          <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
	          <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"" alt="Workflow">
	        </div>
	        <div class="hidden sm:block sm:ml-6">
	          <div class="flex space-x-4">
	            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
	             <a href="{{route('all-contact')}}" class="focus:bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">All Contacts</a>
	            <a href="{{route('add-contact')}}" class="focus:bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Add Contact</a>
	           
	           
	          </div>
	        </div>
	      </div>
	      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
	      	 @guest
	        <a href="{{route('login')}}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
	        <a href="{{route('register')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
	        @else
	        <!-- Profile dropdown -->
	        <div class="ml-3 relative" >
	          <div>
	            <a x-on:click="open = !open" class="bg-gray-800 flex text-white text-base font-medium focus:outline-none cursor-pointer" id="user-menu" aria-haspopup="true">
	              <span class="sr-only">Open user menu</span>
	              {{ Auth::user()->name }}
	            </a>
	          </div>
	          <!--
	            Profile dropdown panel, show/hide based on dropdown state.

	            Entering: "transition ease-out duration-100"
	              From: "transform opacity-0 scale-95"
	              To: "transform opacity-100 scale-100"
	            Leaving: "transition ease-in duration-75"
	              From: "transform opacity-100 scale-100"
	              To: "transform opacity-0 scale-95"
	          -->
	          <div x-show="open" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
	            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">{{ __('Logout') }}</a>
	            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
	          </div>
	        </div>
	        @endguest
	      </div>
	    </div>
	  </div>

	  <!--
	    Mobile menu, toggle classes based on menu state.

	    Menu open: "block", Menu closed: "hidden"
	  -->
	  <div x-show="nav" class="block sm:hidden">
	    <div class="px-2 pt-2 pb-3 space-y-1">
	      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
	      <a href="{{route('all-contact')}}" class="focus:bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">All Contacts</a>
	      <a href="{{route('add-contact')}}" class="focus:bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Add Contact</a>
	    </div>
	  </div>
	</nav>
</div>
<main class="w-full bg-white">
@yield('content')
	
</main>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>
</html>