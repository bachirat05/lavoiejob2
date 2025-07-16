<x-profile-layout :user="$user">


    <?php
    
        function renderinfo($title, $var){

            $color = $var != null ? 'text-dark' : 'text-danger';
            $content = $var != null ? $var : 'Non fourni';

            return '<dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">'.$title.'</dt><dd class="col-sm-8 fw-bold '.$color.'">'.$content.'</dd>';
            
        }
    
    ?>


    <div class="card card-action mb-4">
        <div class="card-header align-items-center flex-wrap gap-2">
            <h5 class="card-action-title mb-0">Compte Client</h5>
        </div>
        <div class="card-body">
            <div class="row">
                    <div class="col-lg-6">
                        <dl class="row mb-0 gx-2">
                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Client</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->name }}</dd>
                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Créé le</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->created_at->format('d/m/Y à H:i') }}</dd>

                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Email</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->email }} <span class="small d-block fw-light {{ $user->email_verified_at != null ? 'text-success' : 'text-danger' }}">{{ $user->email_verified_at != null ? 'Validée le '.$user->email_verified_at->format('d/m/Y à H:i') : 'Non validé' }}</span></dd>

                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="row mb-0 gx-2">
                            <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Statut</dt>
                            <dd class="col-sm-8 fw-bold">
                                <div class="d-flex align-items-center lh-1 me-4 mb-4 mb-sm-0">
                                    <span class="badge badge-dot me-1" style="background-color:{{ $user->statuses[0]->color }}"></span> {{ $user->statuses[0]->label }}
                                </div>
                            </dd>
                            
                            <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Type</dt>
                            <dd class="col-sm-8 fw-bold">{{ ucfirst($user->getRoleNames()->first()) }}</dd>

                            <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Projet</dt>
                            <dd class="col-sm-8 fw-bold">
                                @if ($user->projets)
                                            @foreach ($user->projets as $projet)
                                            <div class="col-auto">
                                            <span class="badge bg-label-primary">{{ $projet->name }}</span>
                                            </div>
                                            @endforeach
                                        @else
                                        <span class="badge bg-label-secondary">Aucun projet</span>
                                        @endif
                            </dd>
                        </dl>
                    </div>
            </div>
        </div>
    </div>
    <div class="card card-action mb-4">
        <div class="card-header align-items-center flex-wrap gap-2">
            <h5 class="card-action-title mb-0">Contact et Adresse</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($user->getRoleNames()->first() != 'entreprise')
                    <div class="col-lg-6">
                        <dl class="row mb-0 gx-2">
                            {!! renderinfo("Tél", $user->userinfo->tel) !!}
                            {!! renderinfo("GSM", $user->userinfo->gsm) !!}
                            {!! renderinfo("WhatsApp", $user->userinfo->whatsapp) !!}
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="row mb-0 gx-2">
                            {!! renderinfo("Contact d'urgence", $user->userinfo->emergency_contact['emergency_contact_name']) !!}
                            {!! renderinfo("GSM du contact", $user->userinfo->emergency_contact['emergency_contact_phone']) !!}
                            {!! renderinfo("Lien avec le client", $user->userinfo->emergency_contact['emergency_contact_link']) !!}
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <hr class="my-2">
                        <dl class="row mb-0 gx-2">
                            {!! renderinfo("Logement", $user->userinfo->logement) !!}
                            {!! renderinfo("Adresse", $user->userinfo->address) !!}
                            {!! renderinfo("Ville", $user->userinfo->city) !!}
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <hr class="my-2">
                        <dl class="row mb-0 gx-2">
                            {!! renderinfo("N° CIN", $user->userinfo->cin) !!}
                            {!! renderinfo("Adresse CIN", $user->userinfo->cin_address) !!}
                            {!! renderinfo("Validité CIN", $user->userinfo->cin_validity) !!}
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <hr class="my-2">
                        <dl class="row mb-0 gx-2">
                            {!! renderinfo("Ville de naissance", $user->userinfo->birth_city) !!}
                            {!! renderinfo("Date de naissance", $user->userinfo->birth_date) !!}
                            {!! renderinfo("Nationalité", $user->userinfo->nationality) !!}
                        </dl>
                    </div>
                @else
                    <div class="col-lg-6">
                        <dl class="row mb-0 gx-2">
                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Tél</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->tel != null ? $user->entreprise->tel : 'Non fourni' }}</dd>

                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">GSM</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->gsm != null ? $user->entreprise->gsm : 'Non fourni' }}</dd>

                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">WhatsApp</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->whatsapp != null ? $user->entreprise->whatsapp : 'Non fourni' }}</dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="row mb-0 gx-2">
                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Représentant</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->representant != null ? $user->entreprise->representant : 'Non fourni' }}</dd>

                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">GSM</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->representant_phone != null ? $user->entreprise->representant_phone : 'Non fourni' }}</dd>

                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Email</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->representant_email != null ? $user->entreprise->representant_email : 'Non fourni' }}</dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="row mb-0 gx-2">
                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Tél</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->tel != null ? $user->entreprise->tel : 'Non fourni' }}</dd>

                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">GSM</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->gsm != null ? $user->entreprise->gsm : 'Non fourni' }}</dd>

                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">WhatsApp</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->whatsapp != null ? $user->entreprise->whatsapp : 'Non fourni' }}</dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="row mb-0 gx-2">
                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Représentant</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->representant != null ? $user->entreprise->representant : 'Non fourni' }}</dd>

                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">GSM</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->representant_phone != null ? $user->entreprise->representant_phone : 'Non fourni' }}</dd>

                        <dt class="col-sm-4 mb-sm-2 text-nowrap fw-medium text-heading">Email</dt>
                        <dd class="col-sm-8 fw-bold">{{ $user->entreprise->representant_email != null ? $user->entreprise->representant_email : 'Non fourni' }}</dd>
                        </dl>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="card card-action mb-4">
        <div class="card-header align-items-center flex-wrap gap-2">
            <h5 class="card-action-title mb-0">Adresse</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($user->getRoleNames()->first() != 'entreprise')
                    
                @else
                @endif
            </div>
        </div>
    </div>
    
</x-profile-layout>