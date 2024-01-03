<style>
    .loading-spinner-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        /* Ubah z-index sesuai kebutuhan */
    }

    .loading-spinner {
        border: 2px solid #ccc;
        border-top: 2px solid #007bff;
        /* Ganti warna sesuai kebutuhan */
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div class="loading-spinner-overlay" id="loading-spinner" style="display: none;">
    <div class="loading-spinner"></div>
    <p>Loading..</p>
</div>
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

                <div class="mx-12 lg:mx-32 py-6 flex justify-start">
                    {{-- <img src="svg/logoipsum-287.svg" class="w-48 h-16" alt="Logo Ipsum Logo"> --}}
                    {{-- <svg id="logo-77" width="45" height="40" viewBox="0 0 45 40" fill="black"
                    xmlns="http://www.w3.org/2000/svg">
                    <path class="ccustom" fill-rule="evenodd" clip-rule="evenodd"
                        d="M20.5216 0C31.5673 0 40.5216 8.9543 40.5216 20C40.5216 31.0457 31.5673 40 20.5216 40C9.47591 40 0.521606 31.0457 0.521606 20C0.521606 8.9543 9.47591 0 20.5216 0ZM19.7987 1.49659C17.5171 1.81769 15.3445 3.65108 13.658 6.7174C13.1688 7.60683 12.7274 8.58946 12.3427 9.65044C14.6359 9.07417 17.155 8.73442 19.7987 8.68187V1.49659ZM10.6524 10.1308C11.1307 8.62958 11.7159 7.2484 12.3912 6.02065C13.2272 4.50059 14.2194 3.18795 15.3373 2.17977C9.2584 3.94523 4.46683 8.73679 2.70138 14.8157C3.70955 13.6978 5.0222 12.7056 6.54226 11.8696C7.77001 11.1943 9.15118 10.6091 10.6524 10.1308ZM10.172 11.8211C9.59577 14.1143 9.25603 16.6334 9.20348 19.2771H2.01819C2.3393 16.9954 4.17269 14.8228 7.23901 13.1364C8.12844 12.6472 9.11107 12.2058 10.172 11.8211ZM10.6496 19.2771C10.7093 16.392 11.1246 13.6834 11.8118 11.2902C14.205 10.603 16.9137 10.1876 19.7987 10.1279V13.2508C18.7224 16.0062 16.5272 18.2012 13.7717 19.2771H10.6496ZM9.20348 20.7229H2.01819C2.3393 23.0046 4.17269 25.1771 7.23901 26.8636C8.12844 27.3528 9.11107 27.7942 10.172 28.1789C9.59577 25.8857 9.25603 23.3666 9.20348 20.7229ZM11.8118 28.7098C11.1246 26.3166 10.7093 23.608 10.6496 20.7229H13.7717C16.5272 21.7988 18.7225 23.9938 19.7987 26.7492V29.8721C16.9137 29.8124 14.205 29.397 11.8118 28.7098ZM10.6524 29.8692C9.15118 29.3909 7.77001 28.8057 6.54226 28.1304C5.0222 27.2944 3.70955 26.3022 2.70138 25.1843C4.46683 31.2632 9.2584 36.0548 15.3373 37.8202C14.2194 36.812 13.2272 35.4994 12.3912 33.9793C11.7159 32.7516 11.1307 31.3704 10.6524 29.8692ZM19.7987 38.5034C17.5171 38.1823 15.3445 36.3489 13.658 33.2826C13.1688 32.3932 12.7274 31.4105 12.3427 30.3496C14.6359 30.9258 17.155 31.2656 19.7987 31.3181V38.5034ZM25.7059 37.8202C26.8238 36.812 27.816 35.4994 28.6521 33.9793C29.3273 32.7516 29.9125 31.3704 30.3908 29.8692C31.892 29.3909 33.2732 28.8057 34.501 28.1304C36.021 27.2944 37.3337 26.3022 38.3418 25.1843C36.5764 31.2632 31.7848 36.0548 25.7059 37.8202ZM28.7005 30.3496C28.3158 31.4105 27.8744 32.3932 27.3852 33.2826C25.6988 36.3489 23.5262 38.1823 21.2445 38.5034V31.3181C23.8882 31.2656 26.4073 30.9258 28.7005 30.3496ZM30.8712 28.1789C31.9321 27.7942 32.9148 27.3528 33.8042 26.8636C36.8705 25.1771 38.7039 23.0046 39.025 20.7229H31.8397C31.7872 23.3666 31.4474 25.8857 30.8712 28.1789ZM30.3937 20.7229C30.334 23.608 29.9186 26.3166 29.2314 28.7098C26.8382 29.397 24.1296 29.8124 21.2445 29.8721V26.7515C22.3204 23.9951 24.5161 21.7991 27.2724 20.7229H30.3937ZM31.8397 19.2771H39.025C38.7039 16.9954 36.8705 14.8228 33.8042 13.1364C32.9148 12.6472 31.9321 12.2058 30.8712 11.8211C31.4474 14.1143 31.7872 16.6334 31.8397 19.2771ZM29.2314 11.2902C29.9186 13.6834 30.334 16.392 30.3937 19.2771H27.2724C24.5161 18.2009 22.3204 16.0049 21.2445 13.2485V10.1279C24.1296 10.1876 26.8382 10.603 29.2314 11.2902ZM30.3908 10.1308C31.892 10.6091 33.2732 11.1943 34.501 11.8696C36.021 12.7056 37.3337 13.6978 38.3418 14.8157C36.5764 8.73679 31.7848 3.94523 25.7059 2.17977C26.8238 3.18795 27.816 4.50059 28.6521 6.02065C29.3273 7.2484 29.9125 8.62958 30.3908 10.1308ZM21.2445 1.49659C23.5262 1.81769 25.6988 3.65108 27.3852 6.7174C27.8744 7.60684 28.3158 8.58946 28.7005 9.65044C26.4073 9.07417 23.8882 8.73442 21.2445 8.68187V1.49659Z"
                        fill="black"></path>
                </svg>  --}}
                <span class="text-xl font-extrabold tracking-tight">Job<span class="text-indigo-500">hunt</span></span>
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
        $('#loading-spinner').css('display', '')

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
                console.log(res);

            },
            error: function(xhr, status, error) {
                var message = xhr.responseJSON.message;
                if (message) {
                    // Menggabungkan pesan-pesan kesalahan menjadi satu pesan
                    var errorMessage = Object.values(message).join('<br>');
                    $('#loading-spinner').css('display', 'none')

                    // Menampilkan pesan kesalahan dengan Swal
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage,
                    });
                }
            }

        });
    });
</script>
