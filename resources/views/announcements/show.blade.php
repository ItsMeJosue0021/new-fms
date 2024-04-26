<x-admin>
    <div class="mt-20">
        <div class="flex pb-4 mt-20">
            <a href="{{ route('announcements.index') }}" class="px-6 py-2 rounded text-gray-800 bg-white hover:bg-gray-100 cursor-pointer">Back</a>
        </div>
        <section class="text-gray-600 body-font">
            <div class="flex flex-wrap">
                <div class="flex w-full mb-6 flex-col space-y-4">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 w-full lg:mb-0 mb-4">{{ $announcement->title }}</h1>
                    <p class="w-full mx-auto leading-relaxed text-base">{{ $announcement->content }}</p>
                </div>
                <div class="flex flex-wrap w-full">
                    <div class="flex flex-wrap w-full">
                        @if ($announcement->announcementImages->isEmpty())
                            <span class="text-red-500">No Images</span>
                        @else
                            @foreach ($announcement->announcementImages as $image)
                                <div class=" p-1 w-1/4">
                                    <img alt="gallery" class="w-full object-cover h-full object-center block zoomable-image cursor-pointer" src="{{ asset('storage/' . $image->image) }}" >
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div id="imageModal" class="hidden z-50 fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 ">
                <div class="w-full h-full flex items-center justify-center">
                    <div id="modalContent" class="max-w-2xl mx-auto">
                        <img id="modalImage" src="" alt="Modal Image" class="w-full h-full rounded">
                        <button id="closeModal" class="absolute top-6 right-6 text-white cursor-pointer">
                            <i class="bx bx-x text-3xl"></i>
                        </button>
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
</x-admin>
