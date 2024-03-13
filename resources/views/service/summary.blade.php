<x-customer>
    <div>
        <div class="max-w-[1400px] px-4 mx-auto ">
            <x-stepper/>
            <div>
                <div class="pb-4">
                    <a href="{{ route('services.other-services', $service->id) }}" class="px-6 py-2 rounded text-gray-800 bg-gray-100 hover:bg-gray-300 cursor-pointer">Back</a>
                </div>
                <div class="w-full z-10">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-900 dark:text-white">Package Inclusions</h2>
                    <ul class="w-full space-y-1 text-gray-500 list-inside dark:text-gray-400 text-gray-800">
                        <li class="flex items-center py-2 border-b border-gray-100">
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
                        <li class="flex items-center py-2 border-b border-gray-100">
                            <div class="w-full flex items-center justify-between">
                                <div class="flex items-center text-gray-800">
                                    <svg class="w-3.5 h-3.5 me-2 {{ $service->hearse_id ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400' }} flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    Hearse for Interment
                                </div>
                                <span class="text-sm text-gray-800">{{ $service->hearse->name }}</span>
                            </div>
                        </li>
                        <li class="flex items-center py-2 border-b border-gray-100">
                            <svg class="w-3.5 h-3.5 me-2 {{ $service->water ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400' }} flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <div class="w-full flex items-center space-x-2 text-gray-800">
                                <span>Hot and Cold water despencer with</span>
                                <span>{{ $service->water }}</span>
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
                                        <span>{{ $service->deceased->first_name}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Middle Name:</span>
                                        <span>{{ $service->deceased->middle_name}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Last Name:</span>
                                        <span>{{ $service->deceased->last_name}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Birthday:</span>
                                        <span>{{ $service->deceased->dob}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Age:</span>
                                        <span>{{ $service->deceased->age}}</span>
                                    </li>
                                </div>
                                <div class="w-full flex flex-col space-y-2">
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Sex:</span>
                                        <span>{{ $service->deceased->sex}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Height:</span>
                                        <span>{{ $service->deceased->height}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Weight:</span>
                                        <span>{{ $service->deceased->weight}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Occupation:</span>
                                        <span>{{ $service->deceased->occupation}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Citizenship:</span>
                                        <span>{{ $service->deceased->citizenship}}</span>
                                    </li>
                                </div>
                                <div class="w-full flex flex-col space-y-2">
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Religion:</span>
                                        <span>{{ $service->deceased->religion}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Civil Status:</span>
                                        <span>{{ $service->deceased->civil_status}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Father's Name:</span>
                                        <span>{{ $service->deceased->fathers_name}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Mother's Name:</span>
                                        <span>{{ $service->deceased->mother_maiden_name}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Birth Place:</span>
                                        <span>{{ $service->deceased->birth_place}}</span>
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
                                        <span>{{ $service->deceased->deceasedAddress->lot_block}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Street:</span>
                                        <span>{{ $service->deceased->deceasedAddress->street}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Baranggay:</span>
                                        <span>{{ $service->deceased->deceasedAddress->brgy}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">City/Municipality:</span>
                                        <span>{{ $service->deceased->deceasedAddress->city}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Province:</span>
                                        <span>{{ $service->deceased->deceasedAddress->province}}</span>
                                    </li>
                                </div>
                                <div class="w-full flex flex-col space-y-2">
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Time of Death:</span>
                                        <span>{{ $service->deceased->deathDetail->death_time}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Date of Death:</span>
                                        <span>{{ $service->deceased->deathDetail->death_date}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Cause of Death:</span>
                                        <span>{{ $service->deceased->deathDetail->death_cause}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-dashed border-b border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Place of Death:</span>
                                        <span>{{ $service->deceased->deathDetail->death_place}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-b border-dashed border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Address of Cementery:</span>
                                        <span>{{ $service->deceased->deathDetail->cementery_address }}</span>
                                    </li>
                                </div>
                                <div class="w-full flex flex-col space-y-2">
                                    <li class="w-full flex items-start justify-between border-b border-dashed border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Viewing Place:</span>
                                        <span>{{ $service->deceased->deathDetail->viewing_place}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-b border-dashed border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Interment Time:</span>
                                        <span>{{ $service->deceased->deathDetail->internment_time}}</span>
                                    </li>
                                    <li class="w-full flex items-start justify-between border-b border-dashed border-gray-100 hover:border-green-500 hover:bg-gray-50 cursor-pointer">
                                        <span class="font-medium">Interment Date:</span>
                                        <span>{{ $service->deceased->deathDetail->internment_date}}</span>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="py-6">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-900 dark:text-white">Casket & Hearse</h2>
                    <div class="flex items-start space-x-4">
                        <div class="md:w-1/3">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                {{-- <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="blog"> --}}
                                <div id="animation-carousel" class="relative w-full" data-carousel="static">
                                    <!-- Carousel wrapper -->
                                    <div class="relative lg:h-48 md:h-36 overflow-hidden z-0">
                                        <!-- Item 1 -->
                                        <div class="hidden duration-200 ease-linear" data-carousel-item>
                                            <img src="https://placehold.co/600x400/000000/FFF" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                        </div>
                                        <!-- Item 2 -->
                                        <div class="hidden duration-200 ease-linear" data-carousel-item>
                                            <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                        </div>
                                        <!-- Item 3 -->
                                        <div class="hidden duration-200 ease-linear" data-carousel-item="active">
                                            <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                        </div>
                                        <!-- Item 4 -->
                                        <div class="hidden duration-200 ease-linear" data-carousel-item>
                                            <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                        </div>
                                        <!-- Item 5 -->
                                        <div class="hidden duration-200 ease-linear" data-carousel-item>
                                            <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                        </div>
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

                                        <span class="leading-6 font-medium text-base">&#x20B1; {{ $service->casket->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/3">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                {{-- <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="blog"> --}}
                                <div id="animation-carousel" class="relative w-full" data-carousel="static">
                                    <!-- Carousel wrapper -->
                                    <div class="relative lg:h-48 md:h-36 overflow-hidden z-0">
                                        <!-- Item 1 -->
                                        <div class="hidden duration-200 ease-linear" data-carousel-item>
                                            <img src="https://placehold.co/600x400/000000/FFF" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                        </div>
                                        <!-- Item 2 -->
                                        <div class="hidden duration-200 ease-linear" data-carousel-item>
                                            <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                        </div>
                                        <!-- Item 3 -->
                                        <div class="hidden duration-200 ease-linear" data-carousel-item="active">
                                            <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                        </div>
                                        <!-- Item 4 -->
                                        <div class="hidden duration-200 ease-linear" data-carousel-item>
                                            <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                        </div>
                                        <!-- Item 5 -->
                                        <div class="hidden duration-200 ease-linear" data-carousel-item>
                                            <img src="https://dummyimage.com/720x400" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer" alt="...">
                                        </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('services.request-store', $service->id) }}" method="POST" class="mb-6 flex flex-col space-y-4">
                    @csrf
                    <div class="border border-dashed border-gray-500 bg-gray-50 p-4">
                        <li class="w-full flex items-start justify-between cursor-pointer font-medium">
                            <span>Total:</span>
                            <span>&#x20B1;{{ $service->casket->price}}</span>
                        </li>
                    </div>
                    <button class="px-6 text-sm py-2 rounded-md text-white bg-blue-700 hover:bg-blue-800 cursor-pointer">Confirm Request</button>
                </form>
            </div>
        </div>
        <div id="imageModal" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 ">
            <div class="w-full h-full flex items-center justify-center">
                <div id="modalContent" class="max-w-2xl mx-auto">
                    <img id="modalImage" src="" alt="Modal Image" class="w-full h-full rounded">
                    <button id="closeModal" class="absolute top-6 right-6 text-white cursor-pointer">
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
    </script>
</x-customer>
