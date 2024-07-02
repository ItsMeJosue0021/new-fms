<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tores Escaro Funeral Services</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
           </button>
           <a href="/" class="text-white flex space-x-2 items-center">
                <img src="{{asset('images/Torreslogo.png')}}" alt="" class="w-14 h-14 rounded-full border border-gray-300">
                <div>
                    <h1 class="text-sm text-black font-bold">TORRES ESCARO</h1>
                    <p class="text-xs text-black">Funeral Services</p>
                </div>
            </a>
        </div>
        <div class="flex items-center">
            <div class="flex items-center ms-3">
              <div>
                <button type="button" class="flex text-sm bg-gray-50 border border-gray-200 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                    <span class="sr-only">Open user menu</span>
                    @if (Auth::user()->profile)
                        <img class="w-10 h-10 rounded-full object-cover object-center" src="{{ asset('storage/' . optional(Auth::user()->profile)->image) ?? '' }}"
                        alt="user photo">
                    @else
                        <i class='w-full h-full bx bxs-user-circle text-5xl text-gray-200'></i>
                    @endif
                </button>
              </div>
              <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                <div class="px-4 py-3" role="none">
                  <p class="text-sm text-gray-900 dark:text-white" role="none">
                        {{ Auth::user()->profile->first_name ?? 'User'}} {{ Auth::user()->profile->last_name ?? 'User'}}
                  </p>
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                        {{ Auth::user()->email ?? 'User Email'}}
                  </p>
                </div>
                <ul class="py-1" role="none">
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
      </div>
    </div>
  </nav>

  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-24 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*dashboard*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}}  hover:bg-gray-100 dark:hover:bg-gray-700 group">
                   <svg class="{{ Request::is('*dashboard*') ? 'text-blue-600' : 'text-gray-500'}} w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                      <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                      <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                   </svg>
                   <span class="ms-3">Dashboard</span>
                </a>
             </li>
           <li>
              <a href="{{ route('requests.index') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*pending*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}}  hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <svg class="{{ Request::is('*pending*') ? 'text-blue-600' : 'text-gray-500'}} w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                 </svg>
                 <span class="ms-3">Service Requests</span>
                 @if (!$serviceRequestCount == 0 || !$serviceRequestCount == null)
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-100 bg-blue-600 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $serviceRequestCount}}</span>
                 @endif
              </a>
           </li>
           <li>
              <a href="{{ route('requests.confirmed') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*confirmed*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <svg class="{{ Request::is('*confirmed*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5  transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                 </svg>
                 <span class="flex-1 ms-3 whitespace-nowrap">Confirmed Request</span>
              </a>
           </li>
           <li>
            <a href="{{ route('requests.completed') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*completed*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="{{ Request::is('*completed*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5  transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Completed Request</span>
            </a>
         </li>
           <li>
              <a href="{{ route('caskets.index') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*caskets*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <svg class="{{ Request::is('*caskets*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                 </svg>
                 <span class="flex-1 ms-3 whitespace-nowrap">Caskets</span>
              </a>
           </li>
           <li>
                <a href="{{ route('hearses.index') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*hearses*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="{{ Request::is('*hearses*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Hearses</span>
                </a>
            </li>
            <li>
                <a href="{{ route('urns.index') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*urns*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="{{ Request::is('*urns*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Urns</span>
                </a>
            </li>
            <li>
                <a href="{{ route('announcements.index') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*announcements*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="{{ Request::is('*announcements*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Announcements</span>
                </a>
            </li>
            <li>
                <a href="{{ route('feedback.index') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*feedbacks*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="{{ Request::is('*feedbacks*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Feedbacks</span>
                </a>
            </li>
            <li>
                <a href="{{ route('message.index') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*message*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="{{ Request::is('*message*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Messages</span>
                </a>
            </li>
            <li>
                <a href="{{ route('employees.index') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*employees*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="{{ Request::is('*employees*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Employees</span>
                </a>
            </li>
            <li>
                <a href="{{ route('condolences-message.index') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*condolences*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="{{ Request::is('*condolences*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Condolences Message</span>
                </a>
            </li>
            <li>
                <a href="{{ route('payment-terms.index') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*payment*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="{{ Request::is('*payment*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Payment Terms</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit-admin') }}" class="flex items-center p-2  rounded-lg dark:text-white {{ Request::is('*profile*') ? 'bg-blue-50 text-blue-600' : 'text-gray-900'}} hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="{{ Request::is('*profile*') ? 'text-blue-600' : 'text-gray-500'}} flex-shrink-0 w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                </a>
            </li>
        </ul>
     </div>
  </aside>

  <div class="min-h-screen h-auto p-4 sm:ml-64 bg-gray-50">
     {{ $slot }}
  </div>

  <x-flash-messages />
</nav>
</body>
</html>




