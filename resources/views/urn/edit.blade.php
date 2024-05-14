<x-admin>
    <div>
        <div class="flex pb-4 mt-20">
            <a href="{{ route('urns.index') }}" class="px-6 py-2 rounded text-gray-800 bg-white hover:bg-gray-100 cursor-pointer">Back</a>
        </div>
        <div class="flex mb-2 px-2">
            <h1 class="text-lg bg-medium">Update Urn</h1>
        </div>
        <div class="p-5 rounded-lg bg-white ">
            <form method="POST" action="{{ route('urns.update', $urn->id) }}" enctype="multipart/form-data" class="flex flex-col w-full">
                @method('PUT')
                @csrf
                <div class="flex space-x-4">
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="name" class="text-sm font-semibold">Name</label>
                        <input id="name" name="name" type="text" placeholder="Product name" class="text-sm rounded-md border border-gray-200" value="{{ $urn->name }}"/>
                        @error('name')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col space-y-2 mt-3">
                    <label for="description" class="text-sm font-semibold">Description</label>
                    <textarea name="description" id="description" placeholder="Description..." type="text" class="text-sm h-24 rounded-md border border-gray-200">
                        {{ $urn->description }}
                    </textarea>
                    @error('description')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>

                <div class="flex space-x-4 mt-3">
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="image" class="text-sm font-semibold">Image</label>
                        <input type="file" name="image" id="image" accept="image/*" class="text-sm rounded-md border border-gray-200 w-full">
                        @error('image')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="stock" class="text-sm font-semibold">Stock</label>
                        <input id="stock" name="stock" type="number" placeholder="Stock" class="text-sm rounded-md border border-gray-200" value="{{ $urn->stock }}"/>
                        @error('stock')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="price" class="text-sm font-semibold">Price</label>
                        <input id="price" name="price" type="number" placeholder="Price" class="text-sm rounded-md border border-gray-200" value="{{ $urn->price }}"/>
                        @error('price')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="water" class="text-sm font-semibold">Water</label>
                        <input id="water" name="water" type="number" placeholder="0" class="text-sm rounded-md border border-gray-200 w-full" value="{{ $urn->water }}"/>
                        @error('water')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="py-4">
                    <h2 class="font-bold text-sm mb-2">Current Image</h2>
                    <div class="grid grid-cols-5 gap-4">
                        @if ($urn->image)
                            <div class="relative h-56 max-w-full group cursor-pointer border border-gray-200 rounded-md">
                                <img class="w-full h-full rounded-md object-cover object-center" src="{{ asset('storage/' . $urn->image) }}" alt="">
                                <div class="group-hover:bg-gray-500 group-hover:bg-opacity-50 top-0 left-0 rounded-md absolute w-full h-full flex items-center justify-center">
                                    <a href="{{ route('urns.delete-image', $urn->id) }}" class="hidden group-hover:block text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-5 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-6 py-2 text-sm rounded-md bg-blue-600 text-white hover:bg-blue-700">Update</button>
                </div>
              </form>
        </div>
    </div>
</x-admin>
