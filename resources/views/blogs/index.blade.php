<x-layout>
    <div class="pt-12 h-full bg-[#fafafa]">
        <div class="md:container">
            @include('partials._navbar')
            <div class="flex flex-col items-center px-4 justify-center pt-[100px] sm:gap-6 gap-3">
                <h1 class="text-4xl font-playfair sm:text-[64px] text-emas">
                    Article on Naturally
                </h1>
                <p class="font-work text-sm sm:text-[24px]">
                    Find your preference articles to earn knowledge!
                </p>
            </div>
            <div class="flex pt-20 mt-3 md:mt-7 flex-wrap gap-2 md:gap-4 md:px-4 px-2">
                @unless(count($tags) == 0)
                @foreach($tags as $tag)
                <x-tag-more-card :tag="$tag" />
                @endforeach
                @else
                <p class="text-[#555555] font-work text-center text-[18px] font-medium">No tag available yet</p>
                @endunless
            </div>
            <div class="md:mt-9 mt-4 md:gap-12 gap-6 flex flex-col md:flex-row md:px-4 px-2">
                @unless(count($blogs) == 0)
                @foreach($blogs as $blog)
                <x-blog-card :blog="$blog" />
                @endforeach
                @else
                <p class="text-[#555555] font-work text-center text-[18px] font-medium">Keyword not found. It might your
                    keyword is
                    <span class="text-[#7B370C]">not availabe</span> yet.
                </p>
                @endunless
            </div>

            <div class="mt-12">
                <div class="flex justify-center">
                    {{ $blogs->links() }}
                </div>
            </div>

        </div>
        <section class="pt-16 mt-32 bg-[#f8f8f8] h-96 w-full">
            <div class="flex flex-col items-center justify-center">
                <h1 class="font-work text-3xl text-[#333333] font-semibold">
                    Still can’t find your preferences?
                </h1>
                <p class="font-work text-base text-[#333333] font-medium pt-2 pb-12">
                    Write down your thought below!
                </p>

                <div class="flex flex-col w-full items-center justify-center gap-6">
                    <form action="/moreArticle">
                        <div class="border w-[1000px] rounded-lg sm:h-16 h-9 sm:pl-8 pl-4 py-4 border-hitam-100 flex items-center gap-3 sm:gap-6">
                            <svg class="md:w-6 md:h-6 w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" stroke="#424242" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22 22L20 20" stroke="#424242" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <input type="text" name="search" class="search-form bg-[#fafafa] md:pl-2 placeholder-hitam-100 md:text-2xl text-[10px] md:w-full w-60 focus:outline-0 focus:text-hitam-200" placeholder="Any Keyword ?" />
                        </div>
                    </form>
                </div>

            </div>
        </section>
        @include('partials._footer')
    </div>
</x-layout>