<x-profile-layout :user="$user">
    <div class="card mb-6">
        <h5 class="card-header">Activités du {{ ucfirst($user->getRoleNames()->first()) }}</h5>
        <div class="card-body pt-1">
            <ul class="timeline mb-0">
                <li class="timeline-item timeline-item-transparent">
                    <span class="timeline-point timeline-point-primary"></span>
                    <div class="timeline-event">
                    <div class="timeline-header mb-3">
                        <h6 class="mb-0">12 Invoices have been paid</h6>
                        <small class="text-body-secondary">12 min ago</small>
                    </div>
                    <p class="mb-2">Invoices have been paid to the company</p>
                    <div class="d-flex align-items-center mb-2">
                        <div class="badge bg-lighter rounded d-flex align-items-center">
                        <img src="../../assets//img/icons/misc/pdf.png" alt="img" width="15" class="me-2" />
                        <span class="h6 mb-0 text-body">invoices.pdf</span>
                        </div>
                    </div>
                    </div>
                </li>
                <li class="timeline-item timeline-item-transparent">
                    <span class="timeline-point timeline-point-success"></span>
                    <div class="timeline-event">
                    <div class="timeline-header mb-3">
                        <h6 class="mb-0">Client Meeting</h6>
                        <small class="text-body-secondary">45 min ago</small>
                    </div>
                    <p class="mb-2">Project meeting with john @10:15am</p>
                    <div class="d-flex justify-content-between flex-wrap gap-2 mb-2">
                        <div class="d-flex flex-wrap align-items-center mb-50">
                        <div class="avatar avatar-sm me-2">
                            <img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                            <p class="mb-0 small fw-medium">Lester McCarthy (Client)</p>
                            <small>CEO of Pixinvent</small>
                        </div>
                        </div>
                    </div>
                    </div>
                </li>
                <li class="timeline-item timeline-item-transparent">
                    <span class="timeline-point timeline-point-info"></span>
                    <div class="timeline-event">
                    <div class="timeline-header mb-3">
                        <h6 class="mb-0">Create a new project for client</h6>
                        <small class="text-body-secondary">2 Day Ago</small>
                    </div>
                    <p class="mb-2">6 team members in a project</p>
                    <ul class="list-group list-group-flush">
                        <li
                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                        <div class="d-flex flex-wrap align-items-center">
                            <ul class="list-unstyled users-list d-flex align-items-center avatar-group m-0 me-2">
                            <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                title="Vinnie Mostowy"
                                class="avatar pull-up">
                                <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                            </li>
                            <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                title="Allen Rieske"
                                class="avatar pull-up">
                                <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar" />
                            </li>
                            <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                title="Julee Rossignol"
                                class="avatar pull-up">
                                <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar" />
                            </li>
                            <li class="avatar">
                                <span
                                class="avatar-initial rounded-circle pull-up"
                                data-bs-toggle="tooltip"
                                data-bs-placement="bottom"
                                title="3 more"
                                >+3</span
                                >
                            </li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</x-profile-layout>