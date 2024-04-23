<x-guest-layout>
    <div class="w-full max-w-[1400px] mx-auto px-4">
        <section>
            <div class="z-0">
                <div class="max-w-[1400px] px-4 py-10 mx-auto ">
                    <div class="w-full flex items-start justify-between mb-10">
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Caskets</h2>
                            <p class="text-sm">Here aree some of our available caskets</p>
                        </div>

                        <form action="{{ route('caskets') }}" class="w-full flex items-center max-w-lg">
                            <label for="voice-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                {{-- <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.15 5.6h.01m3.337 1.913h.01m-6.979 0h.01M5.541 11h.01M15 15h2.706a1.957 1.957 0 0 0 1.883-1.325A9 9 0 1 0 2.043 11.89 9.1 9.1 0 0 0 7.2 19.1a8.62 8.62 0 0 0 3.769.9A2.013 2.013 0 0 0 13 18v-.857A2.034 2.034 0 0 1 15 15Z"/>
                                    </svg>
                                </div> --}}
                                <input type="text" name="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Name, Description, Design, Color..." required />
                            </div>
                            <button type="submit" class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>Search
                            </button>
                        </form>
                    </div>
                    <div class="flex flex-wrap -m-4">
                        @foreach ($caskets as $casket)
                            <div class="p-4 md:w-1/3">
                                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                    {{-- <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="blog"> --}}
                                    <div id="animation-carousel" class="relative w-full" data-carousel="static">
                                        <!-- Carousel wrapper -->
                                        <div class="relative lg:h-48 md:h-36 overflow-hidden z-0">

                                            @if (count($casket->casketImages) > 0)
                                                @foreach ($casket->casketImages as $image)
                                                <div class="hidden duration-200 ease-linear" data-carousel-item>
                                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $casket->name }}" class="zoomable-image absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 cursor-pointer">
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
                                        <h1 class="title-font text-lg font-medium text-gray-900 ">{{ $casket->name }}</h1>
                                        <p class="leading-6 mb-3 text-sm">{{ $casket->description }}</p>

                                        <div class="flex items-center justify-between z-50">
                                            <a href="{{ route('home.select-casket', $casket->id) }}" class="text-indigo-500 inline-flex text-sm items-center md:mb-2 lg:mb-0">Select and proceed
                                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                            <span class="leading-6 font-medium text-base">&#x20B1; {{ number_format($casket->price, 2, '.', ',') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pt-6">
                        {{ $caskets->links() }}
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
        </section>
    </div>
</x-guest-layout>
