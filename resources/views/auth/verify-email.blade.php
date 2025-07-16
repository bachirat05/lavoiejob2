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
              src="{{ asset('assets/img/illustrations/auth-verify-email-illustration-light.png')}}"
              alt="auth-verify-email-cover"
              class="my-5 auth-illustration" />
            <img
              src="{{ asset('assets/img/illustrations/bg-shape-image-light.png')}}"
              alt="auth-verify-email-cover"
              class="platform-bg" />
          </div>
        </div>
        <!-- /Left Text -->

        <!--  Verify email -->
        <div class="d-flex col-12 col-xl-4 align-items-center authentication-bg p-6 p-sm-12">
          <div class="w-px-400 mx-auto mt-5">
            <h4 class="mb-1">Vérifiez votre email ✉️</h4>
            <p class="text-start mb-0">
            Lien d'activation de compte envoyé à votre adresse e-mail:
              <span class="fw-medium">hello@example.com</span>. Veuillez suivre le lien pour continuer.
            </p>
            <p class="text-center mb-0">
            Vous n'avez pas reçu l'e-mail ?
            </p>
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="btn btn-primary w-100 my-6" type="submit"> Renvoyer </button>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('logout') }}" method="post">
                            @csrf
                        <button class="btn btn-danger my-6" type="submit">
                          Se déconnecter
                          <i class="icon-base ti tabler-logout ms-2 icon-14px"></i>
                        </button>
                    </form>
                </div>
            </div>
            

          </div>
        </div>
        <!-- / Verify email -->
      </div>
    </div>
</x-app-layout>