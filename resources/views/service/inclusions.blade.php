<x-guest-layout>
    <div>
        <div class="max-w-[1200px] px-4 mx-auto ">
            <form action="{{ route('services.save-inclusions', $service->id) }}" method="POST" class="flex flex-col space-y-4 relative">
                @csrf
                <div class="absolute w-full h-full flex items-center justify-center z-0">
                    <x-candle-svg />
                </div>
                <x-stepper :page="$page" :service="$service" />
                <div class="w-full z-10">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-900 dark:text-white">Package Inclusions</h2>
                    <ul class="w-full space-y-1 text-gray-500 list-inside dark:text-gray-400">
                        <li class="flex items-center py-2 border-b border-gray-100">
                            <svg class="w-3.5 h-3.5 me-2 text-gray-600 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                            </svg>
                            Retrieval of Remains
                        </li>
                        <li class="flex items-center py-2 border-b border-gray-100">
                            <svg class="w-3.5 h-3.5 me-2 text-gray-600 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                            </svg>
                            Embalming
                        </li>
                        <li class="flex items-center py-2 border-b border-gray-100">
                            <svg class="w-3.5 h-3.5 me-2 text-gray-600 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                            </svg>
                            Viewing Equipment
                        </li>
                        <li class="flex items-center py-2 border-b border-gray-100">
                            <svg class="w-3.5 h-3.5 me-2 text-gray-600 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                            </svg>
                            Flowers
                        </li>
                        {{-- {{ $service->casket_id ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400' }} --}}
                        @if ($service->service_type === 'Memorial Services')
                            <li class="flex items-center py-2 border-b border-gray-100">
                                <div class="w-full flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-3.5 h-3.5 me-2 text-gray-600 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                        </svg>
                                        Casket
                                    </div>
                                    <div class="flex items-center space-x-16">
                                        @if ($service->casket_id)
                                            <span class="text-sm">{{ $service->casket->name }}</span>
                                        @else
                                            <span class="text-red-500 text-sm">No Casket Selected</span>
                                        @endif
                                        <a href="{{ route('services.caskets', $service->id) }}" class="text-blue-700">Select Casket</a>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li class="flex items-center py-2 border-b border-gray-100">
                                <div class="w-full flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-3.5 h-3.5 me-2 text-gray-600 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                        </svg>
                                        Urn
                                    </div>
                                    <div class="flex items-center space-x-16">
                                        @if ($service->urn_id)
                                            <span class="text-sm">{{ $service->urn->name }}</span>
                                        @else
                                            <span class="text-red-500 text-sm">No Casket Selected</span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endif
                        <li class="flex items-center py-2 border-b border-gray-100">
                            <div class="w-full flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="w-3.5 h-3.5 me-2 text-gray-600 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                    </svg>
                                    Hearse for Interment
                                </div>
                                <div class="flex items-center space-x-16">
                                @if ($service->hearse_id)
                                    <span class="text-sm">{{ $service->hearse->name }}</span>
                                @else
                                    <span class="text-red-500 text-sm">No Hearse Selected</span>
                                @endif
                                    <a href="{{ route('services.hearses', $service->id) }}" class="text-blue-700">Select Hearse</a>
                                </div>
                            </div>
                        </li>
                        <li class="flex items-center py-2 border-b border-gray-100">
                            <svg class="w-3.5 h-3.5 me-2 text-gray-600 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                            </svg>
                            {{-- Hot and Cold water despencer with __ of gallons of water --}}
                            <div class="w-full flex items-center space-x-2">
                                <span>Hot and Cold water despencer with</span>
                                <select name="water" id="small" class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}" {{ (old('water') ?? ($service->water ?? '')) == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>

                                <span>Gallons of Water</span>
                            </div>
                        </li>
                        <li class="flex items-center py-2 border-b border-gray-100">
                            <svg class="w-3.5 h-3.5 me-2 text-gray-600 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                            </svg>
                            Facilitation of Death Certificate and Permits c/o
                        </li>
                    </ul>
                </div>

                <div class="flex items-center space-x-4 z-10">
                    <button id="deleteButton" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="px-6 text-sm py-2 rounded-md text-gray-800 bg-gray-200 hover:bg-gray-300 cursor-pointer" type="button">
                        Cancel
                    </button>
                    {{-- <a href="{{ route('services.cancel', $service->id) }}" class="px-6 text-sm py-2 rounded-md text-gray-800 bg-gray-200 hover:bg-gray-300 cursor-pointer">Cancel</a> --}}
                    <button class="px-6 text-sm py-2 rounded-md text-white bg-blue-700 hover:bg-blue-800 cursor-pointer">Next</button>
                </div>
            </form>
            <!-- Modal toggle -->
            {{-- <div class="flex justify-center m-5">
                <button id="deleteButton" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
                Show delete confirmation
                </button>
            </div> --}}

            <!-- Main modal -->
            <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-6 text-center bg-white rounded-lg shadow dark:bg-gray-800">
                        <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        {{-- <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg> --}}
                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to cancel the request?</p>
                        <div class="flex justify-center items-center space-x-4">
                            <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                No, cancel
                            </button>
                            <a href="{{ route('services.cancel', $service->id) }}" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                Yes, I'm sure
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-customer>
