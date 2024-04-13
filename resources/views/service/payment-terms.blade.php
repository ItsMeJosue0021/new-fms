<x-guest-layout>
    <div class="max-w-[1400px] px-4 mx-auto ">
        <x-stepper :page="$page" :service="$service" />
        <div class="max-w-[1400px] mx-auto p-4 min-h-[600px] h-auto flex items-center justify-center">
            <div class="w-full flex flex-col items-center justify-center h-full">
                <h2 class="text-4xl font-semibold text-blue-600 mb-4 text-center">Payment Terms</h2>
                <div class="w-full flex flex-col items-center justify-start pt-3 text-center">
                    <p class="text-center">
                        <span class="underline font-bold ">FOR MEMORIAL SERVICE:</span>
                        Down payment is optional not required. Full payment for the memorial service should be settle <span class="font-bold">1 Day before the interment.</span>
                    </p>
                    <p class="text-center flex items-start justify-center">
                        <span class="underline font-bold">FOR DIRECT CREMATION:</span>
                        Down payment is optional not required. Full payment is required <span class="font-bold">before the scheduled time and date of cremation.</span>
                    </p>

                    <p class="text-center italic pt-5">
                        By accepting this agreement, I understand the above stated information and it has been properly discussed to me and I hereby agree to engage and avail the abovementioned memorial service. Withdrawal will be subject for approval and changes.
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

