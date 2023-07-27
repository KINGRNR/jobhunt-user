<div id="form" class="fade-me-in">
    <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="order-1">

            <div class="grid grid-cols-1">

                <div class="mx-8 my-4 lg:mx-14 lg:my-8">
                    <button type="button"
                        class="text-white bg-figma-gray-200 hover:bg-gray-400 duration-100 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full px-3 py-3 text-center mr-2 mb-2"><svg
                            width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7H3.83L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9H16V7Z" fill="#323232" />
                        </svg></button>
                    Back
                </div>

                <div class="mx-8 lg:mx-28 py-6 flex justify-start">
                    <img src="svg/logoipsum-287.svg" class="w-48 h-16" alt="Logo Ipsum Logo">
                </div>

                <div class="mx-12 lg:mx-32 w-50vh h-auto lg:w-[80vh]">
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                    <div class="flex justify-center">
                        <div class="grow grid grid-cols-1">
                            <label for="email" class="block pb-2 text-sm font-medium text-gray-900">Email
                                address</label>
                            <input type="email" id="email" name="email"
                                class="mb-4 block w-full lg:w-[400px] lg-bigger:w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter your E-mail" required>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div class="grow grid grid-cols-1">
                            <label for="password"
                                class="block pb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                 <div class="relative w-full">
                                     <input type="password" id="password" name="password" class="mb-4 block w-full lg:w-[400px] lg-bigger:w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your password" required>
                                     <i
                                        class="fa fa-eye text-gray-500 absolute right-2.5 lg:left-[348px] lg-bigger:left-auto lg-bigger:right-2.5 top-2.5 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 cursor-pointer" id="togglePassword" aria-hidden="true"></i>
                                 </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1">
                        <a href="#" hx-get="/login/forgotpassword"
                        hx-target="#form" hx-trigger="click" hx-swap="outerHTML" hx-push-url="true"
                            class="text-sm text-figma-yellow-secondary font-medium hover:underline mb-4">Forgot
                            password?</a>
                        <button type="submit"
                            class="text-white bg-figma-biru-primary hover:bg-blue-800 duration-100 focus:ring-4 focus:ring-blue-300 font-medium text-sm lg:w-[400px] lg-bigger:w-full p-3">SIGN
                            IN</button>
                        <p class="text-sm text-center py-4 font-medium lg:w-[400px] lg-bigger:w-full">Don't have an account? <span
                                class="text-figma-biru-300 hover:underline"><a href="#" hx-get="/register"
                                    hx-target="#form" hx-trigger="click" hx-swap="outerHTML" hx-push-url="true">Sign
                                    up</a></span> now!</p>
                        <div class="relative flex items-center lg:w-[400px] lg-bigger:w-full">
                            <div class="flex-grow border-t-[1.5px] border-dashed border-gray-400"></div>
                            <span class="flex-shrink mx-1 text-gray-400 text-sm font-medium">or sign in with</span>
                            <div class="flex-grow border-t-[1.5px] border-dashed border-gray-400"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-2 py-2 lg:w-[400px] lg-bigger:w-full">
                        <button type="button"
                            class="text-black bg-white border border-gray-200 hover:bg-gray-200 duration-100 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full px-3 py-3 mr-2 mb-2 flex justify-center"><svg
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_892_2065)">
                                    <path
                                        d="M23.7663 12.2763C23.7663 11.4605 23.7001 10.6404 23.559 9.83789H12.2402V14.4589H18.722C18.453 15.9492 17.5888 17.2676 16.3233 18.1054V21.1037H20.1903C22.4611 19.0137 23.7663 15.9272 23.7663 12.2763Z"
                                        fill="#4285F4" />
                                    <path
                                        d="M12.2391 24.0013C15.4756 24.0013 18.205 22.9387 20.1936 21.1044L16.3266 18.106C15.2507 18.838 13.8618 19.2525 12.2435 19.2525C9.11291 19.2525 6.45849 17.1404 5.50607 14.3008H1.51562V17.3917C3.55274 21.4439 7.70192 24.0013 12.2391 24.0013Z"
                                        fill="#34A853" />
                                    <path
                                        d="M5.50277 14.3007C5.00011 12.8103 5.00011 11.1965 5.50277 9.70618V6.61523H1.51674C-0.185266 10.006 -0.185266 14.0009 1.51674 17.3916L5.50277 14.3007Z"
                                        fill="#FBBC04" />
                                    <path
                                        d="M12.2391 4.74966C13.9499 4.7232 15.6034 5.36697 16.8425 6.54867L20.2685 3.12262C18.0991 1.0855 15.2198 -0.034466 12.2391 0.000808666C7.70192 0.000808666 3.55274 2.55822 1.51562 6.61481L5.50166 9.70575C6.44967 6.86173 9.1085 4.74966 12.2391 4.74966Z"
                                        fill="#EA4335" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_892_2065">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg><span class="ml-4">Google</span></button>
                    </div>
                </form>
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
