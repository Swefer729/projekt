<?php

namespace App\Http\Livewire\PhoneModels;

use App\Http\Livewire\PhoneModels\Actions\EditPhoneModelAction;
use App\Http\Livewire\PhoneModels\Actions\RestorePhoneModelAction;
use App\Http\Livewire\PhoneModels\Actions\SoftDeletePhoneModelAction;
use App\Models\PhoneModel;
use LaravelViews\Facades\Header;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class PhoneModelsTableView extends TableView
{
    use Actions;

    protected $model = PhoneModel::class;

    public $searchBy = ['model_name'];

    public function repository(): Builder
    {
        return PhoneModel::query()->withTrashed();
    }

    public function headers(): array
    {
        return [
            Header::title(__('phone_models.attributes.model_name')),
            Header::title(__('phone_models.attributes.created_at')),
            Header::title(__('phone_models.attributes.updated_at')),
            Header::title(__('phone_models.attributes.deleted_at'))
        ];
    }

    public function row($model): array
    {
        return [
            $model->model_name  ,
            $model->created_at  ,
            $model->updated_at  ,
            $model->deleted_at  ,
        ];
    }

    public function actionsByRow()
    {
        return [
            new EditPhoneModelAction('phonemodels.edit', __('translation.actions.edit'), 'edit'),
            new SoftDeletePhoneModelAction(),
            new RestorePhoneModelAction()
        ];
    }

    public function softDelete(int $id)
    {
        $phoneModel = PhoneModel::find($id);
        $phoneModel->delete();
        $this -> notification()->success(
            $title = __('translation.messages.successes.destroy_title'),
            $description = __('phone_models.messages.successes.destroy', [
                'name' => $phoneModel->model_name,
            ])
        );
    }

    public function restore(int $id)
    {
        $phoneModel = PhoneModel::withTrashed()->find($id);
        $phoneModel->restore();
        $this->notification()->success(
            $title = __('translation.messages.successes.restore_title'),
            $description = __('phone_models.messages.successes.restore', [
                'name' => $phoneModel -> model_name,
            ])
        );
    }
}
