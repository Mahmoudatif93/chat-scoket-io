@if (session('success')||session('error'))
<?php $msg = session()->has('success') ? 'success':'error';?>
<script>
    new Noty({
        type: '{{$msg}}'
        , layout: 'topRight'
        , text: '{{ session("$msg") }}'
        , timeout: 2000
        , killer: true
    }).show();

</script>

@endif


<script>
    $('body').on('click', '.delete', function(e) {
        e.preventDefault();
        var that = $(this);

        e.preventDefault();

        var n = new Noty({
            text: "@lang('site.confirm_edit')"
            , type: "warning"
            , killer: true
            , buttons: [
                Noty.button("@lang('site.yes') ", 'btn btn-success mr-2', function() {
                    that.closest('form').submit();
                }),

                Noty.button("@lang('site.no') ", 'btn btn-primary mr-2', function() {
                    n.close();
                })
            ]
        });

        n.show();
    }); //end of delete

    $('body').on('click', '.edit', function(e) {
        let that = $(this);
        e.preventDefault();
        let n = new Noty({
            theme: 'metroui'
            , text: "@lang('site.confirm_edit')"
            , layout: 'topCenter'
            , type: "info"
            , killer: true
            , buttons: [
                Noty.button("@lang('site.yes') ", 'btn btn-success btn-space m-2', function() {
                    window.open($(that).attr("href"));
                    n.close();
                })

                , Noty.button("@lang('site.no') ", 'btn btn-danger btn-space m-2', function() {
                    n.close();
                })
            ]

            //End of button
        });
        n.show();
    }); //end of delete

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#'+$(input).attr("data-view")).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    CKEDITOR.config.language =  "{{ app()->getLocale() }}";
</script>
