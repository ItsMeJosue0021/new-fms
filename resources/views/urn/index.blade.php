<x-admin>
    <section class=" mt-20">
        <div class="w-full">
            <div class="flex py-2">
                <h1 class="text-lg bg-medium">Urns</h1>
            </div>
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow sm:rounded-lg ">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    {{-- <div class="w-full md:w-1/2">
                        <form action="{{ route('hearses.index') }}" method="GET" class="flex items-center">
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
                    </div> --}}
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('urns.create') }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add New</a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Name</th>
                                <th scope="col" class="px-4 py-3">Description</th>
                                <th scope="col" class="px-4 py-3">Image</th>
                                <th scope="col" class="px-4 py-3">Water</th>
                                <th scope="col" class="px-4 py-3">Date Added</th>
                                <th scope="col" class="px-4 py-3">Last Update</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($urns as $urn)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $urn->name ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 max-w-96">{{ $urn->description ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">
                                        @if ($urn->image)
                                            <img src="{{ asset('storage/' . $urn->image) }}" alt="urn image" class="w-14 h-14 zoomable-image cursor-pointer">
                                        @else
                                            <div class="h-14 w-14 flex items-center justify-center">
                                                <span class="text-lg text-gray-700">....</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $urn->water ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $urn->created_at ? $urn->created_at->format('F d, Y') : 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $urn->updated_at ? $urn->updated_at->format('F d, Y') : 'N/A' }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="{{ 'apple-imac-' . $urn->id . '-dropdown-button'}}" data-dropdown-toggle="{{ 'apple-imac-' . $urn->id . '-dropdown' }}" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="{{ 'apple-imac-' . $urn->id . '-dropdown' }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ 'apple-imac-' . $urn->id . '-dropdown-button'}}">
                                                <li>
                                                    <a href="{{ route('urns.edit', $urn->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li>
                                            </ul>
                                            {{-- <form class="py-1" action="{{ route('urns.delete', $urn->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    <div class="w-full">
                        {{ $urns->links() }}
                    </div>
                </nav>
            </div>
        </div>
        <div id="imageModal" class="hidden z-50 fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 ">
            <div class="w-full h-full flex items-center justify-center">
                <div id="modalContent" class="max-w-2xl mx-auto">
                    <img id="modalImage" src="" alt="Modal Image" class="w-full h-full rounded">
                    <button id="closeModal" class="absolute top-6 right-6 text-white cursor-pointer">
                        <i class="bx bx-x text-3xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <script>
            function openModal(imageSrc) {
                document.getElementById('modalImage').src = imageSrc;
                document.getElementById('imageModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                document.getElementsByTagName('header')[0].style.zIndex = '0';
            }

            function closeModal() {
                document.getElementById('imageModal').classList.add('hidden');
                document.body.style.overflow = 'auto';
                document.getElementsByTagName('header')[0].style.zIndex = '40';
            }

            document.addEventListener('DOMContentLoaded', function () {
                var images = document.querySelectorAll('.zoomable-image');

                images.forEach(function (image) {
                    image.addEventListener('click', function () {
                        openModal(image.src);
                    });
                });

                document.getElementById('imageModal').addEventListener('click', function (event) {
                    if (event.target.id === 'imageModal') {
                        closeModal();
                    }
                });

                document.getElementById('closeModal').addEventListener('click', closeModal);
            });
        </script>
    </section>
</x-admin>
