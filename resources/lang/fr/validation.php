<?php

return [

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

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

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

    'custom' => [
        'email' => [
            'required' => 'L\'email est requis.',
            'email'    => 'L\'email est invalide.',
            'max'      => 'L\'email est trop long (max :max caractères).',
            'unique'   => 'Un compte est déjà associé à cet email.',
        ],
        'password' => [
            'required'  => 'Le mot de passe est requis.',
            'min'       => 'Le mot de passe est trop court (min :min caractères).',
            'confirmed' => 'Les mots de passe ne correspondent pas.',
            'invalid'   => 'Le mot de passe est invalide.',
        ],
        'name' => [
            'required' => 'Le nom est requis.',
            'max'      => 'Le nom est trop long (max :max caractères).'
        ],
        'lastname' => [
            'required' => 'Le nom est requis.',
            'max'      => 'Le nom est trop long (max :max caractères).'
        ],
        'firstname' => [
            'required' => 'Le prénom est requis.',
            'max'      => 'Le prénom est trop long (max :max caractères).'
        ],
        'phone' => [
            'max'   => 'Le numéro de téléphone est trop long (max :max caractères).',
            'regex' => 'Le numéro de téléphone est invalide.',
        ],
        'company' => [
            'max' => 'Le nom de l\'entrprise est trop long (max :max caractères).',
        ],
        'adr_street' => [
            'required' => 'L\'adresse est requise.',
            'max'      => 'L\'adresse est trop longue (max :max caractères).',
        ],
        'adr_zipcode' => [
            'required' => 'Le code postal est requis.',
            'max'      => 'Le code postal est trop long (max :max caractères).',
            'regex'    => 'Le code est invalide.',
        ],
        'adr_city' => [
            'required' => 'La ville est requise.',
            'max'      => 'Le nom de la ville est trop long (max :max caractères).',
        ],
        'height' => [
            'required' => 'La hauteur est requise.',
            'integer'  => 'La hauteur doit être un entier',
        ],
        'width' => [
            'required' => 'La longueur est requise.',
            'integer'  => 'La longueur doit être un entier',
        ],
        'quantity' => [
            'required' => 'La quantité est requise.',
            'integer'  => 'La quantité doit être un entier',
        ],
        'modulenature_id' => [
            'required' => 'L\'id de la nature du module est requis.',
            'integer'  => 'L\'id de la nature du module doit être un entier',
        ],
        'project_id' => [
            'required' => 'L\'id du projet est requis.',
            'integer'  => 'L\'id du projet doit être un entier',
        ],
        'range_id' => [
            'required' => 'L\'id de la gamme est requis.',
            'integer'  => 'L\'id de la gamme doit être un entier',
        ],
        'customer_id' => [
            'required' => 'L\'id du client est requis.',
            'integer'  => 'L\'id du client doit être un entier',
        ],
        'status' => [
            'required' => 'Le statut est requis.',
            'in'  => 'Le statut ne peut être qu\'une de ces valeurs : :in',
        ],
        'quotation_price' => [
            'integer'  => 'Le prix du devis doit être un entier',
        ],
        'quotation_date' => [
            'date'  => 'La date du devis doit être au format date',
        ],
        'exterior_finish' => [
            'required' => 'La finition extérieure est requise.',
            'in'  => 'La finition extérieure ne peut être qu\'une de ces valeurs : :in',
        ],
        'insulating' => [
            'required' => 'L\'isolation est requise.',
            'in'  => 'L\'isolation ne peut être qu\'une de ces valeurs : :in',
        ],
        'top' => [
            'required' => 'La couveture est requise.',
            'in'  => 'La couveture ne peut être qu\'une de ces valeurs : :in',
        ],
        'configuration' => [
            'required' => 'La configuration est requise.',
            'in'  => 'La configuration ne peut être qu\'une de ces valeurs : :in',
        ],
        'template' => [
            'required' => 'Le modèle est requise.',
            'boolean'  => 'Le modèle doit être un booléen',
        ],

    ],

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

    'attributes' => [],

];
