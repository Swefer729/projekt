<?php

namespace App\Http\Livewire\PhoneModels;

use App\Models\PhoneModel;
use LaravelViews\Facades\Header;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;

class PhoneModelsTableView extends TableView
{

    protected $model = PhoneModel::class;

    public $searchBy = ['model_name'];

    public function repository(): Builder
    {
        return PhoneModel::query();
    }

    public function headers(): array
    {
        return [
            Header::title(__('phone_models.attributes.model_name')),
            Header::title(__('phone_models.attributes.created_at')),
            Header::title(__('phone_models.attributes.updated_at'))
        ];
    }

    public function row($model): array
    {
        return [
            $model->model_name  ,
            $model->created_at  ,
            $model->updated_at  ,
        ];
    }
}
