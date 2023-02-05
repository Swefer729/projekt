<?php

namespace App\Http\Livewire\Producers\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class RestoreProducerAction extends Action
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
            'title' => __('producers.dialogs.restore.title'),
            'description' => __('producers.dialogs.restore.description', [
                'name' => $model -> producer_name
            ]),
            'icon' => 'question',
            'iconColor' => 'text-green-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'restore',
                'params' => $model->id,
            ],
            'reject' => [
                'label' => __('translation.no'),
            ]
        ]);
    }

    public function renderIf($item, View $view)
    {
        return request()->user()->can('restore', $item);
    }
}
