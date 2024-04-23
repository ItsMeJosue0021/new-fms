<x-guest-layout>
    <div class="w-full max-w-[1400px] mx-auto px-4">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
              <div class="flex flex-wrap w-full mb-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                  <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Latest Announcements</h1>
                  <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                </div>
                {{-- <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p> --}}
              </div>
              <div class="flex flex-wrap -m-4">
                @foreach ($announcements as $announcement)
                    <a href="{{ route('announcements.home-show', $announcement->id) }}" class="xl:w-1/4 md:w-1/2 p-4">
                        <div class="bg-gray-100 p-6 rounded-lg">
                            @if ($announcement->announcementImages->first() && $announcement->announcementImages->first()->image)
                                <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ asset('storage/' . $announcement->announcementImages->first()->image) }}" alt="content">
                            @endif
                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">ANNOUNCEMENT</h3>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ substr($announcement->title, 0, 30) }}{{ strlen($announcement->title) > 30 ? '...' : '' }}</h2>
                            <p class="leading-relaxed text-base">{{ substr($announcement->content, 0, 60) }}{{ strlen($announcement->content) > 60 ? '...' : '' }}</p>
                        </div>
                    </a>
                @endforeach
              </div>
              <div class="py-4">
                {{ $announcements->links() }}
              </div>
            </div>
          </section>
    </div>
</x-guest-layout>
