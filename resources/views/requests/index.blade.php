<x-admin>
    <section class=" mt-20">
        <div class="w-full">
            <div class="flex py-2">
                <h1 class="text-lg bg-medium">Current Request</h1>
            </div>
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow sm:rounded-lg ">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

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
                                        <span class="bg-red-50 text-red-700 text-sm font-medium me-2 px-2.5 py-1 rounded">{{ $request->status ?? 'N/A' }}</span>
                                    </td>
                                    {{-- <td class="px-4 py-3">&#x20B1; {{ isset($request->service->casket->price) ? number_format($request->service->casket->price, 2, '.', ',') : '00.00' }}</td> --}}
                                    @if ($request->service->service_type == 'Memorial Services')
                                        <td class="px-4 py-3">&#x20B1; {{ isset($request->service->casket->price) ? number_format($request->service->casket->price, 2, '.', ',') : '00.00' }}</td>
                                    @else
                                        <td class="px-4 py-3">&#x20B1; {{ isset($request->service->urn->price) ? number_format($request->service->urn->price, 2, '.', ',') : '00.00' }}</td>
                                    @endif
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="{{ 'apple-imac-' . $request->id . '-dropdown-button'}}" data-dropdown-toggle="{{ 'apple-imac-' . $request->id . '-dropdown' }}" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="{{ 'apple-imac-' . $request->id . '-dropdown' }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ 'apple-imac-' . $request->id . '-dropdown-button'}}">
                                                <li>
                                                    <a href="{{ route('requests.show', $request->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Process</a>
                                                </li>
                                                {{-- <li>
                                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li> --}}
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
