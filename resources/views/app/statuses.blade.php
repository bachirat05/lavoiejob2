<x-system-layout>
    <div class="card">
        <div class="row card-header flex-column flex-md-row border-bottom mx-0 px-3">
            <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">
                <h5 class="card-title mb-0 text-md-start text-center pb-md-0 pb-6"></h5>
            </div>
            <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                <div class="dt-buttons btn-group flex-wrap mb-0">
                    <button class="btn create-new btn-primary me-1" type="button" data-bs-toggle="modal" data-bs-target="#addnewstatus">
                        <span>
                            <span class="d-flex align-items-center gap-2">
                                <i class="icon-base ti tabler-plus icon-sm"></i>
                                <span class="d-none d-sm-inline-block">Nouveau Statut</span>
                            </span>
                        </span>
                    </button>
                    <button class="btn create-new btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#bulknewstatus">
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
                        <th>Statut</th>
                        <th>Type</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if ($statuses && count($statuses)>0)
                            @foreach ($statuses as $status)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center lh-1 me-4 mb-4 mb-sm-0">
                                        <span class="badge badge-dot me-1" {!! 'style="background-color:'. $status->color .';"'!!}></span>
                                        <span class="text-truncate text-heading fw-medium">{{ $status->label }}</span>
                                    </div>
                                </td>
                                <td>
                                        <span class="text-truncate text-heading fw-medium">{{ ucfirst($status->type) }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="text-nowrap">
                                            <button class="btn btn-icon me-1 text-warning edit-button" data-modal="#addnewstatus"
                                            data-form="#newfoncform"
                                            data-title="Modifier le statut"
                                            data-message="Modifiez les informations du statut."
                                            data-method="POST"
                                            data-action="{{ route('statuses.update', ['id'=>$status->id]) }}"
                                            data-fields='{
                                                "label": "{{ $status->label }}",
                                                "type": "{{ $status->type }}",
                                                "color": "{{ $status->color }}"
                                            }'
                                            data-submit="Mettre à jour"
                                            data-reset-action="{{ route('statuses.new') }}"
                                            data-bs-toggle="modal" data-bs-target="#addnewstatus"><i class="icon-base ti tabler-edit icon-22px"></i></button>

                                            <button class="btn btn-icon text-danger delete-button" data-url="{{ route('statuses.destroy', ['id'=>$status->id]) }}"><i class="icon-base ti tabler-trash icon-22px"></i></button>
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
                                        Aucune statut trouvée.
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

    <div class="modal fade" id="addnewstatus" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                <h4 class="mb-2">Ajouter Nouveau</h4>
                <p>Une nouveau statut est le départ de tout succès.</p>
                </div>
                <form  id="newfoncform" action="{{ route('statuses.new') }}" class="row g-2 hundle-form" method="post">
                @csrf
                
                <div class="col-auto form-control-validation color-picker-group">
                                <label class="form-label" for="color">C.</label>
                                <div class="colorpicker"></div>
                                <input type="hidden" name="color" value="#0DAC03" />
                            </div>
                <div class="col-sm-6 form-control-validation">
                    <label class="form-label" for="basicFullname">Nom du statut</label>
                    <input
                        type="text"
                        id="basicFullname"
                        class="form-control dt-full-name"
                        required
                        name="label"
                        placeholder="Nom du statut"
                        aria-label="Nom du statut"
                        aria-describedby="basicFullname2" />
                </div>
                <div class="col-auto form-control-validation">
                    <label class="form-label" for="singletype">Type</label>
                    <select
                            id="singletype"
                            name="type"
                            class="select2 form-select"
                            data-allow-clear="true">
                            <option value="global">Global</option>
                            <option value="client">Client</option>
                            <option value="candidat">Candidat</option>
                          </select>
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
    <div class="modal fade" id="bulknewstatus" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body">
                <button
                type="button"
                class="btn-close btn-pinned"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
                <div class="text-center mb-6">
                <h3>Ajouter Plusieurs statuts</h3>
                <p class="text-body-secondary">Autorisations que vous pouvez utiliser et attribuer à vos utilisateurs..</p>
                </div>
                <form id="bulkfoncform" action="{{ route('statuses.bulk') }}" class="row g-2 form-repeater hundle-form" method="post">
                    @csrf
                <div class="col-12 form-control-validation mb-4">
                    <div data-repeater-list="statuses">
                        <div data-repeater-item>
                        <div class="row">
                            
                            <div class="col-sm-6 form-control-validation">
                                <label class="form-label" for="basicFullname">Nom du statut</label>
                                <input
                                    type="text"
                                    id="basicFullname"
                                    class="form-control dt-full-name"
                                    required
                                    name="label"
                                    placeholder="Nom du statut"
                                    aria-label="Nom du statut"
                                    aria-describedby="basicFullname2" />
                            </div>
                            <div class="col-auto form-control-validation">
                                <label class="form-label" for="singletype">Type</label>
                                <select
                                        id="singletype"
                                        name="type"
                                        class="select2 form-select"
                                        data-allow-clear="true">
                                        <option value="global">Global</option>
                                        <option value="client">Client</option>
                                        <option value="candidat">Candidat</option>
                                    </select>
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
                <div class="col-12 text-center demo-vertical-spacing">
                    <button type="submit" class="btn btn-primary me-sm-4 me-1">Créer les statuts</button>
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