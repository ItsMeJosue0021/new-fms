<x-admin>
    <div>
        <div class="flex pb-4 mt-20">
            <a href="{{ route('announcements.index') }}" class="px-6 py-2 rounded text-gray-800 bg-white hover:bg-gray-100 cursor-pointer">Back</a>
        </div>
        <div class="flex p-2">
            <h1 class="text-lg bg-medium">Post Announcement</h1>
        </div>
        <div class="p-5 rounded-lg bg-white ">
            <form method="POST" enctype="multipart/form-data" action="{{ route('announcements.update', $announcement->id) }}" class="flex flex-col w-full">
                @csrf
                @method('PUT')
                <div class="flex space-x-4">
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="title" class="text-sm font-semibold">Tilte</label>
                        <input id="title" name="title" type="text" placeholder="Title.." class="text-sm rounded-md border border-gray-200" value="{{ $announcement->title }}"/>
                        @error('title')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col space-y-2 mt-3">
                    <label for="content" class="text-sm font-semibold">Description</label>
                    <textarea name="content" id="content" placeholder="Description..." type="text" class="text-sm h-24 rounded-md border border-gray-200">
                        {{ $announcement->content }}
                    </textarea>
                    @error('description')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>

                <div class="flex space-x-2 mt-3">
                  <div class="flex flex-col space-y-2 w-full">
                    <label for="images" class="text-sm font-semibold">Images</label>
                    <input type="file" name="images[]" id="images" accept="image/*" class="text-sm rounded-md border border-gray-200 w-full" multiple>
                    @error('images')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                  </div>
                </div>

                <div class="py-4">
                    <h2 class="font-bold text-sm mb-2">Current Images</h2>
                    <div class="grid grid-cols-5 gap-4">
                        @forelse ($announcement->announcementImages as $image)
                            <div class="relative h-56 max-w-full group cursor-pointer border border-gray-200 rounded-md">
                                <img class="w-full h-full rounded-md object-cover object-center" src="{{ asset('storage/' . $image->image) }}" alt="">
                                <div class="group-hover:bg-gray-500 group-hover:bg-opacity-50 top-0 left-0 rounded-md absolute w-full h-full flex items-center justify-center">
                                    <a href="{{ route('announcements.delete-image', $image->id) }}" class="hidden group-hover:block text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-5 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</a>
                                </div>
                            </div>
                        @empty
                            <p class="w-full text-sm text-red-500">No images found.</p>
                        @endforelse
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-6 py-2 text-sm rounded-md bg-blue-600 text-white hover:bg-blue-700">Save</button>
                </div>
              </form>
        </div>
    </div>
</x-admin>
