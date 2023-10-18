<div id="form" class="fade-me-in">
    <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="order-1">

            <div class="grid grid-cols-1 lg:grid-cols-2">

                <div class="mx-8 my-4 lg:mx-14 lg:my-8 col-span-2">
                    <button type="button"
                        class="text-white bg-figma-gray-200 hover:bg-gray-400 duration-100 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full px-3 py-3 text-center mr-2 mb-2"><svg
                            width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7H3.83L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9H16V7Z" fill="#323232" />
                        </svg></button>
                    Back
                </div>

                <div class="mx-8 lg:mx-28 py-6 flex justify-start col-span-2">
                    <img src="svg/logoipsum-287.svg" class="w-48 h-16" alt="HTML tutorial">
                </div>

                <div class="mx-12 lg:mx-32 col-span-2">
                    <form id="form-register">
                        <div class="grid grid-cols-1 lg:grid-cols-2 col-span-2 gap-0 lg:gap-2 lg-bigger:gap-6">
                            <div class="grid grid-cols-4">
                                <label for="email"
                                    class="block pb-2 text-sm font-medium text-gray-900 col-span-2">First Name</label>
                                <input type="text" id="firstName" name="firstName"
                                    class="mb-4 block w-full p-4 text-sm lg:min-w-0 text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-4"
                                    placeholder="Enter your first name" required>
                            </div>

                            <div class="grid grid-cols-4">
                                <label for="email"
                                    class="block pb-2 text-sm font-medium text-gray-900 dark:text-white col-span-2">Last
                                    Name</label>
                                <input type="text" id="lastName" name="lastName"
                                    class="mb-4 block w-full p-4 text-sm lg:min-w-0 text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-4"
                                    placeholder="Enter your last name" required>
                            </div>
                        </div>

                        <label for="email" class="block pb-2 text-sm font-medium text-gray-900 col-span-2">Email
                            address</label>
                        <input type="email" id="email" name="email"
                            class="mb-4 block w-full p-4 text-sm lg:w-[400px] lg-bigger:w-full text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-2"
                            placeholder="Enter yout E-mail" required>

                        <label for="password"
                            class="block pb-2 text-sm font-medium text-gray-900 dark:text-white col-span-2">Password</label>
                        <input type="password" id="password" name="password"
                            class="block w-full p-4 text-sm lg:w-[400px] lg-bigger:w-full text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-2"
                            placeholder="Enter your password" required>
                        <div class="text-red-400 text-sm"></div>
                        <div class="grid grid-cols-1 mt-4">
                            <button type="submit"
                                class="lg:w-[400px] lg-bigger:w-full text-white bg-figma-biru-primary hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium text-sm px-5 py-2.5 block w-full col-span-2">SIGN
                                UP</button>
                            <p class="lg:w-[400px] lg-bigger:w-full text-sm text-center py-4 font-medium">Have an
                                account? <span class="text-figma-biru-300 hover:underline"><a href="#"
                                        hx-get="/login" hx-target="#form" hx-trigger="click" hx-swap="outerHTML"
                                        hx-push-url="true">Sign in</a></span> instead!</p>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="order-2 hidden lg:inline">
            <div class="flex justify-center">
                <img alt="Night"
                    src="https://images.unsplash.com/photo-1617195737496-bc30194e3a19?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    class="object-cover rounded-2xl ml-24 mr-4 lg-bigger:mr-4 my-4 h-[620px] lg-bigger:h-[95vh] w-[100%]" />
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/htmx.org@1.9.2"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('#form-register').on('submit', function submit(e) {
        e.preventDefault();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "{{ route('register') }}",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(res) {
                window.location.href = res.redirect;
                // Toast.fire({
                //     icon: 'success',
                //     title: res.message,
                // });
            },
            error: function(xhr, status, error) {
                var errors = xhr.responseJSON.errors;

                // console.log(status);
                if (errors) {
                    for (var key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            var errorMessage = errors[key][0];
                            var inputElement = document.getElementById(key);
                            if (inputElement) {
                                Swal.fire({
                                    icon: 'error',
                                    showConfirmButton: false,
                                    timer: 3500,
                                    title: errorMessage
                                });
                            }
                        }
                    }
                } 
            }
        });
    });
</script>
