<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"       => ":attribute tiene que ser aceptado.",
    "active_url"     => ":attribute no es una URL válida.",
    "after"          => ":attribute debe ser una fecha después de :date.",
    "alpha"          => ":attribute solo puede contener letras.",
    "alpha_dash"     => ":attribute solo puede contener letras, números, y guiones.",
    "alpha_num"      => ":attribute solo puede contener letras y números.",
    "array"          => ":attribute debe tener elementos seleccionados.",
    "before"         => ":attribute debe ser una fecha antes de :date.",
    "between"        => array(
            "numeric" => ":attribute debe estar entre :min y :max.",
            "file"    => ":attribute debe estar entre :min y :max kilobytes.",
            "string"  => ":attribute debe estar entre :min y :max caracteres.",
    ),
    "confirmed"      => ":attribute no está confirmado.",
    "count"          => ":attribute debe tener exactamente :count elementos seleccionados.",
    "countbetween"   => ":attribute debe tener entre :min y :max elementos seleccionados.",
    "countmax"       => ":attribute debe tener menos de :max elementos seleccionados.",
    "countmin"       => ":attribute debe tener por lo menos :min elementos seleccionados.",
    "different"      => ":attribute y :other deben ser distintos.",
    "email"          => "El formato del campo :attribute es inválido.",
    "exists"         => ":attribute es inválido.",
    "image"          => ":attribute debe ser una imagen.",
    "in"             => ":attribute es inválido.",
    "integer"        => ":attribute debe ser un número entero.",
    "ip"             => ":attribute debe ser una dirección IP válida.",
    "match"          => "El formato del campo :attribute es inválido.",
    "max"            => array(
            "numeric" => ":attribute debe ser menor que :max.",
            "file"    => ":attribute debe ser menor de :max kilobytes.",
            "string"  => ":attribute debe ser menor de :max caracteres.",
    ),
    "mimes"          => ":attribute debe ser un archivo del tipo: :values.",
    "min"            => array(
            "numeric" => ":attribute debe ser por lo menos :min.",
            "file"    => ":attribute debe tener un tamaño mínimo de :min kilobytes.",
            "string"  => ":attribute debe tener una longitud mínima de :min caracteres.",
    ),
    "not_in"         => ":attribute es inválido.",
    "numeric"        => ":attribute debe ser un número.",
    "required"       => "El campo :attribute es requerido.",
    "same"           => ":attribute y :other deben ser iguales.",
    "size"           => array(
            "numeric" => ":attribute debe tener un tamaño de :size.",
            "file"    => ":attribute debe tener un tamaño de :size kilobytes.",
            "string"  => ":attribute debe tener una longitud de :size caracteres.",
    ),
    "unique"         => ":attribute ya existe.",
    "url"            => "El formato de :attribute es inválido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'email' => 'Correo electrónico',
		'id_user' => 'Responsable por el cliente',
        'firstname' => 'Nombre',
        'lastname' => 'Apellido',
        'id_client' => 'Cliente',
        'name' => 'Nombre',
        'razonsocial' => 'Razon social',
        'bussines' => 'Rubro',
        'address1' => 'Dirección principal',
        'address2' => 'Dirección secundaria',
        'phone1' => 'Teléfono principal',
        'phone2' => 'Teléfono secundario',
        'rif' => 'Rif',
        'business' => 'Rubro',
        'status' => 'Status',
        'date' => 'Fecha',
        'magazine' => 'Revista',
        'password' => 'Contraseña',
        'password_confirmation' => 'Confirmar contraseña',
        'id_contact' => 'Contacto del cliente',
		),

);
