<?php

namespace App\DataTables;

use App\Models\Section;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SectionDataTable extends DataTable
{

        /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    // public function dataTable(QueryBuilder $query): EloquentDataTable
    // {
    //     return (new EloquentDataTable($query))
    //         ->addColumn('action', function($query){
    //             $editBtn = "<a href='".route('admin.sections.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
    //             $deleteBtn = "<a href='".route('admin.sections.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

    //             return $editBtn.$deleteBtn;
    //         })
    //         ->addColumn('status', function($query){
    //             $checked = $query->status == 1 ? 'checked' : '';
    //             return '<label class="custom-switch mt-2">
    //                         <input type="checkbox" '.$checked.' name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
    //                         <span class="custom-switch-indicator"></span>
    //                     </label>';
    //         })
    //         ->rawColumns(['action', 'status'])
    //         ->setRowId('id');
    // }


    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $editBtn = "<a href='".route('admin.sections.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('admin.sections.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
    
                return $editBtn.$deleteBtn;
            })
            ->addColumn('status', function($query){
                $checked = $query->status == 1 ? 'checked' : '';
                return '<label class="custom-switch mt-2">
                            <input type="checkbox" '.$checked.' name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                            <span class="custom-switch-indicator"></span>
                        </label>';
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }
    


    /**
     * Get the query source of dataTable.
     */
    public function query(Section $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('section-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('<"d-flex justify-content-between align-items-center mb-3"<"length-container"l><"btn-container"B><"search-container"f>>rtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }



    /**
     * Get the dataTable columns definition.
     */
    // public function getColumns(): array
    // {
    //     return [
    //         Column::make('id')->addClass('text-center'),
    //         Column::make('name')->title('الاسم')->addClass('text-center'),
    //         Column::make('description')->title('الوصف')->addClass('text-center'),
    //         Column::make('status')->title('الحالة')->addClass('text-center'),
    //         Column::computed('action')->title('العمليات')->addClass('text-center')
    //               ->exportable(false)
    //               ->printable(false)
    //               ->width(200)
    //               ->addClass('text-center'),
    //     ];
    // }



    public function getColumns(): array
    {
        return [
            Column::make('id')->addClass('text-center'),
            Column::make('name')->title('الاسم')->addClass('text-center'),
            Column::make('description')->title('الوصف')->addClass('text-center'),
            Column::make('status')->title('الحالة')->addClass('text-center'),
            Column::computed('action')->title('العمليات')->addClass('text-center')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Section_' . date('YmdHis');
    }

}
