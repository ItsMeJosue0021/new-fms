<x-guest-layout>
    <div class="w-full max-w-[1400px] mx-auto px-4">
        <section>
            <div class="z-0">
                <div class="max-w-[1400px] px-4 py-10 mx-auto ">
                    <div class="w-full flex items-start justify-between mb-10">
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Caskets</h2>
                            <p class="text-sm">Here are some of our available caskets</p>
                        </div>

                        <form action="{{ route('caskets') }}" class="w-full flex items-center max-w-lg">
                            <label for="voice-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <input type="text" hx-get="/json/caskets/" hx-trigger="keyup delay:500ms" hx-indicator="#loading" hx-target="#results" type="text" name="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Name, Description, Design, Color..." required />
                            </div>
                        </form>
                    </div>
                    <div id="loading" class="hidden">Loading...</div>
                    <div hx-get="/json/caskets/" hx-trigger="load" id="results" class="flex flex-wrap -m-4">
                        
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
