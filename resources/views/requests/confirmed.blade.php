<x-admin>
    <section class=" mt-20">
        <div class="w-full">
            <div class="flex py-2">
                <h1 class="text-lg bg-medium">Confirmed Request</h1>
            </div>
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow sm:rounded-lg">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    {{-- <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                            <button class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search</button>
                        </form>
                    </div> --}}
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Date Requested</th>
                                <th scope="col" class="px-4 py-3">Time Requested</th>
                                <th scope="col" class="px-4 py-3">Service Type</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Price</th>
                                <th scope="col" class="px-4 py-3">Discount</th>
                                <th scope="col" class="px-4 py-3">Recieved Ammount</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $request->created_at ? $request->created_at->format('F d, Y') : 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $request->created_at ? $request->created_at->format('g:i A') : 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $request->service->service_type ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">
                                        <span class="bg-green-100 text-green-700 text-sm font-medium me-2 px-2.5 py-1 rounded ">{{ $request->status ?? 'N/A' }}</span>
                                    </td>
                                    @if ($request->service->service_type == 'Memorial Services')
                                        <td class="px-4 py-3">&#x20B1; {{ isset($request->service->casket->price) ? number_format($request->service->casket->price, 2, '.', ',') : '00.00' }}</td>
                                    @else
                                        <td class="px-4 py-3">&#x20B1; {{ isset($request->service->urn->price) ? number_format($request->service->urn->price, 2, '.', ',') : '00.00' }}</td>
                                    @endif
                                    <td class="px-4 py-3">&#x20B1; {{ isset($request->discount_amount) ? number_format($request->discount_amount, 2, '.', ',') : '00.00' }}</td>
                                    <td class="px-4 py-3">&#x20B1; {{ isset($request->recieved_amount) ? number_format($request->recieved_amount, 2, '.', ',') : '00.00' }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="{{ 'apple-imac-' . $request->id . '-dropdown-button'}}" data-dropdown-toggle="{{ 'apple-imac-' . $request->id . '-dropdown' }}" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="{{ 'apple-imac-' . $request->id . '-dropdown' }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ 'apple-imac-' . $request->id . '-dropdown-button'}}">
                                                <li>
                                                    <a href="{{ route('requests.confirmed-show', $request->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('requests.complete', $request->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mark as Completed</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('requests.receipt', $request->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download Receipt</a>
                                                </li>
                                            </ul>
                                            {{-- <div class="py-1">
                                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                            </div> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if($requests->isEmpty())
                                <tr class="h-20">
                                    <td class="text-base text-red-600 text-center" colspan="9">No Records Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    <div class="w-full">
                        {{ $requests->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </section>
</x-admin>
