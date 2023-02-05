<?php

namespace App\Http\Livewire\Glasses\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class SoftDeleteGlassAction extends Action
{

    public $title = '';
    public $icon = 'trash-2';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('translation.actions.destroy');

    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => __('glasses.dialogs.soft_delete.title'),
            'description' => __('glasses.dialogs.soft_delete.description', [
                'name' => $model->product_name
            ]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'softDelete',
                'params' => $model->id,
            ],
            'reject' => [
                'label' => __('translation.no',)
            ]
        ]);
    }

    public function renderIf($item, View $view)
    {
        return request()->user()->can('update', $item);
    }

}
