<?php

namespace App\Http\Livewire\Producers\Actions;

use LaravelViews\Actions\RedirectAction;
use LaravelViews\Views\View;

class EditProducerAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon)
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('update', $model);
    }



}
