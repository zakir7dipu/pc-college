(function ($) {
    "use script";
    //image uploader
    let columnImg = document.querySelectorAll('.column_img');
    Array.from(columnImg).map((item, key) => {
        $(`#columnImg${key}`).imageUploader({
            imagesInputName: 'icon',
            maxFiles: 1,
        });
    });

    // section activation
    $('.activeInfoSection').on('change', function () {
        $.ajax({
            type: 'get',
            url: '/admin/widget/info-section/info-section-Activation',
            success:function (data){
                toastr[data.status](data.message);
                if(data.status != 'success'){
                    $('#infoSectionFormContainer').addClass('d-none')
                }else{
                    $('#infoSectionFormContainer').removeClass('d-none')
                }
            }
        })
    })
})(jQuery);
