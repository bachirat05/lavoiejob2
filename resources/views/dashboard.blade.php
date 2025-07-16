<x-system-layout>
  <div class="row g-6">
    <div class="col-xl-12 col">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-7">
            <div class="card-body text-nowrap">
              <h5 class="card-title mb-0">Bienvenue parmis nous {{ auth()->user()->name }} </h5>
              <p class="mb-2">Best seller of the month</p>
              <h4 class="text-primary mb-1">$48.9k</h4>
              <a href="javascript:;" class="btn btn-primary">View Sales</a>
            </div>
          </div>
          <div class="col-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="../../assets/img/illustrations/card-advance-sale.png" height="140" alt="view sales" />
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="col-md-12">
      <div class="card h-100">
        <div class="card-header pb-0 d-flex justify-content-between">
          <div class="card-title mb-0">
            <h5 class="mb-1">Earning Reports</h5>
            <p class="card-subtitle">Weekly Earnings Overview</p>
          </div>
          <div class="dropdown">
            <button
              class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1"
              type="button"
              id="earningReportsId"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
              <a class="dropdown-item" href="javascript:void(0);">View More</a>
              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row align-items-center g-md-8">
            <div class="col-12 col-md-5 d-flex flex-column">
              <div class="d-flex gap-2 align-items-center mb-3 flex-wrap">
                <h2 class="mb-0">$468</h2>
                <div class="badge rounded bg-label-success">+4.2%</div>
              </div>
              <small class="text-body">You informed of this week compared to last week</small>
            </div>
            <div class="col-12 col-md-7 ps-xl-8">
              <div id="weeklyEarningReports"></div>
            </div>
          </div>
          <div class="border rounded p-5 mt-5">
            <div class="row gap-4 gap-sm-0">
              <div class="col-12 col-sm-4">
                <div class="d-flex gap-2 align-items-center">
                  <div class="badge rounded bg-label-primary p-1">
                    <i class="icon-base ti tabler-currency-dollar icon-18px"></i>
                  </div>
                  <h6 class="mb-0 fw-normal">Earnings</h6>
                </div>
                <h4 class="my-2">$545.69</h4>
                <div class="progress w-75" style="height: 4px">
                  <div
                    class="progress-bar"
                    role="progressbar"
                    style="width: 65%"
                    aria-valuenow="65"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="d-flex gap-2 align-items-center">
                  <div class="badge rounded bg-label-info p-1">
                    <i class="icon-base ti tabler-chart-pie-2 icon-18px"></i>
                  </div>
                  <h6 class="mb-0 fw-normal">Profit</h6>
                </div>
                <h4 class="my-2">$256.34</h4>
                <div class="progress w-75" style="height: 4px">
                  <div
                    class="progress-bar bg-info"
                    role="progressbar"
                    style="width: 50%"
                    aria-valuenow="50"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="d-flex gap-2 align-items-center">
                  <div class="badge rounded bg-label-danger p-1">
                    <i class="icon-base ti tabler-brand-paypal icon-18px"></i>
                  </div>
                  <h6 class="mb-0 fw-normal">Expense</h6>
                </div>
                <h4 class="my-2">$74.19</h4>
                <div class="progress w-75" style="height: 4px">
                  <div
                    class="progress-bar bg-danger"
                    role="progressbar"
                    style="width: 65%"
                    aria-valuenow="65"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</x-system-layout>