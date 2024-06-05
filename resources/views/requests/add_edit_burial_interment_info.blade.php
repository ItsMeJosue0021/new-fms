<x-admin>
    <div class="pt-24 ">
        <div class="flex pb-4">
            <a href="{{ route('requests.show', $request->id) }}" class="px-6 py-2 rounded text-gray-800 bg-white hover:bg-gray-100 cursor-pointer">Back</a>
        </div>
        <form action="{{ route('update-burial-interment-info', $request->id) }}" method="POST" >
            @csrf
            <div class="flex flex-col space-y-5 p-4 py-6 rounded-md bg-white">
                <h2 class=" text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-100">Burial & Interment Information </h2>
                <div class="w-full flex flex-col">
                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" >Name and Address of Cemetery <span class="italic font-light text-xs">(Optional)</span></label>
                    <input type="text" name="cementery_address" placeholder="Name and address of cemetery"
                    class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('cementery_address') ?? ($service->deceased->deathDetail->cementery_address ?? '') }}">
                    @error('cementery_address')
                        <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full flex flex-col">
                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Place of Viewing <span class="italic font-light text-xs">(Optional)</span></label>
                    <input type="text" name="viewing_place" placeholder="Place of viewing"
                    class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('viewing_place') ?? ($service->deceased->deathDetail->viewing_place ?? '') }}">
                    @error('viewing_place')
                        <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full flex space-x-4 items-start">
                    <div class="w-full flex flex-col">
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" >Time of Interment <span class="italic font-light text-xs">(Optional)</span></label>
                        <input type="time" name="internment_time" placeholder="Date of interment"
                        class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('internment_time') ?? ($service->deceased->deathDetail->internment_time ?? '') }}">
                        @error('internment_time')
                            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full flex flex-col">
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" >Date of Interment <span class="italic font-light text-xs">(Optional)</span></label>
                        <input id="internment_date" type="date" name="internment_date" placeholder="Time of interment" min="{{ date('Y-m-d') }}"
                        class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('internment_date') ?? ($service->deceased->deathDetail->internment_date ?? '') }}">
                        @error('internment_date')
                            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="px-6 py-2 rounded text-white bg-blue-500 hover:bg-blue-600">Update</button>
                </div>
            </div>
        </form>
    </div>
</x-admin>
