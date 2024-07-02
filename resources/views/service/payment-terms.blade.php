<x-guest-layout>
    <div class="max-w-[1200px] px-4 mx-auto ">
        <x-stepper :page="$page" :service="$service" />
        <div class="max-w-[1200px] mx-auto p-4 min-h-[600px] h-auto flex items-start justify-center mt-14">
            <div class="w-full flex flex-col items-center justify-center h-full">
                <h2 class="text-4xl font-semibold text-blue-600 mb-4 text-center">Payment Terms</h2>
                <div class="w-full flex flex-col items-center justify-start pt-3 text-center">
                    @if ($service->service_type == 'Memorial Services')
                        <p class="text-center">
                            <span class="underline font-bold ">FOR MEMORIAL SERVICE:</span>
                            {{ $term->memorial }}
                        </p>
                    @elseif ($service->service_type == 'Cremation Services')
                        <p class="text-center flex items-start justify-center">
                            <span class="underline font-bold">FOR DIRECT CREMATION:</span>
                            {{ $term->cremation }}
                        </p>
                    @endif
                    <p class="text-center italic pt-5">
                        {{ $term->lowertext }}
                    </p>
                </div>
                <div class="flex flex-col items-center justify-center space-y-2 pt-4">
                    <a href="{{ route('services.summary', $service->id) }}" class="nav-button text-sm px-6 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white cursor-pointer">I agree and wish to proceed</a>
                    <a href="{{ route('services.other-services', $service->id) }}" class="w-fit text-sm px-6 py-2 rounded-md bg-gray-200 hover:bg-gray-300 hover:text-gray-700 cursor-pointer">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

