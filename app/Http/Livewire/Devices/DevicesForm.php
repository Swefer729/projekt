<?php

namespace App\Http\Livewire\Devices;

use App\Models\Device;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use WireUi\Traits\Actions;

class DevicesForm extends Component
{
    use Actions;
    use AuthorizesRequests;


    public Device $device;
    public Bool $editMode;

    public function rules()
    {
        return [
          'device.producer_id' => [
              'required',
              'exists:producers,id'
          ],
            'device.phonemodel_id' => [
                'required',
                'exists:phone_models,id',
            ],
        ];

    }

    public function validationAttributes()
    {
        return [
          'producer_name' => Str::lower(__('devices.attributes.producer_name')),
          'model_name' => Str::lower(__('devices.attributes.producer_name')),
        ];
    }

    public function mount(Device $device, Bool $editMode)
    {
        $this->device = $device;
        $this->device->load('producer','phonemodel');
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.devices.device-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        if($this->editMode){
            $this->authorize('update', $this->device);
        } else {
            $this->authorize('create',Device::class);
        }
        $this->validate();


    $device = $this->device;


        $device->save();


    $this->notification()->success(
        $title = $this->editMode
        ? __('devices.messages.successes.updated_title',)
            : __('devices.messages.successes.stored_title'),
        $description = $this->editMode
            ? __('devices.messages.successes.updated_description')
            : __('devices.messages.successes.stored_description'),
    );
    }

}
