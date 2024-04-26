<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="./output.css" rel="stylesheet">
   <title>Tores Escaro Funeral Services</title>

      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

   <!-- Scripts -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-header />

   <section class="bg-white dark:bg-gray-900 bg-[url('/public/images/banner.jpg')] bg-bottom">
       <div class="w-full py-16 backdrop-blur-[3px]">
           <div class="flex flex-col items-center justify-center max-w-[1400px] px-4 mx-auto">
               <h1 class="w-full text-center mb-4 text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl text-blue-700 dark:text-white">Torres Escaro Funeral Services</h1>
               <p class="w-full md:w-1/2 text-center mb-6 font-light text-white lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">110 Bayanan Rd, Bacoor, 4102 Cavite</p>
               <a href="{{ route('services.type') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                   Request Service
                   <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
               </a>
           </div>
       </div>
   </section>

   <section>
        <div class="z-0 h-auto min-h-[500px]">
            <div class="max-w-[1400px] px-4 py-10 mx-auto ">
                <div class="w-full flex items-start justify-between mb-10">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Caskets</h2>
                        <p class="text-sm">Here are some of our available caskets</p>
                    </div>

                    <form action="{{ route('home') }}" class="w-full flex items-center max-w-lg">
                        <label for="voice-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            {{-- <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.15 5.6h.01m3.337 1.913h.01m-6.979 0h.01M5.541 11h.01M15 15h2.706a1.957 1.957 0 0 0 1.883-1.325A9 9 0 1 0 2.043 11.89 9.1 9.1 0 0 0 7.2 19.1a8.62 8.62 0 0 0 3.769.9A2.013 2.013 0 0 0 13 18v-.857A2.034 2.034 0 0 1 15 15Z"/>
                                </svg>
                            </div> --}}
                            <input type="text" type="text" hx-get="/json/caskets/" hx-trigger="keyup delay:500ms" hx-indicator="#loading" hx-target="#results" name="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Name, Description, Design, Color..." required />
                        </div>
                    </form>
                </div>
                {{-- <button hx-get="/json/caskets/" hx-trigger="click" hx-target="#results">click me</button> --}}
                <div id="loading" class="hidden">Loading...</div>
                <div hx-get="/json/caskets/" hx-trigger="load" id="results"  class="flex flex-wrap -m-4" id="cntr">
                    {{-- @foreach ($caskets as $casket)
                        <div class="p-4 md:w-1/3">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">

                                <div id="animation-carousel" class="relative w-full" data-carousel="static">
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
                                    <p class="leading-6 mb-3 text-sm">{{ Illuminate\Support\Str::limit($casket->description, 35, '...') ?? 'N/A' }}</p>

                                    <div class="flex items-center justify-between z-50">
                                        <a href="{{ route('home.select-casket', $casket->id) }}" class="text-indigo-500 inline-flex text-sm items-center md:mb-2 lg:mb-0">Select and proceed
                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                        <span class="leading-6 font-medium text-base">&#x20B1; {{ number_format($casket->price, 2, '.', ',') }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                    {{-- @if($caskets->isEmpty())
                        <div class="w-full h-40 flex items-center justify-center">
                            <span class="text-base text-red-600 text-center" colspan="9">No Records Found</span>
                        </div>
                    @endif --}}
                </div>

                {{-- <div class="pt-6">
                    {{ $caskets->links() }}
                </div> --}}

                @if (count($feedbacks) > 0)
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">What our clients say about us</h1>
                                <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Here are some of the testimonies and feedbacks from our previous clients.</p>
                            </div>

                            @foreach ($feedbacks as $feedback)
                                <div class="flex flex-wrap -m-4">
                                    <div class="xl:w-1/3 md:w-1/2 p-4">
                                        <div class="border border-gray-300 p-4 rounded-lg">
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{ $feedback->name }}</h2>
                                            <p class="leading-relaxed text-base">{{ $feedback->content }}</p>
                                            <div class="flex items-center space-x-1 pt-2">
                                                @for($i = 0; $i < $feedback->stars; $i++)
                                                    <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10 12.928l-4.243 2.485a1 1 0 01-1.451-1.054l.82-4.773-3.423-3.334a1 1 0 01.554-1.705l4.77-.694 2.13-4.315a1 1 0 011.789 0l2.13 4.315 4.77.694a1 1 0 01.554 1.705l-3.423 3.334.82 4.773a1 1 0 01-1.451 1.054L10 12.928z" />
                                                    </svg>
                                                @endfor
                                                <span class="text-gray-500 text-sm dark:text-gray-400 font-semibold">({{ $feedback->stars }}/5)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
            </div>

            <div id="imageModal" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 z-50 ">
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

            function reinitializeZoom() {
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
            }

            document.addEventListener('DOMContentLoaded', reinitializeZoom);

            document.body.addEventListener('htmx:afterOnLoad', function (event) {
                reinitializeZoom();
            });
        </script>
   </section>

   <section class="text-gray-600 body-font bg-neutral-200 relative py-14">
    <div class="mx-auto max-w-[1240px]" data-aos="fade-up">
      <div class="z-10 text-center text-black">
          <h1 class="text-4xl font-bold uppercase mb-4">
            Where to find & contact us
          </h1>
        </div>
      <div class="px-5 py-8    mx-auto flex sm:flex-nowrap flex-wrap">
        <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
          <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?q=Torres-Escaro Funeral Service 110 Bayanan Rd, Bacoor, 4102 Cavite&t=&z=17&ie=UTF8&iwloc=&output=embed" ></iframe>
          <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
            <div class="lg:w-1/2 px-6">
              <h2 class="title-font font-semibold text-black tracking-widest text-xs">ADDRESS</h2>
              <p class="mt-1 text-black">110 Bayanan Rd, Bacoor, 4102 Cavite</p>
            </div>
            <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
              <h2 class="title-font font-semibold text-black tracking-widest text-xs">EMAIL</h2>
              <a class="text-indigo-800 leading-relaxed">torresescarofuneral@gmail.com</a>
              <h2 class="title-font font-semibold text-black tracking-widest text-xs mt-4">MOBILE</h2>
              <p class="leading-relaxed text-black">0921-421-4743 / 0919-075-5427 / <br> LANDLINE: (046) 502-6635</p>
            </div>
          </div>
        </div>

        <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full rounded-md p-5 mt-8 md:mt-0">
          <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Feedback</h2>
          <p class="leading-relaxed mb-5 text-sm text-gray-600">We value your input! <br> At Toress Escaro Funeral Service, we are committed to providing you with the best possible experience. </p>
          <div class="relative mb-4">
            <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
            <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          <div class="relative mb-4">
            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
            <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>
          <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
          <p class="text-sm text-gray-500 mt-3">Your feedback is essential in helping us achieve that goal. Whether you've had a great experience or encountered any challenges, we want to hear from you.</p>
        </div>
      </div>
    </div>
  </section>

   <x-footer />

   <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>
</html>
