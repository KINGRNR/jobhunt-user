<div id="form" class="fade-me-in">
    <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="order-1">

            <div class="grid grid-cols-1">

                <div class="mx-8 my-4 lg:mx-14 lg:my-8">
                    <button type="button" onclick="window.location.href='/'"
                        class="text-white bg-figma-gray-200 hover:bg-gray-400 duration-100 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full px-3 py-3 text-center mr-2 mb-2"><svg
                            width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7H3.83L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9H16V7Z" fill="#323232" />
                        </svg></button>
                    Home
                </div>

                <div class="mx-8 lg:mx-28 py-6 flex justify-start">
                    <img src="svg/logoipsum-287.svg" class="w-48 h-16" alt="HTML tutorial">
                </div>

                <div class="mx-12 lg:mx-32 w-50vh h-auto lg:w-[80vh]">
                    <div class="flex justify-center">
                        <div class="grow grid grid-cols-1">
                            <p class="block pb-8 text-3xl font-semibold text-gray-900">Forgot Password</p>
                        </div>
                    </div>
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                    <form action="{{ route('forget.password.post') }}" method="POST">
                        @csrf
                        <div class="flex justify-center">
                            <div class="grow grid grid-cols-1">
                                <label for="email"
                                    class="block pb-2 text-sm font-medium text-gray-900 dark:text-white">Enter the email
                                    address associated with your account</label>
                                <input type="email" id="email_address" name="email"
                                    class="mb-4 block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter your E-mail" required>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                            </div>
                        </div>

                        <div class="grid grid-cols-3">
                            <button type="submit"
                                class="rounded text-white bg-figma-biru-primary hover:bg-blue-800 duration-100 focus:ring-4 focus:ring-blue-300 font-medium text-sm p-3 my-4">Send
                                Password Reset link</button>
                        </div>
                </div>
                </form>

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

{{-- <main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">

                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                        <form action="{{ route('forget.password.post') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail
                                    Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email"
                                        required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main> --}}
