<div id="form" class="fade-me-in">
<div class="grid grid-cols-1 lg:grid-cols-2">
    <div class="">

        <div class="grid grid-cols-1">

            <div class="px-14 py-8" hx-preserve>
                <button type="button"
                    class="text-white bg-figma-gray-200 hover:bg-gray-400 duration-100 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full px-3 py-3 text-center mr-2 mb-2"><svg
                        width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 7H3.83L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9H16V7Z" fill="#323232" />
                    </svg></button>
                Back
            </div>

            <div class="mr-60 py-6 flex justify-center">
                <img src="svg/logoipsum-287.svg" class="w-48 h-16" alt="HTML tutorial">
            </div>

            <div class="ml-[136px] mr-12 flex justify-center">
                <div class="">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="grid grid-cols-1">
                    <label for="email" class="block pb-2 text-sm font-medium text-gray-900">First Name</label>
                    <input type="email" id="firstName"
                        class="mb-4 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block h-[52px] p-4"
                        placeholder="Enter your first name" required>
                        </div>

                        <div class="grid grid-cols-1">
                    <label for="email"
                        class="block pb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                    <input type="password" id="password"
                        class="mb-4 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block h-[52px] p-4"
                        placeholder="Enter your last name" required>
                        </div>
                    </div>

                    <label for="email" class="block pb-2 text-sm font-medium text-gray-900">Email address</label>
                    <input type="email" id="email"
                        class="mb-4 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] h-[52px] p-4"
                        placeholder="Enter yout E-mail" required>

                    <label for="password"
                        class="block pb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password"
                        class="mb-4 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] h-[52px] p-4"
                        placeholder="Enter your password" required>

                    <div class="grid grid-cols-1">
                        <a href="#"
                            class="text-sm text-figma-yellow-secondary font-medium hover:underline mb-4">Forgot
                            password?</a>
                        <button type="button"
                            class="text-white bg-figma-biru-primary hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium text-sm px-5 py-2.5">SIGN UP</button>
                        <p class="text-sm text-center py-4 font-medium">Have an account? <span class="text-figma-biru-300 hover:underline"><a href="#" hx-get="/login" hx-target="#form" hx-trigger="click" hx-swap="outerHTML swap:0.1s" hx-push-url="true">Sign in</a></span> instead!</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="flex justify-center">
        <img
        alt="Night"
        src="https://images.unsplash.com/photo-1617195737496-bc30194e3a19?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
        class=" object-cover rounded-2xl ml-12 m-4 h-[95vh] w-[100vh]"
      />
    </div>
</div>
</div>

<script src="https://unpkg.com/htmx.org@1.9.2"></script>
