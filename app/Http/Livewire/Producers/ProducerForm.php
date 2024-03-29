<?php

namespace App\Http\Livewire\Producers;

use App\Models\Producer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use WireUi\Traits\Actions;
use function Symfony\Component\String\s;

class ProducerForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    public Producer $producer;
    public Bool $editMode;

    public function rules()
    {
        return [
            'producer.producer_name' => [
                'required',
                'string',
                'min:2',
                'unique:producers,producer_name' .
                ($this->editMode ? (',' . $this->producer->id) : ''),
            ]
        ];
    }

    public function validationAttribues()
    {
        return [
            'producer_name' => 'producers.producer_name',
        ];
    }

    public function mount(Producer $producer, Bool $editMode)
    {
        $this->producer = $producer;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.producers.producer-form');
    }
    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        if($this->editMode){
            $this->authorize('update', $this->producer);
        } else {
            $this->authorize('create',Producer::class);
        }
        $this->validate();
        $this->producer->save();
        $this->notification()->success(
            $title = $this->editMode
        ? __('producers.messages.successes.updated_title', ['producer_name' => $this->producer->producer_name])
        : __('producers.messages.successes.stored_title', ['producer_name' => $this->producer->producer_name]),
        $description = $this->editMode
        ? __('producers.messages.successes.updated', ['producer_name' => $this->producer->producer_name])
        : __('producers.messages.successes.stored', ['producer_name' => $this->producer->producer_name])
        );
        $this->editMode = true;
    }
}
