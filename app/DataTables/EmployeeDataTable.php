<?php

namespace App\DataTables;

use App\Employee;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class EmployeeDataTable  extends DataTable
{
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
            ->addColumn('image', function($user) {
                return '<img src="'. asset('public/uploads/images/images/' . $user->emp_img) .'" style="width: 70px; height: 70px;" class="img-thumbnail" alt="">';
            })

            ->addColumn('delete', function($user){

                $html = '<form style="margin-bottom: 0"  method="post" action="' . route('employees.destroy', $user->id) . '">';
                $html .= csrf_field() . method_field('delete');
                $html .= '<button  type="submit" class="btn btn-danger btn-sm delete">' . __('site.delete') . '</button>';
                $html .= '</form>';

                return $html;

            })
            ->addColumn('edit', function($user){

                return '<a href="'.route('employees.edit',$user->id).'" class="btn btn-info edit"><i class="fa fa-edit "></i></a>';
			})
            ->rawColumns([
                'image',
                'delete',
                'edit',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Employee::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'        => 'Bfrtip',
                'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50,100, trans('site.all_record')]],
                'destroy'=> true,
                'buttons'      => [

                    [
                        'text'      => '<i class="fa fa-plus" style="font-size:18px;color:green"> </i> ' . __('site.add'),
                        //'className' => 'btn btn-info ',
                        'action'    => 'function(){
                            window.location.href = "' . \URL::current() . '/create";
                        }'

                    ],
                    ['extend' => 'print',  'exportOptions'=>['columns'=>':visible'] ,'text' => '<i class="fa fa-print" style="font-size:18px;color:blue"></i>'],
                    ['extend' => 'colvis' ,'text'      => '<i class="fa fa-eye-slash" style="font-size:18px;color:red"></i>'. __('site.ex_colvis')],
                    ['extend' => 'pageLength' ],
                    ['extend' => 'csv', 'exportOptions'=>['columns'=>':visible'] ,'text' => '<i class="fa fa-file" style="font-size:18px;color:#cc5200"></i> ' . trans('site.ex_csv')],
                    ['extend' => 'excel','exportOptions'=>['columns'=>':visible'] , 'text' => '<i class="fa fa-file-excel-o" style="font-size:18px;color:green"></i> ' . trans('site.ex_excel')],
                    ['extend' => 'pdf','exportOptions'=>['columns'=>':visible'] , 'className' => 'btn btn-primary  ' , 'text' => '<i class="fa fa-file-pdf-o" style="font-size:18px;color:red"></i> ' . trans('site.ex_pdf')],
                    ['extend' => 'copy', 'exportOptions'=>['columns'=>':visible'] , 'text' => '<i class="fa fa-copy" style="font-size:18px;color:blue"></i> ' . trans('site.ex_copy')],

                    //['extend' => 'reload'],

                    
                ],
                'initComplete' => " function () {
		            this.api().columns([2,3]).every(function () {
		                var column = this;
		                var input = document.createElement(\"input\");
		                $(input).appendTo($(column.footer()).empty())
		                .on('keyup', function () {
		                    column.search($(this).val(), false, false, true).draw();
		                });
		            });
                }",
                'language'         => datatable_lang(),
                

            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'  => 'id',
                'data'  => 'id',
                'title' => 'ID',
            ], [
                'name'  => 'emp_name',
                'data'  => 'emp_name',
                'title' => "اسم الموظف",
            ],
            [
                'name'  => 'national_num',
                'data'  => 'national_num',
                'title' => 'الرقم القومي',
            ],


            [
                'name'  => 'adress',
                'data'  => 'adress',
                'title' => 'العنوان',
            ],


            [
                'name'  => 'phone',
                'data'  => 'phone',
                'title' => 'التلفون',
            ],[
                'name'       => 'image',
                'data'       => 'image',
                'title'      => 'صوره الموظف',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],

            [
                'name'       => 'edit',
                'data'       => 'edit',
                'title'      => 'Edit',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ], [
                'name'       => 'delete',
                'data'       => 'delete',
                'title'      => 'Delete',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
