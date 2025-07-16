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
              src="{{ asset('assets/img/illustrations/auth-login-illustration-light.png')}}"
              alt="auth-login-cover"
              class="my-5 auth-illustration" />
            <img
              src="{{ asset('assets/img/illustrations/bg-shape-image-light.png')}}"
              alt="auth-login-cover"
              class="platform-bg" />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
          <div class="w-px-400 mx-auto mt-12 pt-5">
            <h4 class="mb-1">Bienvenue sur La Voie Job! 👋</h4>
            <p class="mb-6">Veuillez vous identifier pour accéder à votre espace.</p>

            <form id="formAuthentication" class="mb-6" action="{{ route('login') }}" method="POST">
                @csrf
              <div class="mb-6 form-control-validation">
                <label for="email" class="form-label required">Adresse Email</label>
                <input
                  required
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Entrez votre adresse email"
                  autofocus />
              </div>
              <div class="mb-6 form-password-toggle form-control-validation">
                <label class="form-label required" for="password">Mot de passe</label>
                <div class="input-group input-group-merge">
                  <input
                    required
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
                </div>
              </div>
              <div class="my-8">
                <div class="d-flex justify-content-between">
                  <div class="form-check mb-0 ms-2">
                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                    <label class="form-check-label" for="remember-me"> Se souvenir de moi </label>
                  </div>
                  <a href="{{ route('password.request') }}">
                    <p class="mb-0">Mot de passe oublié ?</p>
                  </a>
                </div>
              </div>
              <button class="btn btn-primary d-grid w-100">Se connecter</button>
            </form>

            <p class="text-center">
              <span>Nouveau sur notre plateforme ?</span>
              <a href="{{ route('register') }}">
                <span>Créez un compte</span>
              </a>
            </p>

          </div>
        </div>
        <!-- /Login -->
      </div>
    </div>
</x-app-layout>