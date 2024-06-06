<x-admin>
    <div>
        <div class="flex pb-4 mt-20">
            <a href="{{ route('employees.index') }}" class="px-6 py-2 rounded text-gray-800 bg-white hover:bg-gray-100 cursor-pointer">Back</a>
        </div>
        <div class="flex mb-2 px-2">
            <h1 class="text-lg bg-medium">Update employee's information</h1>
        </div>
        <div class="p-5 rounded-lg bg-white ">
            <form method="POST" enctype="multipart/form-data" action="{{ route('employees.update', $employee->id) }}" class="flex flex-col w-full">
                @method('PUT')
                @csrf
                <div class="flex space-x-4">
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="first_name" class="text-sm font-semibold">First Name</label>
                        <input id="first_name" name="first_name" type="text" placeholder="First Name" class="text-sm rounded-md border border-gray-200" value="{{ $employee->first_name }}"/>
                        @error('first_name')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="middle_name" class="text-sm font-semibold">Middle Name</label>
                        <input id="middle_name" name="middle_name" type="text" placeholder="Middle Name" class="text-sm rounded-md border border-gray-200 w-full" value="{{ $employee->middle_name }}"/>
                        @error('middle_name')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col space-y-2 w-full">
                        <label for="last_name" class="text-sm font-semibold">Last Name</label>
                        <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="text-sm rounded-md border border-gray-200 w-full" value="{{ $employee->last_name }}"/>
                        @error('last_name')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col space-y-2 w-full">
                        <label for="type" class="text-sm font-semibold">Employee Type</label>
                        <select id="type" name="type" class="text-sm rounded-md border border-gray-200 w-full">
                            <option value="" disabled selected>--Select--</option>
                            <option value="Driver" {{ $employee->type == 'Driver' ? 'selected' : '' }}>Driver</option>
                            <option value="Helper" {{ $employee->type == 'Helper' ? 'selected' : '' }}>Helper</option>
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

                <div class="py-4">
                    <h2 class="font-bold text-sm mb-2">Employee Image</h2>
                    <div class="grid grid-cols-5 gap-4">
                        @if ($employee->image)
                            <div class="relative h-56 max-w-full group cursor-pointer border border-gray-200 rounded-md">
                                <img class="w-full h-full rounded-md object-cover object-center" src="{{ asset('storage/' . $employee->image) }}" alt="">
                                <div class="group-hover:bg-gray-500 group-hover:bg-opacity-50 top-0 left-0 rounded-md absolute w-full h-full flex items-center justify-center">
                                    <a href="{{ route('employees.delete-image', $employee->id) }}" class="hidden group-hover:block text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-5 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</a>
                                </div>
                            </div>
                        @else
                            <p class="w-full text-sm text-red-500">No images found.</p>
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
