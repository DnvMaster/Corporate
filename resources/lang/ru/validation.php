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

    'accepted' => ' :attribute должны быть приняты',
    'active_url' => ' :attribute недействительный URL.',
    'after' => ' :attribute должна быть дата после :date.',
    'after_or_equal' => ' :attribute должна быть датой после или равной :date.',
    'alpha' => ' :attribute может содержать только буквы.',
    'alpha_dash' => ' :attribute может содержать только буквы, цифры, тире и символы подчеркивания.',
    'alpha_num' => ' :attribute может содержать только буквы и цифры.',
    'array' => ' :attribute должен быть массив.',
    'before' => ' :attribute mдолжна быть дата до :date.',
    'before_or_equal' => ' :attribute должна быть датой до или равной :date.',
    'between' => [
        'numeric' => ' :attribute долюно быть :min и :max.',
        'file' => ' :attribute должно быть между :min и :max килобайтов.',
        'string' => ' :attribute должно быть :min и :max персонажами.',
        'array' => ' :attribute должно быть между :min и :max пунктами.',
    ],
    'boolean' => ' :attribute поле должно быть истинным или ложным.',
    'confirmed' => ' :attribute подтверждение не совпадает.',
    'date' => ' :attribute недопустимая дата.',
    'date_equals' => ':attribute должна быть дата, равная :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'different' => ':attribute и :other должен быть другим.',
    'digits' => ':attribute должны быть :digits цифры.',
    'digits_between' => ':attribute должно быть между :min и :max цифрами.',
    'dimensions' => ' :attribute имеет недопустимые размеры изображения.',
    'distinct' => ' :attribute поле имеет повторяющееся значение.',
    'email' => ' :attribute адрес эл. почты должен быть действительным.',
    'ends_with' => ' :attribute должен заканчиваться одним из следующих: :values.',
    'exists' => 'Выбранный :attribute недействительный.',
    'file' => ' :attribute должен быть файл.',
    'filled' => ' :attribute поле должно иметь значение.',
    'gt' => [
        'numeric' => ' :attribute должно быть больше, чем :значение.',
        'file' => ' :attribute должно быть больше, чем :value килобайты.',
        'string' => ' :attribute должно быть больше, чем :value персонажи.',
        'array' => ' :attribute должно быть больше, чем :value пункты.',
    ],
    'gte' => [
        'numeric' => ' :attribute должно быть больше или равно :value.',
        'file' => ' :attribute должно быть больше или равно :value килобайт.',
        'string' => ' :attribute должно быть больше или равно :value персонажа.',
        'array' => ' :attribute должен иметь :value предметов или больше.',
    ],
    'image' => 'The :attribute должно быть изображение.',
    'in' => 'Выбранный :attribute недействителен.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => ':attribute должен быть целым числом.',
    'ip' => ':attribute должен быть допустимым IP-адресом.',
    'ipv4' => ':attribute должен быть действительным адресом IPv4.',
    'ipv6' => ':attribute должен быть действительным адресом IPv6.',
    'json' => ':attribute должен быть допустимой строкой JSON.',
    'lt' => [
        'numeric' => ':attribute должен быть меньше :value.',
        'file' => 'Размер :attribute должен быть меньше :value килобайт.',
        'string' => ':attribute должен быть меньше символов :value.',
        'array' => 'Элемент :attribute должен содержать меньше элементов :value.',
    ],
    'lte' => [
        'numeric' => 'Атрибут : должен быть меньше или равен :value.',
        'file' => ':attribute должен быть меньше или равен :value килобайтам.',
        'string' => ':attribute должен быть меньше или равен :value символов.',
        'array' => ':attribute не должен содержать более :value элементов.',
    ],
    'max' => [
        'numeric' => ':attribute не может быть больше :max.',
        'file' => 'Размер :attribute не может превышать :max килобайт.',
        'string' => ':attribute не может быть больше, чем :max символов.',
        'array' => ':attribute может иметь не более :max элементов.',
    ],
    'mimes' => ':attribute должен быть файлом типа: :values.',
    'mimetypes' => ':attribute должен быть файлом типа: :values.',
    'min' => [
        'numeric' => ':attribute должен быть как минимум :min.',
        'file' => 'Размер :attribute должен быть не менее :min килобайт.',
        'string' => ':attribute должен содержать не менее :min символов.',
        'array' => ':attribute должен иметь как минимум :min элементов.',
    ],
    'not_in' => 'Выбранный :attribute недействителен.',
    'not_regex' => 'Недопустимый формат :attribute.',
    'numeric' => ':attribute должен быть числом.',
    'password' => 'Неправильный пароль.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'Поле :attribute является обязательным.',
    'required_if' => 'Поле :attribute является обязательным, если :other равно :value.',
    'required_unless' => 'Поле :attribute является обязательным, если только :other не находится в :values.',
    'required_with' => 'Поле :attribute обязательно, когда присутствует :values.',
    'required_with_all' => 'Поле :attribute обязательно, когда присутствуют :values.',
    'required_without' => 'Поле :attribute является обязательным, если :values ​​ отсутствует.',
    'required_without_all' => 'Поле :attribute является обязательным, если ни одно из значений :value не присутствует.',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'numeric' => ':attribute должен быть :size.',
        'file' => ':attribute должен быть :size килобайт.',
        'string' => ':attribute должен быть :size персонаж.',
        'array' => ':attribute должен содержать элементы :size.',
    ],
    'starts_with' => ':attribute должен начинаться с одного из следующих: :values.',
    'string' => ':attribute должен быть строкой.',
    'timezone' => ':attribute должен быть допустимой зоной.',
    'unique' => ':attribute уже занят.',
    'uploaded' => ':attribute не удалось загрузить.',
    'url' => ':attribute формат недействителен.',
    'uuid' => ':attribute должен быть действительным UUID.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
