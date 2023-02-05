<?php

namespace App\Http\Livewire\Producers;

use App\Http\Livewire\Producers\Actions\EditProducerAction;
use App\Http\Livewire\Producers\Actions\RestoreProducerAction;
use App\Http\Livewire\Producers\Actions\SoftDeleteProducerAction;
use App\Models\Producer;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class ProducersTableView extends TableView
{
    use Actions;



    protected $model = Producer::class;

    public $searchBy = ['producer_name'];

    public function repository(): Builder
    {
        return Producer::query()->withTrashed();
    }

    public function headers(): array
    {
        return [
            Header::title(__('producers.attributes.producer_name')),
            Header::title(__('producers.attributes.created_at')),
            Header::title(__('producers.attributes.updated_at')),
            Header::title(__('producers.attributes.deleted_at'))
        ];
    }

    public function row($model): array
    {
        return [
            $model->producer_name  ,
            $model->created_at  ,
            $model->updated_at  ,
            $model->deleted_at  ,
        ];
    }

    protected function actionsByRow(): array
    {
        return [
            new EditProducerAction('producers.edit', __('translation.actions.edit'), 'edit'),
            new SoftDeleteProducerAction(),
            new RestoreProducerAction()
        ];
    }

    public function softDelete(int $id)
    {
        $producer = Producer::find($id);
        $producer->delete();
        $this -> notification()->success(
            $title = __('translation.messages.successes.destroy_title'),
            $description = __('producers.messages.successes.destroy', [
                'name' => $producer->producer_name,
                ])
        );
    }

    public function restore(int $id)
    {
        $producer = Producer::withTrashed()->find($id);
        $producer->restore();
        $this->notification()->success(
            $title = __('translation.messages.successes.restore_title'),
            $description = __('producers.messages.successes.restore', [
                'name' => $producer -> producer_name,
            ])
        );

    }
}
