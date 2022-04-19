(function ($){
    "use script";

    //image uploader
    $('.category-icon').imageUploader({
        imagesInputName: 'icon',
        maxFiles: 1,
    });

    //activation
    $(document).on('click', '.ecommerceCategoryActivationBtn', function () {
        var selected = $(this).attr('datasrc');
        var url = "/admin/e-commerce/category/"+selected;

        $.ajax({
            type:'get',
            url: url,
            success:function (data) {
                // do nothing;
                if (data.status){
                    toastr.success(data.message)
                }else {
                    toastr.warning(data.message)
                }
            }
        });
    });

    //get sub-category acording to category
    $('#category').on('change', function (){
        $.ajax({
            type:'get',
            url: '/admin/e-commerce/category-sub-category/'+$(this).val(),
            success:function (data) {
                $('#subCategory').empty().append(data);
            }
        });
    });

    if ($('#category').val()){
        $.ajax({
            type:'get',
            url: '/admin/e-commerce/category-sub-category/'+$('#category').val(),
            success:function (data) {
                $('#subCategory').empty().append(data);
                hasSubCategory();
            }
        });
    };

    const hasSubCategory = () =>{
        let subcategoryId =  $('#subCategory').attr('data-role');
        if (subcategoryId){
            let options = document.querySelector('#subCategory').getElementsByTagName('option');
            for (let o = 0; o < options.length; o++){
                if (options[o].getAttribute('value') == subcategoryId){
                    options[o].setAttribute('selected', 'selected');
                }
            }
        }
    };

    //delete category
    $(document).on('click', '.deleteCategoryBtn', deleteASingleRow);
    function deleteASingleRow(){
        swal({
            title: "Are you sure?",
            text: "Once you delete, You can not recover this category and related files.",
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
                $(this).find('form').submit();
            }
        });

    }
})(jQuery)
