<x-admin>
    <div class="mt-20 py-2">
        <div class="py-4">
            <h1 class="text-gray-700 text-3xl font-semibold">Dashboard</h1>
        </div>
        <div class="flex items-start space-x-4 justify-between">
            <div class="h-32 p-4 sm:w-1/5 w-1/2 rounded-lg shadow flex flex-col items-center justify-center bg-white">
                <h2 class="title-font font-medium sm:text-4xl text-3xl text-blue-500">{{ $users }}</h2>
                <p class="leading-relaxed">Users</p>
            </div>
            <div class="h-32 p-4 sm:w-1/5 w-1/2 rounded-lg shadow  flex flex-col items-center justify-center bg-white">
                <h2 class="title-font font-medium sm:text-4xl text-3xl text-blue-500">{{ $caskets }}</h2>
                <p class="leading-relaxed">Caskets</p>
            </div>
            <div class="h-32 p-4 sm:w-1/5 w-1/2 rounded-lg shadow  flex flex-col items-center justify-center bg-white">
                <h2 class="title-font font-medium sm:text-4xl text-3xl text-blue-500">{{ $hearses }}</h2>
                <p class="leading-relaxed">Hearse</p>
            </div>
            <div class="h-32 p-4 sm:w-1/5 w-1/2 rounded-lg shadow  flex flex-col items-center justify-center bg-white">
                <h2 class="title-font font-medium sm:text-4xl text-3xl text-blue-500">{{ $requests }}</h2>
                <p class="leading-relaxed">Service Request</p>
            </div>
            <div class="h-32 p-4 sm:w-1/5 w-1/2 rounded-lg shadow  flex flex-col items-center justify-center bg-white">
                <h2 class="title-font font-medium sm:text-4xl text-3xl text-blue-500">{{ $completed_requests }}</h2>
                <p class="leading-relaxed">Completed Request</p>
            </div>
        </div>

        <div class="w-full py-4">
            <a href="{{ route('requests.print-completed') }}" class=" text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 font-medium rounded-md text-sm px-5 py-2 border border-gray-300">Print Report</a>
        </div>

        <div class="p-6 mb-4 bg-white rounded-lg shadow">
            {!! $chart->container() !!}
        </div>
        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }}
    </div>
</x-admin>
