<div class="container mx-auto border rounded-lg">
    <div class="flex justify-between">
        <p class="mx-5 my-5 font-semibold text-xl">Company Profile</p>
        {{-- <button
            class="rounded-lg text-white focus:ring-4 focus:outline-ring-4 focus:ring-blue-300 font-medium  text-sm  text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 border border-gray-400  px-8 mr-5 my-3"
            style="background-color: #1B61AD;" type="button">
            Edit
        </button> --}}
    </div>
    <div class="border"></div>
    <form action="javascript:save()" method="post" id="profile_comp" name="profile_comp" autocomplete="off"
        enctype="multipart/form-data">
        @csrf
        <div class="mt-10">
            <div class="ml-5 mb-2 grid grid-cols-6 gap-4">
                <p class="text-gray-500">Profil</p>
            </div>
            <div class="ml-5 mb-5">
                <section class="items-center">
                    <div class="max-w-sm overflow-hidden items-center">
                        <div class="px-4 py-6">
                            <div id="image-preview"
                                class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                <input id="upload" onchange="kucinggaming(this)"  type="file" class="hidden" accept="image/*" />
                                <label for="upload" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                                    <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be
                                        less than <b class="text-gray-600">2mb</b></p>
                                    <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b
                                            class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                    <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                </label>
                            </div>
                        </div>
                </section>
            </div>
            <p class="ml-5 my-5 font-semibold text-xl mt-10">Basic Information</p>
            <div class="ml-5  grid grid-cols-1 mt-10">
                <div class="mb-4 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Email</p>
                    <input type="text" id="email" name="email"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        disabled placeholder="Enter your Email" required="" fdprocessedid="i2692">
                </div>
                <div class="mb-4 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Password</p>
                    <input type="password" id="password" name="password"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your Password" required="" fdprocessedid="i2692">
                </div>
                <div class="mb-4 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Postition</p>
                    <input type="text" id="position" name="position"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your Position" required="" fdprocessedid="i2692">
                </div>
                <div class="mb-4 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Phone Number</p>
                    <input type="number" id="phone_num" name="phone_num"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your Number" required="" fdprocessedid="i2692">
                </div>
            </div>
            <p class="mx-5 my-5 font-semibold text-xl mt-10">Company Information</p>
            <div class="mx-5 grid grid-cols-1 mt-10" id="detailed_skill">
                <div class="mb-4 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Company Name</p>
                    <input type="text" id="comp_name" name="comp_name"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your Company Name" required="" fdprocessedid="i2692">
                </div>
                <div class="mb-4 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Website</p>
                    <input type="text" id="website" name="website"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your Website's URL" required="" fdprocessedid="i2692">
                </div>
                <div class="mb-4 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">LinkedIn</p>
                    <input type="text" id="linkedin" name="linkedin"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your LinkedIn's URL" required="" fdprocessedid="i2692">
                </div>
                <div class="mb-4 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Address</p>
                    <input type="text" id="address" name="address"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your Address" required="" fdprocessedid="i2692">
                </div>
                <div class="mb-4 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Since</p>
                    <input type="date" id="since" name="since"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your Address" required="" fdprocessedid="i2692">
                </div>
                <div class="mb-4 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Description</p>
                    <textarea name="" id="" cols="30" rows="10"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
            </div>
        </div>
</div>
</form>

<script>
    const uploadInput = document.getElementById('upload');
    const filenameLabel = document.getElementById('filename');
    const imagePreview = document.getElementById('image-preview');
  
    // Check if the event listener has been added before
    let isEventListenerAdded = false;
  
    uploadInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
  
      if (file) {
        filenameLabel.textContent = file.name;
  
        const reader = new FileReader();
        reader.onload = (e) => {
          imagePreview.innerHTML =
            `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto"  alt="Image preview" />`;
          imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');
  
          // Add event listener for image preview only once
          if (!isEventListenerAdded) {
            imagePreview.addEventListener('click', () => {
              uploadInput.click();
            });
  
            isEventListenerAdded = true;
          }
        };
        reader.readAsDataURL(file);
      } else {
        filenameLabel.textContent = '';
        imagePreview.innerHTML =
          `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
        imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');
  
        // Remove the event listener when there's no image
        imagePreview.removeEventListener('click', () => {
          uploadInput.click();
        });
  
        isEventListenerAdded = false;
      }
    });
  
    uploadInput.addEventListener('click', (event) => {
      event.stopPropagation();
    });

    kucinggaming = (data) => {
        console.log(data);
    }
  </script>