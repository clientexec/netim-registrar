<?php

	$netim_infos="Informations Additionnelles";
	$netim_rules="Règles";
	$netim_caution="Attention";
	$netim_agreement="Accord";
	$netim_agreement_rules="Je confirme répondre aux critères d'éligibilité";
	$netim_agreement_rules2="Je suis d'accord avec cette règle";
	$netim_agreement_rules3="Je comprend.";
	$netim_agreement_trustee="Je suis d'accord avec cette règle; et je confirme mon souhait d'enregistrer ce nom de domaine en utilisant le service de Prête Nom.";
	$netim_freetrustee="Pour certaines raisons, cette extension n'est disponible qu'avec l'utilisation de notre service de Prête Nom qui est inclu dans le prix. Notre contact local sera défini comme propriétaire en votre nom afin de remplir les conditions d'enregistrement.";
	
	$netim_mandatory_ind="Obligatoire pour les individus";
	$netim_mandatory_org="Obligatoire pour les entités légales";
	$netim_date_format="Format attendu: DD-MM-YYYY";
	//---
	
	$netim_aero_rules="Les noms de domaine en .AERO sont réservés aux individus, organisations, associations et agences en lien avec les activités aéronautiques et aérospaciales.<a href='https://www.information.aero/registration/eligibility' target='blank'>Plus d'informations sur les critères d'éligibilité</a>.";
	$netim_aero_id="Identifiant .AERO";
	$netim_aero_id_description="Si vous n'avez pas encore d'identifiant, <a href='https://www.information.aero/node/add/request-aero-id' target='blank'>vous pouvez le solliciter ici</a>. Merci de noter que l'enregistrement sera reporté jusqu'à ce que votre application soit approuvée par le registre";
	$netim_aero_password="Mot de passe de l'identifiant .AERO";
	$netim_aero_infos=$netim_aero_id_description;
		//-
		
	$netim_al_registrant_type="Type de Propriétaire";
	$netim_al_registrant_org_al="Entité légale en Albanie";
	$netim_al_registrant_org_eu="Entité légale en Union Européenne";
	$netim_al_registrant_org_other="Entité légale (autre pays)";
	$netim_al_registrant_ind="Individu (quelque soit le pays)";
	$netim_al_infos="Les noms de domaine en .AL nécessitent des informations différentes en fonction de la forme légale du propriétaire: 
		<ul>
			<li><strong>$netim_al_registrant_ind</strong>: Fournissez le numéro de la carte d'identité ou du passeport</li>
            <li><strong>$netim_al_registrant_org_al</strong>: Fournissez le numéro de TVA et le numéro de la carte d'identité ou du passeport du représentant légal</li>
            <li><strong>$netim_al_registrant_org_eu</strong>: Fournissez le numéro d'enregistrement et le numéro de TVA Européen</li>
            <li><strong>$netim_al_registrant_org_other</strong>: Fournissez le numéro d'enregistrement et le numéro de la carte d'identité ou du passeport du représentant légal</li>
        </ul>";
	$netim_al_companynumber= "Numéro d'enregistrement de l'entité légale";
	$netim_al_companynumber_description= "$netim_mandatory_org hors d'Albanie";
	$netim_al_vatnumber= "Numéro de TVA de l'entité légale";
	$netim_al_vatnumber_description= "$netim_mandatory_org en Albanie ou en Union Européenne";
	$netim_al_idcardnumber= "Numéro de la carte personnelle d'identité";
	$netim_al_passportnumber= "Numéro personnel du passeport";
	$netim_al_id_description= "Dans tous les cas, fournissez soit le numéro de carte d'identité soit le numéro du passeport du représentant légal";
	$netim_al_rules_2LVL= "Les noms de domaine de troisième niveau en .AL sont restreints aux entités légales enregistrées en Albanie";
	$netim_al_infos_2LVL= "Fournissez le numéro d'enregistrement de l'entité et le numéro de la carte d'identité ou du passeport du représentant légal";
	//---

	$netim_au_rules="Le nom de domaine enregistré doit être en lien avec le propriétaire (ou ses activités) qui peut démontrer un lien substantiel avec l'Australie.";
	$netim_au_org_rules= "Cette extension est restreine aux associations / clubs / organisations à but non lucratif australiens";
	$netim_au_id_rules= "Cette extension est restreinte aux individus résidant en Australie";
	$netim_au_infos= "Fournissez le numéro d'identification (ACN / ABN / Numéro de la Marque) selon l'éligibilité du propriétaire";
	$netim_au_org_infos= "Fournissez le numéro d'identification selon l'égibilité du propriétaire";
	$netim_au_id_type= "Type de numéro d'identité du propriétaire";
	$netim_au_id_type_dropdown_acn= "Numéro d'entreprise australienne - ACN";	
	$netim_au_id_type_dropdown_abn= "Numéro d'affaire australien - ABN";
	$netim_au_id_type_dropdown_tm= "Numéro de marque";
	$netim_au_id= "Numéro d'identité du propriétaire";
	$netim_au_id_desc= "ACN / ABN / Numéro de la Marque";
	$netim_au_org_id_desc= "Numéro d'enregistrement de l'entité légale";
	$netim_au_el_type= "Type d'éligibilité";
	$netim_au_el_type_dropdown_ass= "Association incorporée australienne";
	$netim_au_el_type_dropdown_club= "Club australien";
	$netim_au_el_type_dropdown_nprofit= "Organisation à but non lucratif australienne";
	$netim_au_el_type_dropdown_co= "Entreprise australienne";
	$netim_au_el_type_dropdown_rb= "Affaire australienne enregistrée";
	$netim_au_el_type_dropdown_st= "Entreprise individuelle australienne";
	$netim_au_el_type_dropdown_tm= "Propriétaire d'une marque valide en australie";
	//-
	
	$netim_ax_registrant_type="Type de propriétaire";
	$netim_ax_registrant_org="Entité légale (quelque soit le pays)";
	$netim_ax_registrant_ind="Individu (quelque soit le pays)";
	$_netim_ax_info="Les noms de domaine en .AX nécessitent des informations différentes en fonction de la forme légale du propriétaire):
		<ul>
            <li><strong>$netim_ax_registrant_org</strong>: Fournissez le numéro d'enregistrement</li>
            <li><strong>$netim_ax_registrant_ind</strong>: Fournissez le numéro de la carte d'identité ou du passeport</li>
        </ul>";
	$netim_ax_companynumber= "Numéro d'enregistrement de l'entité légale";
	$netim_ax_companynumber_desc= $netim_mandatory_org;
	$netim_ax_idnumber= "Numéro d'identité";
	$netim_ax_idnumber_desc= "$netim_mandatory_ind : Numéro de la carte d'identité ou du passeport";
	//---
	
	$netim_ba_rules="Les noms de domaine en .BA sont restreints aux propriétaires ayant une adresse en Bosnie-Herzégovine. Le contact administratif doit également disposer d'une adresse locale.";
	//---
	
	$netim_barcelona_use= "Intention d'utilisation du nom de domaine";
	//---
	
	$netim_bg_rules= "Les noms de domaine en .BG sont restreints aux entités légales enregistrées dans l'Union Européenne.";
	$netim_bg_infos= "Afin de procéder à l'enregistrement d'un nom de domaine, un formulaire d'application doit être signé par le représentant légal et renvoyé avec le certificat d'incorporation.";
	$netim_bg_companyname= "Nom de l'entité légale";
	$netim_bg_vatnumber= "Numéro de TVA intracommunautaire";
	$netim_bg_firstname= "Prénom du représentant légal";
	$netim_bg_lastname= "Nom du représentant légal";
	//--
	
	$netim_br_registrant_type="Type de propriétaire";
	$netim_br_registrant_org="Entité légale enregistrée au Brésil";
	$netim_br_registrant_ind="Citoyen brésilien résidant au Brésil";
	$netim_br_info="Les noms de domaine du Brésil nécessitent des informations différentes selon le type d'éligibilité du propriétaire: 
		<ul>
            <li><strong>$netim_br_registrant_org</strong>: fournissez le numéro CPNJ</li>
            <li><strong>$netim_br_registrant_ind</strong>: fournissez le numéro CPF</li>
        </ul>";
	$netim_br_companynumber= "Numéro d'enregistrement de l'entité légale (CPNJ)";
	$netim_br_companynumber_desc= $netim_mandatory_org;
	$netim_br_idnumber= "Numéro d'identité (CPF)";
	$netim_br_idnumber_desc= $netim_mandatory_ind;
	//--
		
	$netim_by_registrant_type="Type de propriétaire";
	$netim_by_registrant_org="Entité légale (hors du Bélarus)";
	$netim_by_registrant_ind="Individu (hors du Bélarus)";
	$netim_by_infos="Les noms de domaine en .BY / .бел nécessitent des informations différentes selon la forme légale du propriétaire";
	$netim_by_idnumber="Numéro d'identité";
	$netim_by_idnumber_desc="$netim_mandatory_ind. Numéro de la carte d'identité";
	$netim_by_passportnumber="Numéro du passeport";
	$netim_by_passportnumber_desc= $netim_mandatory_ind;
	$netim_by_passportissuer= "Passeport émis par";
	$netim_by_passportissuer_desc= "Pays d'émission. $netim_mandatory_ind.";
	$netim_by_passportdate= "Date d'émission du passeport";
	$netim_by_passportdate_desc= "$netim_date_format. $netim_mandatory_ind.";
	//---

	$netim_ca_rules="Les noms de domaine en .CA sont restreints aux individus et entités légales résidant au Canada et aux marques valides au Canada. Hormis pour les catégories CCT et TDM, le propriétaire doit disposer d'une adresse au Canada. Le contact administratif doit également disposer d'une adresse locale. Plus d'informations sur <a href='https://static.cira.ca/policy/cprregistrants-fr.pdf?VersionId=pTDfMG3GDNRioOO3gNEYwAjJosjyf4K9' target='blank'>les conditions</a>.";
	$netim_ca_infos= "sélectionnez le type de forme légale du propriétaire";
	$netim_ca_registrant_type= "Type légal";
	$netim_ca_registrant_CCO= "Corporation canadienne";
	$netim_ca_registrant_CCT= "Citoyen canadien";
	$netim_ca_registrant_RES= "Résident permanent au Canada";
	$netim_ca_registrant_GOV= "Gouvernement canadien";
	$netim_ca_registrant_EDU= "Institution éducative canadienne";
	$netim_ca_registrant_ASS= "Association non incorporée canadienne";
	$netim_ca_registrant_HOP= "Hopital canadien";
	$netim_ca_registrant_PRT= "Partenariat enregistré au Canada";
	$netim_ca_registrant_TDM= "Marque enregistrée au Canada";
	$netim_ca_registrant_TRD= "Syndicat canadien";
	$netim_ca_registrant_PLT= "Parti politique canadien";
	$netim_ca_registrant_LAM= "Bibliothèque d'archives ou Musée canadien";
	$netim_ca_registrant_LGR= "Représentant légal d'un citoyen canadien";
	$netim_ca_registrant_ABO= "Peuple autochtone indigène du Canada";
	$netim_ca_registrant_OMK= "Marque officielle enregistrée au Canada";
	$netim_ca_registrant_TRS= "Fiducie établie au Canada";
	//-
	
	$netim_cat_rules= "Les noms de domaine en .CAT sont réservés à la communauté catalane. Un site internet en catalan ou promouvant la culture catalane (même partiellement) doit être publié dans les 6 mois.";
	$netim_cat_use= "Intention d'utilisation du nom de domaine";
	//-
	
	$netim_cl_registrant_type="Type de propriétaire";
	$netim_cl_registrant_org="Entité légale (quelque soit le pays)";
	$netim_cl_registrant_ind="Individu (quelque soit le pays)";
	$netim_cl_infos="Les noms de domaine en .CL nécessitent des informations différentes en fonction de la forme légale du propriétaire: 
		<ul>
			<li><strong>$netim_cl_registrant_ind</strong>: Fournissez un numéro de carte d'identité ou de passeport</li>
            <li><strong>$netim_cl_registrant_org</strong>: Fournissez le numéro d'enregistrement</li> 
        </ul>";
	$netim_cl_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_cl_companynumber_desc = $netim_mandatory_org;
	$netim_cl_idnumber = "Numéro d'identité";
	$netim_cl_idnumber_desc = "$netim_mandatory_ind: Numéro de carte d'identité ou de passeport";
	//--

	$netim_coop_rules= "Les noms de domaine en .COOP sont réservés aux coopératives détenues par leurs membres et contrôlées démocratiquement (conformément aux 7 principes internationaux de coopératives), aux associations composées de cooperatives, aux organisations contrôlées majoritairement par une coopérative ou aux entités dont les opérations sont principalement dédiées au service des Cooperatives.";
	//---
	
	$netim_cr_registrant_type="Type de propriétaire";
	$netim_cr_registrant_org="Entité légale (quelque soit le pays)";
	$netim_cr_registrant_ind="Individu (quelque soit le pays)";
	$netim_cr_infos="Les noms de domaine en .CR nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
            <li><strong>$netim_cr_registrant_org</strong>: fournissez un numéro d'enregistrement</li>
            <li><strong>$netim_cr_registrant_ind</strong>: fournissez un numéro de carte d'identité ou de passeport</li>
        </ul>";
	$netim_cr_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_cr_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_cr_idnumber = "Numéro d'identité";
	$netim_cr_idnumber_desc = "Obligatoire pour les individus: numéro de carte d'identité ou de passeport";
	//--	
	
	$netim_cy_registrant_type="Type de propriétaire";
	$netim_cy_registrant_org="Entité légale (quelque soit le pays)";
	$netim_cy_registrant_ind="Individu (quelque soit le pays)";
	$netim_cy_infos="Les noms de domaine en .CY nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_cy_registrant_ind</strong>: fournissez un numéro de carte d'identité ou de passeport ainsi qu'une date de naissance</li>
            <li><strong>$netim_cy_registrant_org</strong>: fournissez un numéro d'enregistrement</li>  
        </ul>";
	$netim_cy_notices="Limité à 1 nom de domaine par individu / 10 noms de domaine par entité légale.";	
	$netim_cy_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_cy_companynumber_desc = $netim_mandatory_org;
	$netim_cy_idnumber = "Numéro d'identité";
	$netim_cy_idnumber_desc = $netim_mandatory_ind;
	$netim_cy_birthdate = "Date de naissance";
	$netim_cy_birthdate_desc = "$netim_mandatory_ind. $netim_date_format";
	//---
	
	$netim_dj_use = "Intention d'utilisation du nom de domaine";
	//--
	
	$netim_dk_infos= "En nous autorisant en tant que contact , vous acceptez de donner à NETIM le droit de réaliser des paiements à DK Hostmaster en votre nom. [BR] Vous pouvez changer ceci à tout moment auprès du 'self-service' DK Hostmaster. Plus d'informations au sujet de DK Hostmaster et des paiements en direct ici <a href='https://www.dk-hostmaster.dk/dk-hostmaster' target='_blank'>https://www.dk-hostmaster.dk/dk-hostmaster</a>";
	//---

	$netim_do_registrant_type="Type de propriétaire";
	$netim_do_registrant_org="Entité légale (quelque soit le pays)";
	$netim_do_registrant_ind="Individu (quelque soit le pays)";
	$netim_do_infos="Les noms de domaine en .DO nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
            <li><strong>$netim_do_registrant_org</strong>: fournissez un numéro d'enregistrement</li>
            <li><strong>$netim_do_registrant_ind</strong>: fournissez un numéro de carte d'identité ou de passeport</li>
        </ul>";
	$netim_do_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_do_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_do_idnumber = "Numéro d'identité";
	$netim_do_idnumber_desc = "Obligatoire pour les individus : numéro de carte d'identité ou de passeport";
	//---
	
	$netim_dz_rules="Les noms de domaine en .DZ sont restreints aux entités légales enregistrées en Algérie. <br> Le nom de domaine doit correspondre exactement au nom de l'entité légale.";
	$netim_dz_notices = "Afin de procéder à l'enregistrement du nom de domaine, un formulaire d'application doit être signé par le propriétaire et renvoyé avec la documentation requise.";
  	$netim_dz_companynumber = "Numéro d'enregistrement de l'entité légale";
	//---

	$netim_ec_registrant_type="Type de propriétaire";
	$netim_ec_registrant_org="Entité légale (quelque soit le pays)";
	$netim_ec_registrant_ind="Individu (quelque soit le pays)";
	$netim_ec_infos="Les noms de domaine en .EC nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
            <li><strong>$netim_ec_registrant_org</strong>: fournissez un numéro d'enregistrement</li>
            <li><strong>$netim_ec_registrant_ind</strong>: fournissez un numéro de carte d'identité ou de passeport</li>
        </ul>";
	$netim_ec_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_ec_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_ec_idnumber = "Numéro d'identité";
	$netim_ec_idnumber_desc = "Obligatoire pour les individus : numéro de carte d'identité ou de passeport";
	//--

	$netim_ee_registrant_type="Type de propriétaire";
	$netim_ee_registrant_org="Entité légale (quelque soit le pays)";
	$netim_ee_registrant_ind="Individu (quelque soit le pays)";
	$netim_ee_infos="Les noms de domaine en .EE nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
            <li><strong>$netim_ee_registrant_org</strong>: fournissez un numéro d'enregistrement</li>
            <li><strong>$netim_ee_registrant_ind</strong>: fournissez un numéro de carte d'identité ou de passeport</li>
        </ul>";
	$netim_ee_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_ee_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_ee_idnumber = "Numéro d'identité";
	$netim_ee_idnumber_desc = "Obligatoire pour les individus : numéro de carte d'identité ou de passeport";
	//--

	$netim_eg_rules="Les noms de domaine en .EG domains sont restreints aux entités légales possédant une marque couvrant le territoire égyptien. Le nom de domaine doit avoir un lien avec le propriétaire (nom de l'entité légale, marque, secteur d'activité...)";
	$netim_eg_rules_2LVL="Cette extension est restreinte aux entités légales enregistrées en Egypte et possédant une marque couvrant le territoire égyptien. Le nom de domaine Tdoit avoir un lien avec le propriétaire (nom de l'entité légale, marque, secteur d'activité...)";
	//--

	$netim_es_registrant_type="Type de propriétaire";
	$netim_es_registrant_foreign="Individu ou entité légale non hispaniques ";
	$netim_es_registrant_es="Citoyen ou entité légale espagnols";
	$netim_es_registrant_ind_es="Etranger résidant en Espagne";
	$netim_es_infos="Les noms de domaine en .ES nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
            <li><strong>$netim_es_registrant_foreign</strong>: fournissez un numéro d'identité étranger comme le numéro d'enregistrement pour les entités légales ou le numéro de carte d'identité ou passeport pour les individus</li>
            <li><strong>$netim_es_registrant_es</strong>: fournissez le numéro NIF</li>
            <li><strong>$netim_es_registrant_ind_es</strong>: fournissez le numéro NIE</li>
         </ul>";
	$netim_es_for = "Numéro d'identité ou d'enregistrement étranger";
	$netim_es_for_desc = "Obligatoire pour $netim_es_registrant_foreign. Le numéro d'enregistrement pour les entités légales ou le numéro de carte d'identité ou du passeport pour les individus";
	$netim_es_nif = "Numéro NIF";
	$netim_es_nif_desc = "Obligatoire pour $netim_es_registrant_es";
	$netim_es_nie = "Numéro NIE";
	$netim_es_nie_desc = "Obligatoire pour $netim_es_registrant_ind_es";
	//---
	
	$netim_eu_rules = "Cette extension est restreinte aux propriétaires ayant une adresse dans l'Union Européenne, en Islande, Norvège, Liechtenstein ou ayant la nationalité de l'un des pays membres de l'Union Européenne.";
	$netim_eu_registrant_type="Type de propriétaire";
	$netim_eu_registrant_resident="Résident de l'un des pays membres de l'Union Européenne, Islande, Norvège ou Liechtenstein";
	$netim_eu_registrant_citizen="Citoyen de l'Union Européenne";
	$netim_eu_infos="Les noms de domaine en .eu / .ею / .ευ nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
            <li><strong>$netim_eu_registrant_resident</strong>: pas d'informations supplémentaires nécessaires</li>
            <li><strong>$netim_eu_registrant_citizen</strong>: fournissez le pays de citoyenneté</li>
         </ul>";
	$netim_eu_citizenship = "Pays de citoyenneté";
	$netim_eu_citizenship_desc = "Obligatoire pour $netim_eu_registrant_citizen";
	$netim_eu_country_AT="Autriche";
	$netim_eu_country_BE="Belgique";
	$netim_eu_country_BG="Bulgarie";
	$netim_eu_country_CY="Chypre";
	$netim_eu_country_CZ="République Tchèque";
	$netim_eu_country_DE="Allemagne";
	$netim_eu_country_DK="Danemark";
	$netim_eu_country_EE="Estonie";
	$netim_eu_country_ES="Espagne";
	$netim_eu_country_FI="Finlande";
	$netim_eu_country_FR="France";
	$netim_eu_country_GR="Grèce";
	$netim_eu_country_HR="Croatie";
	$netim_eu_country_HU="Hongrie";
	$netim_eu_country_IE="Irlande";
	$netim_eu_country_IT="Italie";
	$netim_eu_country_LT="Lithuanie";
	$netim_eu_country_LU="Luxembourg";
	$netim_eu_country_LV="Lettonie";
	$netim_eu_country_MT="Malte";
	$netim_eu_country_NL="Pays-Bas";
	$netim_eu_country_PL="Pologne";
	$netim_eu_country_PT="Portugal";
	$netim_eu_country_RO="Roumanie";
	$netim_eu_country_SE="Suède";
	$netim_eu_country_SI="Slovenie";
	$netim_eu_country_SK="Slovaquie";	
	//--
	
	$netim_eus_use = "Intention d'utilisation du nom de domaine";
	//--
	
	$netim_fi_registrant_type="Type de propriétaire";
	$netim_fi_registrant_org="Entité légale (quelque soit le pays)";
	$netim_fi_registrant_ind_fi="Individu résidant en Finlande";
	$netim_fi_registrant_ind="Individu (quelque soit le pays)";
	$netim_fi_infos="Les noms de domaine en .FI nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
            <li><strong>$netim_fi_registrant_org</strong>: fournissez le numéro d'enregistrement (Y-tunnus pour les entités finlandaises).</li>
            <li><strong>$netim_fi_registrant_ind_fi</strong>: fournissez le numéro PIN finlandais (HETU).</li>
            <li><strong>$netim_fi_registrant_ind</strong>: fournissez la date de naissance</li>
         </ul>";
	$netim_fi_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_fi_companynumber_desc = "Obligatoire pour $netim_fi_registrant_org (Y-tunnus pour les entités finlandaises)";
	$netim_fi_idnumber = "Le numéro PIN finlandais";
	$netim_fi_idnumber_desc = "Obligatoire pour $netim_fi_registrant_ind_fi (HETU).";
	$netim_fi_birthdate = "Date de naissance";
	$netim_fi_birthdate_desc = "Obligatoire pour $netim_fi_registrant_ind. $netim_date_format";
	//---
	
	$netim_fr_rules="Cette extension est restreinte aux propriétaires ayant une adresse dans l'Union Européenne, l'Islande, la Norvège, le Liechtenstein ou la Suisse.";
	//-
	
	$netim_gal_use = "Intention d'utilisation du nom de domaine";
	//--
	
	$netim_gn_rules="Les noms de domaine de troisième niveau sous l'extension .GN sont restreints aux entités légales enregistrées en Guinée.";
	$netim_gn_notices="Limité à 1 nom de domaine par entité légale.";	
	$netim_gn_use = "Intention d'utilisation de nom de domaine";
	//--
	
	$netim_gw_registrant_type="Type de propriétaire";
	$netim_gw_registrant_org="Le nom de domaine correspond exactement au nom de l'entité légale";
	$netim_gw_registrant_tm="Le nom de domaine correspond exactement au nom de la marque";
	$netim_gw_rules="Les noms de domaine en .GW sont restreints aux entités légales (quelque soit le pays) ayant des droits sur le nom de domaine.";
	$netim_gw_infos="Informations différentes requises selon l'éligibilité:<ul>
            <li><strong>$netim_gw_registrant_org</strong>: fournissez le nom et le numéro d'enregistrement de l'entité légale</li>
            <li><strong>$netim_gw_registrant_tm</strong>: fournissez le nom et le numéro d'enregistrement de la marque</li>
        </ul>";
	$netim_gw_companyname = "Nom de l'entité légale";
	$netim_gw_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_gw_org_desc = "Obligatoire si $netim_gw_registrant_org";
	$netim_gw_tmname = "Nom de la marque";
	$netim_gw_tmnumber = "Numéro d'enregistrement de la marque";
	$netim_gw_tm_desc = "Obligatoire si $netim_gw_registrant_tm";
	//---
	
	$netim_hr_rules="Cette extension est restreinte aux citoyens croates, aux entités légales enregistrées en Croatie ou dans l'Union Européenne avec un numéro de TVA.";
	$netim_hr_registrant_type="Type de propriétaire";
	$netim_hr_registrant_org="Entité légale enregistrée dans l'Union Européenne";
	$netim_hr_registrant_local="Entité légale enregistrée en Croatie ou citoyen croate";
	$netim_hr_infos="Les noms de domaine en .HR nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_hr_registrant_local</strong>: fournissez le numéro OIB</li>
			<li><strong>$netim_hr_registrant_org</strong>: fournissez le numéro de TVA</li>
		</ul>";
	$netim_hr_2LV_infos="Si le propriétaire est une $netim_hr_registrant_local, fournissez le numéro OIB. <strong>Pas d'information supplémentaire nécessaire pour les étrangers.</strong>";
	$netim_hr_vatnumber = "Numéro de TVA EU";
	$netim_hr_vatnumber_desc = "Obligatoire pour $netim_hr_registrant_org";
	$netim_hr_oibnumber = "Numéro OIB";
	$netim_hr_oibnumber_desc = "Obligatoire pour $netim_hr_registrant_local";
	//---
	
	$netim_hu_rules="Cette extension est restreinte aux propriétaires ayant une adresse dans l'Union Européenne, l'Islande, la Norvège, le Liechtenstein ou la Suisse.";
	$netim_hu_registrant_type="Type de propriétaire";
	$netim_hu_registrant_org="Entité légale enregistrée dans l'Union Européenne";
	$netim_hu_registrant_ind="Individu résidant dans l'Union Européenne";
	$netim_hu_infos="Les noms de domaine en .HU nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_hu_registrant_org</strong>: fournissez le numéro de TVA EU</li>
			<li><strong>$netim_hu_registrant_ind</strong>: fournissez le numéro de carte d'identité ou de passeport</li>
		</ul>";
	$netim_hu_vatnumber = "Numéro de TVA EU";
	$netim_hu_vatnumber_desc = "Obligatoire pour $netim_hu_registrant_org";
	$netim_hu_idnumber = "Numéro d'identité";
	$netim_hu_idnumber_desc = "Obligatoire pour $netim_hu_registrant_ind";
	//-
	$netim_coid_rules="Cette extension est restreinte aux entités légales enregistrées en Indonésie.";
	//-
	$netim_ie_rules="Le propriétaire, qu'il soit situé en Irlande ou non doit démontrer une connexion réelle et substantielle avec l'Irlande.<br>
	Le registre .IE procèdera à une vérification d'identité du propriétaire. Des documents sont requis pour les individus irlandais et pour tous les étrangers.<br>
	Si le propriétaire est étranger, le registre .IE vérifiera les preuves de connexion avec l'Irlande (Marque valide en Irlande, documents montrant des transactions avec l'Irlande).";
	$netim_ie_registrant_org_ie="Entité légale Irlandaise";
	$netim_ie_registrant_org="Entité légale étrangère";
	$netim_ie_registrant_ind_ie="Citoyen/résident Irlandais";
	$netim_ie_infos="Les noms de domaine en .IE nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_ie_registrant_org_ie</strong>: fournissez le numéro de TVA ou le numéro d'enregistrement de l'entité légale (CRO / RBN / ROLL / ...)</li>
			<li><strong>$netim_ie_registrant_ind_ie</strong>: Pas d'information supplémentaire nécessaire</li>
			<li><strong>$netim_ie_registrant_org</strong>: fournissez le numéro de TVA ou le numéro d'enregistrement de l'entité légale et le numéro d'enregistrement et les informations de la marque si applicable</li>
	</ul>";
	$netim_ie_vatnumber = "Numéro de TVA EU";
	$netim_ie_vatnumber_desc = "Pour les entités légales en Union Européenne ayant un tel numéro";
	$netim_ie_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_ie_companynumber_desc = "Pour les entités légales Irlandaises (CRO / RBN / ROLL / ...) ou le numéro d'enregistrement local pour les étrangers";
	$netim_ie_tmname = "Nom de la marque";
	$netim_ie_tmnumber = "Numéro de la marque";
	$netim_ie_tm_desc = "Pour que les étrangers prouvent la connexion avec l'Irlande, basée sur une marque valide dans le pays.";
	//---
	
	$netim_il_infos = "Si le propriétaire est une entité légale (quelque soit le pays), fournissez le numéro d'enregistrement. <strong>Pas d'information supplémentaire nécessaire pour les individus</strong>";
	$netim_il_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_il_companynumber_desc = "Obligatoire pour les entités légales";
	//--- 
	
	$netim_ir_registrant_type="Type de propriétaire";
	$netim_ir_registrant_org="Entité légale (quelque soit le pays))";
	$netim_ir_registrant_ind="Individu (quelque soit le pays))";
	$netim_ir_infos="Les noms de domaine en .IR nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
            <li><strong>$netim_ir_registrant_org</strong>: fournissez le numéro d'enregistrement de l'entité légale</li>
            <li><strong>$netim_ir_registrant_ind</strong>: fournissez le numéro de carte d'identité ou de passeport</li>
        </ul>";
	$netim_ir_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_ir_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_ir_idnumber = "Numéro d'identité";
	$netim_ir_idnumber_desc = "Obligatoire pour les individus: numéro de carte d'identité ou de passeport";
	//---
	
	$netim_is_infos = "Si le propriétaire est une entité légale enregistrée en Islande, ou un citoyen islandais, fournissez le numéro d'enregistrement de l'entité légale ou le numéro de sécurité sociale en fonction. <strong>Pas d'information supplémentaire nécessaire pour les étrangers.</strong>";
	$netim_is_idnumber = "Numéro de sécurité sociale";
	$netim_is_idnumber_desc = "Obligatoire pour les citoyens islandais";
	$netim_is_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_is_companynumber_desc = "Obligatoire pour les entités légales enregistrées en Islande";
	//--
	
	$netim_it_rules="Cette extension est restreinte aux propriétaires ayant une adresse dans l'Union Européenne.";
	$netim_it_registrant_type="Type de propriétaire";
	$netim_it_registrant_org="Entité légale enregistrée dans l'Union Européenne";
	$netim_it_registrant_ind="Individu résidant dans l'Union Européenne";
	$netim_it_infos="Des informations différentes sont nécessaires en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_it_registrant_org</strong>: fournissez le numéro de TVA EU</li>
			<li><strong>$netim_it_registrant_ind</strong>: fournissez le code fiscal pour les italiens ou le numéro de la carte d'identité ou du passeport pour les étrangers</li>
		</ul>";
	$netim_it_vatnumber = "Numéro de TVA EU";
	$netim_it_vatnumber_desc = "Obligatoire pour $netim_it_registrant_org";
	$netim_it_idnumber = "Numéro d'identité";
	$netim_it_idnumber_desc = "Obligatoire pour $netim_it_registrant_ind. Code fiscal pour les italiens ou le numéro de la carte d'identité ou du passeport pour les étrangers";
	//---
	$netim_jp_rules="Le contact administratif doit avoir une adresse locale.";
	$netim_cojp_rules="Cette extension est restreinte aux entités légales enregistrées au Japon.";
	//---
	$netim_kr_registrant_org="Entité légale enregistrée en Corée du Sud";
	$netim_kr_registrant_ind="Individu résidant en Corée du Sud";
	$netim_kr_infos="Les noms de domaine en .KR nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_hu_registrant_org</strong>: Sélectionnez un document d'identification (ENTREPRISE / TVA / ORGANISATION / MARQUE) et fournissez le numéro d'enregistrement de l'entité légale correspondant</li>
			<li><strong>$netim_hu_registrant_ind</strong>: Sélectionnez un document d'identification (SOCIAL / PERMIS DE CONDUIRE / PASSEPORT) et fournissez le numéro d'identité correspondant</li>
		</ul>";
	$netim_kr_doc = "Document d'identification";
	$netim_kr_doc_desc = "ENTREPRISE/TVA/ORGANISATION/MARQUE pour les entités légales coréennes ou SOCIAL / PERMIS DE CONDUIRE / PASSEPORT pour les individus coréens";
	$netim_kr_doc_BUSINESS = "Certificat d'enregistrement de l'entreprise";
	$netim_kr_doc_TAX = "Certificat d'enregistrement TVA";
	$netim_kr_doc_ORG = "Certiicat d'enregistrement de l'organisation";
	$netim_kr_doc_BRAND = "Certificat d'enregistrement de la marque";
	$netim_kr_doc_SOCIAL = "Carte de sécurité sociale";
	$netim_kr_doc_DRIVELIC = "Permis de conduire";
	$netim_kr_doc_PASSPORT = "Passeport";
	$netim_kr_idnumber = "Numéro d'identité";
	$netim_kr_idnumber_desc = "Obligatoire si SOCIAL / PERMIS DE CONDUIRE / PASSEPORT";
	$netim_kr_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_kr_companynumber_desc = "Obligatoire si ENTREPRISE/TVA/ORGANISATION/MARQUE";
	//--
	
	$netim_law_rules = "Cette extension est restreinte aux avocats qualifiés, cabinets d'avocats, tribunaux, écoles de droit, régulateurs légaux. Toutes les demande de nom de Domaine sont vérifiées par une organisation tierce. Dans le cas ou des documentations supplémentaires sont demandées, le propriétaire aura 5 jours pour les fournir.";
	//---
	
	$netim_lk_registrant_type="Type de propriétaire";
	$netim_lk_registrant_org="Entité légale (quelque soit le pays)";
	$netim_lk_registrant_ind="Individu (quelque soit le pays)";
	$netim_lk_infos="Les noms de domaine en .LK domains nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
            <li><strong>$netim_lk_registrant_org</strong>: fournissez le numéro d'enregistrement de l'entité légale et le numéro d'identité de son représentant légal</li>
            <li><strong>$netim_lk_registrant_ind</strong>: fournissez le numéro de la carte d'identité ou du passeport</li>
        </ul>";
	$netim_lk_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_lk_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_lk_idnumber = "Numéro d'identité";
	$netim_lk_idnumber_desc = "Obligatoire dans tous les cas";
	//--
	
	$netim_lr_rules="Les noms de domaine de troisième niveau sous l'extension .LR sont restreints aux entités légales enregistrées au Libéria.";
	$netim_lr_notices="Limité à 1 nom de domaine par organisation.";	
	$netim_lr_use = "Intention d'utilisation du nom de domaine";
	//--
	
	$netim_lt_infos = "Si le propriétaire est une entité légale (quelque soit le pays), fournissez le numéro d'enregistrement";
	$netim_lt_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_lt_companynumber_desc = "Obligatoire pour les entités légales (quelque soit le pays)";
	//--
	
	$netim_lv_infos = "Si le propriétaire est une entité légale enregistrée en Lettonie ou un citoyen letton, fournissez le numéro d'enregistrement ou le numéro de la carte d'identité, en fonction. <strong>Pas d'information supplémentaire nécessaire pour les étrangers</strong>";
	$netim_lv_idnumber = "Numéro d'identité";
	$netim_lv_idnumber_desc = "Obligatoire pour les citoyens letton";
	$netim_lv_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_lv_companynumber_desc = "Obligatoire pour les entités légales enregistrées en Lettonie";
	//--
	
	$netim_ma_rules="Le contact administratif doit avoir une adresse locale.";
	//---
	
	$netim_madrid_use = "Intention d'utilisation du nom de domaine";
	//---
	
	$netim_mc_rules="Les noms de domaine en .MC sont restreints aux entités légales enregistrées à Monaco ou aux propriétaires d'une marque couvrant le territoire Monégasque. <br>Le nom de domaine doit correspondre exactement au nom de l'entité légale ou de la marque.";
	$netim_mc_caution="Afin de procéder à l'enregistrement du nom de domaine, un formulaire d'application doit être signé par le représentant légal.";
	//-
	
	$netim_mk_registrant_type="Type de propriétaire";
	$netim_mk_registrant_org="Entité légale (quelque soit le pays)";
	$netim_mk_registrant_ind="Individu (quelque soit le pays)";
	$netim_mk_infos="Les noms de domaine en .MK nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
		 	<li><strong>$netim_mk_registrant_ind</strong>: fournissez le numéro de la carte d'identité ou du passeport</li>
            <li><strong>$netim_mk_registrant_org</strong>: fournissez le numéro de TVA ou le numéro d'enregistrement de l'entité légale</li>
        </ul>";
	$netim_mk_companynumber = "Numéro de TVA ou numéro d'enregistrement de l'entité légale";
	$netim_mk_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_mk_idnumber = "Numéro d'identité";
	$netim_mk_idnumber_desc = "Obligatoire pour les individus: numéro de la carte d'identité ou du passeport";
	//--
	
	$netim_mr_rules="Les noms de domaine en .MR sont restreints aux citoyens et résidents Mauritaniens, aux entités légales enregistrées en Mauritanie et aux propriétaires de marques couvrant le territoire Mauritanien.";
	$netim_mr_registrant_type="Type d'éligibilité";
	$netim_mr_registrant_ind="Le titulaire est un particulier résidant en Mauritanie";
	$netim_mr_registrant_org="Le titulaire est une société ou une organisation enregistrée en Mauritanie";
	$netim_mr_registrant_cit="Le titulaire est citoyen Mauritanien";
	$netim_mr_registrant_tm="Le nom de domaine correspond au nom d'une marque détenue par le titulaire";
	$netim_mr_infos="Des informations différentes sont nécessaires en fonction de l'éligibilité du titulaire':
		<ul>
            <li><strong>$netim_mr_registrant_tm</strong>: fournissez le numéro d'enregistrement et le nom de la marque. <i>Le nom de domaine doit correspondre exactement au nom de la marque.</i></li>
        </ul>";
	$netim_mr_tmname = "Nom de la marque";
	$netim_mr_tmnumber = "Numéro d'enregistrement de la marque";
	$netim_mr_tm_desc = "Obligatoire si $netim_mr_registrant_tm";
	//--
	
	$netim_mt_rules="Les noms de domaine en .MT sont restreints aux propriétaires ayant des droits pour l'utilisation du nom de domaine comme des entreprises, noms d'entités légales ou marques déposées en accord avec la loi Maltaise.";
	$netim_mt_registrant_type="Type de propriétaire";
	$netim_mt_registrant_org="Le nom de domaine correspond exactement au nom de l'entité légale";
	$netim_mt_registrant_tm="Le nom de domaine correspond exactement au nom de la marque";
	$netim_mt_infos="Des informations différentes sont nécessaires en fonction de la forme légale du propriétaire:
		<ul>
		 	<li><strong>$netim_mt_registrant_org</strong>: fournissez le numéro d'enregistrement et le nom de l'entité légale. <i>Le nom de domaine doit correspondre exactement au nom de l'entité légale.</i></li>
            <li><strong>$netim_mt_registrant_tm</strong>: fournissez le numéro d'enregistrement et le nom de la marque. <i>Le nom de domaine doit correspondre exactement au nom de la marque.</i></li>
        </ul>";
	$netim_mt_companyname = "Nom de l'entité légale";
	$netim_mt_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_mt_org_desc = "Obligatoire si $netim_mt_registrant_org";
	$netim_mt_tmname = "Nom de la marque";
	$netim_mt_tmnumber = "Numéro d'enregistrement de la marque";
	$netim_mt_tm_desc = "Obligatoire si $netim_mt_registrant_tm";
	//--	

	$netim_my_rules="Les noms de domaine en .MY sont restreints aux entités légales enregistrées en Malaisie, aux citoyens malaisiens et aux résidents permanents en Malaisie.";
	$netim_my_rules_2LVL="Cette extension est restreinte aux entités légales en Malaisie.";
	$netim_my_registrant_type="Type de propriétaire";
	$netim_my_registrant_org="Entité légale enregistrée en Malaisie";
	$netim_my_registrant_ind="Citoyen Malaisien ou résident permanent en Malaisie";
	$netim_my_infos="Des informations différentes sont nécessaires en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_my_registrant_org</strong>: fournissez le numéro d'enregistrement (ROC / ROB / ROS)</li>
			<li><strong>$netim_my_registrant_ind</strong>: fournissez le numéro d'identité (MyKad ou passeport)</li>
		</ul>";
	$netim_my_infos_2LV="fournissez le numéro d'enregistrement (ROC / ROB / ROS)";
	$netim_my_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_my_companynumber_desc = "Obligatoire pour $netim_my_registrant_org. ROC / ROB / ROS";
	$netim_my_idnumber = "Numéro d'identité";
	$netim_my_idnumber_desc = "Obligatoire pour $netim_my_registrant_ind. MyKad ou numéro du passeport";
	//--
	
		$netim_no_rules="Les noms de domaine en .NO domains sont restreints aux entités légales enregistrées en Norvège ou aux citoyens norvégiens ayant une adresse en Norvège.";
	$netim_no_registrant_type="Type de propriétaire";
	$netim_no_registrant_org="Entité légale enregistrée en Norvège";
	$netim_no_registrant_ind="Citoyen norvégien ayant plus de 18 ans et résidant en Norvège";
	$netim_no_pid="Si vous n'avez pas de PID, <a href='https://pid.norid.no/personid/lookup' target='blank'>vous pouvez le solliciter ici</a>";
	$netim_no_infos="Les noms de domaine en .NO nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_no_registrant_org</strong>: fournissez le numéro de l'entité légale</li>
			<li><strong>$netim_no_registrant_ind</strong>: fournissez le numéro PID du propriétaire. $netim_no_pid</li>
		</ul>";
	$netim_no_notices="Limité à 5 domaines par individu / 100 domaines par entité légale.";
	$netim_no_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_no_companynumber_desc = "Obligatoire pour $netim_no_registrant_org";
	$netim_no_idnumber = "Numéro PID .NO";
	$netim_no_idnumber_desc = "Obligatoire pour $netim_no_registrant_ind. $netim_no_pid";
	//--

	$netim_nu_registrant_type="Type de propriétaire";
	$netim_nu_registrant_org_eu="Entité légale enregistrée dans l'Union Européenne";
	$netim_nu_registrant_org="Entité légale (quelque soit le pays)";
	$netim_nu_registrant_ind="Individu (quelque soit le pays)";
	$netim_nu_infos="Les noms de domaine en .NU nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_nu_registrant_ind</strong>: fournissez le numéro de la carte d'identité ou du passeport</li>
			<li><strong>$netim_nu_registrant_org_eu</strong>: fournissez le numéro européen de TVA et le numéro d'enregistrement de l'entité légale</li>
			<li><strong>$netim_nu_registrant_org</strong>: fournissez le numéro d'enregistrement de l'entité légale</li>
		</ul>";
	$netim_nu_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_nu_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_nu_vatnumber = "Numéro de TVA européen";
	$netim_nu_vatnumber_desc = "Obligatoire pour $netim_nu_registrant_org_eu";
	$netim_nu_idnumber = "Numéro d'identité";
	$netim_nu_idnumber_desc = "Obligatoire pour $netim_nu_registrant_ind";
	//--
		
	$netim_ong_ngo_rules="Cette extension est restreinte aux organisations non gouvernementales ou aux membres de la communauté .ONG. Les organisations formées en vertu des lois de la République Populaire de Chine ne sont pas éligibles.";
	$netim_ong_ngo_notices="Le registre procède à des vérifications aléatoires en sollicitant des documents prouvant le statut de l'organisation non gouvernementale et se réserve le droit de supprimer tout nom de domaine non conforme.";
	//-
	
	$netim_pe_registrant_type="Type de propriétaire";
	$netim_pe_registrant_org="Entité légale (quelque soit le pays)";
	$netim_pe_registrant_ind="Individu (quelque soit le pays)";
	$netim_pe_infos="Les noms de domaine en .PE nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_pe_registrant_ind</strong>: fournissez le numéro de la carte d'identité ou du passeport</li>
		    <li><strong>$netim_pe_registrant_org</strong>: fournissez le numéro d'enregistrement de l'entité légale</li>
        </ul>";
	$netim_pe_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_pe_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_pe_idnumber = "Numéro d'identité";
	$netim_pe_idnumber_desc = "Obligatoire pour les individus: numéro de la carte d'identité ou du passeport";
	//--
	
	$netim_pt_registrant_type="Type de propriétaire";
	$netim_pt_registrant_org="Entité légale (quelque soit le pays)";
	$netim_pt_registrant_ind="Individu (quelque soit le pays)";
	$netim_pt_infos="Les noms de domaine en .PT nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_pt_registrant_ind</strong>: fournissez le numéro de la carte d'identité ou du passeport</li>
			<li><strong>$netim_pt_registrant_org</strong>: fournissez le numéro d'enregistrement ou le numéro de TVA européen de l'entité légale</li>
		</ul>";
	$netim_pt_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_pt_companynumber_desc = "numéro d'enregistrement ou numéro de TVA européen obligatoire pour les entités légales";
	$netim_pt_vatnumber = "Numéro de TVA européen";
	$netim_pt_idnumber = "Numéro d'identité";
	$netim_pt_idnumber_desc = "Obligatoire pour $netim_pt_registrant_ind";
	//--
	
	$netim_radio_rules="Un individu ou une entité légale ayant un lien avec la communauté de la Radio (diffusion Livestreams, programme radio, activité professionnelle, évènements, services, équipements et diffusions liés au monde de la radio, ou tout autre contenu pour le bénéfice et l'avancée de la communauté de la radio)";
	$netim_radio_use = "Intention d'utilisation du nom de domaine";
	//--
	
	$netim_ro_infos = "Si le propriétaire est une entité légale enregistrée en Roumanie ou un citoyen roumain, fournissez le numéro d'enregistrement de l'entité légale et le numéro de TVA ou le numéro CNP en fonction. <strong>Pas d'information supplémentaire nécessaire pour les étrangers.</strong>";
	$netim_ro_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_ro_companynumber_desc = "Obligatoire pour les entités légales roumaines";
	$netim_ro_vatnumber = "Numéro de TVA européen";
	$netim_ro_vatnumber_desc = "Obligatoire pour les entités légales roumaines";
	$netim_ro_idnumber = "Numéro CNP";
	$netim_ro_idnumber_desc = "Obligatoire pour les citoyens roumains ou les entités non incorporées";
	//--
	
	$netim_rs_infos = "Si le propriétaire est une entité légale (quelque soit le pays), fournissez le numéro d'enregistrement";
	$netim_rs_rules_2LVL = "Cette extension est réservée aux entités légales.";
	$netim_rs_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_rs_companynumber_desc = "Obligatoire pour les entités légales (quelque soit le pays)";
	//--
	
	$netim_ru_registrant_type="Type de propriétaire";
	$netim_ru_registrant_org_ru="Entité légale enregistrée en Russie";
	$netim_ru_registrant_org_other="Entité légale (autre pays)";
	$netim_ru_registrant_ind="Individu (quelque soit le pays)";
	$netim_ru_infos="Des informations différentes sont nécessaires en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_ru_registrant_ind</strong>: fournissez le numéro de la carte d'identité ou du passeport ainsi que la date de naissance</li>
            <li><strong>$netim_ru_registrant_org_ru</strong>: fournissez les numéros TIN et KPP</li>
            <li><strong>$netim_ru_registrant_org_other</strong>: Pas d'information supplémentaire nécessaire</li>
         </ul>";
	$netim_ru_tin = "TIN";
	$netim_ru_tin_desc = "$netim_mandatory_org en Russie";
	$netim_ru_kpp = "KPP";
	$netim_ru_kpp_desc = "$netim_mandatory_org en Russie";
	$netim_ru_idnumber = "Numéro d'identité";
	$netim_ru_idnumber_desc  = "$netim_mandatory_ind. Numéro de la carte d'identité ou du passeport";
	$netim_ru_birthdate = "Date de naissance";
	$netim_ru_birthdate_desc = "$netim_mandatory_ind. $netim_date_format";
	//--
	$netim_sa_rules="Les noms de domaine en .SA sont restreints aux entités légales enregistrées en Arabie Saoudite ou aux titulaires d’une marque couvrant le territoire d’Arabie Saoudite.";
	$netim_sa_registrant_type="Type d’éligibilité";
	$netim_sa_registrant_org="Entités légales enregistrées en Arabie Saoudite";
	$netim_sa_registrant_tm="Marque enregistrée couvrant le territoire d’Arabie Saoudite";
	$netim_sa_infos="Des documents différents seront demandés en fonction du type d’éligibilité:
			<ul>
				<li><strong>$netim_sa_registrant_org</strong>: Le certificat d’incorporation</li>
				<li><strong>$netim_sa_registrant_tm</strong>: Le certificat de marque dont le nom doit correspondre exactement au nom de domaine</li>
			</ul>";
	//--
	$netim_se_registrant_type="Type de propriétaire";
	$netim_se_registrant_org_eu="Entité légale enregistrée dans l'Union Européenne";
	$netim_se_registrant_org="Entité légale (autre pays)";
	$netim_se_registrant_ind="Individu (quelque soit le pays)";
	$netim_se_infos="Les noms de domaine en .SE nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_se_registrant_ind</strong>: fournissez le numéro de la carte d'identité ou du passeport</li>
			<li><strong>$netim_se_registrant_org_eu</strong>: fournissez le numéro de TVA EU et le numéro d'enregistrement de l'entité légale</li>
			<li><strong>$netim_se_registrant_org</strong>: fournissez le numéro d'enregistrement de l'entité légale</li>
		</ul>";
	$netim_se_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_se_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_se_vatnumber = "Numéro de TVA européen";
	$netim_se_vatnumber_desc = "Obligatoire pour $netim_se_registrant_org_eu";
	$netim_se_idnumber = "Numéro d'identité";
	$netim_se_idnumber_desc = "Obligatoire pour $netim_se_registrant_ind";
	//--
	
	$netim_sg_rules_2LVL="Les noms de domaine en .COM.SG sont restreints aux entités légales (quelque soit le pays).";
	$netim_sg_registrant_type="Type de propriétaire";
	$netim_sg_registrant_org="Entité légale (quelque soit le pays)";
	$netim_sg_registrant_ind="Individu (quelque soit le pays)";
	$netim_sg_infos="Les noms de domaine en .SG nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
            <li><strong>$netim_sg_registrant_org</strong>: fournissez le numéro d'enregistrement de l'entité légale</li>
            <li><strong>$netim_sg_registrant_ind</strong>: fournissez le numéro de la carte d'identité ou du passeport</li>
        </ul>";
	$netim_sg_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_sg_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_sg_idnumber = "Numéro d'identité";
	$netim_sg_idnumber_desc = "Obligatoire pour les individus: numéro de la carte d'identité ou du passeport";
	//--
	
	$netim_sk_rules="Cette extension est restreinte aux propriétaires ayant une adresse dans l'Union Européenne, en Islande, Norvège, Liechtenstein ou Suisse.";
	$netim_sk_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_sk_companynumber_desc = "Obligatoire pour les entités légales";
	//--
	
	$netim_sport_use = "Intention d'utilisation du nom de domaine";
	//---
	
	$netim_swiss_rules="Les noms de domaines en .SWISS sont restreints aux entités légales enregistrées en Suisse et plusieurs conditions doivent être remplies. <a href='https://www.nic.swiss/dam/nic/fr/dokumente/swiss-Policy-Registration-Policy-edition1-d.pdf.download.pdf/swiss-Policy-Registration-Policy-edition3-f.pdf' target='blank'>Plus d'informations sur les critères d'éligibilité</a>.";
	$netim_swiss_infos="Fournissez le numéro d'enregistrement (UID/IDE/IDI) et l'intention d'utilisation du nom de domaine.";
	$netim_swiss_use = "Intention d'utilisation";
	$netim_swiss_companynumber = "Numéro UID/IDE/IDI";
	$netim_swiss_companynumber_desc = "Numéro d'enregistrement de l'entité légale Suisse";
	//---

	$netim_tn_rules="Les noms de domaine en .TN sont restreints aux entités légales enregistrées en Tunisie ou aux citoyens tunisiens.";
	$netim_comtn_rules="Les noms de domaine en .COM.TN sont restreints aux entités légales enregistrées en Tunisie.";
	//--

	$netim_travel_agreement = "Le titulaire doit déclarer fournir ou prévoir de fournir des services, produits ou contenus dans le domaine ou à destination de l'industrie du voyage et du tourisme.";
	//--

	$netim_tr_registrant_type="Type de propriétaire";
	$netim_tr_registrant_org="Entité légale (quelque soit le pays)";
	$netim_tr_registrant_ind="Individu (quelque soit le pays)";
	$netim_tr_infos="Les noms de domaine en .TR nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_pe_registrant_ind</strong>: fournissez le numéro de la carte d'identité ou du passeport</li>
		    <li><strong>$netim_pe_registrant_org</strong>: fournissez le numéro d'enregistrement de l'entité légale</li>
        </ul>";
	$netim_tr_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_tr_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_tr_idnumber = "Numéro d'identité";
	$netim_tr_idnumber_desc = "Obligatoire pour les individus: numéro de la carte d'identité ou du passeport";
	//---

	$netim_tw_registrant_type="Type de propriétaire";
	$netim_tw_registrant_org="Entité légale (quelque soit le pays)";
	$netim_tw_registrant_ind="Individu (quelque soit le pays)";
	$netim_tw_infos="Les noms de domaine en .TW nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_tw_registrant_org</strong>: Fournissez le numéro d'enregistrement et le numéro d'identité du représentant légal</li>
			<li><strong>$netim_tw_registrant_ind</strong>: fournissez le numéro de la carte d'identité ou du passeport ainsi que la date de naissance</li>
		</ul>";
	$netim_tw_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_tw_companynumber_desc = "Obligatoire pour les entités légales";
	$netim_tw_idnumber = "Numéro d'identité";
	$netim_tw_idnumber_desc = "Obligatoire dans tous les cas";
	$netim_tw_birthdate = "Date de naissance";
	$netim_tw_birthdate_desc = "$netim_date_format. Obligatoire pour les individus.";
	$netim_tw_rules_2LVL="Les noms de domaine de troisième niveau sous l'extension .TW sont restreints aux entités légales (quelque soit le pays).";
	$netim_tw_infos_2LVL="Fournissez le numéro d'enregistrement et le numéro de la carte d'identité ou du passeport du représentant légal.";
	//---

	$netim_ua_rules="Les noms de domaine en .UA sont restreints aux propriétaires de marques valides en Ukraine. Le nom de domaine doit correspondre exactement au nom de la marque.";
	$netim_ua_tmname = "Nom de la marque";
	$netim_ua_tmtype = "Type de la marque";
	$netim_ua_tmtype_INPI = "National en Ukraine";
	$netim_ua_tmtype_WIPO = "International listant l'Ukraine comme pays";
	$netim_ua_tmnumber = "Numéro de la marque";
	//---

	$netim_uk_infos = "Si le propriétaire est une entité légale enregistrée au Royaume-Uni, fournissez le type et le numéro d'enregistrement si applicable. <strong>Dans le cas contraire, pas d'information supplémentaire nécessaire.</strong>";
	$netim_uk_type = "Type d'entité légale";
	$netim_uk_type_desc = "Si le propriétaire est une entité légale enregistrée au Royaume-Uni.";
	$netim_uk_type_LTD = "Société Anonyme Royaume-Uni";
	$netim_uk_type_PLC = "Société Anonyme publique Royaume-Uni";
	$netim_uk_type_PTNR = "Partenariat Royaume-Uni";
	$netim_uk_type_STRA = "Entreprise Individuelle Royaume-Uni";
	$netim_uk_type_LLP = "Société à Responsabilité Limitée Royaume-Uni";
	$netim_uk_type_IP = "Société enregistrée Royaume-Uni";
	$netim_uk_type_SCH = "Ecole Royaume-Uni";
	$netim_uk_type_RCHAR = "Organisme Caritatif agréé Royaume-Uni";
	$netim_uk_type_GOV = "Organisme Gouvernemental Royaume-Uni";
	$netim_uk_type_CRC = "Société par décret Royal Royaume-Uni";
	$netim_uk_type_STAT = "Organisme Statutaire Royaume-Uni";
	$netim_uk_type_OTHER = "Autre entité Royaume-Uni";
	$netim_uk_companynumber = "Numéro d'enregistrement de l'entité légale";
	//---

	$netim_us_rules = "Les noms de domaine en .US sont restreints aux individus et entités légales ayant un lien substantiel avec les Etats-Unis d'Amérique.";
	$netim_us_infos =" Fournissez l'intention d'utilisation et la catégorie du propriétaire";
	$netim_us_purpose = "Intention d'utilisation";
	$netim_us_purpose_desc = "";
 	$netim_us_purpose_P1 = "Utilisation lucrative";
	$netim_us_purpose_P2 = "Utilisation non lucrative";
	$netim_us_purpose_P3 = "Utilisation personnelle";
	$netim_us_purpose_P4 = "Utilisation éducative";
	$netim_us_purpose_P5 = "Utilisation gouvernementale";
	$netim_us_category = "Catégorie du lien";
	$netim_us_category_desc = "";
	$netim_us_category_C11 = "Citoyen des Etats-Unis d'Amérique";
	$netim_us_category_C12 = "Résident permanent des Etats-Unis d'Amérique";
	$netim_us_category_C21 = "Organisation incorporée des Etats-Unis d'Amérique";
	$netim_us_category_C31 = "Etranger ayant un lien substantiel avec les Etats-Unis d'Amérique";
	$netim_us_category_C32 = "Entité légale ayant un bureau ou autre infrastructure aux Etats-Unis d'Amérique";
	//-

	$netim_vn_registrant_type="Type de propriétaire";
	$netim_vn_registrant_org="Entité légale (Hors du Vietnam)";
	$netim_vn_registrant_ind="Individu (Hors du Vietnam)";
	$netim_vn_infos="Les noms de domaine en .VN nécessitent des informations différentes en fonction de la forme légale du propriétaire:
		<ul>
			<li><strong>$netim_vn_registrant_ind</strong>: fournissez le numéro de la carte d'identité ou du passeport ainsi que la date de naissance</li>
			<li><strong>$netim_vn_registrant_org</strong>: Fournissez le numéro d'enregistrement et le numéro de la carte d'identité ou du passeport du représentant légal</li>
		</ul>";
	$netim_vn_rules = "Le propriétaire doit résider hors du Vietnam. Les résidents Vietnamiens doivent enregistrer leur nom de domaine directement auprès d'un Registrar local.";
	$netim_vn_companynumber = "Numéro d'enregistrement de l'entité légale";
	$netim_vn_companynumber_desc = "Obligatoire pour $netim_vn_registrant_org";
	$netim_vn_idnumber = "Numéro d'identité";
	$netim_vn_idnumber_desc = "Obligatoire pour $netim_vn_registrant_ind";
	$netim_vn_birthdate = "Date de naissance";
	$netim_vn_birthdate_desc = "Obligatoire pour $netim_vn_registrant_ind. $netim_date_format";
?>