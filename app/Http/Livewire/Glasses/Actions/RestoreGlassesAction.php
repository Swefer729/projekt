<?php

namespace App\Http\Livewire\Glasses\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class RestoreGlassesAction extends Action
{
    public $title = '';
    public $icon = 'trash';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('translation.actions.restore');
    }

    public function handle($model, View $view)
    {

        $view->dialog()->confirm([
            'title' => __('glaasses.dialogs.restore.title'),
            'description' => __('glasses.dialogs.restore.description', [
                'name' => $model->product_name
            ]),
            'icon' => 'question',
            'iconColor' => 'text-green-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'restore',
                'params' => $model->id,
            ],
            'reject' => [
                'labbel' => __('translation.no')
            ]
        ]);
    }

    public function renderIf($item, View $view)
    {
        return request()->user()->can('restore', $item);
    }

}
