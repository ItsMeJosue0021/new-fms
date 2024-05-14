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
        <div class="mt-20 main-cntr">
            <div class="py-4 flex items-center justify-between space-x-4 remove-on-print">
                <div class="flex">
                    <a href="{{ url()->previous() }}" class="px-6 py-2 rounded text-gray-800 bg-gray-50 hover:bg-gray-100 border border-gray-100 cursor-pointer">Back</a>
                </div>
                <div>
                    <button id="save" class="py-2 px-4 rounded text-sm bg-blue-600 hover:bg-blue-700 text-white">Download</button>
                    <button onclick="printData()" class="py-2 px-4 rounded text-sm bg-white hover:bg-blue-700 text-blue-600 hover:text-white border border-blue-600 hover:border-blue-700">Print</button>
                </div>
            </div>
            <a href="" id="save_to_image">
                <div class="p-8 py-16 border border-gray-200 cntr text-sm">
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
                                    @if ($request->service->service_type == 'Memorial Services')
                                        <span class="w-28 border-b border-gray-500 text-start h-5">₱ {{ $total ? number_format($total, 2) : ' 00.00' }}</span>
                                    @else
                                        <span class="w-28 border-b border-gray-500 text-start h-5">₱ {{ $total ? number_format($total, 2) : ' 00.00' }}</span>
                                    @endif
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
                                    <span class="w-28 border-b border-gray-500 text-start h-5">₱ {{ $request->total_amount ? number_format($request->total_amount, 2) : ' 00.00' }}</span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="w-[700px] flex flex-col items-center justify-center font-bold">
                            <div class="w-full flex items-start justify-start pt-4">
                                <span class="">OTHER SERVICES</span>
                            </div>
                            <div class="w-full flex items-start justify-between">
                                <span>a.)</span>
                                <div class="w-40 flex items-start justify-between">
                                    <span>PHP</span>
                                    <span class="w-28 border-b border-gray-500 text-center h-5"></span>
                                </div>
                            </div>
                            <div class="w-full flex items-start justify-between">
                                <span>b.)</span>
                                <div class="w-40 flex items-start justify-between">
                                    <span>PHP</span>
                                    <span class="w-28 border-b border-gray-500 text-center h-5"></span>
                                </div>
                            </div>
                            <div class="w-full flex items-start justify-between">
                                <span>c.)</span>
                                <div class="w-40 flex items-start justify-between">
                                    <span>PHP</span>
                                    <span class="w-28 border-b border-gray-500 text-center h-5"></span>
                                </div>
                            </div>
                            <div class="w-full flex items-start justify-between">
                                <span>d.)</span>
                                <div class="w-40 flex items-start justify-between">
                                    <span>PHP</span>
                                    <span class="w-28 border-b border-gray-500 text-center h-5"></span>
                                </div>
                            </div>
                        </div> --}}
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
                                    Hot & Cold-Water Dispenser with <span class="underline px-2">{{ $service->water }}</span> gallons of water
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
            Cntr = document.querySelector('.cntr');
            MainCntr = document.querySelector('.main-cntr');
            RemoveOnPrint.style.display = 'none';
            Cntr.classList.remove('border');
            Cntr.classList.remove('py-16');
            MainCntr.style.marginTop = '0';
            window.print();
            RemoveOnPrint.style.display = 'flex';
            Cntr.classList.add('border');
            Cntr.classList.add('py-16');
            MainCntr.style.marginTop = '80px';
        }
    </script>
</body>
</html>

