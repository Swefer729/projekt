<?php

namespace App\Http\Livewire\Producers;

use App\Models\Producer;
use LaravelViews\Facades\Header;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;

class ProducersTableView extends TableView
{

    protected $model = Producer::class;

    public $searchBy = ['producer_name'];

    public function repository(): Builder
    {
        return Producer::query();
    }

    public function headers(): array
    {
        return [
            Header::title(__('producers.attributes.producer_name')),
            Header::title(__('producers.attributes.created_at')),
            Header::title(__('producers.attributes.updated_at'))
        ];
    }

    public function row($model): array
    {
        return [
            $model->producer_name  ,
            $model->created_at  ,
            $model->updated_at  ,
        ];
    }
}
