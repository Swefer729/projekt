<?php

namespace App\Http\Livewire\PhoneModels;

use App\Models\PhoneModel;
use Livewire\Component;
use WireUi\Traits\Actions;
use function Symfony\Component\String\s;

class PhoneModelsForm extends Component
{
    use Actions;
    public Bool $editMode;

    public function rules()
    {
        return [
            'phonemodel.model_name' => [
                'required',
                'string',
                'min:2',
                'unique:phone_models,model_name' .
                ($this->editMode ? (',' . $this->phonemodel->id) : ''),
            ]
        ];
    }

    public function validationAttribues()
    {
        return [
            'model_name' => __('phone_models.attributes.name'),
        ];
    }

    public function mount(PhoneModel $phoneModel, Bool $editMode)
    {
        $this->phonemodel = $phoneModel;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.phonemodels.phonemodel-form');
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->phonemodel->save();
        $this->notification()->success(
            $title = $this->editMode
                ? __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode
                ? __('phone_models.messages.successes.updated', ['model_name' => $this->phonemodel->model_name])
                : __('phone_models.messages.successes.stored', ['model_name' => $this->phonemodel->model_name])
        );
        $this->editMode = true;
    }
}
