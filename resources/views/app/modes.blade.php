<x-system-layout>
    <div class="card">
        <div class="row card-header flex-column flex-md-row border-bottom mx-0 px-3">
            <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">
                <h5 class="card-title mb-0 text-md-start text-center pb-md-0 pb-6"></h5>
            </div>
            <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                <div class="dt-buttons btn-group flex-wrap mb-0">
                    <button class="btn create-new btn-primary me-1" type="button" data-bs-toggle="modal" data-bs-target="#addnewmode">
                        <span>
                            <span class="d-flex align-items-center gap-2">
                                <i class="icon-base ti tabler-plus icon-sm"></i>
                                <span class="d-none d-sm-inline-block">Nouveau mode</span>
                            </span>
                        </span>
                    </button>
                    <button class="btn create-new btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#bulknewmode">
                        <span>
                            <span class="d-flex align-items-center gap-2">
                                <i class="icon-base ti tabler-stack-3 icon-sm"></i>
                                <span class="d-none d-sm-inline-block">Ajouter plusieurs</span>
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
                        <th>mode</th>
                        <th>Projet</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if ($modes && count($modes)>0)
                            @foreach ($modes as $mode)
                            <tr>
                                <td>
                                        <span class="text-truncate text-heading fw-medium">{{ $mode->name }}</span>
                                </td>
                                <td>
                                    @if ($mode->projets)
                                        @foreach ($mode->projets as $projet)
                                        <span class="badge bg-label-primary me-2">{{ $projet->name }}</span>
                                        @endforeach
                                    @else
                                    <span class="badge bg-label-secondary">Aucun projet</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="text-nowrap">
                                            <button class="btn btn-icon me-1 text-warning edit-button" data-modal="#addnewmode"
                                            data-form="#newfoncform"
                                            data-title="Modifier la mode"
                                            data-message="Modifiez les informations de la mode."
                                            data-method="POST"
                                            data-action="{{ route('modes.update', ['id'=>$mode->id]) }}"
                                            data-fields='{
                                                "name": "{{ $mode->name }}",
                                                "projet": "{{ e($mode->projets->pluck('name')->implode(',')) }}"
                                            }'
                                            data-submit="Mettre à jour"
                                            data-reset-action="{{ route('modes.new') }}"
                                            data-bs-toggle="modal" data-bs-target="#addnewmode"><i class="icon-base ti tabler-edit icon-22px"></i></button>

                                            <button class="btn btn-icon text-danger delete-button" data-url="{{ route('modes.destroy', ['id'=>$mode->id]) }}"><i class="icon-base ti tabler-trash icon-22px"></i></button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    <div class="divider divider-danger">
                                        <div class="divider-text fw-bold">
                                        Aucune mode trouvée.
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

    <div class="modal fade" id="addnewmode" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                <h4 class="mb-2">Ajouter Nouvelle mode</h4>
                <p>Une nouvelle mode est le départ de tout succès.</p>
                </div>
                <form  id="newfoncform" action="{{ route('modes.new') }}" class="row g-6 hundle-form" method="post">
                @csrf
                
                <div class="col-sm-12 form-control-validation">
                    <label class="form-label" for="basicFullname">Nom de la mode</label>
                    <input
                        type="text"
                        id="basicFullname"
                        class="form-control dt-full-name"
                        name="name"
                        placeholder="Nom de la mode"
                        aria-label="Nom de la mode"
                        aria-describedby="basicFullname2" />
                </div>
                
                <div class="col-sm-12 form-control-validation">
                    <label class="form-label" for="basicFullname">Nom du projet</label>
                    @if ($projets && count($projets)>0)
                    <select
                            id="selectpickerMultiple"
                            class="selectpicker w-100"
                            data-style="btn-default"
                            name="projet[]"
                            multiple
                            data-icon-base="icon-base ti"
                            data-tick-icon="tabler-check text-white">
                            
                            @foreach ($projets as $projet)
                            <option value="{{ $projet->id }}">{{ $projet->name }}</option>
                            @endforeach
                            
                    </select>
                    @else
                    <p>Aucun projet trouvé. Veuillez créer un projet pour lui affecter des modes ou faites le plus tard.</p>
                    @endif
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
    <div class="modal fade" id="bulknewmode" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple">
            <div class="modal-content">
            <div class="modal-body">
                <button
                type="button"
                class="btn-close btn-pinned"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
                <div class="text-center mb-6">
                <h3>Ajouter Plusieurs modes</h3>
                <p class="text-body-secondary">Autorisations que vous pouvez utiliser et attribuer à vos utilisateurs..</p>
                </div>
                <form id="bulkfoncform" action="{{ route('modes.bulk') }}" class="row g-6 form-repeater hundle-form" method="post">
                    @csrf
                <div class="col-12 form-control-validation mb-4">
                    <div data-repeater-list="modes">
                        <div data-repeater-item>
                        <div class="row">
                            <div class="col-10 mb-0">
                            <label class="form-label" for="form-repeater-1-1">Nom de la mode</label>
                            <input type="text" id="form-repeater-1-1" name="name" class="form-control" placeholder="Nom de la mode" />
                            </div>
                            <div class="col-2 d-flex align-items-center mb-0">
                            <button class="btn btn-label-danger btn-icon mt-xl-6" data-repeater-delete>
                                <i class="icon-base ti tabler-x"></i>
                            </button>
                            </div>
                        </div>
                        <hr />
                        </div>
                    </div>
                    <div class="mb-0">
                        <a class="btn btn-primary btn-icon text-white" data-repeater-create>
                        <i class="icon-base ti tabler-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 form-control-validation">
                    <label class="form-label" for="basicFullname">Nom du projet</label>
                    @if ($projets && count($projets)>0)
                    <select
                            id="selectpickerMultiple"
                            class="selectpicker w-100"
                            data-style="btn-default"
                            name="projet[]"
                            multiple
                            data-icon-base="icon-base ti"
                            data-tick-icon="tabler-check text-white">
                            
                            @foreach ($projets as $projet)
                            <option value="{{ $projet->id }}">{{ $projet->name }}</option>
                            @endforeach
                            
                    </select>
                    @else
                    <p>Aucun projet trouvé. Veuillez créer un projet pour lui affecter des modes ou faites le plus tard.</p>
                    @endif
                </div>
                <div class="col-12 text-center demo-vertical-spacing">
                    <button type="submit" class="btn btn-primary me-sm-4 me-1">Créer les modes</button>
                    <button
                    type="reset"
                    class="btn btn-label-secondary"
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