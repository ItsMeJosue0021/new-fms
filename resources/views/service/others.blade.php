<x-guest-layout>
    <div>
        <div class="max-w-[1200px] px-4 mx-auto ">
            <x-stepper :page="$page" :service="$service" />

            <form action="{{ route('services.documents-store', $service->id) }}" method="POST"
            class="w-full flex items-center" enctype="multipart/form-data">
            @csrf
                <div class="w-full flex flex-col space-y-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Upload Documents</h2>
                        <h2 class="text-sm text-gray-600">Please upload the documents of the deceased.</h1>
                    </div>
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="files" class="text-sm font-semibold">Documents</label>
                        <input type="file" name="files[]" id="files" class="text-sm rounded-md border border-gray-200 w-full" multiple>
                        @error('files')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between space-x-4">

                        <div class="flex items-center space-x-4">
                            <a class="nav-button text-sm px-6 py-2 rounded-md bg-gray-200 hover:bg-gray-300 hover:text-gray-700 cursor-pointer"
                            href="{{ route('services.informant', $service->id) }}"
                            >Back</a>
                            <button type="submit" class="text-xs px-6 py-2 font-medium rounded-md text-blue-700 border border-blue-700 hover:bg-blue-800 hover:text-white cursor-pointer">Add</button>
                        </div>
                        <a href="{{ route('services.documents-redirect', $service->id) }}"
                            class="text-sm px-6 py-2 rounded-md bg-blue-700 hover:bg-blue-800 text-white cursor-pointer">Proceed</a>
                    </div>
                </div>
            </form>

            @if ($service->deceased->documents)
                <div class="w-full pb-1 border-b border-gray-200 mt-5">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Uploaded Documents</h2>
                </div>
                <div class="flex flex-col space-y-2 mt-5">
                    @foreach ($service->deceased->documents as $document)
                        <div class="w-full flex items-center justify-between px-2 py-1 rounded border border-gray-200 group hover:bg-gray-50 cursor-pointer">
                            <div class="flex items-center space-x-2">
                                <i class='bx bxs-file-doc text-lg group-hover:text-blue-600'></i>
                                <span class="group-hover:text-blue-600">{{ $document->name }}</span>
                            </div>
                            <form action="{{ route('services.documents-delete', [$service->id, $document->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <i class='bx bx-x text-lg px-2 rounded hover:bg-red-100 hover:text-red-500'></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-customer>
