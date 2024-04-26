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
    <div class="w-full h-auto minh-screen flex items-start justify-center">
        <div class="w-full max-w-[1000px] px-4 mx-auto">
            <div class="flex pt-5">
                <a href="{{ route('admin.dashboard') }}" class="px-6 py-2 rounded text-gray-800 bg-gray-50 hover:bg-gray-100 border border-gray-100 cursor-pointer">Back</a>
            </div>
            <div class="remove-on-print py-4 flex items-end justify-between">
                <form action="{{ route('requests.print-completed') }}">
                    <div class="flex items-end space-x-4">
                        <div class="flex flex-col">
                            <label>From</label>
                            <input type="date"  name="from" class="py-2 px-4 rounded-md border border-gray-300">
                        </div>
                        <div class="flex flex-col">
                            <label>To</label>
                            <input type="date" name="to" class="py-2 px-4 rounded-md border border-gray-300">
                        </div>
                        <button class="text-white bg-blue-500 focus:ring-4 font-medium rounded-md px-5 py-2 border border-blue-500 hover:bg-blue-600 hover:border-blue-600">Get</button>
                        <a href="{{ route('requests.print-completed') }}" class="text-gray-700 bg-white focus:ring-4 font-medium rounded-md  px-5 py-2 border border-gray-300 hover:bg-blue-500 hover:text-white hover:border-blue-500">All</a>
                    </div>
                </form>
                <div>
                    <button onclick="printData()" class="text-gray-700 bg-white focus:ring-4 font-medium rounded-md  px-5 py-2 border border-gray-300 hover:bg-blue-500 hover:text-white hover:border-blue-500">Print</button>
                </div>
            </div>

            <div>
                <div class="py-4 flex items-start justify-between">
                    <div class="flex items-start justify-start space-x-5 ">
                        {{-- <img src="{{asset('images/Torreslogo.png')}}" alt="logo" class="w-24 h-24"> --}}
                        <div class="flex flex-col items-start justify-start">
                            <h1 class="font-bold text-2xl">TORRES ESCANO FUNERAL SERVICE</h1>
                            <span class="text-sm">Landline: (046) 502 6635 | Email: torresescanofuneral@gmail.com</span>
                            <span class="text-sm">Mobile: +63 921 421 4743; +63 919 075 5427</span>
                            <span class="text-sm">Bayanan, City of Bacoor, Cavite</span>
                        </div>
                    </div>
                    <div>
                        <img src="{{asset('images/Torreslogo.png')}}" alt="logo" class="w-24 h-24">
                    </div>
                </div>
                <div class="pb-4 flex flex-col space-y-2">
                    <span class="font-bold text-lg uppercase">Sales Report</span>
                    <div class="flex items-start justify-between">
                        <span class="font-bold uppercase">Total Sales</span>
                        <span class="font-bold uppercase">&#x20B1; {{ number_format($total, 2, '.', ',') ?? '00.00' }}</span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-xs text-left text-gray-500 dark:text-gray-400 border-collapse">
                        <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Date Requested</th>
                                <th scope="col" class="px-4 py-3">Time Requested</th>
                                <th scope="col" class="px-4 py-3">Service Type</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Amount</th>
                                <th scope="col" class="px-4 py-3">Discount</th>
                                <th scope="col" class="px-4 py-3">Recieved Ammount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $request->created_at ? $request->created_at->format('F d, Y') : 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $request->created_at ? $request->created_at->format('g:i A') : 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $request->service->service_type ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $request->status ?? 'N/A' }}</td>
                                    @if ($request->service->service_type == 'Memorial Services')
                                        <td class="px-4 py-3">&#x20B1; {{ isset($request->total_amount) ? number_format($request->total_amount, 2, '.', ',') : '00.00' }}</td>
                                    @else
                                        <td class="px-4 py-3">&#x20B1; {{ isset($request->total_amount) ? number_format($request->total_amount, 2, '.', ',') : '00.00' }}</td>
                                    @endif
                                    <td class="px-4 py-3">&#x20B1; {{ isset($request->discount_amount) ? number_format($request->discount_amount, 2, '.', ',') : '00.00' }}</td>
                                    <td class="px-4 py-3">&#x20B1; {{ isset($request->recieved_amount) ? number_format($request->recieved_amount, 2, '.', ',') : '00.00' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-24 w-full flex items-end justify-between">
                    <div class="flex flex-col items-center justify-center">
                        <div class="italic border-t border-gray-500 px-6">
                            SIGNATURE OVER PRINTED NAME OF OWNER
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center">
                        <span> {{ now()->format('Y-m-d') }} </span>
                        <div class="italic border-t border-gray-500 px-10">
                            DATE
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printData() {
            RemoveOnPrint = document.querySelector('.remove-on-print');
            // Cntr = document.querySelector('.cntr');
            // MainCntr = document.querySelector('.main-cntr');
            RemoveOnPrint.style.display = 'none';
            // Cntr.classList.remove('border');
            // Cntr.classList.remove('py-16');
            // MainCntr.style.marginTop = '0';
            window.print();
            RemoveOnPrint.style.display = 'flex';
            // Cntr.classList.add('border');
            // Cntr.classList.add('py-16');
            // MainCntr.style.marginTop = '80px';
        }
    </script>
</body>
</html>
