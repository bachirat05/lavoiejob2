<x-system-layout>
    <div class="card">
        <div class="row card-header flex-column flex-md-row border-bottom mx-0 px-3">
            <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">
                <h5 class="card-title mb-0 text-md-start text-center pb-md-0 pb-6">Historique des demandes</h5>
            </div>
            <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                <div class="dt-buttons btn-group flex-wrap mb-0">
                    <button class="btn create-new btn-primary me-1" type="button" data-bs-toggle="modal" data-bs-target="#addnewdemande">
                        <span>
                            <span class="d-flex align-items-center gap-2">
                                <i class="icon-base ti tabler-plus icon-sm"></i>
                                <span class="d-none d-sm-inline-block">Nouvelle demande</span>
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
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($demandes && count($demandes) > 0)
                            @foreach ($demandes as $demande)
                                <tr>
                                    <td>{{ $demande->title }}</td>
                                    <td>{{ $demande->description }}</td>
                                    <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <!-- Ici tu peux mettre des boutons éditer / supprimer si besoin -->
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">Aucune demande trouvée.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal pour ajouter une nouvelle demande -->
    <div class="modal fade" id="addnewdemande" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                <h4 class="mb-2">Choisir un projet</h4>
                <p>choisir le projet que vous visez.</p>
                </div>
                <form  id="newfoncform" action="{{ route('demande.new') }}" class="row g-6 hundle-form" method="post">
                @csrf
                
                <div class="col-sm-12 form-control-validation">
                    <label class="form-label" for="basicFullname">Nom du projet</label>
                    @if ($projets && count($projets)>0)
                    <select
                            id="selectpickerMultiple"
                            class="selectpicker w-100"
                            data-style="btn-default"
                            name="projet[]"
                            data-icon-base="icon-base ti"
                            data-tick-icon="tabler-check text-white">
                            
                            @foreach ($projets as $projet)
                            <option value="{{ $projet->id }}">{{ $projet->name }}</option>
                            @endforeach
                            
                    </select>
                    @else
                    <p>Aucun projet trouvé. Veuillez créer un projet pour lui affecter des fonctions ou faites le plus tard.</p>
                    @endif
                </div>
                
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary me-3">Continuer</button>
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
