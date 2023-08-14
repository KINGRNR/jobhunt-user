<style>
    .form-step.hidden {
        display: none;
    }

    .form-step {
        display: block;
    }
</style>
<div id="form" class="fade-me-in">
    <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="order-1">

            <div class="grid grid-cols-1" id="content">

                {{-- back button --}}

                {{-- change whatever you want in here --}}
                @include('register_company.form1')
                @include('register_company.form2')
                @include('register_company.form3')

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/htmx.org@1.9.2"></script>
<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function() {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        this.classList.toggle("fa-eye-slash");
    });
    $(document).ready(function() {
        const formSteps = $(".form-step");
        const backButton = $(".back-button");
        const nextButton = $(".next-button"); // Replace with the actual id or class of the "Next" button
        let currentStep = 0;

        function showStep(stepIndex) {
            formSteps.addClass("hidden");
            formSteps.eq(stepIndex).removeClass("hidden");
        }
        showStep(currentStep);

        $(document).on("keydown", function(event) {
            if (event.key === "Enter" || event.key === "ArrowRight") {
                currentStep = (currentStep + 1) % formSteps.length;
                showStep(currentStep);
            }
        });

        backButton.on("click", function() {
            currentStep = (currentStep - 1 + formSteps.length) % formSteps.length;
            showStep(currentStep);
        });

        nextButton.on("click", function() {
            console.log("Next button clicked");
            currentStep = (currentStep + 1) % formSteps.length;
            showStep(currentStep);
        });

    });
</script>
