<?php

namespace App\Http\Livewire\Glasses;

use App\Http\Livewire\Glasses\Actions\EditGlassAction;
use App\Http\Livewire\Glasses\Actions\SoftDeleteGlassAction;
use App\Http\Livewire\PhoneModels\Actions\RestorePhoneModelAction;
use App\Models\Glass;
use LaravelViews\Facades\Header;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class GlassesTableView extends TableView
{

    use Actions;

    protected $model = Glass::class;

    public $searchBy = ['product_name'];

    public function repository(): Builder
    {
        return Glass::query()->withTrashed();
    }

    public function headers(): array
    {
        return [
            Header::title(__('glasses.attributes.product_name')),
            Header::title(__('glasses.attributes.created_at')),
            Header::title(__('glasses.attributes.updated_at')),
            Header::title(__('glasses.attributes.deleted_at'))
        ];
    }

    public function row($model): array
    {
        return [
            $model->product_name  ,
            $model->created_at  ,
            $model->updated_at  ,
            $model->deleted_at  ,
        ];
    }

    protected function actionsByRow()
    {
        return [
            new EditGlassAction('glasses.edit', __('translation.actions.edit'),'edit'),
            new SoftDeleteGlassAction(),
            new RestorePhoneModelAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $glass = Glass::find($id);
        $glass->delete();
        $this ->notification()->success(
            $title = __('translation.messages.successes.destroy_title'),
            $description = __('glasses.messages.successes.destroy', [
            'name' => $glass->product_name,
            ])
        );

    }

    public function restore(int $id)
    {
        $glass = Glass::withTrashed()->find($id);
        $glass->restore();
        $this->notification()->success(
            $title = __('translation.messages.successes.restore_title'),
            $description = __('glasses.messages.successes.restore', [
                'name' => $glass -> product_name,
            ])
        );
    }
}
