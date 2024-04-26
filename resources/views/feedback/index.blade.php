<x-admin>
    <section class=" mt-20">
        <div class="w-full">
            <div class="flex py-2">
                <h1 class="text-lg bg-medium">Feedback</h1>
            </div>
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow sm:rounded-lg ">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form action="{{ route('feedback.index') }}" method="GET" class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                            <button class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search</button>
                        </form>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Name</th>
                                <th scope="col" class="px-4 py-3">Content</th>
                                <th scope="col" class="px-4 py-3">Stars</th>
                                <th scope="col" class="px-4 py-3">Visibility</th>
                                <th scope="col" class="px-4 py-3">Date Added</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedbacks as $feedback)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $feedback->name ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 max-w-96">{{ $feedback->content ?? 'N/A' }}</td>
                                    <td>
                                        <div class="flex items-start space-x-1">
                                            @for($i = 0; $i < $feedback->stars; $i++)
                                                <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 12.928l-4.243 2.485a1 1 0 01-1.451-1.054l.82-4.773-3.423-3.334a1 1 0 01.554-1.705l4.77-.694 2.13-4.315a1 1 0 011.789 0l2.13 4.315 4.77.694a1 1 0 01.554 1.705l-3.423 3.334.82 4.773a1 1 0 01-1.451 1.054L10 12.928z" />
                                                </svg>
                                            @endfor
                                            <div>
                                                <span class="text-gray-500 dark:text-gray-400 font-semibold">({{ $feedback->stars }}.0)</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($feedback->show_on_website)
                                            <span class="bg-green-50 text-green-700 text-sm font-medium me-2 px-2.5 py-1 rounded">Visible</span>
                                        @else
                                            <span class="bg-red-50 text-red-700 text-sm font-medium me-2 px-2.5 py-1 rounded">Hidden</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $feedback->created_at ? $feedback->created_at->format('F d, Y') : 'N/A' }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="{{ 'apple-imac-' . $feedback->id . '-dropdown-button'}}" data-dropdown-toggle="{{ 'apple-imac-' . $feedback->id . '-dropdown' }}" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="{{ 'apple-imac-' . $feedback->id . '-dropdown' }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ 'apple-imac-' . $feedback->id . '-dropdown-button'}}">
                                                <li>
                                                    <a href="{{ route('feedback.visible', $feedback->id) }}"  class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show On Website</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('feedback.hidden', $feedback->id) }}"  class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove from Website</a>
                                                </li>
                                            </ul>
                                            <form class="py-1" action="{{ route('feedback.delete', $feedback->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if($feedbacks->isEmpty())
                                <tr class="h-20">
                                    <td class="text-base text-red-600 text-center" colspan="9">No Records Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    <div class="w-full">
                        {{ $feedbacks->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </section>
</x-admin>
