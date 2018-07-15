<?php

return [
    'plugin'      => [
        'name'        => 'Formulierenbouwer',
        'description' => 'Maak aangepaste front-end formulieren'
    ],
    'navigation'  => [
        'formbuilder' => 'Formulierenbouwer',
        'forms'       => 'Formulieren',
        'fieldtypes'  => 'Veldtypes',
        'formlogs'    => 'Archief',
    ],
    'field'       => [
        'id'                        => 'Id',
        'name'                      => 'Naam',
        'code'                      => 'Code',
        'created_at'                => 'Datum & tijd',
        'updated_at'                => 'Bijgewerkt',
        'from_email'                => 'E-mail afzender',
        'from_name'                 => 'Naam afzender',
        'to_email'                  => 'E-mail ontvanger',
        'to_name'                   => 'Naam ontvanger',
        'bcc_email'                 => 'E-mail BCC',
        'bcc_name'                  => 'Naam BCC',
        'template'                  => 'E-mailtemplate',
        'description'               => 'Omschrijving',
        'success_message'           => 'Succesbericht',
        'error_message'             => 'Foutmelding',
        'field_type'                => 'Veldtype',
        'label'                     => 'Label',
        'is_visible'                => 'Zichtbaar',
        'custom_attributes'         => 'Aantepaste attributen',
        'validation'                => 'Validatie',
        'default'                   => 'Standaardwaarde',
        'markup'                    => 'HTML markup',
        'code_comment'              => 'Unieke veldcode',
        'markup_comment'            => 'Je kunt hier Twig gebruiken, en de volgende variabelen: label, name, default, class, placeholder, options, custom_attributes',
        'name_comment'              => 'HTML naam-attribuut. Deze naam gebruik je in e-mailtemplates om de waarde van het veld te krijgen.',
        'custom_attributes_comment' => 'Aangepaste HTML-attributen die aan het invoer-element worden toegevoegd.',
        'validation_comment'        => 'Zie de Laravel documentatie: http://laravel.com/docs/5.0/validation#available-validation-rules',
        'is_visible_comment'        => 'Bepaalt of dit veld zichtbaar is in het formulier.',
        'options'                   => 'Opties',
        'options_comment'           => 'Opties voor dropdowns en andere lijst-velden.',
        'option_key'                => 'Optie-sleutel',
        'option_label'              => 'Optie-waarde',
        'return'                    => 'Terug naar de lijst van velden',
        'add'                       => 'Voeg veld toe',
        'placeholder'               => 'Placeholder',
        'placeholder_comment'       => 'Voegt een placeholder-tekst toe aan text-, textarea- en dropdown-velden',
        'class'                     => 'Class',
        'class_comment'             => 'Voegt HTML-classes toe aan het element',
        'files'                     => 'Bestanden',
        'form'                      => 'Formulier',
        'send_at'                   => 'Verstuurd op',
        'file_data'                 => 'Bestand',
    ],
    'fields'      => [
        'reorder' => 'Herorden Velden'
    ],
    'form'        => [
        'name'           => 'Formulier',
        'create'         => 'Nieuw formulier',
        'edit'           => 'Bewerk formulier',
        'manage'         => 'Beheer formulieren',
        'delete_confirm' => 'Wil je dit formulier echt verwijderen?',
        'new'            => 'Nieuw formulier',
        'forms'          => 'Formulieren',
        'title'          => 'Formulier',
        'description'    => 'Kies welk formulier op de pagina gerenderd wordt',
        'placeholder'    => '-- kies --',
    ],
    'forms'       => [
        'return'         => 'Terug naar de lijst',
        'delete_empty'   => 'Er zijn geen formulieren geselecteerd om te verwijderen',
        'delete_confirm' => 'Geselecteerde formulieren verwijderen?',
        'delete_success' => 'Geselecteerde formulieren succesvol verwijderd.',
    ],
    'tab'         => [
        'details'     => 'Details',
        'fields'      => 'Velden',
        'form_data'   => 'Formuliergegevens',
        'attachments' => 'Bijlagen'
    ],
    'template'    => [
        'empty' => '-- kies --',
    ],
    'relation'    => [
        'field' => 'Veld',
    ],
    'field_type'  => [
        'new'            => 'Nieuw veldtype',
        'field_types'    => 'Veldtypes',
        'manage'         => 'Beheer veldtypes',
        'name'           => 'Veldtype',
        'create'         => 'Nieuw veldtype',
        'edit'           => 'Bewerk veldtype',
        'delete_confirm' => 'Wil je dit veldtype echt verwijderen?',
    ],
    'field_types' => [
        'delete_empty'   => 'Er zijn geen veldtypes geselecteerd om te verwijderen',
        'delete_confirm' => 'Geselecteerde veldtypes verwijderen?',
        'delete_success' => 'Geselecteerde veldtypes succesvol verwijderd.',
        'return'         => 'Terug naar de lijst',
    ],
    'render_form' => [
        'name'        => 'Render Formulier-component',
        'description' => 'Render een formulier op de pagina',
    ],
    'settings'    => [
        'label'              => 'Google reCaptcha',
        'category'           => 'Formulierenbouwer',
        'description'        => 'Beheer Google reCaptcha-instellingen',
        'site_key'           => 'Site key',
        'secret_key'         => 'Secret key',
        'theme'              => 'Thema',
        'lang'               => 'Taal',
        'site_key_comment'   => 'Site key afkomstig van reCaptcha site.',
        'secret_key_comment' => 'Secret key afkomstig van reCaptcha site.',
    ],
    'redirect'    => [
        'title'       => 'Redirect',
        'description' => 'Url waar de bezoeker naartoe wordt gestuurd na succesvol een formulier te hebben verstuurd',
        'none'        => '-- geen --',
    ],
    'error'       => [
        'missing_code'   => 'Ontbrekende formuliercode.',
        'form_not_found' => 'Formulier niet gevonden.',
    ],
    'recaptcha'   => [
        'error' => 'Toon aan dat je menselijk bent!',
        'hint'  => 'Om reCaptcha credentials op te halen, ga je naar <a target="_blank" href="https://www.google.com/recaptcha/admin">https://www.google.com/recaptcha/admin</a>'
    ],
    'permissions' => [
        'tab'               => 'Formulierenbouwer',
        'access_settings'   => 'Beheer instellingen',
        'access_forms'      => 'Beheer formulieren',
        'access_fieldtypes' => 'Beheer veldtypes',
        'access_formlogs'   => 'Beheer archief'
    ],
    'message'     => [
        'success' => 'Bericht is succesvol verstuurd!',
        'error'   => 'Er is een fout opgetreden. Probeer het nog een keer, a.u.b.'
    ],
    'logs'        => [
        'delete_empty'   => 'Er zijn geen inzendingen geselecteerd om te verwijderen',
        'delete_confirm' => 'Geselecteerde inzendingen verwijderen?',
        'delete_success' => 'Geselecteerde inzendingen succesvol verwijderd.',
        'return'         => 'Terug naar de archieflijst',
        'log'            => 'Archief'
    ],
    'log'         => [
        'manage'  => 'Beheer archief',
        'preview' => 'Bekijk inzending'
    ],
    'file'        => [
        'not_valid'   => ':filename is geen geldig bestand.',
        'placeholder' => 'Laat hier bestanden vallen of klik om te uploaden.',
    ]
];