<x-customer>
    <div>
        <div class="max-w-[1400px] px-4 mx-auto ">
            <x-stepper :page="$page" :service="$service" />

            <div>
                <form action="{{ route('services.save-other-services', $service->id) }}" method="POST"
                class="w-full flex items-center">
                @csrf
                    <div class="w-full flex flex-col space-y-4">
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Other Services (Optional)</h2>
                            <h2 class="text-sm text-gray-600">Please feel free to specify any additional assistance or services you may require.</h1>
                        </div>
                        <div>
                            <textarea name="others" placeholder="Write your requests.. "
                            class="min-h-[150px] active:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >{{($serviceInformation->other_services ?? '')}}</textarea>
                        </div>
                        <div class="flex items-center space-x-4">
                            <a class="nav-button text-sm px-6 py-2 rounded-md bg-gray-200 hover:bg-gray-300 hover:text-gray-700 cursor-pointer"
                            href="{{ route('services.informant', $service->id) }}"
                            >Back</a>
                            <button type="submit" class=" text-sm px-6 py-2 rounded-md bg-blue-700 hover:bg-blue-800 text-white cursor-pointer">Save and Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-customer>
