<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhoneModelRequest;
use App\Http\Requests\UpdatePhoneModelRequest;
use App\Models\PhoneModel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class PhoneModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->authorize('viewAny', PhoneModel::class);
        return view(
            'phonemodels.index',
        );
    }

    public function async(Request $request)
    {
        return PhoneModel::query()
            ->select('id', 'model_name')
            ->orderBy('model_name')
            ->when(
                $request->search,
                fn(Builder $query)
                => $query->where('model_name', 'like', "%{$request->search}%")
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->authorize('create', PhoneModel::class);
        return view(
            'phonemodels.form'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePhoneModelRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhoneModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PhoneModel $phoneModel
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneModel $phoneModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PhoneModel $phoneModel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(PhoneModel $phonemodel)
    {
        $this->authorize('update', $phonemodel);
        return view(
            'phonemodels.form', [
                'phonemodel' => $phonemodel
            ]
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePhoneModelRequest $request
     * @param \App\Models\PhoneModel $phoneModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhoneModelRequest $request, PhoneModel $phoneModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PhoneModel $phoneModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneModel $phoneModel)
    {
        //
    }
}
