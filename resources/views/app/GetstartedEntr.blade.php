<x-app-layout>

  <div id="wizard-property-listing" class="bs-stepper vertical mt-2">
    <div class="bs-stepper-header border-end">
     
      <div class="line"></div>
      <div class="step" data-target="#property-details">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-circle"><i class="icon-base ti tabler-map-pin icon-md"></i></span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Contact et adresse</span>
            <span class="bs-stepper-subtitle">Contact de l'entreprise</span>
          </span>
        </button>
      </div>
      <div class="line"></div>
      <div class="step" data-target="#property-features">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-circle"><i class="icon-base ti tabler-building-cog icon-md"></i></span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Situation Professionnelle</span>
            <span class="bs-stepper-subtitle">Infos pro.</span>
          </span>
        </button>
      </div>
      <div class="line"></div>
     
    </div>
    <div class="bs-stepper-content">
      <form id="wizard-property-listing-form"  action="{{ route('GetstartedEntr.store') }}" class="hundle-form" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Personal Details -->
       

        <!-- Property Details -->
        <div id="property-details" class="content">
          <div class="row g-6">
            

            <div class="col-sm-12">
              <label class="form-label" for="website">Site web</label>
                <input
                  type="text"
                  id="website"
                  name="website"
                  class="form-control"
                  placeholder="https://www.lavoiejob.ma/" />
            </div>
            <div class="col-sm-4">
              <label class="form-label" for="tel">Téléphone</label>
                <input
                  type="text"
                  id="tel"
                  name="tel"
                  class="form-control"
                  placeholder="(+212) 5 55 55 11 11" />
            </div>
            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="gsm">GSM</label>
                <input
                  type="text"
                  id="gsm"
                  name="gsm"
                  class="form-control"
                  placeholder="(+212) 6 55 55 11 11" />
            </div>
            <div class="col-sm-4">
              <label class="form-label" for="whatsapp">WhatsApp</label>
                <input
                  type="text"
                  id="whatsapp"
                  name="whatsapp"
                  class="form-control"
                  placeholder="(+212) 6 55 55 11 11" />
            </div>

            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="ice">Numéro ICE</label>
              <input
                type="text"
                id="ice"
                name="ice"
                class="form-control"
                placeholder="999999999999999" />
            </div>
            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="rc">Numéro RC</label>
              <input
                type="text"
                id="rc"
                name="rc"
                class="form-control"
                placeholder="999999" />
            </div>
            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="patente">Numéro de patente</label>
              <input
                type="text"
                id="patente"
                name="patente"
                class="form-control"
                placeholder="999999" />
            </div>

            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="type_local">Type du local</label>
              <select
                id="type_local"
                name="type_local"
                class="select2 form-select"
                data-allow-clear="true">
                <option value="Cabinet médical">Cabinet médical</option>
                <option value="Clinique">Clinique</option>
                <option value="Centre de santé">Centre de santé</option>
                <option value="Hôpital">Hôpital</option>
                <option value="Pharmacie">Pharmacie</option>
                <option value="Laboratoire">Laboratoire</option>

                <!-- Commercial -->
                <option value="Boutique">Boutique</option>
                <option value="Showroom">Showroom</option>
                <option value="Centre commercial">Centre commercial</option>
                <option value="Agence">Agence</option>

                <!-- Industriel -->
                <option value="Usine">Usine</option>
                <option value="Atelier">Atelier</option>
                <option value="Entrepôt">Entrepôt</option>
                <option value="Plateforme logistique">Plateforme logistique</option>

                <!-- Hôtellerie -->
                <option value="Hôtel">Hôtel</option>
                <option value="Maison d’hôtes">Maison d’hôtes</option>
                <option value="Résidence hôtelière">Résidence hôtelière</option>

                <!-- Tourisme -->
                <option value="Agence de voyages">Agence de voyages</option>
                <option value="Site touristique">Site touristique</option>
                <option value="Village vacances">Village vacances</option>
              </select>  
            </div>
            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="country">Pays</label>
              <select id="country" name="country" class="select2 form-select" data-allow-clear="true">
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
            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="city">Ville</label>
              <select
                id="city"
                name="city"
                class="select2 form-select"
                data-allow-clear="true">
              </select>                        
            </div>
            
            <div class="col-lg-12 form-control-validation">
              <label class="form-label" for="address">Adresse (avec des indications)</label>
              <textarea
                id="address"
                name="address"
                class="form-control"
                rows="2"
                placeholder="Bureau 12, IMM 93, COMPLEXE NASIM (devant la pharmacie Nassim)"></textarea>
            </div>
            
            <div class="col-12 d-flex justify-content-between">
         <!--    <a class="btn btn-label-secondary btn-prev" disabled>
                <i class="icon-base ti tabler-arrow-left icon-xs me-sm-2 me-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Retour</span>
              </a> -->
              <a class="btn btn-primary btn-next">
                <span class="align-middle d-sm-inline-block d-none me-sm-2 text-white">Suivant</span>
                <i class="icon-base ti tabler-arrow-right icon-xs text-white"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Property Features -->
        <div id="property-features" class="content">
          <div class="row g-6">
            
            
            <div class="col-sm-3 form-control-validation">
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

            
            <div class="col-sm-3 form-control-validation">
              <label class="form-label" for="industry">Secteur / Industrie</label>
              <select
                id="industry"
                name="industry"
                class="select2 form-select"
                data-allow-clear="true">
                <option value="Santé">Santé</option>
                <option value="Commercial">Commercial</option>
                <option value="Industriel">Industriel</option>
                <option value="Hôtellerie">Hôtellerie</option>
                <option value="Tourisme">Tourisme</option>
              </select>  
            </div>
            <div class="col-sm-3 form-control-validation">
              <label class="form-label" for="activity">Activité</label>
              <select
                id="activity"
                name="activity"
                class="select2 form-select"
                data-allow-clear="true">
                <optgroup label="Santé">
                  <option value="Cabinet médical">Cabinet médical</option>
                  <option value="Clinique privée">Clinique privée</option>
                  <option value="Centre de santé">Centre de santé</option>
                  <option value="Hôpital">Hôpital</option>
                  <option value="Laboratoire d’analyses">Laboratoire d’analyses</option>
                  <option value="Pharmacie">Pharmacie</option>
                  <option value="Maison de retraite médicalisée">Maison de retraite médicalisée</option>
                  <option value="Centre de radiologie">Centre de radiologie</option>
                  <option value="Centre de kinésithérapie">Centre de kinésithérapie</option>
                </optgroup>

                <!-- Commercial -->
                <optgroup label="Commercial">
                  <option value="Commerce de détail">Commerce de détail</option>
                  <option value="Grande distribution">Grande distribution</option>
                  <option value="Vente en ligne">Vente en ligne</option>
                  <option value="Distribution B2B">Distribution B2B</option>
                  <option value="Agences commerciales">Agences commerciales</option>
                </optgroup>

                <!-- Industriel -->
                <optgroup label="Industriel">
                  <option value="Fabrication de produits alimentaires">Fabrication de produits alimentaires</option>
                  <option value="Production pharmaceutique">Production pharmaceutique</option>
                  <option value="Usinage / Mécanique">Usinage / Mécanique</option>
                  <option value="Production textile">Production textile</option>
                  <option value="Industrie chimique">Industrie chimique</option>
                  <option value="Logistique industrielle">Logistique industrielle</option>
                </optgroup>

                <!-- Hôtellerie -->
                <optgroup label="Hôtellerie">
                  <option value="Hôtel">Hôtel</option>
                  <option value="Maison d’hôtes">Maison d’hôtes</option>
                  <option value="Résidence de tourisme">Résidence de tourisme</option>
                  <option value="Auberge">Auberge</option>
                </optgroup>

                <!-- Tourisme -->
                <optgroup label="Tourisme">
                  <option value="Agence de voyages">Agence de voyages</option>
                  <option value="Tour-opérateur">Tour-opérateur</option>
                  <option value="Entreprise d’événementiel touristique">Entreprise d’événementiel touristique</option>
                  <option value="Activités de loisirs">Activités de loisirs (ex: parcs, guides)</option>
                  <option value="Transport touristique">Transport touristique</option>
                </optgroup>
              </select>  
            </div>
            <div class="col-sm-3 form-control-validation">
              <label class="form-label" for="founded_year">Date de création</label>
              <input
                type="text"
                id="founded_year"
                name="founded_year"
                class="form-control date-input" />
            </div>

            <div class="col-sm-12 form-control-validation">
              <label class="form-label" for="description">Description de l'entreprise</label>
              <textarea
                type="text"
                id="description"
                name="description"
                class="form-control"
                placeholder="Description de l'entreprise"></textarea>
            </div>


            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="representant">Nom du Représentant</label>
              <input
                type="text"
                id="representant"
                name="representant"
                class="form-control"
                placeholder="Ahmed" />
            </div>
            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="representant_phone">Numéro du Représentant</label>
              <input
                type="text"
                id="representant_phone"
                name="representant_phone"
                class="form-control"
                placeholder="(+212) 6 55 55 11 11" />
            </div>
            <div class="col-sm-4 form-control-validation">
              <label class="form-label" for="representant_email">Email du Représentant</label>
              <input
                type="email"
                id="representant_email"
                name="representant_email"
                class="form-control"
                placeholder="ahmad@exemple.com" />
            </div>

            <div class="col-sm-6 form-control-validation">
              <label class="form-label" for="source">Source de l'entreprise</label>
              <select
                id="source"
                name="source"
                class="select2 form-select"
                data-allow-clear="true">
                <option value="Client type particulier">Client type : particulier</option>
                <option value="Recommandation Profil">Recommandation par un Profil</option>
                <option value="Recommandation Client">Recommandation par un Client</option>
                <option value="Facebook">Facebook</option>
                <option value="Instagram">Instagram</option>
                <option value="Direct">Direct</option>
                <option value="BCN">BCN</option>
                <option value="BNI">BNI</option>
                <option value="CDD">CDD</option>
                <option value="Autre">Autre</option>
              </select>
            </div>
            <div class="col-sm-6 form-control-validation">
              <label class="form-label" for="source_complement">Complément de la source</label>
              <input
                type="text"
                id="source_complement"
                name="source_complement"
                class="form-control"
                placeholder="Recommandé par ..." />
            </div>
          
            <div class="col-12 d-flex justify-content-between">
            <a class="btn btn-label-secondary btn-prev" disabled>
                <i class="icon-base ti tabler-arrow-left icon-xs me-sm-2 me-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Retour</span>
              </a>
               <button class="btn btn-success btn-submit" type="submit">
                <span class="align-middle d-sm-inline-block d-none me-sm-2">Enregistrer</span
                ><i class="icon-base ti tabler-check icon-xs"></i>
              </button>
            </div>
          </div>
        </div>

    
      </form>
    </div>
  </div>

</x-app-layout>