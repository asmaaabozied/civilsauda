<?php

namespace App\DataTables;

use App\Helpers\DTHelper;
use App\Models\Job;
use App\Models\JobDatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JobDatatables extends DataTable
{

    private $crudName = 'jobs';

    private function getRoutes() {
        return [
            'update' => "dashboard.$this->crudName.edit",
            'delete' => "dashboard.$this->crudName.destroy",
            'block' =>  "dashboard.$this->crudName.block",
        ];
    }

    private function getPermissions() {
        return [
            'update' => 'update_'.$this->crudName,
            'delete' => 'delete_'.$this->crudName,
            'create' => 'create_'.$this->crudName
        ];
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($model) {
                return (!empty($model->created_at)) ? $model->created_at->diffForHumans() : '';
            })
            ->addColumn('action', function ($model) {
                $actions = '';

                $actions .= DTHelper::dtEditButton(route($this->getRoutes()['update'], $model->id), trans('site.edit'), $this->getPermissions()['update']);
                $actions .= DTHelper::dtDeleteButton(route($this->getRoutes()['delete'], $model->id), trans('site.delete'), $this->getPermissions()['delete']);

                return $actions;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\JobDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Job $model)
    {
        return $model->newQuery();
    }
    public function count()
    {
        return Job::all()->count();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('jobdatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        if (app()->getLocale() == 'en') {
            return [

                Column::make('id'),
                Column::make('name')->title(trans('site.name')),
                Column::make('created_at')->title(trans('site.created_at')),

                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(120)
                    ->addClass('text-center')
                    ->title(trans('site.action')),

            ];}else{
            return [

                Column::make('id'),
                Column::make('name_ar')->title(trans('site.name')),
                Column::make('created_at')->title(trans('site.created_at')),


                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(120)
                    ->addClass('text-center')
                    ->title(trans('site.action')),

            ];

        }
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'JobDatatables_' . date('YmdHis');
    }
}
