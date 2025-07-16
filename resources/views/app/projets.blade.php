<x-system-layout>
    <div class="card">
        <div class="row card-header flex-column flex-md-row border-bottom mx-0 px-3">
            <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">
                <h5 class="card-title mb-0 text-md-start text-center pb-md-0 pb-6"></h5>
            </div>
            <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                <div class="dt-buttons btn-group flex-wrap mb-0">
                    <button class="btn create-new btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addnewproject">
                        <span>
                            <span class="d-flex align-items-center gap-2">
                                <i class="icon-base ti tabler-plus icon-sm"></i>
                                <span class="d-none d-sm-inline-block">Nouveau projet</span>
                            </span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                        <th></th>
                        <th>Projet</th>
                        <th>Membres</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if ($projets && count($projets)>0)
                            @foreach ($projets as $projet)
                            <tr>
                                <td style="width: 90px;">
                                    <img src="{{ asset('storage/'.$projet->avatar_url) }}" alt="{{ $projet->name }}" width="70px">
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="text-truncate text-heading fw-medium">{{ $projet->name }}</span>
                                        <small class="text-truncate">{{ $projet->description }}</small>
                                    </div>
                                </td>
                                <td>
                                    @if ($projet->users && count($projet->users) > 0)
                                        <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                            @foreach ($projet->users as $user)
                                                @if ($user->hasrole(['membre', 'admin', 'superAdmin']))
                                                
                                                @php
                                                    $img = null;
                                                    $initials = '';  // Default initials
                                                    // Check if userInfo exists and if avatar_url is set
                                                    if ($user->userInfo && $user->userInfo->avatar_url != null) {
                                                        $img = $user->userInfo->avatar_url;
                                                    } else {
                                                        // Handle the case where there's no avatar
                                                        $stateNum = rand(0, 5); // Random number between 0 and 5 for random badge state
                                                        $states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                                                        $state = $states[$stateNum];

                                                        // Generate initials from the user's name
                                                        $initials = implode('', array_map(function($char) { return strtoupper($char); }, str_split($user->name, 1)));
                                                        $initials = strtoupper($initials[0] . $initials[strlen($initials) - 1]);
                                                    }
                                                @endphp
                                                <li
                                                    data-bs-toggle="tooltip"
                                                    data-popup="tooltip-custom"
                                                    data-bs-placement="top"
                                                    class="avatar avatar-md pull-up"
                                                    title="{{ $user->name }}">
                                                    @if ($img)
                                                        <!-- If user has an avatar, display it -->
                                                        <img src="{{ asset('storage/' . $img) }}" alt="Avatar" class="rounded-circle" />
                                                    @else
                                                        <!-- If no avatar, display a badge with initials -->
                                                        <span class="avatar-initial rounded-circle bg-label-{{ $state }}">{{ $initials }}</span>
                                                    @endif
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="fw-medium">Aucun membre</span>
                                    @endif

                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="text-nowrap">
                                            <button class="btn btn-icon me-1 text-warning edit-button" data-modal="#addnewproject"
                                            data-form="#newproform"
                                            data-title="Modifier le projet"
                                            data-message="Modifiez les informations du projet."
                                            data-method="POST"
                                            data-action="{{ route('projets.update', ['id'=>$projet->id]) }}"
                                            data-fields='{
                                                "name": "{{ $projet->name }}",
                                                "description": "{{ $projet->description }}",
                                                "integration": "{{ e($projet->users->pluck('email')->implode(',')) }}"
                                            }'
                                            data-avatar="{{ $projet->avatar_url != null ? asset('storage/'.$projet->avatar_url) : '' }}"
                                            data-submit="Mettre à jour"
                                            data-reset-action="{{ route('projets.new') }}"
                                            data-bs-toggle="modal" data-bs-target="#addnewproject"><i class="icon-base ti tabler-edit icon-22px"></i></button>

                                            <button class="btn btn-icon text-danger delete-button" data-url="{{ route('projets.destroy', ['id'=>$projet->id]) }}"><i class="icon-base ti tabler-trash icon-22px"></i></button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    <div class="divider divider-danger">
                                        <div class="divider-text">
                                        Aucun projet trouvé.
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal to add new record -->

    <div class="modal fade" id="addnewproject" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                <h4 class="mb-2">Ajouter Nouveau Projet</h4>
                <p>Un nouveau projet est le départ de tout succès.</p>
                </div>
                <form  id="newproform" action="{{ route('projets.new') }}" class="row g-6 hundle-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 form-control-validation">
                    <label class="form-label" for="avatarurlProjet">Logo du projet</label>
                    <div class="input-group input-group-merge">
                    <span id="logoProjet" class="input-group-text"
                        ><i class="icon-base ti tabler-photo-scan"></i
                    ></span>
                    <input
                        type="file"
                        id="avatarurlProjet"
                        class="form-control"
                        name="avatar_url"
                        aria-describedby="logoProjet" />
                    </div>
                </div>
                
                <div class="col-sm-12 form-control-validation">
                    <label class="form-label" for="basicFullname">Nom du projet</label>
                    <input
                        type="text"
                        id="basicFullname"
                        class="form-control dt-full-name"
                        name="name"
                        placeholder="Nom du projet"
                        aria-label="Nom du projet"
                        aria-describedby="basicFullname2" />
                </div>
                <div class="col-sm-12 form-control-validation">
                    <label class="form-label" for="integration">Ajouter des membres au projet</label>
                    <input
                            id="integration"
                            name="integration"
                            class="form-control"
                            value="admin@lavoiejob.ma" />
                </div>
                <div class="col-sm-12 form-control-validation">
                    <label class="form-label" for="description">Description du projet</label>
                    <textarea
                        id="description"
                        class="form-control autosize"
                        rows="3"
                        name="description"
                        placeholder="Description du projet"
                        aria-label="Mon projet"
                        aria-describedby="descriptionProjet" ></textarea>
                </div>
                
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary me-3">Enregistrer</button>
                    <button
                    type="reset"
                    class="btn btn-label-secondary btn-reset"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    Annuler
                    </button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-system-layout>