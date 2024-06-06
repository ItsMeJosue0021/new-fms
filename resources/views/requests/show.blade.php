<x-admin>
    <div>
        <div class="mt-24">
            <div class="flex pb-4">
                <a href="{{ route('requests.index') }}" class="px-6 py-2 rounded text-gray-800 bg-white hover:bg-gray-100 cursor-pointer">Back</a>
            </div>
            <div id="alert-border-2" class="flex items-center p-4 rounded-t-lg text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ms-3 text-sm font-medium">
                  This is a pending request. Please process as soon as possible. Thank you!
                </div>
            </div>
            <div class=" bg-white p-6 rounded-b-md">
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
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <div class="w-full flex items-center space-x-2 text-gray-800">
                                <span>Hot and Cold water despencer with</span>
                                <span>
                                    @if ($service->casket_id)
                                    {{ $service->casket->water }}
                                    @elseif ($service->urn_id)
                                        {{ $service->urn->water }}
                                    @else
                                        0
                                    @endif
                                </span>
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
                            <div class="flex items-start justify-between mb-4 ">
                                <h3 class="text-lg font-semibold ">Address, Interment & Burial Information</h3>
                                <a href="{{ route('add-edit-burial-interment-info', $request->id) }}" class="text-xs rounded-md border text-blue-600 border-blue-600 py-2 px-4 hover:text-blue-700 hover:border-blue-700">Add/Edit Burial & Interment Infomation</a>
                            </div>
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

                <div class="flex items-start justify-between space-x-12 py-16">
                    <div class="w-full">
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
                                </div>
                            </div>
                        </form>
                        <div>
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

                    <div class="w-full">
                        <div class="w-full flex items-center justify-between mb-4 border-b border-gray-200 pb-2">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Other Services</h2>
                            <a href="{{ route('services.other-services-create', [$service->id, $request->id]) }}" type="submit" class="w-fit text-xs px-6 py-2 font-medium rounded-md hover:bg-blue-700 hover:text-white text-blue-700 border border-blue-600 cursor-pointer">Add Other Service</a>
                        </div>
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
                                                <a href="{{ route('services.other-services-delete', [$service->id, $other_service->id]) }}">
                                                    <i class='bx bx-x text-lg px-2 rounded hover:bg-red-100 hover:text-red-500'></i>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <h3 class="text-sm w-full text-center mb-4 text-red-500 ">No other services</h3>
                                @endif
                            </div>
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
                <form action="{{ route('requests.confirm', $request->id) }}" method="POST" class="mb-6 flex flex-col space-y-4">
                    @csrf
                    <div class="border border-gray-100  p-4 rounded-md shadow-md mb-4">
                        <div class="py-4 flex flex-col space-y-6">

                            <div>
                                <span class="w-full border-b border-gray-300 mb-4 py-1 block text-lg font-semibold text-gray-900 dark:text-white">Payment Method</span>
                                <div class="flex items-center space-x-4">
                                    <div class="w-full flex items-center justify-between px-4 py-2 border border-gray-200 rounded-md bg-gray-50 dark:border-gray-700">
                                        <div class="flex items-center space-x-1 ml-1">
                                            <input id="bordered-checkbox-1" type="checkbox" name="payment_method" value="Cash" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="bordered-checkbox-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cash</label>
                                        </div>
                                        <img src="{{ asset('images/cash.png') }}" alt="card" class="w-16 h-18">
                                    </div>
                                    <div class="w-full flex items-center justify-between px-4 py-2 border border-gray-200 rounded-md bg-gray-50 dark:border-gray-700">
                                        <div class="flex items-center space-x-1 ml-1">
                                            <input id="bordered-checkbox-1" type="checkbox" name="payment_method" value="E-Wallet" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="bordered-checkbox-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">E-Wallet</label>
                                        </div>
                                        <img src="{{ asset('images/ewallet.png') }}" alt="card" class="w-16 h-18">
                                    </div>
                                    <div class="w-full flex items-center justify-between px-4 py-2 border border-gray-200 rounded-md bg-gray-50 dark:border-gray-700">
                                        <div class="flex items-center space-x-2 ml-1">
                                            <input id="bordered-checkbox-1" type="checkbox" name="payment_method" value="Card" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="bordered-checkbox-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Card</label>
                                        </div>
                                        <img src="{{ asset('images/Mastercard.png') }}" alt="card" class="w-16 h-18">
                                    </div>
                                </div>
                                @error('payment_method')
                                    <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex items-start justify-between space-x-6">
                                <div class="w-full flex flex-col items-start space-y-4">
                                    <div class="w-full">
                                        <label for="discount_amount" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Discount (SENIOR, PWD, OTHERS..) <span class="italic">(Optional)</span></label>
                                        <input type="number" name="discount_amount" id="discount_amount" placeholder="0.00" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('discount_amount')
                                            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label for="gl" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">GL (CSWD, DSWD) <span class="italic">(Optional)</span></label>
                                        <input type="number" name="gl" id="gl" placeholder="0.00" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('gl')
                                            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label for="net_amount" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Net Amount</label>
                                        <input type="number"  id="net_amount" placeholder="0.00" disabled class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    {{-- <div class="w-full">
                                        <label for="payment_reference" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Payment Reference Number <span class="italic">(Optional)</span></label>
                                        <input type="text" name="payment_reference" id="payment_reference" placeholder="Payment Reference Number.." class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('payment_reference')
                                            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                        @enderror
                                    </div> --}}
                                    {{-- <div class="w-full">
                                        <label for="official_receipt_serial" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Official Receipt Serial Number <span class="italic">(Optional)</span></label>
                                        <input type="text" name="official_receipt_serial" id="official_receipt_serial" placeholder="Official Receipt Serial Number.." class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('official_receipt_serial')
                                            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                        @enderror
                                    </div> --}}
                                    <div class="flex flex-col space-y-2 w-full">
                                        <label for="payment_document" class="text-sm font-semibold">Payment Document</label>
                                        <input type="file" name="payment_document" id="payment_document"  class="text-sm rounded-md border border-gray-200 w-full" multiple>
                                        @error('payment_document')
                                            <p class="text-red-500 text-xs">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                @php

                                    $net_amount = 0;
                                    $grand_total = 0;
                                    $initial_amount = 0;
                                    $total_services = 0;
                                    foreach ($service->otherServices as $other_service) {
                                        $total_services += $other_service->price;
                                    }

                                    if ($service->otherServices) {
                                        if ($service->service_type === 'Memorial Services') {
                                            $total = $service->casket->price;
                                            $initial_amount = $service->casket->price;
                                            foreach ($service->otherServices as $other_service) {
                                                $total += $other_service->price;
                                            }
                                        } else {
                                            $total = $service->urn->price;
                                            $initial_amount = $service->urn->price;
                                            foreach ($service->otherServices as $other_service) {
                                                $total += $other_service->price;
                                            }
                                        }
                                    }
                                @endphp


                                <input type="hidden" name="initial_amount" id="initial_amount" value="{{ $initial_amount }}">
                                <input type="hidden" name="total_services" id="total_services" value="{{ $total_services }}">


                                <div class="w-full flex flex-col">
                                    <div class="w-full flex flex-col items-start space-y-4">
                                        <div class="w-full">
                                            <label for="recieved_amount" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Recieved Amount</label>
                                            <input type="number" name="recieved_amount" id="recieved_amount" placeholder="0.00" value="{{ old('recieved_amount') }}" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @error('recieved_amount')
                                                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <label for="grand_total" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Grand Total</label>
                                            <input type="number" value="" id="grand_total" placeholder="0.00" disabled class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="w-full flex text-lg items-start px-2 py-1 justify-between cursor-pointer font-medium border border-dashed border-gray-500">
                                <span>Total Due:</span>
                                <span id="total_due"></span>
                            </div>

                            <script>
                                const recieved_amount = document.getElementById('recieved_amount');
                                const grand_total = document.getElementById('grand_total');
                                const net_amount = document.getElementById('net_amount');
                                const discount_amount = document.getElementById('discount_amount');
                                const gl = document.getElementById('gl');
                                const initial_amount = document.getElementById('initial_amount');
                                const total_services = document.getElementById('total_services');
                                const total_due = document.getElementById('total_due');

                                net_amount.value = parseFloat(initial_amount.value);
                                grand_total.value = parseFloat(net_amount.value) + parseFloat(total_services.value);
                                const grandTotal = parseFloat(grand_total.value) || 0;
                                        const formattedTotal = grandTotal.toLocaleString('en-PH', {
                                            style: 'currency',
                                            currency: 'PHP',
                                            minimumFractionDigits: 2,
                                            maximumFractionDigits: 2,
                                        });
                                total_due.textContent = formattedTotal;
                                console.log(parseFloat(total_due.textContent.replace(/[^0-9.]+/g, '')));

                                let timeoutId;

                                discount_amount.addEventListener('input', () => {
                                    clearTimeout(timeoutId);
                                    timeoutId = setTimeout(() => {
                                        const discount = parseFloat(discount_amount.value) || 0;
                                        const glValue = parseFloat(gl.value) || 0;
                                        const netAmount = initial_amount.value - discount - glValue;

                                        net_amount.value = netAmount;
                                        grand_total.value = parseFloat(net_amount.value) + parseFloat(total_services.value);

                                        const grandTotal = parseFloat(grand_total.value) || 0;
                                        const formattedTotal = grandTotal.toLocaleString('en-PH', {
                                            style: 'currency',
                                            currency: 'PHP',
                                            minimumFractionDigits: 2,
                                            maximumFractionDigits: 2,
                                        });
                                        total_due.textContent = formattedTotal;
                                    }, 1000);
                                });

                                gl.addEventListener('input', () => {
                                    clearTimeout(timeoutId);
                                    timeoutId = setTimeout(() => {
                                        const discount = parseFloat(discount_amount.value) || 0;
                                        const glValue = parseFloat(gl.value) || 0;
                                        const netAmount = initial_amount.value - discount - glValue;
                                        net_amount.value = netAmount;
                                        grand_total.value = parseFloat(net_amount.value) + parseFloat(total_services.value);

                                        const grandTotal = parseFloat(grand_total.value) || 0;
                                        const formattedTotal = grandTotal.toLocaleString('en-PH', {
                                            style: 'currency',
                                            currency: 'PHP',
                                            minimumFractionDigits: 2,
                                            maximumFractionDigits: 2,
                                        });
                                        total_due.textContent = formattedTotal;
                                    }, 1000);
                                });
                            </script>


                            <div>
                                <span class="w-full  border-gray-300 py-1 block mb-1 text-sm font-medium text-gray-900 dark:text-white">Paid By</span>
                                <div class="flex items-start space-x-6">
                                    <div class="w-full">
                                        <label for="first_name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                        <input type="text" name="first_name" id="first_name" placeholder="First name.." value="{{ old('first_name') }}" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('first_name')
                                            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label for="middle_name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Middle Name <span class="text-xs italic">(Optional)</span></label>
                                        <input type="text" name="middle_name" id="middle_name" placeholder="Middle name.." value="{{ old('middle_name') }}" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('middle_name')
                                            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label for="last_name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" placeholder="Last name.." value="{{ old('last_name') }}" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('last_name')
                                            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border border-gray-100  p-4 rounded-md shadow-md flex flex-col space-y-4">
                        <h2 class="font-bold">TO BE ACCOMPLISHED BY FUNERAL REPRESENTATIVE</h2>
                        <div class="w-full">
                            <label for="rb" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">RB</label>
                            <input type="text" name="rb" id="rb" placeholder="RB.." value="{{ old('rb') }}" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('rb')
                                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-start space-x-6">
                            <div class="w-full">
                                <label for="driver_on_duty" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Driver On Duty</label>
                                <select type="text" name="driver_on_duty" id="driver_on_duty" placeholder="Driver on duty" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" disabled selected>--Select--</option>
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->first_name . ' ' . $driver->middle_name . ' ' . $driver->last_name }}" {{ old('driver_on_duty') == $driver->first_name . ' ' . $driver->middle_name . ' ' . $driver->last_name ? 'selected' : '' }}>{{ $driver->first_name . ' ' . $driver->middle_name . ' ' . $driver->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('driver_on_duty')
                                    <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="helper_on_duty" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Helper On Duty</label>
                                <select type="text" name="helper_on_duty" id="helper_on_duty" placeholder="Helper on duty" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" disabled selected>--Select--</option>
                                    @foreach ($helpers as $helper)
                                        <option value="{{ $helper->first_name . ' ' . $helper->middle_name . ' ' . $helper->last_name }}" {{ old('helper_on_duty') == $helper->first_name . ' ' . $helper->middle_name . ' ' . $helper->last_name ? 'selected' : '' }}>{{ $helper->first_name . ' ' . $helper->middle_name . ' ' . $helper->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-start space-x-6">
                            <div class="w-full">
                                <label for="arrival_date" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Arrival Date</label>
                                <input type="date" name="arrival_date" id="arrival_date" placeholder="Driver on duty" value="{{ old('arrival_date') }}" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('arrival_date')
                                    <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="arrival_time" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Arrival Time</label>
                                <input type="time" name="arrival_time" id="arrival_time" placeholder="Helper on duty" value="{{ old('arrival_time') }}" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('arrival_time')
                                    <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col space-y-4">
                            <h2 class="font-bold">Remarks</h2>
                            <div class="flex items-start space-x-6">
                                <div class="w-full">
                                    <label for="l_remark" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">L</label>
                                    <input type="text" name="l_remark" id="l_remark" placeholder="Type here.." value="{{ old('l_remark') }}" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('l_remark')
                                        <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="w_rmark" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">W</label>
                                    <input type="text" name="w_rmark" id="w_rmark" placeholder="Type here.." value="{{ old('w_rmark') }}" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('w_rmark')
                                        <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="px-6 text-sm py-2 rounded-md text-white bg-blue-700 hover:bg-blue-800 cursor-pointer">Confirm Request</button>
                </form>
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
    </script>
</x-admin>
