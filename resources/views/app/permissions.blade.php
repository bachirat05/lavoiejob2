<x-system-layout>

    <h4 class="mb-1">Rôles et permissions</h4>

    <p class="mb-6">
        Un rôle donne accès à des menus et fonctionnalités prédéfinis afin que, <br />
        selon le rôle attribué, un administrateur puisse avoir accès aux besoins de l'utilisateur.
    </p>
    <div class="row g-6">
        @if ($roles && count($roles)>0)
            @foreach ($roles as $role)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="fw-normal mb-0 text-body">Total {{ count($role->users) }} membre(s)</h6>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            @if (count($role->users)>0)
                                @foreach ($role->users as $user)
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
                                    title="{{ $user->name }}"
                                    class="avatar pull-up">
                                    @if ($img)
                                        <img src="{{ asset('storage/' . $img) }}" alt="Avatar" class="rounded-circle" />
                                    @else
                                        <span class="avatar-initial rounded-circle bg-label-{{ $state }}">{{ $initials }}</span>
                                    @endif
                                </li>
                                @endforeach
                            @endif
                        </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="role-heading">
                                <h5 class="mb-1">{{ ucfirst($role->name) }}</h5>
                                <a
                                href="javascript:;"
                                data-modal="#addRoleModal"
                                data-form="#addRoleForm"
                                data-title="Modifier le rôle"
                                data-message="Assurez-vous d'en être absolument certain avant de continuer."
                                data-method="POST"
                                data-action="{{ route('roles.update', ['id'=>$role->id]) }}"
                                data-fields='{
                                    "name": "{{ $role->name }}",
                                    "permission[]": @json($role->permissions->pluck('name')->toArray())
                                }'
                                data-submit="Mettre à jour"
                                data-reset-action="{{ route('roles.new') }}"
                                data-bs-toggle="modal"
                                data-bs-target="#addRoleModal"
                                class="role-edit-modal edit-button"
                                ><span>Modifier le Rôle</span></a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach        
        @endif
        
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
            <div class="row h-100">
                <div class="col-sm-5">
                <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-4">
                    <img
                    src="../../assets/img/illustrations/add-new-roles.png"
                    class="img-fluid"
                    alt="Image"
                    width="83" />
                </div>
                </div>
                <div class="col-sm-7">
                <div class="card-body text-sm-end text-center ps-sm-0">
                    <button
                    data-bs-target="#addRoleModal"
                    data-bs-toggle="modal"
                    class="btn btn-sm btn-primary mb-4 text-nowrap add-new-role">
                    Ajouter un rôle
                    </button>
                    <p class="mb-0">
                    Ajouter un nouveau rôle,  <br />
                    s'il n'existe pas.
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="row card-header flex-column flex-md-row border-bottom mx-0 px-3">
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">
                        <h5 class="card-title mb-0 text-md-start text-center pb-md-0 pb-6"></h5>
                    </div>
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                        <div class="dt-buttons btn-group flex-wrap mb-0">
                            <button class="btn create-new btn-primary me-1" type="button" data-bs-toggle="modal" data-bs-target="#addnewpermission">
                                <span>
                                    <span class="d-flex align-items-center gap-2">
                                        <i class="icon-base ti tabler-plus icon-sm"></i>
                                        <span class="d-none d-sm-inline-block">Ajouter Permission</span>
                                    </span>
                                </span>
                            </button>
                            <button class="btn create-new btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#bulknewpermission">
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
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                <th>Permission</th>
                                <th>Accès par rôle</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if ($permissions && count($permissions)>0)
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                                <span class="text-truncate text-heading fw-medium">{{ $permission->name }}</span>
                                        </td>
                                        <td>
                                            @if ($permission->roles)
                                            @foreach ($permission->roles as $role)
                                            <span class="badge badge-secondary me-1">{{ ucfirst($role->name) }}</span>
                                            @endforeach
                                            @endif
                                                
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-nowrap">
                                                    <button class="btn btn-icon me-1 text-warning edit-button" data-modal="#addnewpermission"
                                                    data-form="#newperform"
                                                    data-title="Modifier la permission"
                                                    data-message="En modifiant le nom de l'autorisation, vous risquez d'interrompre la fonctionnalité des autorisations système. Assurez-vous d'en être absolument certain avant de continuer."
                                                    data-method="POST"
                                                    data-action="{{ route('permissions.update', ['id'=>$permission->id]) }}"
                                                    data-fields='{
                                                        "name": "{{ $permission->name }}"
                                                    }'
                                                    data-submit="Mettre à jour"
                                                    data-reset-action="{{ route('permissions.new') }}"
                                                    data-bs-toggle="modal" data-bs-target="#addnewpermission"><i class="icon-base ti tabler-edit icon-22px"></i></button>

                                                    <button class="btn btn-icon text-danger delete-button"  data-url="{{ route('permissions.destroy', ['id'=>$permission->id]) }}"><i class="icon-base ti tabler-trash icon-22px"></i></button>
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
                                                Aucune permission trouvée.
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
        </div>
    </div>
    
    
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                <h4 class="role-title">Ajouter un rôle</h4>
                <p class="text-body-secondary">Ajouter un rôle avec ses permissions</p>
                </div>
                <!-- Add role form -->
                <form id="addRoleForm" class="row g-3 hundle-form" action="{{ route('roles.new') }}" method="post">
                    @csrf
                <div class="col-12 form-control-validation mb-3">
                    <label class="form-label" for="modalRoleName">Nom du Rôle</label>
                    <input
                    type="text"
                    id="modalRoleName"
                    name="name"
                    class="form-control"
                    placeholder="Nom du Rôle"
                    tabindex="-1" />
                </div>
                <div class="col-12">
                    <h5 class="mb-6">Permissions du rôle</h5>
                    <!-- Permission table -->
                    <div class="table-responsive">
                    <table class="table table-flush-spacing">
                        <tbody>
                        <tr>
                            <td class="text-nowrap fw-medium">
                            Accès SuperAdmin
                            <i
                                class="icon-base ti tabler-info-circle icon-xs"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Attention ceci permet un accès complet au système."></i>
                            </td>
                            <td>
                            <div class="d-flex justify-content-end">
                                <div class="form-check mb-0">
                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                <label class="form-check-label" for="selectAll"> Tout sélectionné</label>
                                </div>
                            </div>
                            </td>
                        </tr>
                        @if ($permissions && count($permissions) > 0)
                            @php
                                $groupedPermissions = [];

                                foreach ($permissions as $permission) {
                                    $parts = explode(' ', $permission->name);
                                    if (count($parts) === 2) {
                                        $action = strtolower($parts[0]);
                                        $entity = strtolower($parts[1]);

                                        $groupedPermissions[$entity][$action] = true;
                                    }
                                }
                            @endphp

                            @foreach ($groupedPermissions as $entity => $actions)
                                <tr>
                                    <td class="fw-medium text-heading">{{ ucfirst($entity) }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            @foreach (['consulter', 'ajouter', 'modifier', 'supprimer'] as $action)
                                                @if (isset($actions[$action]))
                                                <div class="form-check mb-0 ms-2 ms-lg-12">
                                                    <input class="form-check-input"
                                                        type="checkbox"
                                                        name="permission[]"
                                                        value="{{ ucfirst($action).' '.$entity }}"
                                                        id="{{ $action . $entity }}" />
                                                    <label class="form-check-label" for="{{ $action . $entity }}">
                                                        {{ ucfirst($action) }}
                                                    </label>
                                                </div>
                                                @endif
                                                
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    </div>
                    <!-- Permission table -->
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary me-sm-4 me-1">Enregistrer</button>
                    <button
                    type="reset"
                    class="btn btn-label-secondary"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    Annuler
                    </button>
                </div>
                </form>
                <!--/ Add role form -->
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addnewpermission" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple">
            <div class="modal-content">
            <div class="modal-body">
                <button
                type="button"
                class="btn-close btn-pinned"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
                <div class="text-center mb-6">
                <h3>Ajouter Nouvelle Permission</h3>
                <p class="text-body-secondary">Autorisations que vous pouvez utiliser et attribuer à vos utilisateurs..</p>
                </div>
                <form id="newperform" action="{{ route('permissions.new') }}" class="row g-6 hundle-form" method="post">
                    @csrf
                <div class="col-12 form-control-validation mb-4">
                    <label class="form-label" for="modalPermissionName">Nom de la Permission</label>
                    <input
                    type="text"
                    id="modalPermissionName"
                    name="name"
                    class="form-control"
                    placeholder="Nom de la Permission"
                    autofocus />
                </div>
                <div class="col-12 text-center demo-vertical-spacing">
                    <button type="submit" class="btn btn-primary me-sm-4 me-1">Créer la permission</button>
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
    <div class="modal fade" id="bulknewpermission" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple">
            <div class="modal-content">
            <div class="modal-body">
                <button
                type="button"
                class="btn-close btn-pinned"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
                <div class="text-center mb-6">
                <h3>Ajouter Plusieurs Permissions</h3>
                <p class="text-body-secondary">Autorisations que vous pouvez utiliser et attribuer à vos utilisateurs..</p>
                </div>
                <form id="bulkperform" action="{{ route('permissions.bulk') }}" class="row g-6 form-repeater hundle-form" method="post">
                    @csrf
                <div class="col-12 form-control-validation mb-4">
                <div data-repeater-list="permissions">
                          <div data-repeater-item>
                            <div class="row">
                              <div class="col-10 mb-0">
                                <label class="form-label" for="form-repeater-1-1">Nom de la Permission</label>
                                <input type="text" id="form-repeater-1-1" name="name" class="form-control" placeholder="Nom de la Permission" />
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
                    <button type="submit" class="btn btn-primary me-sm-4 me-1">Créer les permissions</button>
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