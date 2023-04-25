<?php

	$netim_infos="Información adicional";
	$netim_rules="Reglas";
	$netim_caution="Advertencia";
	$netim_agreement="Acuerdo";
	$netim_agreement_rules="Confirmo cumplir con los requisitos de elegibilidad.";
	$netim_agreement_rules2="Estoy de acuerdo con esta regla.";
	$netim_agreement_rules3="Entiendo.";
	$netim_agreement_trustee="Estoy de acuerdo y confirmo mi deseo de registrar este nombre de dominio con el servicio de presencia local.";
	$netim_freetrustee="Por algunas razones, esta extensión solo está disponible con el uso de nuestro servicio de presencia local, ya incluido en el precio. Por lo tanto, nuestro contacto local será definido como titular en su nombre para cumplir con las reglas.";
	
	$netim_mandatory_ind = "Obligatorio para individuos";
	$netim_mandatory_org = "Obligatorio para entidades jurídicas";
	$netim_date_format = "Formato esperado: DD-MM-YYYY";
	//---
	$netim_aero_rules="Los nombres de dominio en .AERO están restringidos a personas, organizaciones, asociaciones y agencias vinculadas a actividades aeronáuticas y aereoespaciales. <a href='https://www.information.aero/registration/eligibility' target='blank'>Más información sobre los requisitos de elegibilidad</a>.";
	$netim_aero_id="ID .AERO";
	$netim_aero_id_description="Si aún no cuenta con el ID, <a href='https://www.information.aero/node/add/request-aero-id' target='blank'>lo puede solicitar aquí</a>. Por favor note que el registro del nombre de dominio será postergado hasta la aprobación de su solicitud por el Registry.";
	$netim_aero_password="Contraseña del ID .AERO";
	$netim_aero_infos=$netim_aero_id_description;
	//---
	$netim_al_registrant_type="Tipo de titular";
	$netim_al_registrant_org_al="Entidad jurídica en Albania";
	$netim_al_registrant_org_eu="Entidad jurídica en Unión Europea";
	$netim_al_registrant_org_other="Entidad jurídica (otros paises)";
	$netim_al_registrant_ind="Individuo (en cualquier país)";
	$netim_al_infos="Los nombres de dominio en .AL necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_al_registrant_ind</strong>: Proporcione el número de la cédula de identidad o del pasaporte</li>
            <li><strong>$netim_al_registrant_org_al</strong>: Proporcione el número de IVA y el número de la cédula de identidad o del pasaporte del representante legal</li>
            <li><strong>$netim_al_registrant_org_eu</strong>: Proporcione el número de registro y el número de IVA Europeo</li>
            <li><strong>$netim_al_registrant_org_other</strong>: Proporcione el número de registro y el número de la cédula de identidad o del pasaporte del representante legal</li>
        </ul>";
	$netim_al_companynumber = "Número de registro de la Entidad jurídica";
	$netim_al_companynumber_description = "$netim_mandatory_org fuera de Albania";
	$netim_al_vatnumber = "Número de IVA de la Entidad jurídica";
	$netim_al_vatnumber_description = "$netim_mandatory_org en Albania or U.E.";
	$netim_al_idcardnumber = "Número de la cédula de identidad personal";
	$netim_al_passportnumber = "Número del pasaporte personal";
	$netim_al_id_description = "En todos casos, proporcione el número de la cédula de identidad o del pasaporte del representante legal";
	$netim_al_rules_2LVL="Los nombres de dominio de tercer nivel bajo la extensión .AL están restringidos a las entidades jurídicas registradas en Albania.";
	$netim_al_infos_2LVL="Proporcione el número de registro y el número de la cédula de identidad o del pasaporte del representante legal.";
	//---

	$netim_au_rules="El nombre de dominio solicitado tiene que estar relacionado con el solicitante, o sus actividades, quien puede demostrar un vínculo sustancial con Australia.";
	$netim_au_org_rules="Esta extensión esta restringida a las asociaciones / clubs / organizaciones sin fines de lucro.";
	$netim_au_id_rules="Esta extensión esta restringida a los individuos residentes en Australia.";
	$netim_au_infos="Proporcione el número de identidad (ACN / ABN / número de marca) según la eligibilidad del titular.";
	$netim_au_org_infos="Proporcione el número de identidad según la eligibilidad del titular";
	$netim_au_id_type = "Tipo de número de identidad del titular";
	$netim_au_id_type_dropdown_acn = "Número de empresa Australiana - ACN";
	$netim_au_id_type_dropdown_abn = "Número de negocio Australiano - ABN";
	$netim_au_id_type_dropdown_tm = "Número de marca";
	$netim_au_id = "Número de identidad del titular";
	$netim_au_id_desc = "ACN / ABN / número de marca";

	$netim_au_org_id_desc = "Número de registro de la Entidad jurídica";
	$netim_au_el_type = "Tipo de eligibilidad";
	$netim_au_el_type_dropdown_ass = "Asociación constituida Australiana";	
	$netim_au_el_type_dropdown_club = "Club Australiano";
	$netim_au_el_type_dropdown_nprofit = "Organización sin fines de lucro Australiana";
	$netim_au_el_type_dropdown_co = "Empresa Australiana";
	$netim_au_el_type_dropdown_rb = "Negocio registrado Australiano";
	$netim_au_el_type_dropdown_st = "Comerciante individual Australiano";
	$netim_au_el_type_dropdown_tm = "Titular de una marca valida en Australia";
	//---

	$netim_ax_registrant_type="Tipo de titular";
	$netim_ax_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_ax_registrant_ind="Individuo (en cualquier país)";
	$netim_ax_infos="Los nombres de dominio en .AX necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_ax_registrant_org</strong>: Proporcione el número de registro</li>
            <li><strong>$netim_ax_registrant_ind</strong>: Proporcione el número de la cédula de identidad o del pasaporte</li>
        </ul>";
	$netim_ax_companynumber = "Número de registro de la Entidad jurídica";
	$netim_ax_companynumber_desc = $netim_mandatory_org;
	$netim_ax_idnumber = "Número de identidad";
	$netim_ax_idnumber_desc = "$netim_mandatory_ind: Número de la cédula de identidad o del pasaporte";
	//---

	$netim_ba_rules="Los nombres de dominio bajo .BA están restringidos a titulares con una dirección en Bosnia Herzegovina. El contacto administrativo también tiene que tener una dirección local.";
	//---

	$netim_barcelona_use = "Uso previsto del nombre de dominio";
	//---

	$netim_bg_rules = "Los nombres de dominio bajo .BG están restringidos a entidades jurídicas registradas en la Unión Europea.";
	$netim_bg_infos = "Para proceder con el registro del nombre de dominio, un formulario de solicitud tiene que ser firmado por el representante legal y enviado junto con un certificado de incorporación.";
	$netim_bg_companyname = "Nombre de la entidad jurídica";
	$netim_bg_vatnumber = "Número Europeo de IVA";
	$netim_bg_firstname = "Nombre del representante";
	$netim_bg_lastname = "Apellido del representante";
	//---

	$netim_br_registrant_type="Tipo de titular";
	$netim_br_registrant_org="Entidad jurídica registrada en Brasil";
	$netim_br_registrant_ind="Ciudadano brasileño residente de Brasil";
	$netim_br_infos="Los nombres de dominio en .BR necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_br_registrant_org</strong>: Proporcione el número CPNJ</li>
            <li><strong>$netim_br_registrant_ind</strong>: Proporcione el número CPF</li>
        </ul>";
	$netim_br_companynumber = "Número de registro de la Entidad jurídica (CPNJ)";
	$netim_br_companynumber_desc = $netim_mandatory_org;
	$netim_br_idnumber = "Número de identidad (CPF)";
	$netim_br_idnumber_desc = $netim_mandatory_ind;
	//--

	$netim_by_registrant_type="Tipo de titular";
	$netim_by_registrant_org="Entidad jurídica (Fuera de Belarús)";
	$netim_by_registrant_ind="Individuo (Fuera de Belarús)";
	$netim_by_infos="Los nombres de dominio en .BY / .бел necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_by_registrant_ind</strong>: Proporcione el número de la cédula de identidad o del pasaporte</li>
            <li><strong>$netim_by_registrant_org</strong>: No información necesaria</li>
         </ul>";
	$netim_by_idnumber = "Número de identidad";
	$netim_by_idnumber_desc  = "$netim_mandatory_ind. Número de la cédula de identidad";
	$netim_by_passportnumber = "Número del pasaporte";
	$netim_by_passportnumber_desc = $netim_mandatory_ind;
	$netim_by_passportissuer = "Pasaporte emitido por";
	$netim_by_passportissuer_desc = "País de emisión. $netim_mandatory_ind.";
	$netim_by_passportdate = "Fecha de emisión del pasaporte";
	$netim_by_passportdate_desc = "$netim_date_format. $netim_mandatory_ind.";
	//--

	$netim_ca_rules="Los nombres de dominio bajo .CA están restringidos a individuos y entidades jurídicas residentes en Canadá o con una marca valida en Canadá. Salvo los tipos jurídicos CCT and TDM, el titular tiene que tener una dirección en Canadá. El contacto administrativo también tiene que tener una dirección local. Más información sobre los <a href='https://www.cira.ca/sites/default/files/policy/canadian-presence-requirements-for-registrants.pdf' target='blank'>requisitos de presencia en Canadá</a>.";
	$netim_ca_infos="Seleccionar el tipo jurídico del titular";
	$netim_ca_registrant_type = "Tipo jurídico";
	$netim_ca_registrant_CCO = "Sociedad Canadiense";
	$netim_ca_registrant_CCT = "Cuidadano Canadiense";
	$netim_ca_registrant_RES = "Residente permanente de Canadá";
	$netim_ca_registrant_GOV = "Gobierno Canadiense";
	$netim_ca_registrant_EDU = "Institución educativa Canadiense";
	$netim_ca_registrant_ASS = "Asociación no incorporada Canadiense";
	$netim_ca_registrant_HOP = "Hospital Canadiense";
	$netim_ca_registrant_PRT = "Alianza registrada en Canadá";
	$netim_ca_registrant_TDM = "Marca registrada en Canadá";
	$netim_ca_registrant_TRD = "Sindicato Canadiense";
	$netim_ca_registrant_PLT = "Partido político Canadiense";
	$netim_ca_registrant_LAM = "Biblioteca de archivos o museo Canadiense";
	$netim_ca_registrant_LGR = "Representante legal de un cuidadano Canadiense";
	$netim_ca_registrant_ABO = "Pueblos aborígenes indígenos de Canadá";
	$netim_ca_registrant_OMK = "Marca oficial registrada en Canadá";
	$netim_ca_registrant_TRS = "Fideicomiso establecido en Canadá";
	//---

	$netim_cat_rules = "Los nombres de dominio bajo .CAT están restringidos a la comunidad Catalana. Una página web en Catalán o la promoción de la cultura Catalana (aunque sea de forma parcial) tiene que ser publicada dentro de 6 meses.";
	$netim_cat_use = "Uso previsto del nombre de dominio";
	//---

	$netim_cl_registrant_type="Tipo de titular";
	$netim_cl_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_cl_registrant_ind="Individuo (en cualquier país)";
	$netim_cl_infos="Los nombres de dominio en .CL necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_cl_registrant_ind</strong>: Proporcione el número de la cédula de identidad o del pasaporte</li>
            <li><strong>$netim_cl_registrant_org</strong>: Proporcione el número de registro de la Entidad jurídica</li> 
        </ul>";
	$netim_cl_companynumber = "Número de registro de la Entidad jurídica";
	$netim_cl_companynumber_desc = $netim_mandatory_org;
	$netim_cl_idnumber = "Número de identidad";
	$netim_cl_idnumber_desc = "$netim_mandatory_ind: Número de la cédula de identidad o del pasaporte";
	//--

	$netim_coop_rules = "Los nombres de dominio bajo .COOP están restringidos a cooperativas democráticamente controladas y propiedades de sus miembros (acorde a los 7 principios cooperativos internacionales), asociaciones compuestas de cooperativas, organizaciones mayoritariamente controladas por una cooperativa, entidades cuyas operaciones se dedican principalmente al servicio a las cooperativas.";
	//---

	$netim_cr_registrant_type="Tipo de titular";
	$netim_cr_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_cr_registrant_ind="Individuo (en cualquier país)";
	$netim_cr_infos="Los nombres de dominio en .CR necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_cr_registrant_org</strong>: Proporcione el número de registro</li>
            <li><strong>$netim_cr_registrant_ind</strong>: Proporcione el número de la cédula de identidad o del pasaporte</li>
        </ul>";
	$netim_cr_companynumber = "Número de registro de la entidad jurídica";
	$netim_cr_companynumber_desc = "Obligatorio para las entidades jurídicas";
	$netim_cr_idnumber = "Número de identidad";
	$netim_cr_idnumber_desc = "Obligatorio para los individuos: número de la cédula de identidad o del pasaporte";
	//--	

	$netim_cy_registrant_type="Tipo de titular";
	$netim_cy_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_cy_registrant_ind="Individuo (en cualquier país)";
	$netim_cy_infos="Los nombres de dominio en .CY necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_cy_registrant_ind</strong>: Proporcione el número de la cédula de identidad o del pasaporte y la fecha de nacimiento</li>
            <li><strong>$netim_cy_registrant_org</strong>: Proporcione el número de registro</li>  
        </ul>";
	$netim_cy_notices="Limitado a 1 dominio por individuo / 10 dominios por organización.";	
	$netim_cy_companynumber = "Número de registro de la Entidad jurídica";
	$netim_cy_companynumber_desc = $netim_mandatory_org;
	$netim_cy_idnumber = "Número de identidad";
	$netim_cy_idnumber_desc = $netim_mandatory_ind;
	$netim_cy_birthdate = "Fecha de nacimiento";
	$netim_cy_birthdate_desc = "$netim_mandatory_ind. $netim_date_format";
	//---

	$netim_dj_use = "Uso previsto del nombre de dominio";
	//--

	$netim_dk_infos = "Al permitirnos ser el pagador para su nombre de dominio, acepta otorgarnos el derecho de hacer pagos a DK Hostmaster en su nombre.[BR] Puede cambiar esto en cualquier momento en DK Hostmaster 'self-service'. Más información sobre DK Hostmaster y los pagos en directo aquí <a href='https://www.dk-hostmaster.dk/dk-hostmaster' target='_blank'>https://www.dk-hostmaster.dk/dk-hostmaster</a>";
	//---

	$netim_do_registrant_type="Tipo de titular";
	$netim_do_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_do_registrant_ind="Individuo (en cualquier país)";
	$netim_do_infos="Los nombres de dominio en .DO necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_do_registrant_org</strong>: Proporcione el número de registro</li>
            <li><strong>$netim_do_registrant_ind</strong>: Proporcione el número de la cédula de identidad o del pasaporte</li>
        </ul>";
	$netim_do_companynumber = "Número de registro de la entidad jurídica";
	$netim_do_companynumber_desc = "Obligatorio para las entidades jurídicas";
	$netim_do_idnumber = "Número de identidad";
	$netim_do_idnumber_desc = "Obligatorio para los individuos: número de la cédula de identidad o del pasaporte";
	//---

	$netim_dz_rules="Los nombres de dominio bajo .DZ están restringidos a entidades jurídicas en Argelia.<br>El nombre de dominio tiene que coincidir con el nombre de la entidad jurídica.";
	$netim_dz_notices = "Para proceder con el registro del nombre de dominio, un formulario de solicitud tiene que ser firmado por el titular y enviado junto con la documentación necesaria.";
  	$netim_dz_companynumber = "Número de registro de la entidad jurídica";
	//---

	$netim_ec_registrant_type="Tipo de titular";
	$netim_ec_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_ec_registrant_ind="Individuo (en cualquier país)";
	$netim_ec_infos="Los nombres de dominio en .EC necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_ec_registrant_org</strong>: Proporcione el número de registro</li>
            <li><strong>$netim_ec_registrant_ind</strong>: Proporcione el número de la cédula de identidad o del pasaporte</li>
        </ul>";
	$netim_ec_companynumber = "Número de registro de la entidad jurídica";
	$netim_ec_companynumber_desc = "Obligatorio para las entidades jurídicas";
	$netim_ec_idnumber = "Número de identidad";
	$netim_ec_idnumber_desc = "Obligatorio para los individuos: número de la cédula de identidad o del pasaporte";
	//-

	$netim_ee_registrant_type="Tipo de titular";
	$netim_ee_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_ee_registrant_ind="Individuo (en cualquier país)";
	$netim_ee_infos="Los nombres de dominio en .EE necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_ee_registrant_org</strong>: Proporcione el número de registro</li>
            <li><strong>$netim_ee_registrant_ind</strong>: Proporcione el número de la cédula de identidad o del pasaporte</li>
        </ul>";
	$netim_ee_companynumber = "Número de registro de la entidad jurídica";
	$netim_ee_companynumber_desc = "Obligatorio para las entidades jurídicas";
	$netim_ee_idnumber = "Número de identidad";
	$netim_ee_idnumber_desc = "Obligatorio para los individuos: número de la cédula de identidad o del pasaporte";
	//---

	$netim_eg_rules="Los nombres de dominio bajo .EG están restringidos a entidades jurídicas con una marca registrada protegiendo el territorio Egipcio. El nombre de dominio tiene que tener un vínculo con el titular (Nombre de la empresa, marca, tipo de negocio...).";
	$netim_eg_rules_2LVL="Esta extension está restringida a entidades jurídicas registradas en Egipto con una marca registrada protegiendo el territorio Egipcio. El nombre de dominio tiene que tener un vínculo con el titular (Nombre de la empresa, marca, tipo de negocio...).";
	//--

	$netim_es_registrant_type="Tipo de titular";
	$netim_es_registrant_foreign="Individuo o entidad jurídica que no sea español";
	$netim_es_registrant_es="Individuo o entidad jurídica español";
	$netim_es_registrant_ind_es="Extranjero viviendo en España";
	$netim_es_infos="Los nombres de dominio en .ES necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_es_registrant_foreign</strong>: Proporcione el número extranjero de registro para las entidades jurídicas o el número de la cédula de identidad o del pasaporte para los individuos</li>
            <li><strong>$netim_es_registrant_es</strong>: Proporcione el número NIF</li>
            <li><strong>$netim_es_registrant_ind_es</strong>: Proporcione el número NIE</li>
         </ul>";
	$netim_es_for = "Número extranjero";
	$netim_es_for_desc = "Obligatorio para $netim_es_registrant_foreign. Número de registro para las entidades jurídicas o número de cédula de identidad o pasaporte para los individuos";
	$netim_es_nif = "Número NIF";
	$netim_es_nif_desc = "Obligatorio para $netim_es_registrant_es";
	$netim_es_nie = "Número NIE";
	$netim_es_nie_desc = "Obligatorio para $netim_es_registrant_ind_es";
	//---

	$netim_eu_rules = "Los nombres de dominio bajo .EU están restringidos a titulares con una dirección en la Unión Europea, Islandia, Noruega, Liechtenstein o con la ciudadanía Europea.";
	$netim_eu_registrant_type="Tipo de titular";
	$netim_eu_registrant_resident="Residente de uno de los Estados Europeos, Islandia, Noruega o Liechtenstein";
	$netim_eu_registrant_citizen="Ciudadano de la la Unión Europea";
	$netim_eu_infos="Los nombres de dominio en .eu / .ею / .ευ necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_eu_registrant_resident</strong>: no se necesitan informaciones complementarias</li>
            <li><strong>$netim_eu_registrant_citizen</strong>: Proporcione el país de ciudadanía</li>
         </ul>";
	$netim_eu_citizenship = "País de ciudadanía";
	$netim_eu_citizenship_desc = "Obligatorio para $netim_eu_registrant_citizen";
	$netim_eu_country_AT="Austria";
	$netim_eu_country_BE="Bélgica";
	$netim_eu_country_BG="Bulgaria";
	$netim_eu_country_CY="Chipre";
	$netim_eu_country_CZ="República Checa";
	$netim_eu_country_DE="Alemania";
	$netim_eu_country_DK="Dinamarca";
	$netim_eu_country_EE="Estonia";
	$netim_eu_country_ES="España";
	$netim_eu_country_FI="Finlandia";
	$netim_eu_country_FR="Francia";
	$netim_eu_country_GR="Grecia";
	$netim_eu_country_HR="Croacia";
	$netim_eu_country_HU="Hungría";
	$netim_eu_country_IE="Irlanda";
	$netim_eu_country_IT="Italia";
	$netim_eu_country_LT="Lituania";
	$netim_eu_country_LU="Luxemburgo";
	$netim_eu_country_LV="Letonia";
	$netim_eu_country_MT="Malta";
	$netim_eu_country_NL="Países Bajos";
	$netim_eu_country_PL="Polonia";
	$netim_eu_country_PT="Portugal";
	$netim_eu_country_RO="Rumania";
	$netim_eu_country_SE="Suecia";
	$netim_eu_country_SI="Eslovenia";
	$netim_eu_country_SK="Eslovaquia";	
	//--

	$netim_eus_use = "Uso previsto del nombre de dominio";
	//--

	$netim_fi_registrant_type="Tipo de titular";
	$netim_fi_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_fi_registrant_ind_fi="Individuo residente en Finlandia";
	$netim_fi_registrant_ind="Individuo (otros paises)";
	$netim_fi_infos="Los nombres de dominio en .FI necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_fi_registrant_org</strong>: Proporcione el número de registro (Y-tunnus para entidades finlandesas)</li>
            <li><strong>$netim_fi_registrant_ind_fi</strong>: Proporcione el número PIN finlandés (HETU)</li>
            <li><strong>$netim_fi_registrant_ind</strong>: Proporcione la fecha de nacimiento</li>
         </ul>";
	$netim_fi_companynumber = "Número de registro de la entidad jurídica";
	$netim_fi_companynumber_desc = "Obligatorio para $netim_fi_registrant_org. (Y-tunnus para entidades finlandesas)";
	$netim_fi_idnumber = "Número PIN finlandés";
	$netim_fi_idnumber_desc = "Obligatorio para $netim_fi_registrant_ind_fi. (HETU)";
	$netim_fi_birthdate = "Fecha de nacimiento";
	$netim_fi_birthdate_desc = "Obligatorio para $netim_fi_registrant_ind. $netim_date_format";
	//---

	$netim_fr_rules="Los nombres de dominio bajo .FR están restringidos a titulares con una dirección en Unión Europea, Islandia, Noruega, Liechtenstein o Suiza.";
	//---

	$netim_gal_use = "Uso previsto del nombre de dominio";
	//--

	$netim_gn_rules="Los nombres de dominio bajo .GN están restringidos a entidades jurídicas registradas en Guinea.";
	$netim_gn_notices="Limitado a 1 dominio por organización.";	
	$netim_gn_use = "Uso previsto del nombre de dominio";
	//--

	$netim_gw_registrant_type="Tipo de eligibilidad";
	$netim_gw_registrant_org="El nombre del dominio corresponde al nombre de la entidad jurídica";
	$netim_gw_registrant_tm="El nombre del dominio corresponde al nombre de la marca";
	$netim_gw_rules="Los nombres de dominio bajo .GW están restringidos a entidades jurídicas (en cualquier país) con un derecho en el nombre de dominio";
	$netim_gw_infos="Informaciones distintas necesarias según el tipo de eligibilidad:<ul>
            <li><strong>$netim_gw_registrant_org</strong>: Proporcione el nombre y el número de registro</li>
            <li><strong>$netim_gw_registrant_tm</strong>: Proporcione el nombre y el número de la marca</li>
        </ul>";
	$netim_gw_companyname = "Nombre de la entidad jurídica";
	$netim_gw_companynumber = "Número de registro de la entidad jurídica";
	$netim_gw_org_desc = "Obligatorio para $netim_gw_registrant_org";
	$netim_gw_tmname = "Nombre de marca";
	$netim_gw_tmnumber = "Número de marca";
	$netim_gw_tm_desc = "Obligatorio para $netim_gw_registrant_tm";
	//---

	$netim_hr_rules="Los nombres de dominio bajo .HR están restringidos a cuidadanos croatas, entidades jurídicas registradas en Croacia o en Unión Europea con un número de IVA.";
	$netim_hr_registrant_type="Tipo de titular";
	$netim_hr_registrant_org="Entidad jurídica en Unión Europea";
	$netim_hr_registrant_local="Entidad jurídica registrada en Croacia o cuidadano croata";
	$netim_hr_infos="Los nombres de dominio en .HR necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_hr_registrant_local</strong>: Proporcione el número OIB</li>
			<li><strong>$netim_hr_registrant_org</strong>: Proporcione el número de IVA</li>
		</ul>";
	$netim_hr_2LV_infos="Si el titular es $netim_hr_registrant_local, proporcione el número OIB. <strong>No se necesitan informaciones complementarias para extranjeros.</strong>";
	$netim_hr_vatnumber = "Número Europeo de IVA ";
	$netim_hr_vatnumber_desc = "Obligatorio para $netim_hr_registrant_org";
	$netim_hr_oibnumber = "Número OIB";
	$netim_hr_oibnumber_desc = "Obligatorio para $netim_hr_registrant_local";
	//---

	$netim_hu_rules="Los nombres de dominio bajo .HU están restringidos a titulares con una dirección en Unión Europea, Islandia, Noruega, Liechtenstein o Suiza.";
	$netim_hu_registrant_type="Tipo de titular";
	$netim_hu_registrant_org="Entidad jurídica en Unión Europea";
	$netim_hu_registrant_ind="Individuo residente en Unión Europea";
	$netim_hu_infos="Los nombres de dominio en .HU necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_hu_registrant_org</strong>: Proporcione el número Europeo de IVA</li>
			<li><strong>$netim_hu_registrant_ind</strong>: Proporcione el número de la cédula de identidad o del pasaporte</li>
		</ul>";
	$netim_hu_vatnumber = "Número Europeo de IVA";
	$netim_hu_vatnumber_desc = "Obligatorio para $netim_hu_registrant_org";
	$netim_hu_idnumber = "Número de identidad";
	$netim_hu_idnumber_desc = "Obligatorio para $netim_hu_registrant_ind";
	//-
	$netim_coid_rules="Esta extensión está restringida a entidades jurídicas registradas en Indonesia.";
	//-
	$netim_ie_rules="El titular, sin importar que este ubicado en Irlanda o no, tiene que demostrar una conexión real y sustantiva con Irlanda.<br>
	El registry .IE verificará la identidad del titular. Se necesitan documentos para individuos Irlandeses y para todos los extranjeros.<br>
	Si el titular es extranjero, el registry .IE verificará la realidad de la conexión con Irlanda (Marca valida en Irlanda, documentos mostrando un negocio con Irlanda...).";
	$netim_ie_registrant_org_ie="Entidad jurídica Irlandesa";
	$netim_ie_registrant_org="Entidad jurídica extranjera";
	$netim_ie_registrant_ind_ie="Cuidadano / residente Irlandés";
	$netim_ie_infos="Los nombres de dominio en .IE necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_ie_registrant_org_ie</strong>: Proporcione el número de IVA o el número de registro (CRO / RBN / ROLL / ...)</li>
			<li><strong>$netim_ie_registrant_ind_ie</strong>: No se necesitan informaciones complementarias</li>
			<li><strong>$netim_ie_registrant_org</strong>: Proporcione el número de IVA o el número de registro y la información de la marca si aplicable</li>
	</ul>";
	$netim_ie_vatnumber = "Número de IVA Europeo";
	$netim_ie_vatnumber_desc = "Para entidades jurídicas con semejante número en la Unión Europea";
	$netim_ie_companynumber = "Número de registro de la Entidad jurídica";
	$netim_ie_companynumber_desc = "Para entidades jurídicas Irlandesas (CRO / RBN / ROLL / ...) o número de registro local para extranjeros";
	$netim_ie_tmname = "Nombre de la marca";
	$netim_ie_tmnumber = "Número de la marca";
	$netim_ie_tm_desc = "Para que los extranjeros con una marca valida en el Pais prueben una conexión con Irlanda.";
	//---

	$netim_il_infos = "Si el titular es una entidad jurídica (en cualquier país), proporcione el número de registro. <strong>No se necesitan informaciones complementarias para individuos.</strong>";
	$netim_il_companynumber = "Número de registro de la entidad jurídica";
	$netim_il_companynumber_desc = "Obligatorio para entidades jurídicas";
	//-

	$netim_ir_registrant_type="Tipo de titular";
	$netim_ir_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_ir_registrant_ind="Individuo (en cualquier país)";
	$netim_ir_infos="Los nombres de dominio en .IR necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_ir_registrant_org</strong>: proporcione el número de registro</li>
            <li><strong>$netim_ir_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte</li>
        </ul>";
	$netim_ir_companynumber = "Número de registro de la entidad jurídica";
	$netim_ir_companynumber_desc = "Obligatorio para entidades jurídicas";
	$netim_ir_idnumber = "Número de identidad";
	$netim_ir_idnumber_desc = "Obligatorio para individuos: número de la cédula de identidad o del pasaporte";
	//---

	$netim_is_infos = "Si el titular es una entidad jurídica registrada en Islandia o un ciudadano Islandés, proporcione el número de registro o el número del seguro social según el tipo de titular. <strong>No se necesitan informaciones complementarias para extranjeros.</strong>";
	$netim_is_idnumber = "Número del seguro social";
	$netim_is_idnumber_desc = "Obligatorio para ciudadanos Islandeses";
	$netim_is_companynumber = "Número de registro de la entidad jurídica";
	$netim_is_companynumber_desc = "Obligatorio para entidades jurídicas registradas en Islandia";
	//---

	$netim_it_rules="Los nombres de dominio bajo .IT  están restringidos a titulares con una dirección en la Unión Europea.";
	$netim_it_registrant_type="Tipo de titular";
	$netim_it_registrant_org="Entidad jurídica registrada en la Unión Europea";
	$netim_it_registrant_ind="Individuo residente de la Unión Europea";
	$netim_it_infos="Los nombres de dominio en .IT necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_it_registrant_org</strong>: proporcione el número de IVA Europeo</li>
			<li><strong>$netim_it_registrant_ind</strong>: proporcione el código fiscal para Italianos, número de la cédula de identidad o del pasaporte para extranjeros</li>
		</ul>";
	$netim_it_vatnumber = "Número de IVA Europeo";
	$netim_it_vatnumber_desc = "Obligatorio para $netim_it_registrant_org";
	$netim_it_idnumber = "Número de identidad";
	$netim_it_idnumber_desc = "Obligatorio para $netim_it_registrant_ind. Código fiscal para Italianos, número de la cédula de identidad o del pasaporte para extranjeros";
	//---
	$netim_jp_rules="El contacto administrativo tiene que tener una dirección local.";
	$netim_cojp_rules="Esta extensión está restringida a entidades jurídicas registradas en Japón.";
	//---
	$netim_kr_registrant_org="Entidad jurídica registrada en Corea del Sur";
	$netim_kr_registrant_ind="Individuo residente de Corea del Sur";
	$netim_kr_infos="Los nombres de dominio en .KR necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_hu_registrant_org</strong>: seleccione un tipo de documento de identidad (NEGOCIO / IVA / ORG / MARCA) y proporcione el número de registro de la entidad jurídica correspondiente</li>
			<li><strong>$netim_hu_registrant_ind</strong>: seleccione un tipo de documento de identidad (SOCIAL / LICENCIA DE CONDUCIR / PASAPORTE) y proporcione el número de identidad correspondiente</li>
		</ul>";
	$netim_kr_doc = "Documento de identidad";
	$netim_kr_doc_desc = "NEGOCIO/IVA/ORG/MARCA para entidades jurídicas Coreanas o SOCIAL/LICENCIA DE CONDUCIR/PASAPORTE para individuos Coreanos";
	$netim_kr_doc_BUSINESS = "Certificado de registro del negocio";
	$netim_kr_doc_TAX = "Certificado de registro IVA";
	$netim_kr_doc_ORG = "Certificado de registro de la organización";
	$netim_kr_doc_BRAND = "Certificado de registro de la marca";
	$netim_kr_doc_SOCIAL = "Tarjeta de seguro social";
	$netim_kr_doc_DRIVELIC = "Licencia de conducir";
	$netim_kr_doc_PASSPORT = "Pasaporte";
	$netim_kr_idnumber = "Número de identidad";
	$netim_kr_idnumber_desc = "Obligatorio si SOCIAL/LICENCIA DE CONDUCIR/PASAPORTE";
	$netim_kr_companynumber = "Número de la entidad jurídica";
	$netim_kr_companynumber_desc = "Obligatorio si NEGOCIO/IVA/ORG/MARCA";
	//--

	$netim_law_rules = "Los nombres de dominio bajo .LAW están restringidos a abogados acreditados, bufetes de abogados, tribunales, escuelas de derecho, reguladores legales. Las solicitudes de dominios serán comprobadas por terceros. En caso de que sea necesario proporcionar documentación adicional, el titular tendrá 5 días para enviarla.";
	//---

	$netim_lk_registrant_type="Tipo de titular";
	$netim_lk_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_lk_registrant_ind="Individuo (en cualquier país)";
	$netim_lk_infos="Los nombres de dominio en .LK necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_lk_registrant_org</strong>: proporcione el número de registro y el número de identidad del representante legal</li>
            <li><strong>$netim_lk_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte </li>
        </ul>";
	$netim_lk_companynumber = "Número de registro de la entidad jurídica";
	$netim_lk_companynumber_desc = "Obligatorio para entidades jurídicas";
	$netim_lk_idnumber = "Número de identidad";
	$netim_lk_idnumber_desc = "Obligatorio en cualquier caso";
	//--

	$netim_lr_rules="Los nombres de dominio de tercer nivel bajo la extensión .LR están restringidos a entidades jurídicas registradas en Liberia.";
	$netim_lr_notices="Limitado a 1 dominio por organización.";	
	$netim_lr_use = "Uso previsto del nombre de dominio";
	//--

	$netim_lt_infos = "Si el titular es una entidad jurídica (en cualquier país), proporcione el número de registro";
	$netim_lt_companynumber = "Número de registro de la entidad jurídica";
	$netim_lt_companynumber_desc = "Obligatorio para entidades jurídicas (en cualquier país)";
	//--

	$netim_lv_infos = "Si el titular es una entidad jurídica registrada en Letonia o un ciudadano letón, proporcione el número de registro o el número de la cédula de identidad o del pasaporte según el tipo del titular. <strong>No se necesitan informaciones complementarias para extranjeros.</strong>";
	$netim_lv_idnumber = "Número de identidad";
	$netim_lv_idnumber_desc = "Obligatorio para ciudadanos letones";
	$netim_lv_companynumber = "Número de registro de la entidad jurídica";
	$netim_lv_companynumber_desc = "Obligatorio para entidades jurídicas registradas en Letonia";
	//---

	$netim_ma_rules="El contacto administrativo tiene que tener una dirección local.";
	//---

	$netim_madrid_use = "Uso previsto del nombre de dominio";
	//--

	$netim_mc_rules="Los nombres de dominio bajo .MC están restringidos a entidades jurídicas registradas en Mónaco o a titulares de marcas validas en el territorio Monegasco.<br>El nombre de dominio tiene que coincidir con el nombre de la entidad jurídica o de la marca.";
	$netim_mc_caution="Para proceder con el registro del nombre de dominio, un formulario de solicitud tiene que ser firmado por el representante legal.";
	//-

	$netim_mk_registrant_type="Tipo de titular";
	$netim_mk_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_mk_registrant_ind="Individuo (en cualquier país)";
	$netim_mk_infos="Los nombres de dominio en .MK necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
		 	<li><strong>$netim_mk_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte</li>
            <li><strong>$netim_mk_registrant_org</strong>: proporcione el número de IVA o el número de registro</li>
        </ul>";
	$netim_mk_companynumber = "Número de registro o de IVA de la entidad jurídica";
	$netim_mk_companynumber_desc = "Obligatorio para entidades jurídicas";
	$netim_mk_idnumber = "Número de identidad";
	$netim_mk_idnumber_desc = "Obligatorio para individuos: número de la cédula de identidad o del pasaporte";
	//--

	$netim_mr_rules="Los nombres de dominio bajo .MR están restringidos a ciudadanos Mauritanos, residentes y entidades jurídicas registradas en Mauritania o a titulares de una marca valida en el territorio Mauritano.";
	$netim_mr_registrant_type="Tipo de elegibilidad";
	$netim_mr_registrant_ind="El titular es un individuo que resida en Mauritania";
	$netim_mr_registrant_org="El titular es una entidad jurídica registrada en Mauritania";
	$netim_mr_registrant_cit="El titular es un ciudadano mauritano";
	$netim_mr_registrant_tm="El nombre de dominio corresponde al nombre de la marca registrada";
	$netim_mr_infos="Se solicitarán informaciones distintas según el tipo de eligibilidad:
		<ul>
            <li><strong>$netim_mr_registrant_tm</strong>: proporcione el número de registro y el nombre de la marca. <i>El nombre de dominio tiene que corresponder al nombre de la marca.</i></li>
        </ul>";
	$netim_mr_tmname = "Nombre de la marca";
	$netim_mr_tmnumber = "Número de la marca";
	$netim_mr_tm_desc = "Obligatorio si $netim_mr_registrant_tm";
	//--

	$netim_mt_rules="Los nombres de dominio bajo .MT están restringidos a titulares con un derecho sobre el uso del nombre de dominio, con una marca, un negocio o nombre de empresa de conformidad con la legislación nacional maltesa.";
	$netim_mt_registrant_type="Tipo de titular";
	$netim_mt_registrant_org="El nombre de dominio corresponde al nombre de la entidad jurídica";
	$netim_mt_registrant_tm="El nombre de dominio corresponde al nombre de la marca";
	$netim_mt_infos="Los nombres de dominio en .MT necesitan informaciones distintas según el tipo de eligibilidad del titular:
		<ul>
		 	<li><strong>$netim_mt_registrant_org</strong>: proporcione el número de registro y el nombre de la entidad jurídica. <i>El nombre de dominio tiene que corresponder al nombre de la entidad jurídica.</i></li>
            <li><strong>$netim_mt_registrant_tm</strong>: proporcione el número de registro y el nombre de la marca. <i>El nombre de dominio tiene que corresponder al nombre de la marca.</i></li>
        </ul>";
	$netim_mt_companyname = "Nombre de la entidad jurídica";
	$netim_mt_companynumber = "Número de la entidad jurídica";
	$netim_mt_org_desc = "Obligatorio si $netim_mt_registrant_org";
	$netim_mt_tmname = "Nombre de la marca";
	$netim_mt_tmnumber = "Número de la marca";
	$netim_mt_tm_desc = "Obligatorio si $netim_mt_registrant_tm";
	//--

	$netim_my_rules="Los nombres de dominio bajo .MY están restringidos a entidades jurídicas registradas en Malasia, ciudadanos Malaisios o residentes permanentes de Malasia.";
	$netim_my_rules_2LVL="Esta extensión está restringida a entidades jurídicas registradas en Malasia.";
	$netim_my_registrant_type="Tipo de titular";
	$netim_my_registrant_org="Entidad jurídica registrada en Malasia";
	$netim_my_registrant_ind="Ciudadano Malaisio o residente permanente de Malasia";
	$netim_my_infos="Los nombres de dominio en .MY necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_my_registrant_org</strong>: proporcione el número de registro (ROC / ROB / ROS)</li>
			<li><strong>$netim_my_registrant_ind</strong>: proporcione el número de identidad (MyKad or pasaporte)</li>
		</ul>";
	$netim_my_infos_2LV="proporcione el número de registro (ROC / ROB / ROS)";
	$netim_my_companynumber = "Número de registro de la entidad jurídica";
	$netim_my_companynumber_desc = "Obligatorio para $netim_my_registrant_org. ROC / ROB / ROS";
	$netim_my_idnumber = "Número de identidad";
	$netim_my_idnumber_desc = "Obligatorio para $netim_my_registrant_ind. MyKad o número de pasaporte";
	//--

	$netim_no_rules="Los nombres de dominio bajo .NO están restringidos a entidades jurídicas registradas en Noruega o a ciudadanos noruegos con una dirección en Noruega.";
	$netim_no_registrant_type="Tipo de titular";
	$netim_no_registrant_org="Entidad jurídica registrada en Noruega";
	$netim_no_registrant_ind="Ciudadano Noruego mayor de edad, residente de Noruega";
	$netim_no_pid="Si aún no cuenta con PID, <a href='https://pid.norid.no/personid/lookup' target='blank'>lo puede solicitar aquí</a>";
	$netim_no_infos="Los nombres de dominio en .NO necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_no_registrant_org</strong>: proporcione el número de registro de la entidad jurídica</li>
			<li><strong>$netim_no_registrant_ind</strong>: proporcione el número PID del titular. $netim_no_pid</li>
		</ul>";
	$netim_no_notices="Limitado a 5 dominios por individuo / 100 dominios por entidad jurídica.";
	$netim_no_companynumber = "Número de registro de la entidad jurídica";
	$netim_no_companynumber_desc = "Obligatorio para $netim_no_registrant_org";
	$netim_no_idnumber = "Número PID .NO";
	$netim_no_idnumber_desc = "Obligatorio para $netim_no_registrant_ind. $netim_no_pid";
	//--

	$netim_nu_registrant_type="Tipo de titular";
	$netim_nu_registrant_org_eu="Entidad jurídica registrada en Unión Europea";
	$netim_nu_registrant_org="Entidad jurídica (Otros paises)";
	$netim_nu_registrant_ind="Individuo (en cualquier país)";
	$netim_nu_infos="Los nombres de dominio en .NU necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_nu_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte</li>
			<li><strong>$netim_nu_registrant_org_eu</strong>: proporcione el número de IVA Europeo y el número de registro</li>
			<li><strong>$netim_nu_registrant_org</strong>: proporcione el número de registro</li>
		</ul>";
	$netim_nu_companynumber = "Número de registro de la entidad jurídica";
	$netim_nu_companynumber_desc = "Obligatorio para entidades jurídicas";
	$netim_nu_vatnumber = "Número de IVA Europeo";
	$netim_nu_vatnumber_desc = "Obligatorio para $netim_nu_registrant_org_eu";
	$netim_nu_idnumber = "Número de identidad";
	$netim_nu_idnumber_desc = "Obligatorio para $netim_nu_registrant_ind";
	//--

	$netim_ong_ngo_rules="Los nombres de dominio bajo .ONG/.NGO están restringidos a organizaciones no gubernamentales o miembros de la comunidad .ONG. Organizaciones formadas ante la ley de la República Popular de China no son eligibles.";
	$netim_ong_ngo_notices="El registry realiza auditorías al azar, solicitando documentación comprobando el estatus de la ONG, y se reserva el derecho a eliminar los nombres de dominio no conformes.";
	//-

	$netim_pe_registrant_type="Tipo de titular";
	$netim_pe_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_pe_registrant_ind="Individuo (en cualquier país)";
	$netim_pe_infos="Los nombres de dominio en .PE necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_pe_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte</li>
		    <li><strong>$netim_pe_registrant_org</strong>: proporcione el número de registro</li>
        </ul>";
	$netim_pe_companynumber = "Número de registro de la entidad jurídica";
	$netim_pe_companynumber_desc = "Obligatorio para entidades jurídicas";
	$netim_pe_idnumber = "Número de identidad";
	$netim_pe_idnumber_desc = "Obligatorio para los individuos: número de la cédula de identidad o del pasaporte";
	//--

	$netim_pt_registrant_type="Tipo de titular";
	$netim_pt_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_pt_registrant_ind="Individuo (en cualquier país)";
	$netim_pt_infos="Los nombres de dominio en .PT necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_pt_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte</li>
			<li><strong>$netim_pt_registrant_org</strong>: proporcione el número de registro o el número de IVA Europeo</li>
		</ul>";
	$netim_pt_companynumber = "Número de registro de la entidad jurídica";
	$netim_pt_companynumber_desc = "Número de registro o número de IVA Europeo obligatorio para entidades jurídicas";
	$netim_pt_vatnumber = "Número de IVA Europeo";
	$netim_pt_idnumber = "Número de identidad";
	$netim_pt_idnumber_desc = "Obligatorio para $netim_pt_registrant_ind";
	//---

	$netim_radio_rules="Un individuo o una entidad jurídica con un vínculo con la comunidad de la Radio (transmisión en directo tipo livestreams, contenidos en relación con programas de radio, individuos con actividades profesionales de radio, eventos en relación con la radio, servicios en relación con la radio o el suministro y difusión de equipo,o cualquier otro donde el titular proporciona contenidos para apoyar y favorecer la comunidad .RADIO)";
	$netim_radio_use = "Uso previsto del nombre de dominio";
	//--

	$netim_ro_infos = "Si el titular es una entidad jurídica registrada en Rumania, o un ciudadano Rumano, proporcione el número de registro o el número de IVA o el número CNP, según el tipo jurídico del titular. <strong>No se necesitan informaciones complementarias para extranjeros.</strong>";
	$netim_ro_companynumber = "Número de registro de la entidad jurídica";
	$netim_ro_companynumber_desc = "Obligatorio para entidades jurídicas registradas en Rumania";
	$netim_ro_vatnumber = "Número de IVA Europeo";
	$netim_ro_vatnumber_desc = "Obligatorio para entidades jurídicas registradas en Rumania";
	$netim_ro_idnumber = "Número CNP";
	$netim_ro_idnumber_desc = "Obligatorio para ciudadanos Rumanos o entidades no constituidas";
	//--

	$netim_rs_infos = "Si el titular es una entidad jurídica (en cualquier país), proporcione el número de registro";
	$netim_rs_rules_2LVL = "Esta extensión está restringida a entidades jurídicas";
	$netim_rs_companynumber = "Número de registro de la entidad jurídica";
	$netim_rs_companynumber_desc = "Obligatorio para entidades jurídicas (en cualquier país)";
	//--
	$netim_ru_registrant_type="Tipo de titular";
	$netim_ru_registrant_org_ru="Entidad jurídica registrada en Rusia";
	$netim_ru_registrant_org_other="Entidad jurídica (Otros paises)";
	$netim_ru_registrant_ind="Individuo (en cualquier país)";
	$netim_ru_infos="Los nombres de dominio en .RU necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_ru_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte y la fecha de nacimiento</li>
            <li><strong>$netim_ru_registrant_org_ru</strong>: proporcione el número TIN y KPP</li>
            <li><strong>$netim_ru_registrant_org_other</strong>: No se necesitan informaciones complementarias</li>
         </ul>";
	$netim_ru_tin = "TIN";
	$netim_ru_tin_desc = "$netim_mandatory_org en Rusia";
	$netim_ru_kpp = "KPP";
	$netim_ru_kpp_desc = "$netim_mandatory_org en Rusia";
	$netim_ru_idnumber = "Número de identidad";
	$netim_ru_idnumber_desc  = "$netim_mandatory_ind. número de la cédula de identidad o del pasaporte";
	$netim_ru_birthdate = "Fecha de nacimiento";
	$netim_ru_birthdate_desc = "$netim_mandatory_ind. $netim_date_format";
	//--
	$netim_sa_rules="Los nombres de dominio bajo .SA están restringidos a entidades legales registradas en Arabia Saudita o a titulares de una marca registrada valida en el teritorio de Arabia Saudita";
	$netim_sa_registrant_type="Tipo de elegibilidad";
	$netim_sa_registrant_org="Entidades jurídicas registradas en Arabia Saudita";
	$netim_sa_registrant_tm="Marca registrada valida en el teritorio de Arabia Saudita";
	$netim_sa_infos="Se solicitarán distintos documentos según el tipo de eligibilidad:
			<ul>
				<li><strong>$netim_sa_registrant_org</strong>: el certificado de incorporación</li>
				<li><strong>$netim_sa_registrant_tm</strong>: el certificado de la marca, cuyo nombre tendrá que corresponder exactamente al nombre de dominio</li>
			</ul>";
	//--
	$netim_se_registrant_type="Tipo de titular";
	$netim_se_registrant_org_eu="Entidad jurídica registrada en la Unión Europea";
	$netim_se_registrant_org="Entidad jurídica (Otros paises)";
	$netim_se_registrant_ind="Individuo (en cualquier país)";
	$netim_se_infos="Los nombres de dominio en .SE necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_se_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte</li>
			<li><strong>$netim_se_registrant_org_eu</strong>: proporcione el número de registro y el número de IVA Europeo</li>
			<li><strong>$netim_se_registrant_org</strong>: proporcione el número de registro</li>
		</ul>";
	$netim_se_companynumber = "Número de registro de la entidad jurídica";
	$netim_se_companynumber_desc = "Obligatorio para entidades jurídicas";
	$netim_se_vatnumber = "Número de IVA Europeo";
	$netim_se_vatnumber_desc = "Obligatorio para $netim_se_registrant_org_eu";
	$netim_se_idnumber = "Número de identidad";
	$netim_se_idnumber_desc = "Obligatorio para $netim_se_registrant_ind";
	//---

	$netim_sg_rules_2LVL="Los nombres de dominio bajo .COM.SG están restringidos a entidades jurídicas (en cualquier país)";
	$netim_sg_registrant_type="Tipo de titular";
	$netim_sg_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_sg_registrant_ind="Individuo (en cualquier país)";
	$netim_sg_infos="Los nombres de dominio en .SG necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
            <li><strong>$netim_sg_registrant_org</strong>: proporcione el número de registro</li>
            <li><strong>$netim_sg_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte</li>
        </ul>";
	$netim_sg_companynumber = "Número de registro de la entidad jurídica";
	$netim_sg_companynumber_desc = "Obligatorio para entidades jurídicas";
	$netim_sg_idnumber = "Número de identidad";
	$netim_sg_idnumber_desc = "Obligatorio para individuos: número de la cédula de identidad o del pasaporte";
	//--

	$netim_sk_rules="Esta extensión está restringida a titulares con una dirección en la Unión Europea, Islandia, Noruega, Liechtenstein o Suiza.";
	$netim_sk_companynumber = "Número de registro de la entidad jurídica";
	$netim_sk_companynumber_desc = "Obligatorio para entidades jurídicas";
	//---

	$netim_sport_use = "Uso previsto del nombre de dominio";
	//---

	$netim_swiss_rules="Los nombres de dominio bajo .SWISS están restringidos a entidades jurídicas registradas en Suiza, y ciertos requisitos tienen que ser cumplidos. <a href='https://www.nic.swiss/dam/nic/en/dokumente/swiss-Policy-Registration-Policy-edition2-e.pdf.download.pdf/swiss-Policy-Registration-Policy-edition3-e.pdf' target='blank'>Más información sobre los requisitos de elegibilidad</a>.";
	$netim_swiss_infos="Proporcione el número de registro (UID/IDE/IDI) y el uso previsto del nombre de dominio.";
	$netim_swiss_use = "Uso previsto del nombre de dominio";
	$netim_swiss_companynumber = "Número UID/IDE/IDI";
	$netim_swiss_companynumber_desc = "Número de registro de la entidad jurídica Suiza";
	//---

	$netim_tn_rules="Los nombres de dominio bajo .TN están restringidos a entidades jurídicas registradas en Túnez o a cuidadanos Tunecinos.";
	$netim_comtn_rules="Los nombres de dominio bajo .COM.TN están restringidos a entidades jurídicas registradas en Túnez.";
	//--
	$netim_travel_agreement = "El titular debe declarar que proporciona o planea proporcionar servicios, productos o contenido en o para la industria de viajes.";

	//--
	$netim_tr_registrant_type="Tipo de titular";
	$netim_tr_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_tr_registrant_ind="Individuo (en cualquier país)";
	$netim_tr_infos="Los nombres de dominio en .TR necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_pe_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte</li>
		    <li><strong>$netim_pe_registrant_org</strong>: proporcione el número de registro</li>
        </ul>";
	$netim_tr_companynumber = "Número de registro de la entidad jurídica";
	$netim_tr_companynumber_desc = "Obligatorio para entidades jurídicas";
	$netim_tr_idnumber = "Número de identidad";
	$netim_tr_idnumber_desc = "Obligatorio para individuos: número de la cédula de identidad o del pasaporte";
	//---

	$netim_tw_registrant_type="Tipo de titular";
	$netim_tw_registrant_org="Entidad jurídica (en cualquier país)";
	$netim_tw_registrant_ind="Individuo (en cualquier país)";
	$netim_tw_infos="Los nombres de dominio en .TW necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_tw_registrant_org</strong>: proporcione el número de registro y el número de la cédula de identidad del representante legal</li>
			<li><strong>$netim_tw_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte y la fecha de nacimiento</li>
		</ul>";
	$netim_tw_companynumber = "Número de registro de la entidad jurídica";
	$netim_tw_companynumber_desc = "Obligatorio para entidades jurídicas";
	$netim_tw_idnumber = "Número de identidad";
	$netim_tw_idnumber_desc = "Obligatorio en todos casos";
	$netim_tw_birthdate = "Fecha de nacimiento";
	$netim_tw_birthdate_desc = "$netim_date_format. Obligatorio para individuos.";
	$netim_tw_rules_2LVL="Los nombres de dominio de tercer nivel bajo la extensión .TW están restringidos a las entidades jurídicas (en cualquier país).";
	$netim_tw_infos_2LVL="Proporcione el número de registro y el número de la cédula de identidad o del pasaporte del representante legal.";
	//---

	$netim_ua_rules="Los nombres de dominio bajo .UA están restringidos a marcas validas en Ucrania. El nombre de dominio tiene que corresponder al nombre de la marca.";
	$netim_ua_tmname = "Nombre de la marca";
	$netim_ua_tmtype = "Tipo de la marca";
	$netim_ua_tmtype_INPI = "Nacional en Ucrania";
	$netim_ua_tmtype_WIPO = "Internacional mostrando Ucrania como país";
	$netim_ua_tmnumber = "Número de la marca";
	//---

	$netim_uk_infos = "Si el titular es una entidad jurídica en el Reino Unido, proporcione el tipo y el número de registro si corresponde. <strong>De lo contrario no se necesitan  informaciones complementarias.</strong>";
	$netim_uk_type = "Tipo de entidad jurídica";
	$netim_uk_type_desc = "Si el titular es una entidad jurídica en el Reino Unido";
	$netim_uk_type_LTD = "Sociedad Anónima del Reino Unido";
	$netim_uk_type_PLC = "Empresa pública de responsabilidad limitada del Reino Unido";
	$netim_uk_type_PTNR = "Alianza en el Reino Unido";
	$netim_uk_type_STRA = "Comerciante individual del Reino Unido";
	$netim_uk_type_LLP = "Sociedad de responsabilidad limitada del Reino Unido";
	$netim_uk_type_IP = "Sociedad industrial";
	$netim_uk_type_SCH = "Escuela en el Reino Unido";
	$netim_uk_type_RCHAR = "Organización caritativa registrada en el Reino Unido";
	$netim_uk_type_GOV = "Organismo gubernamental del Reino Unido";
	$netim_uk_type_CRC = "Empresa por Carta Real del Reino Unido";
	$netim_uk_type_STAT = "Entidad estatutaria del Reino Unido";
	$netim_uk_type_OTHER = "Otras entidades del Reino Unido";
	$netim_uk_companynumber = "Número de registro de la entidad jurídica";
	//---

	$netim_us_rules = "Los nombres de dominio bajo .US están restringidos a personas y entidades con un vínculo sustantivo con los Estados Unidos.";
	$netim_us_infos =" Proporcione el propósito de la solicitud y la categoría del titular";
	$netim_us_purpose = "Propósito de la solicitud";
	$netim_us_purpose_desc = "";
 	$netim_us_purpose_P1 = "Negocio comercial";
	$netim_us_purpose_P2 = "Empresa sin ánimo de lucro";
	$netim_us_purpose_P3 = "Uso personal";
	$netim_us_purpose_P4 = "Fines educativos";
	$netim_us_purpose_P5 = "Fines gubernamentales";
	$netim_us_category = "Categoría del vínculo";
	$netim_us_category_desc = "";
	$netim_us_category_C11 = "Ciudadano de los Estados Unidos";
	$netim_us_category_C12 = "Residente permanente de los Estados Unidos";
	$netim_us_category_C21 = "Organización incorporada de los Estados Unidos";
	$netim_us_category_C31 = "Extranjero con un vínculo sustantivo con los Estados Unidos";
	$netim_us_category_C32 = "Entidad jurídica con oficinas o otras instalaciones en los Estados Unidos";
	//-

	$netim_vn_registrant_type="Tipo de titular";
	$netim_vn_registrant_org="Entidad jurídica (Fuera de Vietnam)";
	$netim_vn_registrant_ind="Individuo (Fuera de Vietnam)";
	$netim_vn_infos="Los nombres de dominio en .VN necesitan informaciones distintas según el tipo jurídico del titular:
		<ul>
			<li><strong>$netim_vn_registrant_ind</strong>: proporcione el número de la cédula de identidad o del pasaporte y la fecha de nacimiento</li>
			<li><strong>$netim_vn_registrant_org</strong>: Proporcione el número de registro y el número de la cédula de identidad o del pasaporte del representante legal</li>
		</ul>";
	$netim_vn_rules = "El titular tiene que residir fuera de Vietnam. Los residentes Vietnamitas tienen que registrar los nombres de dominio directamente con un Registrador local.";
	$netim_vn_companynumber = "Número de registro de la entidad jurídica";
	$netim_vn_companynumber_desc = "Obligatorio para $netim_vn_registrant_org";
	$netim_vn_idnumber = "Número de identidad";
	$netim_vn_idnumber_desc = "Obligatorio para $netim_vn_registrant_ind";
	$netim_vn_birthdate = "Fecha de nacimiento";
	$netim_vn_birthdate_desc = "Obligatorio para $netim_vn_registrant_ind. $netim_date_format";
?>