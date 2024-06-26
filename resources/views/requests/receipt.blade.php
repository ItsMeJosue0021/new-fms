<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tores Escaro Funeral Services</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="w-full max-w-[900px] px-4 mx-auto">
        <div class="mt-20 mb-10 main-cntr">
            <div class="py-4 flex items-center justify-between space-x-4 remove-on-print">
                <div class="flex">
                    <a href="{{ url()->previous() }}" class="px-6 py-2 rounded text-gray-800 bg-gray-50 hover:bg-gray-100 border border-gray-100 cursor-pointer">Back</a>
                </div>
                <div>
                    {{-- <button id="save" class="py-2 px-4 rounded text-sm bg-blue-600 hover:bg-blue-700 text-white">Download</button> --}}
                    <button onclick="printData()" class="py-2 px-4 rounded text-sm bg-white hover:bg-blue-700 text-blue-600 hover:text-white border border-blue-600 hover:border-blue-700">Print</button>
                </div>
            </div>
            <a href="" id="save_to_image">
                <div class="p-8 py-16 border border-gray-200 cntr1 text-sm mb-4">
                    <div class="flex flex-col items-center justify-center">
                        <div class="w-[700px] flex items-center justify-between space-x-5 ">
                            <img src="{{asset('images/Torreslogo.png')}}" alt="" class="w-28 h-28">
                            <div class="flex flex-col items-center justify-center">
                                <h1 class="font-bold text-3xl">TORRES ESCANO FUNERAL SERVICE</h1>
                                <span>Bayanan, City of Bacoor, Cavite</span>
                                <span>Mobile: +63 921 421 4743; +63 919 075 5427</span>
                                <span>Landline: (046) 502 6635 | Email: torresescanofuneral@gmail.com</span>
                            </div>
                        </div>
                        <div class="w-[700px] flex flex-col justify-start mt-8 space-y-2">
                            <div class="w-full flex items-baseline justify-between">
                                <span class="font-bold">TO BE ACCOMPLISHED BY THE FAMILY</span>
                                <div class="w-1/3 flex items-end justify-between">
                                    <p>Series No.</p>
                                    <p class="w-28 border-b border-gray-500 text-left h-5"></p>
                                </div>
                            </div>
                            <div class="w-full flex items-baseline justify-between">
                                <span class="font-bold">PLEASE WRITE LEGIBLY</span>
                                <div class="w-1/3 flex items-end justify-between">
                                    <p>SC No.</p>
                                    <p class="w-28 border-b border-gray-500 text-left h-5"></p>
                                </div>
                            </div>
                        </div>
                        <div class="w-[700px] flex flex-col justify-start mt-4 space-y-2">
                            <div class="w-full flex items-center justify-center">
                                <p class="font-bold text-lg underline">INFORMATION SHEET</p>
                            </div>
                            <div class="flex flex-col space-y-1">
                                <div class="flex items-end justify-between">
                                    <p class="w-48">Name of Deceased: </p>
                                    <p class="w-full border-b border-gray-500 flex justify-around h-5">
                                        <span>{{ $service->deceased->first_name ?? '' }}</span>
                                        <span>{{ $service->deceased->middle_name ?? '' }}</span>
                                        <span>{{ $service->deceased->last_name ?? '' }}</span>
                                    </p>
                                </div>
                                <div class="flex items-end justify-between">
                                    <p class="w-52"></p>
                                    <div class="w-full flex items-start justify-around">
                                        <p class="text-xs italic">(First Name)</p>
                                        <p class="text-xs italic">(Middle Name)</p>
                                        <p class="text-xs italic">(Last Name)</p>
                                    </div>
                                </div>
                                <div class="w-full flex items-start justify-evenly">
                                    <div class="w-2/5 flex items-end justify-between">
                                        <p class="w-32">Date of birth:</p>
                                        <p class="w-full border-b border-gray-500 text-center h-5">{{ $service->deceased->dob ?? '' }}</p>
                                    </div>
                                    <div class="w-1/5 flex items-end justify-between">
                                        <p>Age:</p>
                                        <p class="w-28 border-b border-gray-500 text-center h-5">{{ $service->deceased->age ?? '' }}</p>
                                    </div>
                                    <div class="w-1/5 flex items-end justify-between">
                                        <p>Height:</p>
                                        <p class="w-28 border-b border-gray-500 text-center h-5">{{ $service->deceased->height ?? '' }}</p>
                                    </div>
                                    <div class="w-1/5 flex items-end justify-between">
                                        <p>Weight:</p>
                                        <p class="w-28 border-b border-gray-500 text-center h-5">{{ $service->deceased->weight ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-end justify-between">
                                    <p class="w-42">Address: </p>
                                    <p class="w-full border-b border-gray-500 flex justify-around h-5">
                                        <span>{{ $service->deceased->deceasedAddress->lot_block ?? '' }}</span>
                                        <span>{{ $service->deceased->deceasedAddress->street ?? '' }}</span>
                                        <span>{{ $service->deceased->deceasedAddress->brgy ?? '' }}</span>
                                        <span>{{ $service->deceased->deceasedAddress->city ?? '' }}</span>
                                        <span>{{ $service->deceased->deceasedAddress->province ?? '' }}</span>
                                    </p>
                                </div>
                                <div class="w-full flex items-start justify-evenly">
                                    <div class="w-2/4 flex items-end justify-between">
                                        <p class="w-32">Occupation:</p>
                                        <p class="w-full border-b border-gray-500 text-center h-5">{{ $service->deceased->occupation ?? '' }}</p>
                                    </div>
                                    <div class="w-1/4 flex items-end justify-between">
                                        <p>Citizenship:</p>
                                        <p class="w-32 border-b border-gray-500 text-center h-5">{{ $service->deceased->citizenship ?? '' }}</p>
                                    </div>
                                    <div class="w-1/4 flex items-end justify-between">
                                        <p>Religion:</p>
                                        <p class="w-32 border-b border-gray-500 text-left h-5 text-xs pl-2">{{ $service->deceased->religion ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="w-full flex ">
                                    <div class="w-2/3 flex items-start space-x-2">
                                        <p>Civil Status: </p>
                                        <div class="flex items-center ">
                                            Married <input type="checkbox" {{ $service->deceased->civil_status == "Married" ? 'checked' : '' }} class="border border-gray-500 h-4 w-6 rounded ml-2">
                                        </div>
                                        <div class="flex items-center ">
                                            Single <input type="checkbox" {{ $service->deceased->civil_status == "Single" ? 'checked' : '' }} class="border border-gray-500 h-4 w-6 rounded ml-2">
                                        </div>
                                        <div class="flex items-center ">
                                            Separated <input type="checkbox" {{ $service->deceased->civil_status == "Separated" ? 'checked' : '' }} class="border border-gray-500 h-4 w-6 rounded ml-2">
                                        </div>
                                        <div class="flex items-center ">
                                            Widowed <input type="checkbox" {{ $service->deceased->civil_status == "Widowed" ? 'checked' : '' }} class="border border-gray-500 h-4 w-6 rounded ml-2">
                                        </div>
                                    </div>
                                    <div class="w-1/3 flex items-start justify-end space-x-2">
                                        <p>Sex: </p>
                                        <div class="flex items-center ">
                                            Male <input type="checkbox" {{ $service->deceased->sex == "Male" ? 'checked' : '' }} class="border border-gray-500 h-4 w-6 rounded ml-2">
                                        </div>
                                        <div class="flex items-center ">
                                            Female <input type="checkbox" {{ $service->deceased->sex == "Female" ? 'checked' : '' }} class="border border-gray-500 h-4 w-6 rounded ml-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-end justify-between">
                                    <p class="w-48">Name of Father: </p>
                                    <p class="w-full border-b border-gray-500 text-left h-5">
                                        {{ $service->deceased->fathers_name ?? '' }}
                                    </p>
                                </div>
                                <div class="flex items-end justify-between">
                                    <p class="w-64">Maidedn Name of Mother: </p>
                                    <p class="w-full border-b border-gray-500 flex text-left  h-5">
                                        {{ $service->deceased->mother_maiden_name ?? '' }}
                                    </p>
                                </div>
                                <div class="w-full flex items-start justify-evenly">
                                    <div class="w-2/3 flex items-end justify-between">
                                        <p class="w-36">Place of Death:</p>
                                        <p class="w-full border-b border-gray-500 text-center h-5">{{ $service->deceased->birth_place ?? '' }}</p>
                                    </div>
                                    <div class="w-1/3 flex items-end justify-between">
                                        <p class="w-52">Time of Death:</p>
                                        <p class="w-full border-b border-gray-500 text-center h-5">{{ $service->deceased->deathDetail->death_time ?? '' }}</p>
                                    </div>
                                    <div class="">
                                        <p>AM/PM</p>
                                    </div>
                                </div>
                                <div class="flex items-end justify-between">
                                    <p class="w-36">Date of Death: </p>
                                    <p class="w-full border-b border-gray-500 text-left  h-5">
                                        {{ $service->deceased->deathDetail->death_date ?? '' }}
                                    </p>
                                </div>
                                <div class="flex items-end justify-between">
                                    <p class="w-36">Causes of Death: </p>
                                    <p class="w-full border-b border-gray-500 text-left  h-5">
                                        {{ $service->deceased->deathDetail->death_cause ?? '' }}
                                    </p>
                                </div>
                                <div class="flex items-end justify-between">
                                    <p class="w-80">Name and Address of Cemetery: </p>
                                    <p class="w-full border-b border-gray-500 text-center  h-5">
                                        {{ $service->deceased->deathDetail->cementery_address ?? '' }}
                                    </p>
                                </div>
                                <div class="flex items-end justify-between">
                                    <p class="w-36">Place of Viewing: </p>
                                    <p class="w-full border-b border-gray-500 text-center  h-5">
                                        {{ $service->deceased->deathDetail->viewing_place ?? '' }}
                                    </p>
                                </div>
                                <div class="w-full flex items-start justify-evenly">
                                    <div class="w-2/3 flex items-end justify-between">
                                        <p class="w-48">Date of Interment:</p>
                                        <p class="w-full border-b border-gray-500 text-left h-5">{{ $service->deceased->deathDetail->internment_date ?? '' }}</p>
                                    </div>
                                    <div class="w-1/3 flex items-end justify-between">
                                        <p class="w-64">Time of Interment:</p>
                                        <p class="w-full border-b border-gray-500 text-left h-5">{{ $service->deceased->deathDetail->internment_time ?? '' }}</p>
                                    </div>
                                </div>

                                <div class="w-full flex items-start justify-evenly mt-8">
                                    <div class="w-2/3 flex items-end justify-between">
                                        <p class="w-48">Name of Informant:</p>
                                        <p class="w-full border-b border-gray-500 flex justify-around h-5">
                                            <span>{{ $service->informant->first_name ?? '' }}</span>
                                            <span>{{ $service->informant->middle_name ?? '' }}</span>
                                            <span>{{ $service->informant->last_name ?? '' }}</span>
                                        </p>
                                    </div>
                                    <div class="w-1/3 flex items-end justify-between">
                                        <p class="w-28">Signature:</p>
                                        <p class="w-full border-b border-gray-500 text-left h-5"></p>
                                    </div>
                                </div>
                                <div class="w-full flex items-start justify-evenly">
                                    <div class="w-1/3 flex items-end justify-between">
                                        <p class="w-12">Age:</p>
                                        <p class="w-full border-b border-gray-500 text-center h-5">{{ $service->informant->age ?? '' }}</p>
                                    </div>
                                    <div class="w-2/3 flex items-end justify-between">
                                        <p class="w-24">Occupation:</p>
                                        <p class="w-full border-b border-gray-500 text-lecenterft h-5">{{ $service->informant->occupation ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-end justify-between">
                                    <p class="w-42">Address: </p>
                                    <p class="w-full border-b border-gray-500 text-left h-5">{{ $service->informant->address ?? '' }}</p>
                                </div>
                                <div class="w-full flex items-start justify-evenly">
                                    <div class="w-1/2 flex items-end justify-between">
                                        <p class="w-20">Tell No.:</p>
                                        <p class="w-full border-b border-gray-500 text-center h-5">{{ $service->informant->telephone ?? '' }}</p>
                                    </div>
                                    <div class="w-1/2 flex items-end justify-between">
                                        <p class="w-44">Cell Phone No.:</p>
                                        <p class="w-full border-b border-gray-500 text-center h-5">{{ $service->informant->mobilephone ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="w-full flex items-start justify-evenly">
                                    <div class="w-2/3 flex items-end justify-between">
                                        <p class="w-64">Relationship to Deceased:</p>
                                        <p class="w-full border-b border-gray-500 text-center h-5">{{ $service->informant->relationship_to_deceased ?? '' }}</p>
                                    </div>
                                    <div class="w-1/3 flex items-end justify-between">
                                        <p class="w-14">Date:</p>
                                        <p class="w-full border-b border-gray-500 text-left h-5"></p>
                                    </div>
                                </div>
                                <div class="w-full border-b border-dashed border-gray-500 h-5"></div>
                            </div>
                        </div>

                        <div class="w-[700px] flex flex-col justify-start mt-4 space-y-2">
                            <div class="flex ">
                                <p class="font-bold">Please accept our deepest condolences.</p>
                            </div>
                            <div class="flex ">
                                <p class=" text-justify indent-12 text-xs ">As it is our objectuve to ease your burden and assist you in this time of bereavement, and for us to provide you the best service, may request you to take note of the following:</p>
                            </div>
                            <div class="flex ">
                                <p class=" text-justify indent-12 text-xs ">Please submit the death certificate of the deceased immediately for registration and securing of the transfer/burial permit for interment. This is composed of three (3) to four (4) copies with a white copy for submission to the National Statistic Office. (Memorial oarks are requiring monetary bond for failure to present and submit burial permit. We would be constrained to ask you to post the necessary bond if you cannot submit to us the death certificate within reasonable period of time). Please notify us immediately of the date, time and place of interment or cremation, as the case may be or any schedule for necro logical service that you intend to do in the honor of the deceased that needs assistance. We would appreciate it ver much if you can provide us to right information as regards the claimant's accurate details to avoid repetitive corrections of the documents and settle your one (1) day before burial. This would relieve you of unnecessary concern and worry on the day of interment.</p>
                            </div>
                        </div>

                        <div class="w-[700px] flex flex-col justify-start mt-6">
                            <div class="flex mb-4">
                                <p class="font-bold uppercase">Please accept our deepest condolences.</p>
                            </div>
                            <div class="w-full flex items-end justify-between">
                                <p class="w-52 flex justify-between">RB<span>:</span></p>
                                <p class="w-full border-b border-gray-500 text-left h-5">{{ $request->rb }}</p>
                            </div>
                            <div class="w-full flex items-end justify-between">
                                <p class="w-52 flex justify-between">Driver on Duty<span>:</span></p>
                                <p class="w-full border-b border-gray-500 text-left h-5">{{ $request->driver_on_duty }}</p>
                            </div>
                            <div class="w-full flex items-end justify-between">
                                <p class="w-52 flex justify-between">Helper on Duty<span>:</span></p>
                                <p class="w-full border-b border-gray-500 text-left h-5">{{ $request->helper_on_duty }}</p>
                            </div>
                            <div class="w-full flex items-end justify-between">
                                <p class="w-52 flex justify-between">Arrival Date & Time<span>:</span></p>
                                <p class="w-full border-b border-gray-500 text-left h-5">{{ $request->arrival_date_time }}</p>
                            </div>
                            <p class="font-bold mt-2">REMARKS</p>
                            <div class="min-w-24 w-fit flex items-end justify-between">
                                <p class="w-4 flex justify-between">L:</p>
                                <p class="w-full border-b border-gray-500 text-left h-5">{{ $request->l_remark }}</p>
                            </div>
                            <div class="min-w-24 w-fit flex items-end justify-between">
                                <p class="w-4 flex justify-between">W:</p>
                                <p class="w-full border-b border-gray-500 text-left h-5">{{ $request->w_rmark }}</p>
                            </div>
                        </div>
                    </div>
                </div>


                @pageBreak

                <div class="p-8 py-16 border border-gray-200 cntr2 text-sm">
                    <div class="flex flex-col items-center justify-center">
                        <div class="w-[700px] flex items-center justify-between space-x-5 ">
                            <img src="{{asset('images/Torreslogo.png')}}" alt="" class="w-28 h-28">
                            <div class="flex flex-col items-center justify-center">
                                <h1 class="font-bold text-3xl">TORRES ESCANO FUNERAL SERVICE</h1>
                                <span>Bayanan, City of Bacoor, Cavite</span>
                                <span>Mobile: +63 921 421 4743; +63 919 075 5427</span>
                                <span>Landline: (046) 502 6635 | Email: torresescanofuneral@gmail.com</span>
                            </div>
                        </div>
                        <div class="w-[700px] flex flex-col items-center justify-center font-bold">
                            <div class="w-full flex items-start justify-start py-4">
                                <span class="underline">AMOUNT OF SERVICE/S</span>
                            </div>
                            <div class="w-full flex items-start justify-between">
                                <span>GROSS AMOUNT OF SERVICE</span>
                                <div class="w-40 flex items-center justify-between">
                                    <span>PHP</span>
                                    @php
                                    $package_amount = 0;
                                        if ($service->otherServices) {
                                            if ($service->service_type === 'Memorial Services') {
                                                $total = $service->casket->price;
                                                $package_amount = $service->casket->price;
                                                foreach ($service->otherServices as $other_service) {
                                                    $total += $other_service->price;
                                                }
                                            } else {
                                                $total = $service->urn->price;
                                                $package_amount = $service->urn->price;
                                                foreach ($service->otherServices as $other_service) {
                                                    $total += $other_service->price;
                                                }
                                            }
                                        }
                                    @endphp
                                    <span class="w-28 border-b border-gray-500 text-start h-5">₱ {{ $package_amount ? number_format($package_amount, 2) : ' 00.00' }}</span>
                                </div>
                            </div>
                            <div class="w-full flex items-start justify-between">
                                <span>DISCOUNT (SENIOR, PWD, OTHERS)</span>
                                <div class="w-40 flex items-center justify-between">
                                    <span>PHP</span>
                                    <span class="w-28 border-b border-gray-500 text-start h-5">₱ {{ $request->discount_amount ? number_format($request->discount_amount, 2) : ' 00.00' }}</span>
                                </div>
                            </div>
                            <div class="w-full flex items-start justify-between">
                                <span>GL (CSWD, DSWD)</span>
                                <div class="w-40 flex items-center justify-between">
                                    <span>PHP</span>
                                    <span class="w-28 border-b border-gray-500 text-start h-5">₱ {{ $request->gl ? number_format($request->gl, 2) : ' 00.00' }}</span>
                                </div>
                            </div>
                            <div class="w-full flex items-start justify-between">
                                <span>NET AMOUNT OF SERVICE</span>
                                <div class="w-40 flex items-center justify-between">
                                    <span>PHP</span>
                                    <span class="w-28 border-b border-gray-500 text-start h-5">₱ {{ number_format($package_amount - (($request->gl ? $request->gl : 0) + ($request->discount_amount ? $request->discount_amount : 0)), 2) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-[700px] flex flex-col items-center justify-center font-bold">
                            <div class="w-full flex items-start justify-start pt-4">
                                <span class="">OTHER SERVICES</span>
                            </div>
                            @if ($service->otherServices)
                                @php
                                    $counter = 0;
                                @endphp
                                @foreach ($service->otherServices as $other_service )
                                    <div class="w-full flex items-start justify-between">
                                        <div class="flex items-center space-x-2">
                                            <span>{{ chr(65 + $counter++) }}.)</span>
                                            <span>{{ $other_service->service }}</span>
                                        </div>
                                        <div class="w-40 flex items-start justify-between">
                                            <span>PHP</span>
                                            <span class="w-28 border-b border-gray-500 text-left h-5">₱{{ $other_service->price ? number_format($other_service->price, 2) : '0.00' }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="w-[700px] flex flex-col items-center justify-center font-bold">
                            <div class="w-full flex items-start justify-between py-6">
                                <span class="underline">GRAND TOTAL</span>
                                <div class="w-40 flex item-start justify-between">
                                    <span>PHP</span>
                                    <span class="w-28 border-b border-gray-500 text-start h-5">₱ {{ $request->total_amount ? number_format($request->total_amount, 2) : ' 00.00' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-[700px] flex flex-col items-center justify-center font-bold">
                            <div class="w-full flex items-center justify-center">
                                <span class="underline">PACKAGE INCLUSIONS</span>
                            </div>
                        </div>
                        <div class="w-[700px] flex flex-col items-center justify-center">
                            <div class="w-full flex flex-col items-start justify-start py-2">
                                <li class="flex items-center">
                                    <svg class="w-3 h-3 me-2 text-gray-500 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                    </svg>
                                    Retrieval of Remains
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-3 h-3 me-2 text-gray-500 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                    </svg>
                                    Embalming
                                </li>
                                @if ($request->service->service_type == 'Memorial Services')
                                    <li class="flex items-center">
                                        <svg class="w-3 h-3 me-2 text-gray-500 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                        </svg>
                                        Casket
                                    </li>
                                @else
                                    <li class="flex items-center">
                                        <svg class="w-3 h-3 me-2 text-gray-500 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                        </svg>
                                        Urn
                                    </li>
                                @endif
                                <li class="flex items-center">
                                    <svg class="w-3 h-3 me-2 text-gray-500 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                    </svg>
                                    Viewing Equipment
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-3 h-3 me-2 text-gray-500 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                    </svg>
                                    Flower
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-3 h-3 me-2 text-gray-500 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                    </svg>
                                    Hearse for Interment
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-3 h-3 me-2 text-gray-500 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                    </svg>
                                    Hot & Cold-Water Dispenser with
                                    <span class="underline px-2">@if ($service->casket_id)
                                        {{ $service->casket->water }}

                                        @elseif ($service->urn_id)
                                            {{ $service->urn->water }}
                                        @else
                                            0
                                        @endif
                                    </span> gallons of water
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-3 h-3 me-2 text-gray-500 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z"/>
                                    </svg>
                                    Facilitation of Death Certificate and Permits c/o
                                </li>
                            </div>
                        </div>

                        <div class="w-[700px] flex flex-col items-center justify-center font-bold">
                            <div class="w-full flex items-center justify-center pt-3">
                                <span class="underline">PAYMENT TERMS</span>
                            </div>
                        </div>
                        <div class="w-[700px] flex flex-col items-center justify-center ">
                            <div class="w-full flex flex-col items-start justify-start pt-3">
                                <p class="text-justify">
                                    <span class="underline font-bold ">FOR MEMORIAL SERVICE:</span>
                                    Down payment is optional not required. Full payment for the memorial service should be settle <span class="font-bold">1 Day before the interment.</span>
                                </p>
                                <p class="text-justify">
                                    <span class="underline font-bold">FOR DIRECT CREMATION:</span>
                                    Down payment is optional not required. Full payment is required <span class="font-bold">before the scheduled time and date of cremation.</span>
                                </p>

                                <p class="text-justify pt-5">
                                    By signing this document, I understand the above stated information and it has been properly discussed to me and I hereby agree to engage and avail the abovementioned memorial service. Withdrawal will be subject for approval and changes.
                                </p>
                            </div>
                            <div class="w-full flex items-start justify-start py-6">
                                <span class="italic">CONFORME</span>
                            </div>
                            <div class="w-full flex items-start justify-between">
                                <div class="flex flex-col items-center justify-center">
                                    <span class="text-base uppercase">
                                        {{ $request->paid_by ?? '' }}
                                    </span>
                                    <div class="italic border-t border-gray-500 px-6">
                                        SIGNATURE OVER PRINTED NAME OF CLIENT
                                    </div>
                                </div>

                                <div class="flex flex-col items-center justify-center">
                                    <span> {{ $request->payment_date ?? '' }} </span>
                                    <div class="italic border-t border-gray-500 px-10">
                                        DATE
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <script src="{{ asset('js/html2canvas.js') }}"></script>
    <script>
        let saveBtn = document.querySelector("#save");

        saveBtn.addEventListener("click", function () {
            html2canvas(document.querySelector("#save_to_image")).then(function (canvas) {
                var link = document.querySelector("#save_to_image");
                link.setAttribute("download", "ToresEscaroFuneralServices.png");
                link.setAttribute(
                "href",
                canvas.toDataURL("image/png").replace("image/png", "image/octet-stream")
                );
                link.click();
            });
        });

        function printData() {
            RemoveOnPrint = document.querySelector('.remove-on-print');
            Cntr1 = document.querySelector('.cntr1');
            Cntr2 = document.querySelector('.cntr2');
            MainCntr = document.querySelector('.main-cntr');
            RemoveOnPrint.style.display = 'none';
            Cntr1.classList.remove('border');
            Cntr1.classList.remove('py-16');
            Cntr2.classList.remove('border');
            Cntr2.classList.remove('py-16');
            MainCntr.style.marginTop = '0';
            window.print();
            RemoveOnPrint.style.display = 'flex';
            Cntr1.classList.add('border');
            Cntr1.classList.add('py-16');
            Cntr2.classList.add('border');
            Cntr2.classList.add('py-16');
            MainCntr.style.marginTop = '80px';
        }
    </script>
</body>
</html>

