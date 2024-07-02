<x-admin>
    <div class="mt-20">
        <h1 class="py-4 text-lg text-medium">PAYMENT TERMS</h1>
        <form action="{{ route('payment-terms.update', $term->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-4">
                <div class="flex flex-col space-y-1">
                    <label class="font-medium">Terms for Memorial Services</label>
                    <textarea name="memorial" id="memorial" class="w-full h-24 rounded border border-gray-300">
                        {{ $term->memorial }}
                    </textarea>
                    @error('memorial')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label class="font-medium">Terms for Cremation Services</label>
                    <textarea name="cremation" id="cremation" class="w-full h-24 rounded border border-gray-300">
                        {{ $term->cremation }}
                    </textarea>
                    @error('cremation')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label class="font-medium">General Terms</label>
                    <textarea name="lowertext" id="lowertext" class="w-full h-40 rounded border border-gray-300">
                        {{ $term->lowertext }}
                    </textarea>
                    @error('lowertext')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex mt-4">
                <button class="text-sm text-white px-6 py-2 rounded bg-blue-600 hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</x-admin>
