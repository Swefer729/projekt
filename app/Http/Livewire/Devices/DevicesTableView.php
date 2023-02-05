<?php

namespace App\Http\Livewire\Devices;

use App\Http\Livewire\Devices\Actions\EditDeviceAction;
use App\Models\Category;
use App\Models\Device;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class DevicesTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Device::class;

    public $searchBy = ['producer.producer_name', 'phonemodel.model_name'];

    public function repository(): Builder
    {
        return Device::query()
            ->with(['producer', 'phonemodel']);

    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('devices.attributes.producer_name')),
            Header::title(__('devices.attributes.model_name')),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->producer ? $model->producer->producer_name : '',
            $model->phonemodel ? $model->phonemodel->model_name : '',
        ];
    }

    public function actionsByRow()
    {
        return [
            new EditDeviceAction('devices.edit', __('translation.actions.edit'), 'edit'),
        ];
    }
}
