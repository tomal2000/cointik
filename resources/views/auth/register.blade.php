<x-guest-layout>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">Cointik</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>

                                <form class="row g-3" novalidate id="registration" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                placeholder="Jhone">
                                            <label for="first_name">First Name</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                placeholder="Deo">
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="example@email.com">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelectGrid" name="phone_country_code">
                                                    <option selected value="">Open this select menu</option>
                                                    @foreach ($countries as $country)
                                                    <option value="{{ $country->international_phone }}">{{
                                                        $country->translations->where('locale','en')->first()->name.'-'.$country->international_phone }}
                                                    </option>
                                                    @endforeach

                                                    {{-- <option value="2">Two</option>
                                                    <option value="3">Three</option> --}}
                                                </select>
                                                <label for="floatingSelectGrid">Country Code</label>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    placeholder="01307366733">
                                                <label for="phone">Phone</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="floatingPassword"
                                                name="password" placeholder="Password">
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password_confirmation"
                                                placeholder="Confirm Password" name="password_confirmation">
                                            <label for="password_confirmation">Confirm Password</label>
                                        </div>
                                    </div>

                                    {{-- <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value=""
                                                id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">I agree and accept the <a
                                                    href="#">terms and conditions</a></label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a href="pages-login.html">Log
                                                in</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
    @section('scripts')
    <script>
        $("#registration").validate({
            //errorClass: "invalid-feedback",
            rules: {
                first_name: {
                    required: true,
                    rangelength: [2, 255]
                },
                last_name: {
                    required: true,
                    rangelength: [2, 255]
                },
                email: {
                    required: true,
                    email: true
                },
                phone_country_code: {
                    required: true
                },
                phone: {
                    required: true,
                    digits: true
                },
                password: {
                    required: true
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#floatingPassword"
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element.parent());
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            submitHandler: function(form) {
                //console.log('ok');
                $("button[type=submit]").prop("disabled", true);
                $(form).submit();
            }
        });
    </script>
    @endsection
</x-guest-layout>

{{-- <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
            autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
            autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
            required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
            href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ml-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form> --}}
