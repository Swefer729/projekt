<?php

namespace App\Http\Livewire\Products;

use App\Http\Livewire\Products\Actions\EditProductAction;
use App\Models\Product;
use LaravelViews\Facades\Header;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class ProductsTableView extends TableView
{
    use Actions;
    protected $model = Product::class;

    public $searchBy = [

        'glass.product_name',
        'weight',
        'height',
        'width',
    ];


    public function repository(): Builder
    {
        return Product::query()->with(['device.producer','device.phonemodel']);
    }

    public function headers(): array
    {
        return [
            Header::title(__('products.attributes.phone_model')),
            Header::title(__('products.attributes.product_name')),
            Header::title(__('products.attributes.weight')),
            Header::title(__('products.attributes.height')),
            Header::title(__('products.attributes.width')),

        ];
    }

//    public function row($model): array
//    {
//        return [
//            implode(' ', [$model->device->producer->producer_name, $model->device->phonemodel->model_name]),
//            $model->glass->product_name  ,
//            $model->weight."g",
//            $model->height." mm",
//            $model->width." mm",
//
//        ];
//    }

    public function row($model): array
    {
        if (!$model || !$model->device || !$model->device->producer || !$model->device->phonemodel || !$model->glass) {
            return [];
        }

        return [
            implode(' ', [$model->device->producer->producer_name, $model->device->phonemodel->model_name]),
            $model->glass->product_name  ,
            $model->weight."g",
            $model->height." mm",
            $model->width." mm",
        ];
    }

    public function actionsByRow()
    {

        return [

//            new EditProductAction('products.edit', __('translation.actions.edit'), 'edit'),
        ];
    }
}
