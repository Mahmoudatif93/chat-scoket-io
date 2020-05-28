<?php

if (!function_exists('notify_msg')) {
    function notify_msg($type,$text)
    {
        session()->flash($type, $text);    
    }
}

if (!function_exists('url_image')) {
    function url_image($path)
    {
        return asset('public/uploads/images/' . $path);
    }
}

if (!function_exists('isError')) {
    function isError($errors, $name){
        if($errors->has($name)){
            return   '<span class="focus-input100" data-placeholder="&#xf207;" role="alert"></span>'.
                     '<strong style="color: red;font-size: larger;">'.$errors->first($name).'</strong>';                    
        }
    }
}



if (!function_exists('datatable_lang')) {
    function datatable_lang()
    {
        return [
            'sProcessing' => trans('site.sProcessing'),
            'sLengthMenu' => trans('site.sLengthMenu'),
            'sZeroRecords' => trans('site.sZeroRecords'),
            'sEmptyTable' => trans('site.sEmptyTable'),
            'sInfo' => trans('site.sInfo'),
            'sInfoEmpty' => trans('site.sInfoEmpty'),
            'sInfoFiltered' => trans('site.sInfoFiltered'),
            'sInfoPostFix' => trans('site.sInfoPostFix'),
            'sSearch' => trans('site.sSearch'),
            'sUrl' => trans('site.sUrl'),
            'sInfoThousands' => trans('site.sInfoThousands'),
            'sLoadingRecords' => trans('site.sLoadingRecords'),
            'oPaginate' => [
                'sFirst' => trans('site.sFirst'),
                'sLast' => trans('site.sLast'),
                'sNext' => trans('site.sNext'),
                'sPrevious' => trans('site.sPrevious'),
            ],
            'oAria' => [
                'sSortAscending' => trans('site.sSortAscending'),
                'sSortDescending' => trans('site.sSortDescending'),
            ],

        ];
    }
}
