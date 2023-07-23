<div id="form" class="fade-me-in">
    <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="order-1">

            <div class="grid grid-cols-1">

{{-- back button --}}
                <div class="mx-8 my-4 lg:mx-14 lg:my-8">
                    <button type="button"
                        class="text-white bg-figma-gray-200 hover:bg-gray-400 duration-100 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full px-3 py-3 text-center mr-2 mb-2"><svg
                            width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7H3.83L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9H16V7Z" fill="#323232" />
                        </svg></button>
                    Back
                </div>
{{-- change whatever you want in here --}}
<div class="flex justify-center">
<div class="mx-8 lg:mx-16 h-auto">
<ol class="flex items-center w-full">
    <li class="flex w-[100vh] lg:w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
        <span class="flex items-center justify-center lg:ml-24 w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
            1
    </li>
    <li class="flex w-[100vh] items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
        <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
            2
        </span>
    </li>
    <li class="flex items-center">
        <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
            3
        </span>
    </li>
</ol>
</div>
</div>

            </div>
        </div>
        <div class="order-2 hidden lg:inline">
            <div class="flex justify-center">
                <img alt="Night"
                    src="https://images.unsplash.com/photo-1617195737496-bc30194e3a19?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    class=" object-cover rounded-2xl ml-24 mr-4 lg-bigger:mr-4 my-4 h-[620px] lg-bigger:h-[95vh] w-[100%]" />
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/htmx.org@1.9.2"></script>
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            this.classList.toggle("fa-eye-slash");
        });
  </script>
