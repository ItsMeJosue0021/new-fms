<x-admin>
    <div>
        <div class="flex pb-4 mt-20">
            <a href="{{ route('announcements.index') }}" class="px-6 py-2 rounded text-gray-800 bg-white hover:bg-gray-100 cursor-pointer">Back</a>
        </div>
        <div class="flex p-2">
            <h1 class="text-lg bg-medium">Post Announcement</h1>
        </div>
        <div class="p-5 rounded-lg bg-white ">
            <form method="POST" enctype="multipart/form-data" action="{{ route('announcements.store') }}" class="flex flex-col w-full">
                @csrf
                <div class="flex space-x-4">
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="title" class="text-sm font-semibold">Tilte</label>
                        <input id="title" name="title" type="text" placeholder="Title.." class="text-sm rounded-md border border-gray-200"/>
                        @error('title')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col space-y-2 mt-3">
                    <label for="content" class="text-sm font-semibold">Description</label>
                    <textarea name="content" id="content" placeholder="Description..." type="text" class="text-sm h-24 rounded-md border border-gray-200"></textarea>
                    @error('content')
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

                <div class="mt-6">
                    <button type="submit" class="px-6 py-2 text-sm rounded-md bg-blue-600 text-white hover:bg-blue-700">Save</button>
                </div>
              </form>
        </div>
    </div>
</x-admin>
