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
              src="{{ asset('assets/img/illustrations/auth-register-illustration-light.png')}}"
              alt="auth-register-cover"
              class="my-5 auth-illustration" />
            <img
              src="{{ asset('assets/img/illustrations/bg-shape-image-light.png')}}"
              alt="auth-register-cover"
              class="platform-bg" />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Register -->
        <div class="d-flex col-12 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
          <div class="w-px-400 mx-auto mt-12 pt-5">
            <h4 class="mb-1">L'excellence vous attend 🚀</h4>
            <p class="mb-6">Rendez votre gestion du recrutement simple et accessible partout !</p>

            <form id="formAuthentication" class="mb-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md mb-md-0 mb-6">
                    <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="customRadioTemp1">
                        <input name="type" class="form-check-input" type="radio" value="candidat" id="customRadioTemp1" checked />
                        <span class="custom-option-header p-0">
                            <span class="h6 mb-0">Candidat</span>
                            <small class="text-body-secondary"></small>
                        </span>
                        </label>
                    </div>
                    </div>
                    <div class="col-md">
                    <div class="form-check custom-option custom-option-basic mb-6">
                        <label class="form-check-label custom-option-content" for="customRadioTemp2">
                        <input name="type" class="form-check-input" type="radio" value="client" id="customRadioTemp2" />
                        <span class="custom-option-header p-0">
                            <span class="h6 mb-0">Client</span>
                            <small class="text-body-secondary"></small>
                        </span>
                        </label>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-6 form-control-validation">
                            <label for="email" class="form-label">Votre adresse Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Entrez votre email" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-6 form-control-validation">
                            <label for="name" class="form-label">Votre nom complet</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-6 form-password-toggle form-control-validation">
                            <label class="form-label" for="password">Mot de passe</label>
                            <div class="input-group input-group-merge">
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                required
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-6 form-password-toggle form-control-validation">
                            <label class="form-label" for="password_confirmation">Confirmation du mot de passe</label>
                            <div class="input-group input-group-merge">
                            <input
                                type="password"
                                id="password_confirmation"
                                class="form-control"
                                required
                                name="password_confirmation"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password_confirmation" />
                            <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
              
              
              
              
              <div class="mb-6 mt-8">
                <div class="form-check mb-8 ms-2">
                  <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required/>
                  <label class="form-check-label" for="terms-conditions">
                  J'accepte 
                    <a href="javascript:void(0);">la politique de confidentialité et les conditions générales.</a>
                  </label>
                </div>
              </div>
              <button class="btn btn-primary d-grid w-100">S'inscrire</button>
            </form>

            <p class="text-center">
              <span>Vous avez déjà un compte ? </span>
              <a href="{{ route('login') }}">
                <span>Connectez-vous.</span>
              </a>
            </p>

          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
</x-app-layout>