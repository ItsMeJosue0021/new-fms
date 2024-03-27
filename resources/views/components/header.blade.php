<header class="sticky top-0 z-40">
    <nav class="bg-white border-gray-100 px-4 lg:px-6 py-1.5 dark:bg-gray-800 border-b">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-[1400px]">
            <a href="/" class="text-white flex space-x-2 items-center">
                <img src="{{asset('images/Torreslogo.png')}}" alt="" class="w-14 h-14 rounded-full border border-gray-300">
                <div>
                    <h1 class="text-sm text-black font-bold">TORRES ESCARO</h1>
                    <p class="text-xs text-black">Funeral Services</p>
                </div>
            </a>
            <div class="flex items-center lg:order-2">
                @auth
                    @if (Auth::user()->role->name == 'admin')
                        <a href="{{ route('requests.index') }}" class="text-gray-800 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Admin</a>
                    @elseif (Auth::user()->role->name == 'customer')
                        <a href="{{ route('customer.dashboard') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">User</a>
                    @endif
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Logout</button>
                        </form>
                    @else

                    <a href="{{ route('login') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                    <a href="{{route('register') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sign Up</a>

                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                @endauth
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="/" class="{{ Request::is('/') ? 'text-blue-600' : 'text-gray-700'}} block py-2 pr-4 pl-3  rounded bg-blue-700 lg:bg-transparent lg:p-0 dark:text-white" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('caskets') }}" class="{{ Request::is('*caskets*') ? 'text-blue-600' : 'text-gray-700'}} block py-2 pr-4 pl-3 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Caskets</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="{{ Request::is('*about*') ? 'text-blue-600' : 'text-gray-700'}} block py-2 pr-4 pl-3  border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="{{ Request::is('*contact*') ? 'text-blue-600' : 'text-gray-700'}} block py-2 pr-4 pl-3 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                    <li>
                        <a href="{{ route('announcements') }}" class="{{ Request::is('*announcements*') ? 'text-blue-600' : 'text-gray-700'}} block py-2 pr-4 pl-3 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Announcements</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
