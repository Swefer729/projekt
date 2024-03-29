<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class CategoriesTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;

    public $searchBy = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository(): Builder
    {
        return Category::query()->withTrashed();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('categories.attributes.name'))->sortBy('name'),
            Header::title(__('translation.attributes.created_at'))->sortBY('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBY('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBY('deleted_at'),
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
            $model->name,
            $model->created_at,
            $model->updated_at,
            $model->deleted_at,
        ];
    }
}
