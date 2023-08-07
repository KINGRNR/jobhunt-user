<div class="grid grid-cols-1 lg:grid-cols-2 place-items-center bg-about-gradient">
<div class="z-40 place-items-end" oncontextmenu = "return false;">
<video class="w-[429px] h-[480px] lg-bigger:w-[536px] lg-bigger:h-[560px] rounded-xl object-cover mb-0 lg:mb-20" controls>
    <source
        src="{{ asset('video.mp4') }}"
        type="video/mp4">
    Your browser does not support the video tag.
</video>
<video style="display: none" class="w-[429px] h-[480px] lg-bigger:w-[536px] lg-bigger:h-[560px] rounded-xl object-cover mb-0 lg:mb-20" controls autoplay>
    <source
        src="{{ asset('video.mp4') }}"
        type="video/mp4">
    Your browser does not support the video tag.
</video>
</div>
{{-- hack incoming --}}
<div class="mt-20 relative lg:absolute grid grid-cols-1 lg:grid-cols-2">
<p></p>
<p class="leading-loose mb-20 text-base text-justify mx-10 lg:mr-14 lg:ml-5 lg-bigger:-ml-10 lg:mx-0 lg:mb-0 lg-bigger:leading-loose lg-bigger:text-xl"><span class="flex justify-center lg:justify-normal font-semibold text-merah text-3xl">About Us</span><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
</div>
</div>

