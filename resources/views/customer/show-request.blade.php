<x-customer>
    <div>
        <div class="mt-24 relative">
            <div class="flex pb-4 z-30">
                <a href="{{ route('customer.requests') }}" class="px-6 py-2 rounded text-gray-800 bg-gray-100 hover:bg-gray-200 cursor-pointer">Back</a>
            </div>
            @if ($service->serviceRequest->status == 'completed' && !$service->serviceRequest->feedback)
                <div id="feedback-cntr" class="w-full md:w-1/2 shadow-xl absolute top-5 right-0 mb-5 rounded-lg bg-white min-h-40">
                    <div id="alert-border-2" class="flex items-center p-4 rounded-t-lg text-green-800 border-t-4 border-green-300 bg-green-50 dark:bg-gray-800 dark:border-green-800" role="alert">
                        <svg class="w-6 h-6 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                        </svg>
                        <div class="ms-3 text-sm font-medium">
                        Your service request has been completed! Please feel free to send us a feedback about our services so we can continue to serve better.
                        </div>
                        <div class="flex h-full">
                            <i id="close-btn" class='bx bx-x text-3xl cursor-pointer rounded-full px-1 hover:bg-green-100'></i>
                        </div>
                    </div>
                    <form action="{{ route('feedback.store', $request->id) }}" method="POST" class="p-4">
                        @csrf
                        <input type="hidden" name="stars" id="startInput">
                        <div class="flex flex-col space-y-1">
                            <label for="">Say something about our service..</label>
                            <textarea name="content" id="" cols="30" rows="10" class="h-32 rounded-lg border border-gray-300"></textarea>
                        </div>
                        <div class="flex items-start justify-between pt-2">
                            <div id="stars" class="flex items-center">
                                <svg class="cursor-pointer star w-5 h-5 text-gray-300 ms-" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <svg class="cursor-pointer star w-5 h-5 text-gray-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <svg class="cursor-pointer star w-5 h-5 text-gray-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <svg class="cursor-pointer star w-5 h-5 text-gray-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <svg class="cursor-pointer star w-5 h-5 text-gray-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>

                                <script>
                                    // Initialize rating to 0
                                    let rating = 0;

                                    // Get all stars
                                    const stars = document.querySelectorAll('.star');
                                    const starstInput = document.getElementById('startInput');

                                    // Add click event listener to each star
                                    stars.forEach((star, index) => {
                                        star.addEventListener('click', () => {
                                            // Check if this star has already been clicked
                                            if (star.classList.contains('text-yellow-300')) {
                                                // If so, unselect it and all stars to its right
                                                for (let i = index; i < stars.length; i++) {
                                                    stars[i].classList.remove('text-yellow-300');
                                                    stars[i].classList.add('text-gray-300');
                                                }

                                                // Set rating to index
                                                rating = index;
                                            } else {
                                                // If not, select it and all stars to its left
                                                for (let i = 0; i <= index; i++) {
                                                    stars[i].classList.remove('text-gray-300');
                                                    stars[i].classList.add('text-yellow-300');
                                                }

                                                // Set rating to index + 1
                                                rating = index + 1;
                                            }

                                            starstInput.value = rating;

                                            // Now you can save `rating` to your database
                                            console.log('Rating:', rating);
                                        });
                                    });
                                </script>
                            </div>
                            <button class="py-2 px-8 bg-blue-600 hover:bg-blue-700 rounded-md text-white text-sm">Send</button>
                        </div>
                    </form>
                </div>
            @endif

            <div class=" bg-white p-6 rounded-b-md shadow">
                <div class="w-full z-10">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-900 dark:text-white">Package Inclusions</h2>
                    <ul class="w-full space-y-1 text-gray-500 list-inside dark:text-gray-400">
                        <li class="flex items-center py-2 border-b border-gray-100 text-gray-800">
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            Retrieval of Remains
                        </li>
                        <li class="flex items-center py-2 border-b border-gray-100 text-gray-800">
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            Embalming
                        </li>
                        <li class="flex items-center py-2 border-b border-gray-100 text-gray-800">
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            Viewing Equipment
                        </li>
                        <li class="flex items-center py-2 border-b border-gray-100 text-gray-800">
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            Flowers
                        </li>
                        @if ($service->service_type === 'Memorial Services')
                            <li class="flex items-center py-2 border-b border-gray-100">
                                <div class="w-full flex items-center justify-between">
                                    <div class="flex items-center text-gray-800">
                                        <svg class="w-3.5 h-3.5 me-2 {{ $service->casket_id ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400' }} flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                        </svg>
                                        Casket
                                    </div>
                                    <span class="text-sm text-gray-800">{{ $service->casket->name }}</span>
                                </div>
                            </li>
                        @else
                            <li class="flex items-center py-2 border-b border-gray-100">
                                <div class="w-full flex items-center justify-between">
                                    <div class="flex items-center text-gray-800">
                                        <svg class="w-3.5 h-3.5 me-2 {{ $service->urn_id ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400' }} flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                        </svg>
                                        Urn
                                    </div>
                                    <span class="text-sm text-gray-800">{{ $service->urn->name }}</span>
                                </div>
                            </li>
                        @endif
                        <li class="flex items-center py-2 border-b border-gray-100">
                            <div class="w-full flex items-center justify-between">
                                <div class="flex items-center text-gray-800">
                                    <svg class="w-3.5 h-3.5 me-2 {{ $service->hearse_id ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400' }} flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    Hearse for Interment
                                </div>
                                <span class="text-sm text-gray-800">{{ $service->hearse->name ?? '' }}</span>
                            </div>
                        </li>
                        <li class="flex items-center py-2 border-b border-gray-100">
                            <svg class="w-3.5 h-3.5 me-2 {{ $service->water ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400' }} flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <div class="w-full flex items-center space-x-2 text-gray-800">
                                <span>Hot and Cold water despencer with</span>
                                <span>{{ $service->water ?? '' }}</span>
                                <span>Gallons of Water</span>
                            </div>
                        </li>
                        <li class="flex items-center py-2 border-b border-gray-100 text-gray-800">
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            Facilitation of Death Certificate and Permits c/o
                        </li>
                    </ul>
                </div>

                <div class="py-6">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-900 dark:text-white">Deceased's Information</h2>
                    <div class="w-full flex flex-col space-y-4 bg-white rounded-lg overflow-hidden">
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold mb-4 border-b border-gray-100">Personal Information</h3>
                            <ul class="flex items-start justify-between space-x-20">
                                <div class="w-full flex flex-col space-y-2">
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">First Name:</span>
                                        <span>{{ $service->deceased->first_name ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Middle Name:</span>
                                        <span>{{ $service->deceased->middle_name ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Last Name:</span>
                                        <span>{{ $service->deceased->last_name ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Birthday:</span>
                                        <span>{{ $service->deceased->dob ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Age:</span>
                                        <span>{{ $service->deceased->age ?? ''}}</span>
                                    </li>
                                </div>
                                <div class="w-full flex flex-col space-y-2">
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Sex:</span>
                                        <span>{{ $service->deceased->sex ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Height:</span>
                                        <span>{{ $service->deceased->height ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Weight:</span>
                                        <span>{{ $service->deceased->weight ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Occupation:</span>
                                        <span>{{ $service->deceased->occupation ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Citizenship:</span>
                                        <span>{{ $service->deceased->citizenship ?? ''}}</span>
                                    </li>
                                </div>
                                <div class="w-full flex flex-col space-y-2">
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Religion:</span>
                                        <span>{{ $service->deceased->religion ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Civil Status:</span>
                                        <span>{{ $service->deceased->civil_status ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Father's Name:</span>
                                        <span>{{ $service->deceased->fathers_name ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Mother's Name:</span>
                                        <span>{{ $service->deceased->mother_maiden_name ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Birth Place:</span>
                                        <span>{{ $service->deceased->birth_place ?? ''}}</span>
                                    </li>
                                </div>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold mb-4 border-b border-gray-100">Address, Interment & Burial Information</h3>
                            <ul class="flex items-start justify-between space-x-20">
                                <div class="w-full flex flex-col space-y-2">
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Lot/Blok:</span>
                                        <span>{{ $service->deceased->deceasedAddress->lot_block ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Street:</span>
                                        <span>{{ $service->deceased->deceasedAddress->street ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Barangay:</span>
                                        <span>{{ $service->deceased->deceasedAddress->brgy ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">City/Municipality:</span>
                                        <span>{{ $service->deceased->deceasedAddress->city ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Province:</span>
                                        <span>{{ $service->deceased->deceasedAddress->province ?? ''}}</span>
                                    </li>
                                </div>
                                <div class="w-full flex flex-col space-y-2">
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Time of Death:</span>
                                        <span>{{ $service->deceased->deathDetail->death_time ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Date of Death:</span>
                                        <span>{{ $service->deceased->deathDetail->death_date ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Cause of Death:</span>
                                        <span>{{ $service->deceased->deathDetail->death_cause ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Place of Death:</span>
                                        <span>{{ $service->deceased->deathDetail->death_place ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-b border-dashed border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Address of Cementery:</span>
                                        <span>{{ $service->deceased->deathDetail->cementery_address ?? ''}}</span>
                                    </li>
                                </div>
                                <div class="w-full flex flex-col space-y-2">
                                    <li class="w-full flex items-start justify-between border-b border-dashed border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Viewing Place:</span>
                                        <span>{{ $service->deceased->deathDetail->viewing_place ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-b border-dashed border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Interment Time:</span>
                                        <span>{{ $service->deceased->deathDetail->internment_time ?? ''}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-b border-dashed border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Interment Date:</span>
                                        <span>{{ $service->deceased->deathDetail->internment_date ?? ''}}</span>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>

                @if ($service->deceased->documents)
                    <div class="w-full pb-1 border-b border-gray-200 mt-5">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Uploaded Documents</h2>
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

                <div>
                    <h2 class="mb-2 mt-8 text-2xl font-semibold text-gray-900 dark:text-white">Other Services</h2>
                    <div class="w-full flex flex-col space-y-4 rounded-lg overflow-hidden">
                        <div class="mb-4">
                            @if ($service->otherServices)
                                <div class="flex flex-col space-y-2 mt-5">
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach ($service->otherServices as $other_service)
                                        <div class="w-full flex items-center justify-between px-2 py-1 rounded border border-gray-200 group hover:bg-gray-50 cursor-pointer">
                                            <div class="flex items-center space-x-2">
                                                <span class="group-hover:text-blue-600">{{ chr(65 + $counter++) }}.</span>
                                                <span class="group-hover:text-blue-600">{{ $other_service->service }}</span>
                                            </div>
                                            <span>₱{{ $other_service->price ? number_format($other_service->price, 2) : '0.00' }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h3 class="text-sm w-full text-center mb-4 text-red-500 ">No other services</h3>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="py-6">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-900 dark:text-white">Casket & Hearse</h2>
                    <div class="flex items-start space-x-4">
                        @if ($service->service_type === 'Memorial Services')
                            <div class="md:w-1/3">
                                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                    {{-- <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="blog"> --}}
                                    <div id="animation-carousel" class="relative w-full" data-carousel="static">
                                        <!-- Carousel wrapper -->
                                        <div class="relative lg:h-48 md:h-36 overflow-hidden z-0">
                                            @if (count($service->casket->casketImages) > 0)
                                                @foreach ($service->casket->casketImages as $image)
                                                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                                                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $service->casket->name }}" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer">
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="hidden duration-200 ease-linear" data-carousel-item>
                                                    <img src="https://placehold.co/600x400/000000/FFF" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                                </div>

                                                <div class="hidden duration-200 ease-linear" data-carousel-item>
                                                    <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                                </div>

                                                <div class="hidden duration-200 ease-linear" data-carousel-item="active">
                                                    <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                                </div>
                                            @endif
                                        </div>
                                        <!-- Slider controls -->
                                        <button type="button" class="z-0 absolute top-0 start-0 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                </svg>
                                                <span class="sr-only">Previous</span>
                                            </span>
                                        </button>
                                        <button type="button" class="z-0 absolute top-0 end-0 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                                </svg>
                                                <span class="sr-only">Next</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="p-4">
                                        <h1 class="title-font text-lg font-medium text-gray-900 ">{{ $service->casket->name }}</h1>
                                        <p class="leading-6 mb-3 text-sm">{{ $service->casket->description }}</p>

                                        <div class="flex items-center justify-between z-50">

                                            <span class="leading-6 font-medium text-base">₱{{ $service->casket->price ? number_format($service->casket->price, 2) : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="md:w-1/3">
                                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                    <div id="animation-carousel" class="relative w-full" data-carousel="static">
                                        <div class="relative lg:h-48 md:h-36 overflow-hidden z-0">
                                            @if ($service->urn->image)
                                                <img src="{{ asset('storage/' . $service->urn->image) }}" alt="{{ $service->urn->name }}" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer">
                                            @else
                                                <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <h1 class="title-font text-lg font-medium text-gray-900 ">{{ $service->urn->name }}</h1>
                                        <p class="leading-6 mb-3 text-sm">{{ $service->urn->description }}</p>

                                        <div class="flex items-center justify-between z-50">

                                            <span class="leading-6 font-medium text-base">₱{{ $service->urn->price ? number_format($service->urn->price, 2) : '0.00' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="md:w-1/3">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                {{-- <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="blog"> --}}
                                <div id="animation-carousel" class="relative w-full" data-carousel="static">
                                    <!-- Carousel wrapper -->
                                    <div class="relative lg:h-48 md:h-36 overflow-hidden z-0">
                                        @if (count($service->hearse->hearseImages) > 0)
                                            @foreach ($service->hearse->hearseImages as $image)
                                                <div class="hidden duration-200 ease-linear" data-carousel-item>
                                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $service->hearse->name }}" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="hidden duration-200 ease-linear" data-carousel-item>
                                                <img src="https://placehold.co/600x400/000000/FFF" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                            </div>

                                            <div class="hidden duration-200 ease-linear" data-carousel-item>
                                                <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                            </div>

                                            <div class="hidden duration-200 ease-linear" data-carousel-item="active">
                                                <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Slider controls -->
                                    <button type="button" class="z-0 absolute top-0 start-0 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                            </svg>
                                            <span class="sr-only">Previous</span>
                                        </span>
                                    </button>
                                    <button type="button" class="z-0 absolute top-0 end-0 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                            </svg>
                                            <span class="sr-only">Next</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="p-4">
                                    <h1 class="title-font text-lg font-medium text-gray-900 ">{{ $service->hearse->name }}</h1>
                                    <p class="leading-6 mb-3 text-sm">{{ $service->hearse->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6 flex flex-col space-y-4">
                    {{-- <div class="border border-dashed border-gray-500 bg-gray-50 p-4">
                        <li class="w-full flex items-start justify-between cursor-pointer font-medium">
                            <span>Total:</span>
                            <span>&#x20B1;{{ $service->casket->price ?? ''}}</span>
                        </li>
                    </div> --}}
                    <div class="mb-6 flex flex-col space-y-4">
                        <div class="flex flex-col space-y-2 border border-gray-300 bg-gray-50 p-4 py-6">
                            <h2 class="text-lg font-semibold ">Payment Details</h2>
                            <li class="w-full flex items-start justify-between cursor-pointer font-medium border-b border-dashed border-gray-300">
                                <span>Total Amount:</span>
                                @php
                                    if ($service->otherServices) {
                                        if ($service->service_type === 'Memorial Services') {
                                            $total = $service->casket->price;
                                            foreach ($service->otherServices as $other_service) {
                                                $total += $other_service->price;
                                            }
                                        } else {
                                            $total = $service->urn->price;
                                            foreach ($service->otherServices as $other_service) {
                                                $total += $other_service->price;
                                            }
                                        }
                                    }
                                @endphp
                                @if ($service->service_type === 'Memorial Services')
                                    <span>₱{{ $total ? number_format($total, 2) : '0.00' }}</span>
                                @else
                                    <span>₱{{ $total ? number_format($total, 2) : '0.00' }}</span>
                                @endif
                            </li>
                            @if ($service->serviceRequest->status == 'confirmed' || $service->serviceRequest->status == 'completed')
                                <li class="w-full flex items-start justify-between cursor-pointer font-medium border-b border-dashed border-gray-300">
                                    <span>Discount:</span>
                                    <span>₱{{ $request->discount_amount ? number_format($request->discount_amount, 2) : '0.00' }}</span>
                                </li>
                                <li class="w-full flex items-start justify-between cursor-pointer font-medium border-b border-dashed border-gray-300">
                                    <span>Recieved Amount:</span>
                                    <span>₱{{ $request->recieved_amount ? number_format($request->recieved_amount, 2) : '0.00' }}</span>
                                </li>
                                <li class="w-full flex items-start justify-between cursor-pointer font-medium border-b border-dashed border-gray-300">
                                    <span>Payment Method</span>
                                    <span>{{ $request->payment_method ?? '' }}</span>
                                </li>
                                <li class="w-full flex items-start justify-between cursor-pointer font-medium border-b border-dashed border-gray-300">
                                    <span>Payment Reference</span>
                                    <span>{{ $request->payment_reference ?? 'N/A' }}</span>
                                </li>
                                <div class="flex items-start pt-2">
                                    <a href="{{ route('requests.receipt', $request->id) }}" class="text-sm text-white rounded-md bg-blue-600 hover:bg-blue-700 py-2 px-3">Download Receipt</a>
                                </div>
                            @endif
                        </div>
                    @if ($service->status == 'pending')
                        <a href="{{ route('customer.requests-cancel', $request->id) }}" class="px-6 text-sm py-2 rounded-md text-white text-center bg-red-600 hover:bg-red-800 cursor-pointer">Cancel Request</a>
                    @endif
                </div>
            </div>
        </div>
        <div id="imageModal" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 z-50 ">
            <div class="w-full h-full flex items-center justify-center">
                <div id="modalContent" class="max-w-2xl mx-auto">
                    <img id="modalImage" src="" alt="Modal Image" class="w-full h-full rounded">
                    <button id="closeModal" class="absolute top-6 right-6 text-white cursor-pointer ">
                        <i class="bx bx-x text-3xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            document.getElementsByTagName('header')[0].style.zIndex = '0';
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            document.getElementsByTagName('header')[0].style.zIndex = '40';
        }

        document.addEventListener('DOMContentLoaded', function () {
            var images = document.querySelectorAll('.zoomable-image');

            images.forEach(function (image) {
                image.addEventListener('click', function () {
                    openModal(image.src);
                });
            });

            document.getElementById('imageModal').addEventListener('click', function (event) {
                if (event.target.id === 'imageModal') {
                    closeModal();
                }
            });

            document.getElementById('closeModal').addEventListener('click', closeModal);
        });

        document.getElementById('close-btn').addEventListener('click', function () {
            document.getElementById('feedback-cntr').classList.add('hidden');
        });
    </script>
</x-customer>
