<x-app-layout>
<div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        @include('components.menu')
        <div class="layout-page">
            @include('components.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    {{ $slot }}
                </div>
                @include('components.app-footer')
                <div class="content-backdrop fade"></div>
            </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
      <div class="drag-target"></div>
    </div>
</x-app-layout>
