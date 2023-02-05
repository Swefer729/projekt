<?php

namespace App\Http\Livewire\PhoneModels\Actions;

use LaravelViews\Actions\RedirectAction;
use LaravelViews\Views\View;

class EditPhoneModelAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon)
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($item, View $view)
    {
        return request()->user()->can('update', $item);
    }

}
