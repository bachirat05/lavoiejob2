<aside id="layout-menu" class="layout-menu menu-vertical menu">
  <div class="app-brand demo">
    <a href="{{ route('home') }}" class="app-brand-link">
        <img src="{{ asset('img/logo-h.png') }}" width="150px">
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
      <i class="icon-base ti tabler-x d-block d-xl-none"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}" class="menu-link">
      <i class="menu-icon icon-base ti tabler-smart-home"></i>
        <div data-i18n="Tableau de bord">Tableau de bord</div>
      </a>
    </li>
    <li class="menu-header small">
      <span class="menu-header-text" data-i18n="Paramètres du système">Paramètres du système</span>
    </li>
    <li class="menu-item {{ request()->routeIs('permissions.view') ? 'active' : '' }}">
      <a href="{{ route('permissions.view') }}" class="menu-link">
      <i class="menu-icon icon-base ti tabler-lock-check"></i>
        <div data-i18n="Rôles et permissions">Rôles et permissions</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('projets.view') ? 'active' : '' }}">
      <a href="{{ route('projets.view') }}" class="menu-link">
      <i class="menu-icon icon-base ti tabler-color-swatch"></i>
        <div data-i18n="Projets">Projets</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('fonctions.view') ? 'active' : '' }}">
      <a href="{{ route('fonctions.view') }}" class="menu-link">
      <i class="menu-icon icon-base ti tabler-checklist"></i>
        <div data-i18n="Fonctions">Fonctions</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('modes.view') ? 'active' : '' }}">
      <a href="{{ route('modes.view') }}" class="menu-link">
      <i class="menu-icon icon-base ti tabler-flag-check"></i>
        <div data-i18n="Modes d'emploi">Modes d'emploi</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('statuses.view') ? 'active' : '' }}">
      <a href="{{ route('statuses.view') }}" class="menu-link">
      <i class="menu-icon icon-base ti tabler-flag-check"></i>
        <div data-i18n="Statuts">Statuts</div>
      </a>
    </li>
    <li class="menu-header small">
      <span class="menu-header-text" data-i18n="Membres">Membres</span>
    </li>
    <li class="menu-item {{ request()->routeIs('membres.view') ? 'active' : '' }}">
      <a href="{{ route('membres.view') }}" class="menu-link">
      <i class="menu-icon icon-base ti tabler-users"></i>
        <div data-i18n="Membres">Membres</div>
      </a>
    </li>
    <li class="menu-header small">
      <span class="menu-header-text" data-i18n="Clients">Clients</span>
    </li>
    <li class="menu-item {{ request()->routeIs('clients.view') ? 'active' : '' }}">
      <a href="{{ route('clients.view') }}" class="menu-link">
      <i class="menu-icon icon-base ti tabler-users-group"></i>
        <div data-i18n="Clients">Clients</div>
      </a>
    </li>
    <li class="menu-header small">
      <span class="menu-header-text" data-i18n="Candidats">Candidats</span>
    </li>
    <li class="menu-item {{ request()->routeIs('candidats.view') ? 'active' : '' }}">
      <a href="{{ route('candidats.view') }}" class="menu-link">
      <i class="menu-icon icon-base ti tabler-friends"></i>
        <div data-i18n="Candidats">Candidats</div>
      </a>
    </li>

    
  </ul>
</aside>

<div class="menu-mobile-toggler d-xl-none rounded-1">
  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
    <i class="ti tabler-menu icon-base"></i>
    <i class="ti tabler-chevron-right icon-base"></i>
  </a>
</div>