@props(['user'])
<x-system-layout>
    <div class="row">
        <div class="col-12">
            <div class="card mb-6">
            <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-5">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    @php
                                $img = null;
                                $initials = '';
                                if ($user->userInfo && $user->userInfo->avatar_url != null) {
                                    $img = $user->userInfo->avatar_url;
                                }
                            @endphp
                            @if ($img)
                                <img src="{{ asset('storage/' . $img) }}" alt="{{ $user->name }}" class="d-block h-auto ms-0 ms-sm-6 rounded user-profile-img" />
                            @endif
                </div>
                <div class="flex-grow-1 mt-3 mt-lg-5">
                <div
                    class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                    <div class="user-profile-info">
                    <h4 class="mb-2 mt-lg-6">{{ $user->name }}</h4>
                    <ul
                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                        <li class="list-inline-item d-flex gap-2 align-items-center">
                        <i class="icon-base ti tabler-user icon-lg"></i
                        ><span class="fw-medium">{{ $user->statuses[0]->label }}</span>
                        </li>
                        <li class="list-inline-item d-flex gap-2 align-items-center">
                        <i class="icon-base ti tabler-map-pin icon-lg"></i
                        ><span class="fw-medium">{{ $user->userinfo->city }}, Maroc.</span>
                        </li>
                        <li class="list-inline-item d-flex gap-2 align-items-center">
                        <i class="icon-base ti tabler-calendar icon-lg"></i
                        ><span class="fw-medium">Ajouté le {{ $user->created_at->format('d/m/Y') }}</span>
                        </li>
                        <li class="list-inline-item d-flex gap-2 align-items-center">
                        <i class="icon-base ti tabler-user icon-lg"></i
                        ><span class="fw-medium">Gérer par <b>{{ $user->name }}</b></span>
                        </li>
                    </ul>
                    </div>
                    <!-- <a href="javascript:void(0)" class="btn btn-primary mb-1">
                    <i class="icon-base ti tabler-user-check icon-xs me-2"></i>Connected
                    </a> -->
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-md-row flex-wrap mb-6 row-gap-2">
                    <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.infos') ? 'active' : '' }}" href="{{ route('user.infos', $user->id) }}"
                        ><i class="icon-base ti tabler-user-check icon-sm me-1_5"></i>Compte et Infos</a
                    >
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.edit') ? 'active' : '' }}" href="{{ route('user.edit', $user->id) }}"
                        ><i class="icon-base ti tabler-user-check icon-sm me-1_5"></i>Modifier</a
                    >
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.history') ? 'active' : '' }}" href="{{ route('user.history', $user->id) }}"
                        ><i class="icon-base ti tabler-lock icon-sm me-1_5"></i>Historique</a
                    >
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="app-user-view-billing.html"
                        ><i class="icon-base ti tabler-bookmark icon-sm me-1_5"></i>Dossiers</a
                    >
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="app-user-view-notifications.html"
                        ><i class="icon-base ti tabler-bell icon-sm me-1_5"></i>Demandes</a
                    >
                    </li>
                    
                </ul>
            </div>
            
            <div>
                {{ $slot }}
            </div>
            
        </div>
    </div>
</x-system-layout>