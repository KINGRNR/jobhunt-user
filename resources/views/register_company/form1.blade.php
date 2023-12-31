<div id="form1" class="form-step">
    <div class="mx-8 my-4 lg:mx-14 lg:my-8">
        <button type="button" onclick="window.location='{{ route('index') }}'"
            class="text-white bg-figma-gray-200 hover:bg-gray-400 duration-100 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full px-3 py-3 text-center mr-2 mb-2"><svg
                width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 7H3.83L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9H16V7Z" fill="#323232" />
            </svg></button>
        Back
    </div>
    <div class="flex justify-center">
        <div class="mx-8 md:ml-16 w-50vh h-auto md:w-[100vh]">
            <div class="pt-5">
                <div class="pb-12 ml-8">
                    <div class="flex items-center">
                        <div class="flex items-center text-white relative">
                            <div
                                class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 bg-figma-biru-300 border-figma-biru-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-bookmark ">
                                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </div>
                            <div
                                class="absolute top-0 -ml-10 text-center mt-16 w-32 text-sm font-medium text-figma-biru-300">
                                Basic<br />Information</div>
                        </div>
                        <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300">
                        </div>
                        <div class="flex items-center text-gray-500 relative">
                            <div
                                class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user-plus ">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="20" y1="8" x2="20" y2="14">
                                    </line>
                                    <line x1="23" y1="11" x2="17" y2="11">
                                    </line>
                                </svg>
                            </div>
                            <div
                                class="absolute top-0 -ml-10 text-center mt-16 w-32 text-sm font-medium  text-gray-500">
                                Company<br />Information</div>
                        </div>
                        <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300">
                        </div>
                        <div class="flex items-center text-gray-500 relative">
                            <div
                                class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-mail ">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-sm font-medium text-gray-500">
                                End</div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 p-4">
                    <div>
                        <div class="">
                            <div class="grow grid grid-cols-1">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-6">
                                    <div class="grid grid-cols-1">
                                        <label for="email"
                                            class="block pb-2 text-sm font-medium text-gray-900">Email</label>
                                        <input type="text" id="email" name="email"
                                            class="mb-4 block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Enter your email" >
                                    </div>

                                    <div class="grow grid grid-cols-1">
                                        <label for="password"
                                            class="block pb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <div class="relative w-full">
                                            <input type="password" id="password" name="password"
                                                class="mb-4 block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Enter your password" >
                                            <i class="fa fa-eye text-gray-500 absolute right-2.5  lg-bigger:left-auto lg-bigger:right-2.5 top-2.5 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 cursor-pointer"
                                                id="togglePassword" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>

                                <label for="position"
                                    class="block pb-2 text-sm font-medium text-gray-900">Position</label>
                                <input type="position" id="position" name="position"
                                    class="mb-4 block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter position" >

                                <label for="phone"
                                    class="block pb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                <input type="phone" id="phone" name="telp" maxlength="14"
                                    class="mb-4 block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter your phone" >

                                <div class="grid grid-cols-1">
                                    <button type="button"
                                        class="next-button text-white bg-figma-biru-primary hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium text-sm px-5 py-2.5 block w-full duration-75" id="next-button">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
