<x-system-layout>
  <div class="row g-20">
    <div class="col-xl-12 col">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-7">
            <div class="card-body text-nowrap">
              <h5 class="card-title mb-0">Bienvenue {{ auth()->user()->name }} </h5>
              <p class="mb-8">Il vous est désormais possible d’éditer vos propres informations.</p>
            </div>
          </div>
          <div class="col-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="../../assets/img/illustrations/bulb-light.png" height="140" alt="view sales" />
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="row g-4">
    <div class="col-xl-12 col">
      <div class="card"> 
        <div class="container py-4 ">
            <form method="POST" action="{{ route('mettrejour_P.new') }}" id="profileForm" class="row g-3">
                @csrf

                <!-- Téléphone -->
                <div class="col-sm-10">
                    <label class="form-label" for="tel">Téléphone</label>
                    <div class="input-group">
                        <input type="text"
                              class="form-control "
                              id="tel"
                              name="tel"
                              value="{{ old('tel', $userInfo->tel) }}"
                              disabled>
                      <button type="button" class="btn btn-primary btn-edit" data-field="tel">Modifier</button>
                    </div>
                </div>

                <!-- GSM -->
                <div class="col-sm-10">
                    <label class="form-label" for="gsm">GSM</label>
                    <div class="input-group">
                        <input type="text"
                              class="form-control"
                              id="gsm"
                              name="gsm"
                              value="{{ old('gsm', $userInfo->gsm) }}"
                              disabled>
                        <button type="button" class="btn btn-primary btn-edit" data-field="gsm">Modifier</button>
                    </div>
                </div>
                   <!-- whatsapp -->
                <div class="col-sm-10">
                    <label class="form-label" for="whatsapp">whatsapp</label>
                    <div class="input-group">
                        <input type="text"
                              class="form-control"
                              id="whatsapp"
                              name="whatsapp"
                              value="{{ old('whatsapp', $userInfo->whatsapp) }}"
                              disabled>
                        <button type="button" class="btn btn-primary btn-edit" data-field="whatsapp">Modifier</button>
                    </div>
                </div>
                
                <!-- Adresse -->
                <div class="col-sm-10">
                    <label class="form-label" for="address">Adresse</label>
                    <div class="input-group">
                        <input type="text"
                              class="form-control"
                              id="address"
                              name="address"
                              value="{{ old('address', $userInfo->address) }}"
                              disabled>
                        <button type="button" class="btn btn-primary btn-edit" data-field="address">Modifier</button>
                    </div>
                </div>

                <!-- Ville -->
                <div class="col-sm-10">
                    <label class="form-label" for="city">Ville</label>
                    <div class="input-group">
                        <input type="text"
                              class="form-control"
                              id="city"
                              name="city"
                              value="{{ old('city', $userInfo->city) }}"
                              disabled>
                        <button type="button" class="btn btn-primary btn-edit" data-field="city">Modifier</button>
                    </div>
                </div>

                <!-- Logement -->
                <div class="col-sm-10">
                    <label class="form-label" for="logement">Logement</label>
                    <div class="input-group">
                        <input type="text"
                              class="form-control"
                              id="logement"
                              name="logement"
                              value="{{ old('logement', $userInfo->logement) }}"
                              disabled>
                        <button type="button" class="btn btn-primary btn-edit" data-field="logement">Modifier</button>
                    </div>
                </div>
             
                 <!-- marital -->
                <div class="col-sm-10">
                    <label class="form-label" for="marital">situation familiale</label>
                    <div class="input-group">
                        <input type="text"
                              class="form-control"
                              id="marital"
                              name="marital"
                              value="{{ old('marital', $userInfo->marital) }}"
                              disabled>
                        <button type="button" class="btn btn-primary btn-edit" data-field="marital">Modifier</button>
                    </div>
                </div>
                
                 <!-- kids -->
                <div class="col-sm-10">
                    <label class="form-label" for="kids">enfants</label>
                    <div class="input-group">
                        <input type="text"
                              class="form-control"
                              id="kids"
                              name="kids"
                              value="{{ old('kids', $userInfo->kids) }}"
                              disabled>
                        <button type="button" class="btn btn-primary btn-edit" data-field="kids">Modifier</button>
                    </div>
                </div>
                 <!-- religion -->
                <div class="col-sm-10">
                    <label class="form-label" for="religion">religion</label>
                    <div class="input-group">
                        <input type="text"
                              class="form-control"
                              id="religion"
                              name="religion"
                              value="{{ old('religion', $userInfo->religion) }}"
                              disabled>
                        <button type="button" class="btn btn-primary btn-edit" data-field="religion">Modifier</button>
                    </div>
                </div>

                @if(session('success'))
                    <div class="p-3 mb-4 bg-success text-white rounded shadow-sm" style="min-width: 300px;">
                        {{ session('success') }}
                    </div>
                @endif


                <!-- Bouton Enregistrer -->
                <div class="col-12 d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-success btn-submit">
                        <span class="align-middle me-sm-2">Enregistrer</span>
                        <i class="icon-base ti tabler-check icon-xs"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
 </div>
</div>
    <script>
        window.clientData = @json($userInfo);
    </script>

    @push('scripts')
        <script src="{{ asset('assets/js/mettrejour_P.js') }}"></script>
    @endpush

  
</x-system-layout>
