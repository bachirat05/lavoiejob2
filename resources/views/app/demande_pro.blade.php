<x-app-layout>
  <div id="wizard-property-listing" class="bs-stepper vertical mt-2">
    <div class="bs-stepper-content">
      <form id="wizard-property-listing-form"  action="{{ route('demande_pro.store') }}" class="hundle-form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="line"></div>
        <div class="step" data-target="#property-details">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-circle"><i class="ti tabler-briefcase icon-md"></i></span>
            <span class="bs-stepper-label">
              <span class="bs-stepper-title">demande d'emploi PRO PRO </span>
            </span>
          </button>
        </div>
        <div id="property-details" class="content">
          <div class="row g-6">

            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="nom_demande">Profil rechercher</label>
              <input
                type="text"
                id="nom_demande"
                name="nom_demande"
                class="form-control"
                placeholder="Ex : Recherche de femme de ménage"
                required
              />
            </div>

            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="sexe_prefere">sexe du candidat</label>
              <select id="sexe_prefere" name="sexe_prefere" class="form-select" required>
                <option value="">Veuillez choisir une option</option>
                <option value="Femme">Femme</option>
                <option value="Homme">Homme</option>
                <option value="Peu importe">Peu importe</option>
              </select>
            </div>

            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="nationality">Nationalité du candidat</label>
              <select id="nationality" name="nationality" class="select2 form-select" data-allow-clear="true">
                <option value="">Veuillez choisir la nationalité</option>
                <option value="Afghanistan">Afghanistan </option>
                <option value="Afrique Centrale">Afrique Centrale</option>
                <option value="Afrique du sud">Afrique du Sud</option>
                <option value="Albanie">Albanie </option>
                <option value="Algerie">Algerie </option>
                <option value="Allemagne">Allemagne </option>
                <option value="Andorre">Andorre </option>
                <option value="Angola">Angola </option>
                <option value="Anguilla">Anguilla </option>
                <option value="Arabie Saoudite">Arabie Saoudite </option>
                <option value="Argentine">Argentine </option>
                <option value="Armenie">Armenie </option>
                <option value="Australie">Australie </option>
                <option value="Autriche">Autriche </option>
                <option value="Azerbaidjan">Azerbaidjan </option>

                <option value="Bahamas">Bahamas </option>
                <option value="Bangladesh">Bangladesh </option>
                <option value="Barbade">Barbade </option>
                <option value="Bahrein">Bahrein </option>
                <option value="Belgique">Belgique </option>
                <option value="Belize">Belize </option>
                <option value="Benin">Benin </option>
                <option value="Bermudes">Bermudes </option>
                <option value="Bielorussie">Bielorussie </option>
                <option value="Bolivie">Bolivie </option>
                <option value="Botswana">Botswana </option>
                <option value="Bhoutan">Bhoutan </option>
                <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                <option value="Bresil">Bresil </option>
                <option value="Brunei">Brunei </option>
                <option value="Bulgarie">Bulgarie </option>
                <option value="Burkina_Faso">Burkina_Faso </option>
                <option value="Burundi">Burundi </option>

                <option value="Caiman">Caiman </option>
                <option value="Cambodge">Cambodge </option>
                <option value="Cameroun">Cameroun </option>
                <option value="Canada">Canada </option>
                <option value="Canaries">Canaries </option>
                <option value="Cac_vert">Cac_Vert </option>
                <option value="Chili">Chili </option>
                <option value="Chine">Chine </option>
                <option value="Chypre">Chypre </option>
                <option value="Colombie">Colombie </option>
                <option value="Comores">Colombie </option>
                <option value="Congo">Congo </option>
                <option value="Congo_democratique">Congo_democratique </option>
                <option value="Cook">Cook </option>
                <option value="Coree_du_Nord">Coree_du_Nord </option>
                <option value="Coree_du_Sud">Coree_du_Sud </option>
                <option value="Costa_Rica">Costa_Rica </option>
                <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                <option value="Croatie">Croatie </option>
                <option value="Cuba">Cuba </option>

                <option value="Danemark">Danemark </option>
                <option value="Djibouti">Djibouti </option>
                <option value="Dominique">Dominique </option>

                <option value="Egypte">Egypte </option>
                <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                <option value="Equateur">Equateur </option>
                <option value="Erythree">Erythree </option>
                <option value="Espagne">Espagne </option>
                <option value="Estonie">Estonie </option>
                <option value="Etats_Unis">Etats_Unis </option>
                <option value="Ethiopie">Ethiopie </option>

                <option value="Falkland">Falkland </option>
                <option value="Feroe">Feroe </option>
                <option value="Fidji">Fidji </option>
                <option value="Finlande">Finlande </option>
                <option value="France">France </option>

                <option value="Gabon">Gabon </option>
                <option value="Gambie">Gambie </option>
                <option value="Georgie">Georgie </option>
                <option value="Ghana">Ghana </option>
                <option value="Gibraltar">Gibraltar </option>
                <option value="Grece">Grece </option>
                <option value="Grenade">Grenade </option>
                <option value="Groenland">Groenland </option>
                <option value="Guadeloupe">Guadeloupe </option>
                <option value="Guam">Guam </option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernesey">Guernesey </option>
                <option value="Guinee">Guinee </option>
                <option value="Guinee_Bissau">Guinee_Bissau </option>
                <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                <option value="Guyana">Guyana </option>
                <option value="Guyane_Francaise ">Guyane_Francaise </option>

                <option value="Haiti">Haiti </option>
                <option value="Hawaii">Hawaii </option>
                <option value="Honduras">Honduras </option>
                <option value="Hong_Kong">Hong_Kong </option>
                <option value="Hongrie">Hongrie </option>

                <option value="Inde">Inde </option>
                <option value="Indonesie">Indonesie </option>
                <option value="Iran">Iran </option>
                <option value="Iraq">Iraq </option>
                <option value="Irlande">Irlande </option>
                <option value="Islande">Islande </option>
                <option value="Israel">Israel </option>
                <option value="Italie">italie </option>

                <option value="Jamaique">Jamaique </option>
                <option value="Jan Mayen">Jan Mayen </option>
                <option value="Japon">Japon </option>
                <option value="Jersey">Jersey </option>
                <option value="Jordanie">Jordanie </option>

                <option value="Kazakhstan">Kazakhstan </option>
                <option value="Kenya">Kenya </option>
                <option value="Kirghizstan">Kirghizistan </option>
                <option value="Kiribati">Kiribati </option>
                <option value="Koweit">Koweit </option>

                <option value="Laos">Laos </option>
                <option value="Lesotho">Lesotho </option>
                <option value="Lettonie">Lettonie </option>
                <option value="Liban">Liban </option>
                <option value="Liberia">Liberia </option>
                <option value="Liechtenstein">Liechtenstein </option>
                <option value="Lituanie">Lituanie </option>
                <option value="Luxembourg">Luxembourg </option>
                <option value="Lybie">Lybie </option>

                <option value="Macao">Macao </option>
                <option value="Macedoine">Macedoine </option>
                <option value="Madagascar">Madagascar </option>
                <option value="Madère">Madère </option>
                <option value="Malaisie">Malaisie </option>
                <option value="Malawi">Malawi </option>
                <option value="Maldives">Maldives </option>
                <option value="Mali">Mali </option>
                <option value="Malte">Malte </option>
                <option value="Man">Man </option>
                <option value="Mariannes du Nord">Mariannes du Nord </option>
                <option value="Maroc"selected="selected">Maroc </option>
                <option value="Marshall">Marshall </option>
                <option value="Martinique">Martinique </option>
                <option value="Maurice">Maurice </option>
                <option value="Mauritanie">Mauritanie </option>
                <option value="Mayotte">Mayotte </option>
                <option value="Mexique">Mexique </option>
                <option value="Micronesie">Micronesie </option>
                <option value="Midway">Midway </option>
                <option value="Moldavie">Moldavie </option>
                <option value="Monaco">Monaco </option>
                <option value="Mongolie">Mongolie </option>
                <option value="Montserrat">Montserrat </option>
                <option value="Mozambique">Mozambique </option>

                <option value="Namibie">Namibie </option>
                <option value="Nauru">Nauru </option>
                <option value="Nepal">Nepal </option>
                <option value="Nicaragua">Nicaragua </option>
                <option value="Niger">Niger </option>
                <option value="Nigeria">Nigeria </option>
                <option value="Niue">Niue </option>
                <option value="Norfolk">Norfolk </option>
                <option value="Norvege">Norvege </option>
                <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                <option value="Oman">Oman </option>
                <option value="Ouganda">Ouganda </option>
                <option value="Ouzbekistan">Ouzbekistan </option>

                <option value="Pakistan">Pakistan </option>
                <option value="Palau">Palau </option>
                <option value="Palestine">Palestine </option>
                <option value="Panama">Panama </option>
                <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                <option value="Paraguay">Paraguay </option>
                <option value="Pays_Bas">Pays_Bas </option>
                <option value="Perou">Perou </option>
                <option value="Philippines">Philippines </option>
                <option value="Pologne">Pologne </option>
                <option value="Polynesie">Polynesie </option>
                <option value="Porto_Rico">Porto_Rico </option>
                <option value="Portugal">Portugal </option>

                <option value="Qatar">Qatar </option>

                <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                <option value="Republique_Tcheque">Republique_Tcheque </option>
                <option value="Reunion">Reunion </option>
                <option value="Roumanie">Roumanie </option>
                <option value="Royaume_Uni">Royaume_Uni </option>
                <option value="Russie">Russie </option>
                <option value="Rwanda">Rwanda </option>

                <option value="Sainte_Lucie">Sainte_Lucie </option>
                <option value="Saint_Marin">Saint_Marin </option>
                <option value="Salomon">Salomon </option>
                <option value="Salvador">Salvador </option>
                <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                <option value="Samoa_Americaine">Samoa_Americaine </option>
                <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                <option value="Senegal">Senegal </option>
                <option value="Seychelles">Seychelles </option>
                <option value="Sierra Leone">Sierra Leone </option>
                <option value="Singapour">Singapour </option>
                <option value="Slovaquie">Slovaquie </option>
                <option value="Slovenie">Slovenie</option>
                <option value="Somalie">Somalie </option>
                <option value="Soudan">Soudan </option>
                <option value="Sri_Lanka">Sri_Lanka </option>
                <option value="Suede">Suede </option>
                <option value="Suisse">Suisse </option>
                <option value="Surinam">Surinam </option>
                <option value="Swaziland">Swaziland </option>
                <option value="Syrie">Syrie </option>

                <option value="Tadjikistan">Tadjikistan </option>
                <option value="Taiwan">Taiwan </option>
                <option value="Tonga">Tonga </option>
                <option value="Tanzanie">Tanzanie </option>
                <option value="Tchad">Tchad </option>
                <option value="Thailande">Thailande </option>
                <option value="Tibet">Tibet </option>
                <option value="Timor_Oriental">Timor_Oriental </option>
                <option value="Togo">Togo </option>
                <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                <option value="Tristan da cunha">Tristan de cuncha </option>
                <option value="Tunisie">Tunisie </option>
                <option value="Turkmenistan">Turmenistan </option>
                <option value="Turquie">Turquie </option>

                <option value="Ukraine">Ukraine </option>
                <option value="Uruguay">Uruguay </option>

                <option value="Vanuatu">Vanuatu </option>
                <option value="Vatican">Vatican </option>
                <option value="Venezuela">Venezuela </option>
                <option value="Vierges_Americaines">Vierges_Americaines </option>
                <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                <option value="Vietnam">Vietnam </option>

                <option value="Wake">Wake </option>
                <option value="Wallis et Futuma">Wallis et Futuma </option>

                <option value="Yemen">Yemen </option>
                <option value="Yougoslavie">Yougoslavie </option>

                <option value="Zambie">Zambie </option>
                <option value="Zimbabwe">Zimbabwe </option>
              </select>
            </div>

            <div class="col-sm-4 mb-3">
              <label class="form-label" for="age_min">Âge minimum du candidat</label>
              <input
                type="number"
                id="age_min"
                name="age_min"
                class="form-control"
                min="18"
                max="60" 
                required
                 />
            </div>
            <div class="col-sm-4 mb-3">
              <label class="form-label" for="age_max">Âge maximum du candidat</label>
              <input
                type="number"
                id="age_max"
                name="age_max"
                class="form-control"
                min="18"
                max="60"
                required
                 />
            </div>

            <div class="col-sm-4 mb-3">
              <label class="form-label" for="prix_max">Prix maximum en Dh</label>
              <input
                type="number"
                id="prix_max"
                name="prix_max"
                class="form-control"
                min="300"
                required
                 />
            </div>

            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="marital">Situation familiale du candidat</label>
              <select
                id="marital"
                name="marital"
                class="select2 form-select"
                data-allow-clear="true">
                <option value="Célibataire">Célibataire</option>
                <option value="Marié(e)">Marié(e)</option>
                <option value="Divorcé(e)">Divorcé(e)</option>
                <option value="Veuf(ve)">Veuf(ve)</option>
              </select>
            </div>

            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="religion">Religion</label>
              <select
                id="religion"
                name="religion"
                class="select2 form-select"
                data-allow-clear="true">
                <option value="Islam" selected>Islam</option>
                <option value="Peu importe">Peu importe</option>
                <option value="Agnostic">Agnostic</option>
                <option value="Atheiste">Atheiste</option>
                <option value="Buddhisme">Buddhisme</option>
                <option value="Christianisme">Christianisme</option>
                <option value="Hinduisme">Hinduisme</option>
                <option value="Judaisme">Judaisme</option>
                <option value="Non religieux">Non religieux</option>
                <option value="Autre">Autre</option>
              </select>
            </div>

            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="language">Langues parlés</label>
              <select
                id="language"
                name="language"
                class="select2 form-select"
                data-allow-clear="true" multiple>
                <option value="Arabe" selected>Arabe</option>
                <option value="Français">Français</option>
                <option value="Anglais">Anglais</option>
                <option value="Espagnol">Espagnol</option>
                <option value="Hollondais">Hollondais</option>
                <option value="Chinois">Chinois</option>
                <option value="Russe">Russe</option>
              </select>
            </div>
            
            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="criteres">Function</label>
              <select
                id="criteres"
                name="criteres"
                class="select2 form-select"
                data-allow-clear="true">
                <option value="polyvalente">Polyvalente</option>
                <option value="auxiliaire_de_vie">Auxiliaire de vie</option>
                <option value="auxiliaire_de_vie">aide-soignante</option>
                <option value="infirmière-domicile">infirmière à domicile</option>
                <option value="menage/cuisine">Ménage et cuisine</option>
                <option value="menage-cuisine">Ménage  aide cuisine</option>
                <option value="menage">Ménage quotidien</option>
                <option value="cuisine_menage">Cuisine aide ménage</option>
                <option value="cuisine_speciale">Cuisine spéciale</option>
                <option value="cuisine_professionnelle">Cuisine professionnelle</option>
                <option value="nounou">nounou (0->3 ans)</option>
                <option value="gouvernante">gouvernante</option>
                <option value="noubonne">noubonne (nounou +aide menage) </option>
                <option value="agent-gardient">agent de gardiennage</option>
                <option value="garde-enfants">garde d’enfants occasionnelle</option>
                <option value="surveillance_enfants">Surveillance des enfants</option>
                <option value="chauffeur">Chauffeur</option>
                <option value="chauffeur-Polyvalent">Chauffeur Polyvalent</option>
                <option value="chauffeur_jardinier">Chauffeur et jardinier</option>
                <option value="jardinier">Jardinier</option>

              </select>
            </div>

            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="mode_emploi">mode d'emploi</label>
              <select id="mode_emploi" name="mode_emploi" class="form-select" required>
                <option value="">Veuillez choisir une option</option>
                <option value="couchant">couchant(e)</option>
                <option value="non_couchante">non couchant(e)</option>
              </select>
            </div>

            <div class="col-sm-4 form-control-validation ">
              <label class="form-label" for="studies_level">Niveau d'études</label>
              <select
                id="studies_level"
                name="studies_level"
                class="select2 form-select"
                data-allow-clear="true">
                <option value="Néant / Non fourni">Néant / Non fourni</option>
                <option value="Primaire">Primaire</option>
                <option value="Collège">Collège</option>
                <option value="Lycée">Lycée</option>
                <option value="Niveau BAC">Niveau BAC</option>
                <option value="BAC">BAC</option>
                <option value="BAC +2">BAC +2</option>
                <option value="BAC +3">BAC +3</option>
                <option value="BAC +4">BAC +4</option>
                <option value="BAC +5">BAC +5</option>
                <option value="BAC +6 / MBA">BAC +6 / MBA</option>
                <option value="Doctorat">Doctorat</option>
                <option value="peu-importe">peu importe</option>
              </select>
            </div>
            <div class="col-sm-4 form-control-validation ">
              <label class="form-label" for="studies_speciality">Spécialité d'études</label>
              <select
                id="studies_speciality"
                name="studies_speciality"
                class="select2 form-select"
                data-allow-clear="true">
                <option value="Agronomie">Agronomie</option>
                <option value="Architecture">Architecture</option>
                <option value="Art">Art</option>
                <option value="Biologie">Biologie</option>
                <option value="Chimie">Chimie</option>
                <option value="Communication">Communication</option>
                <option value="Design">Design</option>
                <option value="Droit">Droit</option>
                <option value="Éducation">Éducation</option>
                <option value="Finance">Finance</option>
                <option value="Géographie">Géographie</option>
                <option value="Gestion">Gestion</option>
                <option value="Histoire">Histoire</option>
                <option value="Ingénierie">Ingénierie</option>
                <option value="Informatique">Informatique</option>
                <option value="Langues">Langues</option>
                <option value="Littérature">Littérature</option>
                <option value="Logistique">Logistique</option>
                <option value="Marketing">Marketing</option>
                <option value="Mathématiques">Mathématiques</option>
                <option value="Médecine">Médecine</option>
                <option value="Musique">Musique</option>
                <option value="Néant" selected>Néant</option>
                <option value="Pharmacie">Pharmacie</option>
                <option value="Physique">Physique</option>
                <option value="Psychologie">Psychologie</option>
                <option value="Qualité">Qualité</option>
                <option value="Ressources Humaines">Ressources Humaines</option>
                <option value="Santé et Paramédical">Santé et Paramédical</option>
                <option value="Sciences Économiques">Sciences Économiques</option>
                <option value="Sciences Politiques">Sciences Politiques</option>
                <option value="Sociologie">Sociologie</option>
                <option value="Théâtre">Théâtre</option>
                <option value="Tourisme">Tourisme</option>
              </select>
            </div>
            <div class="col-sm-4 form-control-validation ">
              <label class="form-label d-block" for="experience_min">Années d'expérience minimales</label>
              <input type="number" id="experience_min" name="experience_min" min="0" class="form-control" placeholder="6" />
            </div>

            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="abonnement">jour du travail</label>
              <select id="abonnement" name="abonnement" class="form-select" required>
                <option value="">Veuillez choisir une option</option>
                <option value="mensuel permanent">mensuel permanent</option>
                <option value="1 fois par semaine">1 fois par semaine</option>
                <option value="2 fois par semaine">2 fois par semaine</option>
                <option value="3 fois par semaine">3 fois par semaine</option>
              </select>
            </div> 

            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="repos">repos</label>
              <select id="repos" name="repos" class="form-select" required>
                <option value="">Veuillez choisir une option</option>
                <option value="1_jour_semaine">1 jour par semaine</option>
                <option value="2_jour_par_15jrs">2 fois chaque 15jrs</option>
                <option value="mensuel">mensuel</option>
                <option value="autre">Autre</option>
              </select>
            </div>

            <div class="col-sm-8">
              <label class="form-label" for="description">message de description détaillée</label>
              <input
                type="text"
                id="description"
                name="description"
                class="form-control"
            
              />
            </div>

            <div class="col-12 d-flex justify-content-between">
            
            
              <button class="btn btn-success btn-submit" type="submit">
                <span class="align-middle d-sm-inline-block d-none me-sm-2">Enregistrer</span
                ><i class="icon-base ti tabler-check icon-xs"></i>
              </button>
            </div>

        
      </form>
    </div>
  </div>
    @push('scripts')
        <script src="{{ asset('assets/js/demande-pro.js') }}"></script>
    @endpush
</x-app-layout>