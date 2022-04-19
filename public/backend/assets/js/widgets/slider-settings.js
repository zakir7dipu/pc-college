(function ($) {
    "use script";
    //image uploader
    $('.slider_img').imageUploader({
        imagesInputName: 'image',
        maxFiles: 1,
    });

    //delete item
    $('.deleteSliderBtn').on('click', deleteASingleRow)
    function deleteASingleRow(){
        swal({
            title: "Are you sure?",
            text: "Once you delete, You can not recover this slider and related files.",
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
                // console.log($(this).find('form')[0])
                $(this).find('form').submit();
            }
        });

    }

    $('.sliderActivationBtn').on('change', function () {
        $.ajax({
            type: 'get',
            url: '/admin/widget/slider/'+$(this).attr('datasrc'),
            success:function (data) {
                toastr[data.alertType](data.message)
            }
        })
    })
})(jQuery);
