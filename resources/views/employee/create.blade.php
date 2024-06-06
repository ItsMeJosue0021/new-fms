<x-admin>
    <div>
        <div class="flex pb-4 mt-20">
            <a href="{{ route('employees.index') }}" class="px-6 py-2 rounded text-gray-800 bg-white hover:bg-gray-100 cursor-pointer">Back</a>
        </div>
        <div class="flex mb-2 px-2">
            <h1 class="text-lg bg-medium">Update employee's information</h1>
        </div>
        <div class="p-5 rounded-lg bg-white ">
            <form method="POST" enctype="multipart/form-data" action="{{ route('employees.store') }}" class="flex flex-col w-full">
                @csrf
                <div class="flex space-x-4">
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="first_name" class="text-sm font-semibold">First Name</label>
                        <input id="first_name" name="first_name" type="text" placeholder="First Name" class="text-sm rounded-md border border-gray-200" value="{{ old('first_name') }}"/>
                        @error('first_name')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="middle_name" class="text-sm font-semibold">Middle Name</label>
                        <input id="middle_name" name="middle_name" type="text" placeholder="Middle Name" class="text-sm rounded-md border border-gray-200 w-full" value="{{ old('middle_name') }}"/>
                        @error('middle_name')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col space-y-2 w-full">
                        <label for="last_name" class="text-sm font-semibold">Last Name</label>
                        <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="text-sm rounded-md border border-gray-200 w-full" value="{{ old('last_name') }}"/>
                        @error('last_name')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col space-y-2 w-full">
                        <label for="type" class="text-sm font-semibold">Employee Type</label>
                        <select id="type" name="type" class="text-sm rounded-md border border-gray-200 w-full">
                            <option value="" disabled selected>--Select--</option>
                            <option value="Driver" {{ old('type') == 'Driver' ? 'selected' : '' }}>Driver</option>
                            <option value="Helper" {{ old('type') == 'Helper' ? 'selected' : '' }}>Helper</option>
                        </select>
                        @error('type')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex space-x-2 mt-3">
                  <div class="flex flex-col space-y-2 w-full">
                    <label for="image" class="text-sm font-semibold">Images</label>
                    <input type="file" name="image" id="image" accept="image/*" class="text-sm rounded-md border border-gray-200 w-full">
                    @error('image')
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
