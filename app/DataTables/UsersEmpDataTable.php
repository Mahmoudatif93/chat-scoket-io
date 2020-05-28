<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class UsersEmpDataTable  extends DataTable
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
                return '<img src="'. asset('public/uploads/images/user_images/' . $user->user_img) .'" style="width: 70px; height: 70px;" class="img-thumbnail" alt="">';
            })

            ->addColumn('delete', function($user){

                $html = '<form style="margin-bottom: 0"  method="post" action="' . route('usersemps.destroy', $user->id) . '">';
                $html .= csrf_field() . method_field('delete');
                $html .= '<button  type="submit" class="btn btn-danger btn-sm delete">' . __('site.delete') . '</button>';
                $html .= '</form>';

                return $html;

            })
            ->addColumn('edit', function($user){

                return '<a href="'.route('usersemps.edit',$user->id).'" class="btn btn-info edit"><i class="fa fa-edit"></i></a>';
            })
            ->addColumn('type', function($user){
                if($user->hasRole('super_admin'))
                    $html = 'مدير على النظام';
                else
                $html = 'مدير';    
                return $html;
			})
            ->rawColumns([
                'image',
                'delete',
                'edit',
                'type',
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
        return User::query()->where('role_id_fk', 3)->where('employee_id','!=', 0);
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
                    ['extend' => 'csv', 'exportOptions'=>['columns'=>':visible'] ,'className' => 'btn btn-primary ', 'text' => '<i class="fa fa-file" style="font-size:18px;color:#cc5200"></i> ' . trans('site.ex_csv')],
                    ['extend' => 'excel','exportOptions'=>['columns'=>':visible'] , 'className' => 'btn btn-primary ', 'text' => '<i class="fa fa-file-excel-o" style="font-size:18px;color:green"></i> ' . trans('site.ex_excel')],
                    ['extend' => 'pdf','exportOptions'=>['columns'=>':visible'] , 'className' => 'btn btn-primary  ' , 'text' => '<i class="fa fa-file-pdf-o" style="font-size:18px;color:red"></i> ' . trans('site.ex_pdf')],
                    ['extend' => 'copy', 'exportOptions'=>['columns'=>':visible'] ,'className' => 'btn btn-primary ' , 'text' => '<i class="fa fa-copy" style="font-size:18px;color:blue"></i> ' . trans('site.ex_copy')],

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
                'name'  => 'name',
                'data'  => 'name',
                'title' => "اسم الموظف",
            ],[
                'name'  => 'email',
                'data'  => 'email',
                'title' => 'الايميل',
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
            ],[
                'name'       => 'type',
                'data'       => 'type',
                'title'      => 'النوع',
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
