<?php

return [
    'attributes' => [
        'name' =>  'Nazwa',
        'product_name' => 'Nazwa produktu',
        'width' => 'Szerokość',
        'height' => 'Wysokość',
        'weight'=> 'Waga',
        'created_at' => 'Utworzono',
        'updated_at' => 'Zaktualizowano',
        'deleted_at' => 'Usunięto',
        'model_name' => 'Nazwa modelu',
    ],
    'actions' => [
        'create' => 'Dodaj model',
    ],
    'labels' => [
        'create_form_title' => 'Utworzenie nowego modelu',
        'edit_form_title' => 'Edycja producenta',
    ],
    'messages' => [
        'successes' => [
            'restore' => 'Przywrócono model :name',
            'updated' => 'Zaktualizowano model :model_name',
            'destroy' => 'Usunięto model :name',
            'stored' => 'Utworzono model :model_name',
            'stored_title' => 'Utworzono model',
            'updated_title' => 'Zakutalizowano model',
        ],
    ],

    'dialogs' => [
        'restore' => [
            'title' => 'Przywróć model telefonu',
            'description' => 'Przywrócić :name?',
        ],
        'soft_delete' => [
            'title' => 'Usuń model telefonu',
            'description' => 'Usunać model :name?'
        ]
    ]
];

//translation.messages.successes.stored_title
//
//phone_models.messages.successes.stored
//
//Close
