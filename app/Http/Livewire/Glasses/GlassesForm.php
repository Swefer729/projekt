<?php

namespace App\Http\Livewire\Glasses;

use App\Models\Glass;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use WireUi\Traits\Actions;
use function Symfony\Component\String\s;

class GlassesForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    public Glass $glass;
    public Bool $editMode;

    public function rules()
    {
        return [
            'glass.product_name' => [
                'required',
                'string',
                'min:2',
                'unique:glasses,product_name' .
                ($this->editMode ? (',' . $this->glass->id) : ''),
            ]
        ];
    }

    public function validationAttribues()
    {
        return [
            'product_name' => __('glasses.attributes.name'),
        ];
    }

    public function mount(Glass $glass, Bool $editMode)
    {
        $this->glass = $glass;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.glasses.glass-form');
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        if($this->editMode){
            $this->authorize('update', $this->glass);
        } else {
            $this->authorize('create',Glass::class);
        }
        $this->validate();
        $this->glass->save();
        $this->notification()->success(
            $title = $this->editMode
                ? __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode
                ? __('glasses.messages.successes.updated', ['product_name' => $this->glass->product_name])
                : __('glasses.messages.successes.stored', ['product_name' => $this->glass->product_name])
        );
        $this->editMode = true;
    }
}
