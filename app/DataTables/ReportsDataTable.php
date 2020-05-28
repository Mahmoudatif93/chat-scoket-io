<?php

namespace App\DataTables;

use App\MiseFound;
use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Support\Facades\DB;

class ReportsDataTable  extends DataTable
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
                return '<img src="'. asset('public/uploads/images/missing_found/' . $user->img) .'" style="width: 70px; height: 70px;" class="img-thumbnail" alt="">';
            })
            /*->addColumn('delete', function($user) {
                return '<a onclick="delete_gov(this)" data-url="'.route('reports.destroy',$user->id).'" data-toggle="modal" data-target="#del_city"><i class="fa fa-trash"></i></a>';
            })*/
            ->addColumn('delete', function($user){
                $html = '<form style="margin-bottom: 0"  method="post" action="' . route('reports.destroy', $user->id) . '">';
                $html .= csrf_field() . method_field('delete');
                $html .= '<button  type="submit" class="btn btn-danger btn-sm delete">' . __('site.delete') . '</button>';
                $html .= '</form>';

                return $html;
                
			})
            ->rawColumns([
                'image',
                'delete',
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
        //return User::query();

        //$q = DB::table('missing_found')
        $q =    MiseFound::query()
            ->leftJoin('users', 'users.id', '=', 'missing_found.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'missing_found.category_id_fk')
            ->leftJoin('countries as city', 'city.id', '=', 'missing_found.city_id_fk')
            ->leftJoin('countries as govern', 'govern.id', '=', 'missing_found.govern_id_fk')
            ->select('missing_found.*', 'users.name as u_name', 'categories.name as cat_name', 'city.title as city_title','govern.title as govern_title');

        if ((request()->has('report_with'))) {
            if (request()->has('month')) {
                $currnetData = $q->whereMonth('missing_found.created_at', '=', request('month'));
            }

            if (request()->has('year')) {
                $currnetData = $q->whereYear('missing_found.created_at', '=', request('year'));
            }

            if (request()->has('from') && request()->has('to')) {
                $currnetData = $q->whereBetween('missing_found.created_at', array(request('from'), request('to')));
            }


        }else if (request()->has('now')) {
            $currnetData = $q->whereDate('missing_found.created_at', '=', date('Y-m-d'));
        }
         else {
            $currnetData = $q;
        }
        return $currnetData;
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
                'name'  => 'u_name',
                'data'  => 'u_name',
                'title' => "الاسم",
            ], [
                'name'  => 'type',
                'data'  => 'type',
                'title' => "النوع",
            ]
            , [
                'name'  => 'cat_name',
                'data'  => 'cat_name',
                'title' => 'التصنيف',
            ], [
                'name'  => 'city_title',
                'data'  => 'city_title',
                'title' => 'المدينة',
            ], [
                'name'  => 'govern_title',
                'data'  => 'govern_title',
                'title' => 'المحافظة',
            ], [
                'name'       => 'image',
                'data'       => 'image',
                'title'      => 'الصورة',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ], [
                'name'       => 'delete',
                'data'       => 'delete',
                'title'      => 'حذف',
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
