<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use App\Models\Device;
use App\Models\Producer;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view(
            'devices.index'
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view(
            'devices.form'
        );
    }

    public function async(Request $request)
    {
        return Device::query()
            ->select('devices.id', 'producer_name','model_name')
            ->join('producers','producers.id','=','devices.producer_id')
            ->join('phone_models','phone_models.id','=','devices.phonemodel_id')
            ->selectRaw('CONCAT(producers.producer_name, " ", phone_models.model_name) as device_name')
            ->orderBy('id')
            ->when(
                $request->search,
                fn(Builder $query)
                => $query->where('producer_name', 'like', "%{$request->search}%")
                    ->orWhere('model_name', 'like', "%{$request->search}%")
            )->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn(
                    'id',
                    array_map(
                        fn(array $item) => $item['id'],
                        array_filter(
                            $request->input('selected', []),
                            fn($item) => (is_array($item) && isset($item['id']))
                        )
                    )
                ),
                fn(Builder $query) => $query->limit(10)
            )->get();
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeviceRequest  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceRequest $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }
}
