{{-- <main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
    
                        
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
@vite(['resources/css/app.css'])

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
                    <img src="svg/logoipsum-287.svg" class="w-48 h-16" alt="Logo Ipsum Logo">
                </div>

                <div class="mx-12 lg:mx-32 w-50vh h-auto lg:w-[80vh]">
                    <div class="flex justify-center">
                        <div class="grow grid grid-cols-1">
                            <p class="block pb-8 text-3xl font-semibold text-gray-900">Reset Password</p>
                        </div>
                    </div>
                    <form action="{{ route('reset.password.post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group row">
                            <label for="email_address" class="block pb-2 text-sm font-medium text-gray-900 dark:text-white">Your E-Mail
                                Address</label>
                            <div class="col-md-6">
                                <input type="text" id="email_address" class="mb-4 block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="block pb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="mb-4 block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500" name="password" required
                                    autofocus>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="block pb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password-confirm" class="mb-4 block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    name="password_confirmation" required autofocus>
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>

<script src="https://unpkg.com/htmx.org@1.9.2"></script>
