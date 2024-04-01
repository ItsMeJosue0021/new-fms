<x-guest-layout>
    <div class="z-0">
        <div class="max-w-[1400px] px-4 mx-auto ">
            <div class="flex flex-col space-y-4 relative mb-12">
                <x-stepper :page="$page" :service="$service" />
            </div>
            <div class="w-full flex items-center justify-between mb-10">
                <h2 class="mb-2 text-2xl font-semibold text-gray-900 dark:text-white">Please Select a Casket</h2>

                <form action="{{ route('services.caskets', $service->id) }}" class="w-full flex items-center max-w-lg">
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.15 5.6h.01m3.337 1.913h.01m-6.979 0h.01M5.541 11h.01M15 15h2.706a1.957 1.957 0 0 0 1.883-1.325A9 9 0 1 0 2.043 11.89 9.1 9.1 0 0 0 7.2 19.1a8.62 8.62 0 0 0 3.769.9A2.013 2.013 0 0 0 13 18v-.857A2.034 2.034 0 0 1 15 15Z"/>
                            </svg>
                        </div>
                        <input type="text" name="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Name, Description, Design, Color..." required />
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
                    <x-casket-card :casket="$casket" :service="$service" />
                @endforeach
            </div>
            <div class="w-full py-5">
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
</x-guest-layout>
