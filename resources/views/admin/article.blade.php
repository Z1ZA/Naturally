<x-layout>
    <div class="flex">
        @include('partials._sidebar')
        <!-- content -->
        <div class="w-3/4 p-12 bg-white">
            <div class="flex justify-between items-end w-full">
                <div class="flex flex-col gap-2">
                    <h1 class="font-playfair text-[#3C4D27] text-3xl">
                        Article
                    </h1>
                    <p class="font-work text-hitam-200 text-base">
                        This page contains article published
                    </p>
                </div>
                <form action="/dashboard/article">
                    <div class="border border-[#3C4D27] rounded-md w-[267px] h-9 flex items-center gap-4 py-2 px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M7.66668 13.9999C11.1645 13.9999 14 11.1644 14 7.66659C14 4.16878 11.1645 1.33325 7.66668 1.33325C4.16887 1.33325 1.33334 4.16878 1.33334 7.66659C1.33334 11.1644 4.16887 13.9999 7.66668 13.9999Z" stroke="#3C4D27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.6667 14.6666L13.3333 13.3333" stroke="#3C4D27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input name="search" class="search-form font-work text-sm placeholder-[#D8D8D8] w-full h-full border-0 focus:outline-none" type="text" placeholder="Search activity by title" />
                    </div>
                </form>
            </div>
            <!-- article -->
            <div class="flex flex-col pt-12 gap-8">
                <div class="flex gap-10 justify-start flex-wrap w-full">
                    @unless ($blogs->isEmpty())
                    @foreach ($blogs as $blog)
                    <div class="bg-white w-[30%] min-h-[290px] flex flex-col justify-between rounded-md shadow-md">
                        <img src="{{$blog->image ? asset('storage/'.$blog->image) : asset('images/kambing.png')}}" alt="" class="w-full h-[130px] inset-0 object-cover rounded-t-md" />
                        <div class="px-6 flex flex-col justify-between font-work font-normal h-full">
                            <p class="text-base mt-3 text-hitam-300 leading-[30px]">
                                {{ Str::limit($blog->title, 40) }}
                            </p>
                            <p class="mt-3 mb-4 md:mt-[12px] text-sm font-normal text-[#7B370C]">
                                {{$blog->tag}}
                            </p>
                        </div>
                        <form action="/blog/{{$blog->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="flex font-work h-[50px] border border-[#F0F0F0]">
                                <div class="border-r border-[#F0F0F0] flex justify-center items-center py-2 w-1/2">
                                    <button class="text-[#970000] text-base">Delete</button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                        <path d="M10.318 16.6819L16.682 10.3179" stroke="#970000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.682 16.6821L10.318 10.3181" stroke="#970000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <a href="/blog/{{$blog->id}}/edit" class="flex gap-2 justify-center items-center py-2 w-1/2">
                                    <p class="text-[#7A9C46] text-base">Edit</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                        <path d="M6.63 1.80011L2.525 6.14511C2.37 6.31011 2.22 6.63511 2.19 6.86011L2.005 8.48011C1.94 9.06511 2.36 9.46511 2.94 9.36511L4.55 9.09011C4.775 9.05011 5.09 8.88511 5.245 8.71511L9.35 4.37011C10.06 3.62011 10.38 2.76511 9.275 1.72011C8.175 0.685108 7.34 1.05011 6.63 1.80011Z" stroke="#7A9C46" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.945 2.5249C6.16 3.9049 7.28 4.9599 8.67 5.0999" stroke="#7A9C46" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1.5 11H10.5" stroke="#7A9C46" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </form>
                    </div>
                    @endforeach
                    @else
                    <p>Tidak ada article yang tersedia.</p>
                    @endunless
                </div>
            </div>
            <div class="flex mt-9 justify-between font-work items-center w-full">
                <div class="mt-12">
                    <div class="flex justify-center">
                        {{ $blogs->links() }}
                    </div>
                </div>
                <a href="/blog/create" class="bg-hijau-100 px-4 py-2 rounded-md flex items-center gap-2 hover:font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M5 10H15" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 15V5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-white text-base">New Article</p>
                </a>
            </div>
        </div>
    </div>
</x-layout>