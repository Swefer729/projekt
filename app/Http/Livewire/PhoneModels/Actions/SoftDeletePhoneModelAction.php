<?php

namespace App\Http\Livewire\PhoneModels\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;

class SoftDeletePhoneModelAction extends Action
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
            'title' => __('phone_models.dialogs.soft_delete.title'),
            'description' => __('phone_models.dialogs.soft_delete.description', [
                'name' => $model->model_name
            ]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'softDelete',
                'params' => $model->id,
            ],
            'reject' => [
                'label' => __('translation.no'),
            ]
        ]);
    }

    public function renderIf($item, \LaravelViews\Views\View $view)
    {
        return request()->user()->can('update', $item);
    }

}
