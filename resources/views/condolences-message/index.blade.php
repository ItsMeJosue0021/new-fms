<x-admin>
    <div class="mt-20">
        <h1 class="py-4 text-lg text-medium">CONDOLENCES MESSAGE</h1>
        <form action="{{ route('condolences-message.update', $message->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-1">
                <label class="font-medium">Condolences Message</label>
                <textarea name="message" id="message" class="w-full h-40 rounded border border-gray-300">
                    {{ $message->message }}
                </textarea>
                @error('message')
                    <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror
            </div>
            <div class="flex mt-4">
                <button class="text-sm text-white px-6 py-2 rounded bg-blue-600 hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</x-admin>
