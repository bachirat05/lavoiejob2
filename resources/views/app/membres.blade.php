<x-system-layout>
    <div class="row g-6 mb-6">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <span class="text-heading">Session</span>
                    <div class="d-flex align-items-center my-1">
                    <h4 class="mb-0 me-2">21,459</h4>
                    <p class="text-success mb-0">(+29%)</p>
                    </div>
                    <small class="mb-0">Total Users</small>
                </div>
                <div class="avatar">
                    <span class="avatar-initial rounded bg-label-primary">
                    <i class="icon-base ti tabler-users icon-26px"></i>
                    </span>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <span class="text-heading">Paid Users</span>
                    <div class="d-flex align-items-center my-1">
                    <h4 class="mb-0 me-2">4,567</h4>
                    <p class="text-success mb-0">(+18%)</p>
                    </div>
                    <small class="mb-0">Last week analytics </small>
                </div>
                <div class="avatar">
                    <span class="avatar-initial rounded bg-label-danger">
                    <i class="icon-base ti tabler-user-plus icon-26px"></i>
                    </span>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <span class="text-heading">Active Users</span>
                    <div class="d-flex align-items-center my-1">
                    <h4 class="mb-0 me-2">19,860</h4>
                    <p class="text-danger mb-0">(-14%)</p>
                    </div>
                    <small class="mb-0">Last week analytics</small>
                </div>
                <div class="avatar">
                    <span class="avatar-initial rounded bg-label-success">
                    <i class="icon-base ti tabler-user-check icon-26px"></i>
                    </span>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <span class="text-heading">Pending Users</span>
                    <div class="d-flex align-items-center my-1">
                    <h4 class="mb-0 me-2">237</h4>
                    <p class="text-success mb-0">(+42%)</p>
                    </div>
                    <small class="mb-0">Last week analytics</small>
                </div>
                <div class="avatar">
                    <span class="avatar-initial rounded bg-label-warning">
                    <i class="icon-base ti tabler-user-search icon-26px"></i>
                    </span>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Filters</h5>
            <div class="d-flex justify-content-between align-items-center row pt-4 gap-4 gap-md-0">
            <div class="col-md-4 user_role"></div>
            <div class="col-md-4 user_plan"></div>
            <div class="col-md-4 user_status"></div>
            </div>
        </div>
        <div class="card-datatable">
            <table class="datatables-users table">
            <thead class="border-top">
                <tr>
                <th></th>
                <th></th>
                <th>Membre</th>
                <th>Rôle</th>
                <th>Accès</th>
                <th>Statut</th>
                <th>Actions</th>
                </tr>
            </thead>
            </table>
        </div>
        <!-- Offcanvas to add new user -->
        

        <div class="modal fade" id="addnewmembre" tabindex="-1" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-simple modal-upgrade-plan">
                  <div class="modal-content">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center">
                        <h4 class="mb-2">Ajouter un membre</h4>
                        <p class="mb-5">Un nouveau membre est le départ de toute performance.</p>
                      </div>
                      <div id="wizard-create-app" class="bs-stepper vertical mt-2 shadow-none">
                        <div class="bs-stepper-header border-0 p-1">
                          <div class="step" data-target="#details">
                            <button type="button" class="step-trigger">
                              <span class="bs-stepper-circle"
                                ><i class="icon-base ti tabler-file-text icon-md"></i
                              ></span>
                              <span class="bs-stepper-label">
                                <span class="bs-stepper-title text-uppercase">Détails</span>
                                <span class="bs-stepper-subtitle">Informations Personnelles</span>
                              </span>
                            </button>
                          </div>
                          <div class="line"></div>
                          <div class="step" data-target="#frameworks">
                            <button type="button" class="step-trigger">
                              <span class="bs-stepper-circle"><i class="icon-base ti tabler-box icon-md"></i></span>
                              <span class="bs-stepper-label">
                                <span class="bs-stepper-title text-uppercase">Rôle</span>
                                <span class="bs-stepper-subtitle">Sélection du rôle</span>
                              </span>
                            </button>
                          </div>
                          <div class="line"></div>
                          <div class="step" data-target="#database">
                            <button type="button" class="step-trigger">
                              <span class="bs-stepper-circle"
                                ><i class="icon-base ti tabler-database icon-md"></i
                              ></span>
                              <span class="bs-stepper-label">
                                <span class="bs-stepper-title text-uppercase">Projet</span>
                                <span class="bs-stepper-subtitle">Sélection du projet</span>
                              </span>
                            </button>
                          </div>
                          <div class="line"></div>
                          <div class="step" data-target="#submit">
                            <button type="button" class="step-trigger">
                              <span class="bs-stepper-circle"><i class="icon-base ti tabler-check icon-md"></i></span>
                              <span class="bs-stepper-label">
                                <span class="bs-stepper-title text-uppercase">Final</span>
                                <span class="bs-stepper-subtitle">Enregistrement du membre</span>
                              </span>
                            </button>
                          </div>
                        </div>
                        <div class="bs-stepper-content p-1">
                        <form  id="newmembreform" action="{{ route('membres.new') }}" class="hundle-form" method="post" enctype="multipart/form-data">
                        @csrf
                            <!-- Details -->
                            <div id="details" class="content pt-4 pt-lg-0">
                              <div class="mb-6">
                                    <label class="form-label" for="avatarurlProjet">Image du membre</label>
                                    <input
                                        type="file"
                                        id="avatarurlProjet"
                                        class="form-control"
                                        name="avatar_url"
                                        aria-describedby="logoProjet" />
                              </div>
                              <div class="mb-6">
                                <label for="exampleInputEmail1" class="form-label">Nom du membre</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="exampleInputEmail1"
                                  name="name"
                                  placeholder="Nom du membre" />
                              </div>
                              <div class="mb-6">
                                <label for="exampleInputEmail1" class="form-label">Email du membre</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="exampleInputEmail1"
                                  name="email"
                                  placeholder="Email du membre" />
                              </div>
                              <div class="mb-6">
                                <label for="exampleInputEmail1" class="form-label">GSM du membre</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="exampleInputEmail1"
                                  name="gsm"
                                  placeholder="GSM du membre" />
                              </div>
                              <div class="col-12 d-flex justify-content-between mt-6">
                                <a class="btn btn-label-secondary btn-prev text-black" disabled>
                                  <i class="icon-base ti tabler-arrow-left icon-xs me-sm-2 me-0"></i>
                                  <span class="align-middle d-sm-inline-block d-none">Retour</span>
                                </a>
                                <a class="btn btn-primary btn-next text-white">
                                  <span class="align-middle d-sm-inline-block d-none me-sm-2">Suivant</span>
                                  <i class="icon-base ti tabler-arrow-right icon-xs"></i>
                                </a>
                              </div>
                            </div>

                            <!-- Frameworks -->
                            <div id="frameworks" class="content pt-4 pt-lg-0">
                              <h5>Rôle</h5>
                              <ul class="p-0 m-0">
                                <li class="d-flex align-items-start mb-4">
                                  <div class="badge bg-label-info p-2 me-3 rounded">
                                    <i class="icon-base ti tabler-crown icon-30px"></i>
                                  </div>
                                  <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                    <div class="me-2">
                                      <h6 class="mb-1">Super Admin</h6>
                                      <small>Scales with any business</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                      <div class="form-check form-check-inline">
                                        <input name="role" class="form-check-input" type="radio" value="superAdmin" />
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="d-flex align-items-start mb-4">
                                  <div class="badge bg-label-danger p-2 me-3 rounded">
                                    <i class="icon-base ti tabler-device-desktop icon-30px"></i>
                                  </div>
                                  <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                    <div class="me-2">
                                      <h6 class="mb-1">Admin</h6>
                                      <small>Start learning today</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                      <div class="form-check form-check-inline">
                                        <input name="role" class="form-check-input" type="radio" value="admin" />
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="d-flex align-items-start">
                                  <div class="badge bg-label-success p-2 me-3 rounded">
                                    <i class="icon-base ti tabler-user icon-30px"></i>
                                  </div>
                                  <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                    <div class="me-2">
                                      <h6 class="mb-1">Membre</h6>
                                      <small>Grow Your Business With App</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                      <div class="form-check form-check-inline">
                                        <input
                                          name="role"
                                          class="form-check-input"
                                          type="radio"
                                          value="membre"
                                          checked />
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                
                              </ul>

                              <div class="col-12 d-flex justify-content-between mt-6">
                                <a class="btn btn-label-secondary btn-prev text-black">
                                  <i class="icon-base ti tabler-arrow-left icon-xs me-sm-2 me-0"></i>
                                  <span class="align-middle d-sm-inline-block d-none">Retour</span>
                                </a>
                                <a class="btn btn-primary btn-next text-white">
                                  <span class="align-middle d-sm-inline-block d-none me-sm-2">Suivant</span>
                                  <i class="icon-base ti tabler-arrow-right icon-xs"></i>
                                </a>
                              </div>
                            </div>

                            <!-- Database -->
                            <div id="database" class="content pt-4 pt-lg-0">
                              <h5>Intégration du membre</h5>
                              @if ($projets && count($projets)>0)
                                <ul class="p-0 m-0">
                                    @foreach ($projets as $projet)
                                    <li class="d-flex align-items-start mb-4">
                                        <div class="badge bg-label-danger p-2 me-3 rounded">
                                            <img src="{{ asset('storage/'.$projet->avatar_url) }}" width="40px" alt="">
                                        </div>
                                        <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                            <div class="me-2">
                                            <h6 class="mb-1">{{ $projet->name }}</h6>
                                            <small class="text-truncate">{{ $projet->description }}</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input name="projets[]" class="form-check-input" type="checkbox" value="{{ $projet->id }}" />
                                            </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                              @else
                                  <p>Créer un nouveau projet pour affecter vos membres</p>
                              @endif

                              <div class="col-12 d-flex justify-content-between mt-6">
                                <a class="btn btn-label-secondary btn-prev text-black">
                                  <i class="icon-base ti tabler-arrow-left icon-xs me-sm-2 me-0"></i>
                                  <span class="align-middle d-sm-inline-block d-none">Retour</span>
                                </a>
                                <a class="btn btn-primary btn-next text-white">
                                  <span class="align-middle d-sm-inline-block d-none me-sm-2">Suivant</span>
                                  <i class="icon-base ti tabler-arrow-right icon-xs"></i>
                                </a>
                              </div>
                            </div>

                            <!-- submit -->
                            <div id="submit" class="content text-center pt-4 pt-lg-0">
                              <h5 class="mb-1">Finalisation</h5>
                              <p class="small">Soumettez les données pour les enregistrer.</p>
                              <!-- image -->
                              <img
                                src="../../assets/img/illustrations/girl-with-laptop.png"
                                class="img-fluid"
                                alt="Create App img"
                                width="175" />
                              <div class="col-12 d-flex justify-content-between mt-6">
                                <a class="btn btn-label-secondary btn-prev text-black">
                                  <i class="icon-base ti tabler-arrow-left icon-xs me-sm-2 me-0"></i>
                                  <span class="align-middle d-sm-inline-block d-none">Retour</span>
                                </a>
                                <button class="btn btn-success btn-next btn-submit" type="submit">
                                  <span class="align-middle">Enregistrer</span>
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>
</x-system-layout>