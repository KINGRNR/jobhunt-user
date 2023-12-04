<style>
    @keyframes slideInLeft {
        0% {
            opacity: 0;
            transform: translateX(-100%);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        0% {
            opacity: 0;
            transform: translateX(100%);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-left-about {
        opacity: 0;
        transform: translateX(-100%);
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .animate-right-about {
        opacity: 0;
        transform: translateX(100%);
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .animate-left-about.active {
        opacity: 1;
        transform: translateX(0);
        animation: slideInLeft 0.5s ease-in-out;
    }

    .animate-right-about.active {
        opacity: 1;
        transform: translateX(0);
        animation: slideInRight 0.5s ease-in-out;
    }
</style>
<div class="grid grid-cols-1 lg:grid-cols-2 bg-gray-100 gap-10">
    <video class="w-full h-full object-cover animate-right-about" controls>
        <source  src="{{ asset('video.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    <div class="grid grid-cols-1 gap-8">
        <div class="flex justify-center lg:justify-start">
        <p class="pt-20 font-semibold text-4xl text-figma-biru-primary animate-right-about">About Us</p>
        </div>
        <div class="flex justify-center lg:justify-start">
            <p class="pb-20 leading-loose px-8 mr-0 lg:mr-8 lg:px-0 animate-right-about">Lorem ipsum dolor sit amet consectetur. Aliquam leo nunc in amet. Quisque sagittis massa mi parturient. Lacus rutrum ultricies egestas id fusce eget. Consequat enim neque faucibus eget. Mauris pharetra vestibulum interdum tortor. Mi posuere morbi sagittis dis. Pretium integer eget aliquam libero mollis ut amet duis. Lorem ipsum dolor sit amet consectetur. Aliquam leo nunc in amet. Quisque sagittis massa mi parturient. Lacus rutrum ultricies egestas id fusce eget. Consequat enim neque faucibus eget. Mauris pharetra vestibulum interdum tortor. Mi posuere morbi sagittis dis. Pretium integer eget aliquam libero mollis ut amet duis.</p>
        </div>
    </div>
</div>

<script>
    $(document).scroll(function () {
        const observer = new IntersectionObserver(entries => {
            entries.forEach((entry, index) => {
                setTimeout(() => {
                        entry.target.classList.add('active');
                    }, index * 100); 
            });
        }, { threshold: 0.2 });


        const articles = $('.animate-left-about, .animate-right-about');

        articles.each(function () {
            observer.observe(this);
        });
    });
</script>