(function($)
{
    "use strict";
    $('.supplier_bg_image').imageUploader({
        imagesInputName: 'logo',
        maxFiles: 1,
    });

    $('.supplierActivationBtn').on('click', function (){
        $.ajax({
            type: 'get',
            url: '/admin/supplier/'+$(this).attr('datasrc'),
            success:function (data){
                if (data.status){
                    toastr.success(data.message)
                }else {
                    toastr.warning(data.message)
                }

            }
        });
    });

    $('.sliderDestroyBtn').on('click', ()=>{
        swal({
            title: "Are you sure?",
            text: "Once you delete, You can not recover this supplier and related files.",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: true,
                confirm: {
                    text: "Delete",
                    value: true,
                    visible: true,
                    closeModal: true
                },
            },
        }).then((value) => {
            if(value){
                $('.sliderDestroyBtn').find('.deleteForm').submit();
            }
        });
    });
})(jQuery);
