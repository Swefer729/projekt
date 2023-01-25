<?php

namespace App\Http\Livewire\Glasses;

use App\Models\Glass;
use LaravelViews\Facades\Header;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;

class GlassesTableView extends TableView
{

    protected $model = Glass::class;

    public function repository(): Builder
    {
        return Glass::query();
    }

    public function headers(): array
    {
        return [
            Header::title(__('glasses.attributes.product_name')),
            Header::title(__('glasses.attributes.created_at')),
            Header::title(__('glasses.attributes.updated_at'))
        ];
    }

    public function row($model): array
    {
        return [
            $model->product_name  ,
            $model->created_at  ,
            $model->updated_at  ,
        ];
    }
}
