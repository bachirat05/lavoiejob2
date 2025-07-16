<x-app-layout>
<div class="authentication-wrapper authentication-cover">
      <!-- Logo -->
      <a href="{{ route('home') }}" class="app-brand auth-cover-brand">
        <img src="{{ asset('img/logo-h.png') }}" width="150px">
      </a>
      <!-- /Logo -->
      <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-xl-flex col-xl-8 p-0">
          <div class="auth-cover-bg d-flex justify-content-center align-items-center">
            <img
              src="{{ asset('assets/img/illustrations/auth-forgot-password-illustration-light.png')}}"
              alt="auth-forgot-password-cover"
              class="my-5 auth-illustration d-lg-block d-none" />
            <img
              src="{{ asset('assets/img/illustrations/bg-shape-image-light.png')}}"
              alt="auth-forgot-password-cover"
              class="platform-bg" />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Forgot Password -->
        <div class="d-flex col-12 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
          <div class="w-px-400 mx-auto mt-5">
            <h4 class="mb-1">Forgot Password? 🔒</h4>
            <p class="mb-6">Enter your email and we'll send you instructions to reset your password</p>
            <form id="formAuthentication" class="mb-6" action="{{ route('password.email') }}" method="POST">
                @csrf
              <div class="mb-6 form-control-validation">
                <label for="email" class="form-label">Adresse Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enterez votre email"
                  autofocus required />
              </div>
              <button class="btn btn-primary d-grid w-100">Envoyer le lien de réinitialisation</button>
            </form>
            <div class="text-center">
              <a href="{{ route('login') }}" class="d-flex justify-content-center">
                <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
                Retour pour se connecter
              </a>
            </div>
          </div>
        </div>
        <!-- /Forgot Password -->
      </div>
    </div>
</x-app-layout>