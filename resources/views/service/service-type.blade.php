<x-customer>
    <section>
        <div class="w-full max-w-[1400px] px-4 mx-auto flex flex-col items-center justify-center space-y-8">
            <div class="w-1/2 flex flex-col items-center justify-center mt-12 space-y-4">
                <h1 class="text-3xl text-center font-bold text-gray-800">Please select the service you require</h1>
                <p class="text-base text-center text-gray-600 ">As it is our objective to ease your burden and assist you in this time of bereavement,
                    and for us to provide you the best service, may we request you to select the service you need.</p>
            </div>
            <div class="flex items-start justify-center space-x-6">
                <form action="{{ route('services.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="service_type" value="Memorial Services">
                    <button type="submit" class="w-96 flex items-center justify-start space-x-4 p-8 rounded-lg border border-gray-300 relative overflow-hidden group hover:ring-4 hover:ring-blue-200 hover:border-blue-700 cursor-pointer hover:bg-gray-50">
                        <x-candles />
                        <span class="text-lg text-gray-600 group-hover:text-blue-700">Memorial Services</span>
                        <div class="absolute -right-16 -bottom-5">
                            <x-smallest-candle/>
                        </div>
                    </button>
                </form>

                <form action="">
                    @csrf
                    <input type="hidden" name="service_type" value="Cremation Services">
                    <button class="w-96 flex items-center justify-start space-x-4 p-8 rounded-lg border border-gray-300 relative overflow-hidden group hover:ring-4 hover:ring-blue-200 hover:border-blue-700 cursor-pointer hover:bg-gray-50">
                        <x-urn />
                        <span class="text-lg text-gray-600 group-hover:text-blue-700">Cremation Services</span>
                        <div class="absolute -right-16 -bottom-5">
                            <x-smallest-candle/>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-customer>
