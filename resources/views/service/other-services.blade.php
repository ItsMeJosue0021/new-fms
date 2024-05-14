<x-admin>
    <div class="mt-24">
        <div class="flex pb-4">
            <a href="{{ route('requests.show', $request_id) }}" class="px-6 py-2 rounded text-gray-800 bg-white hover:bg-gray-100 cursor-pointer">Back</a>
        </div>
        <div class="max-w-[1200px] px-4 mx-auto ">
            <div class="w-full flex items-center">
                <div class="w-full flex flex-col space-y-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Other Services</h2>
                        <h2 class="text-sm text-gray-600">You are about to add other services to this request</h1>
                    </div>
                    <form action="{{ route('services.other-services-store', $service->id) }}" method="POST">
                        @csrf
                        <div class="flex flex-col space-y-4">
                            <div class="w-full">
                                <label for="service" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Service</label>
                                <textarea name="service" id="service" cols="30" rows="10" class="rounded border border-gray-300 h-24 w-full"></textarea>
                                @error('service')
                                    <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="price" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="number" name="price" id="price" placeholder="0.00" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('price')
                                    <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="text-xs px-6 py-2 font-medium rounded-md bg-blue-700 text-white cursor-pointer">Add Service</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if ($service->otherServices)
                <div class="flex flex-col space-y-2 mt-5">
                    @php
                        $counter = 0;
                    @endphp
                    @foreach ($service->otherServices as $other_service)
                        <div class="w-full flex items-center justify-between px-2 py-1 rounded border border-gray-200 group hover:bg-gray-50 cursor-pointer">
                            <div class="flex items-center space-x-2">
                                <span class="group-hover:text-blue-600">{{ chr(65 + $counter++) }}.</span>
                                <span class="group-hover:text-blue-600">{{ $other_service->service }}</span>
                            </div>
                            <span>₱{{ $other_service->price ? number_format($other_service->price, 2) : '0.00' }}</span>
                            <a href="{{ route('services.other-services-delete', [$service->id, $other_service->id]) }}">
                                <i class='bx bx-x text-lg px-2 rounded hover:bg-red-100 hover:text-red-500'></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-admin>
