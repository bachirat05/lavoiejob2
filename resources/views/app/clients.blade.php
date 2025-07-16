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
                <th>Client</th>
                <th>Accès</th>
                <th>Statut</th>
                <th>Actions</th>
                </tr>
            </thead>
            </table>
        </div>
    </div>


    

    <div class="modal fade" id="addnewclient" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-pricing modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <!-- Pricing Plans -->
        <div class="rounded-top">
          <h4 class="text-center mb-2">Veuillez choisir le type du client à créer.</h4>
          <p class="text-center mb-4">Vous aurez les choix correspondants au niveau d'accès que vous avez.</p>
          <div class="row gy-6">
            <!-- Basic -->
            <div class="col-xl mb-md-0">
              <div class="card border rounded shadow-none">
                <div class="card-body pt-12 p-5">
                  <h4 class="card-title text-center text-capitalize mb-1">Particulier</h4>
                  <p class="text-center mb-5">Personne physique</p>
                  <a href="{{ route('clients.new_particulier') }}" class="btn btn-label-success d-grid w-100">Créer</a>
                </div>
              </div>
            </div>

            <!-- Enterprise -->
            <div class="col-xl">
              <div class="card border rounded shadow-none">
                <div class="card-body pt-12 p-5">
                  <h4 class="card-title text-center text-capitalize mb-1">Entreprise</h4>
                  <p class="text-center mb-5">Personne morale</p>
                  <a href="{{ route('clients.new_entreprise') }}" class="btn btn-label-primary d-grid w-100">Créer</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Pricing Plans -->
      </div>
    </div>
  </div>
</div>

    
    
</x-system-layout>