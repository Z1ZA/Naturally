<x-layout>
    <div class="flex">
        @include('partials._sidebar')
        <!-- content -->
        <div class="w-3/4 p-12 bg-white">
            <div class="mb-6">
                <h1 class="font-playfair text-3xl text-[#FFAA04]">
                    Edit Article
                </h1>
                <p class="font-work text-base text-hitam-200 pt-2">
                    Edit your article!
                </p>
            </div>
            <form action="/blog/{{$blog->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <div class="flex gap-4 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <circle cx="7" cy="7" r="7" fill="#FFAA04" />
                            <circle cx="7" cy="7" r="5" fill="white" />
                            <circle cx="7" cy="7" r="2" fill="#FFAA04" />
                        </svg>
                        <h2 class="font-work text-xl text-[#1E1E1E]">Photo</h2>
                    </div>
                    <div class="border rounded-md border-[#EDEDED] w-full h-[178px] ml-6 mt-3 p-6">
                        <div class="border rounded-sm border-dashed border-[#BABABA] flex flex-col justify-center items-center h-full gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M9 10C10.1046 10 11 9.10457 11 8C11 6.89543 10.1046 6 9 6C7.89543 6 7 6.89543 7 8C7 9.10457 7.89543 10 9 10Z" stroke="#9A9A9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V10" stroke="#9A9A9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15.75 5H21.25" stroke="#9A9A9A" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M18.5 7.75V2.25" stroke="#9A9A9A" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M2.67 18.9501L7.6 15.6401C8.39 15.1101 9.53 15.1701 10.24 15.7801L10.57 16.0701C11.35 16.7401 12.61 16.7401 13.39 16.0701L17.55 12.5001C18.33 11.8301 19.59 11.8301 20.37 12.5001L22 13.9001" stroke="#9A9A9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <input type="file" name="image" id="image" placeholder="Blog Image" class="font-work text-sm font-medium text-[#9A9A9A] border rounded-sm" />
                            @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="font-work text-xs text-[#9A9A9A]">
                                max. 1240 x 1240 pixel, size 2MB
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="flex gap-4 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <circle cx="7" cy="7" r="7" fill="#FFAA04" />
                            <circle cx="7" cy="7" r="5" fill="white" />
                            <circle cx="7" cy="7" r="2" fill="#FFAA04" />
                        </svg>
                        <h2 class="font-work text-xl text-[#1E1E1E]">
                            Details
                        </h2>
                    </div>
                    <div class="border rounded-md border-[#EDEDED] w-full h-auto p-6 flex flex-col gap-5 ml-6 mt-3">
                        <div>
                            <p class="text-base text-hitam-200 mb-3">Title</p>
                            <input type="text" name="title" id="title" value="{{$blog->title}}" placeholder="Max. 10 words" class="border rounded-md border-[#EDEDED] focus:border-[#3C4D27] placeholder-[#9A9A9A] font-work outline-0 px-6 py-3 w-full text-sm" />
                            @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex gap-14">
                            <div>
                                <p class="font-work text-base text-hitam-200 mb-3">
                                    Type Article : <span class="text-[#FFAA04]">{{$blog->tag}}</span>
                                </p>
                                <select name="tag" id="tag" class="border border-[#EDEDED] focus:border-[#3C4D27] rounded-md font-work outline-0 h-10 text-sm">
                                    @foreach($tags as $item)
                                    <option value="{{$item->tag}}">{{$item->tag}}</option>
                                    @endforeach
                                </select>
                                @error('tag')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <p class="font-work text-base text-hitam-200 mb-3">
                                Description
                            </p>
                            <textarea id="summernote" name="article">{{$blog->article}}</textarea>
                            @error('article')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-hijau-100 rounded-md font-work text-white text-base px-4 py-2">
                                Edit +
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({
                placeholder: "",
                tabsize: 2,
                height: 100,
            });
        });
    </script>
</x-layout>
