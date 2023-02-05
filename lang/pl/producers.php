<?php

return [
    'attributes' => [
        'name' =>  'Nazwa',
        'product_name' => 'Nazwa produktu',
        'model_name' => 'Nazwa Modelu',
        'width' => 'Szerokość',
        'height' => 'Wysokość',
        'weight'=> 'Waga',
        'created_at' => 'Utworzono',
        'updated_at' => 'Zaktualizowano',
        'deleted_at' => 'Usunięto',
        'producer_name' => 'Nazwa producenta',
    ],
    'actions' => [
        'create' => 'Dodaj producenta',
    ],
    'labels' => [
      'create_form_title' => 'Utworzenie nowego producenta',
      'edit_form_title' => 'Edycja producenta',
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano producenta :producer_name',
            'updated' => 'Zaktualizowano producenta :producer_name',
            'destroy' => 'Usunięto producenta :name',
            'restore' => 'Przywrócono producenta :name',
            'updated_title' => 'Zaktualizowano producenta',
            'stored_title' => 'Utworzono producenta',

        ],
    ],
    'dialogs' => [
        'soft_delete'=>[
            'title' => "Usuń producenta",
            'description' => 'Usunąć producenta :name?'
        ],
        'restore' => [
            'title' => 'Przywróc producenta',
            'description' => "Przywrócić producenta :name?",
        ]

    ]
];

