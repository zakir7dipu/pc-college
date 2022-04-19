(function ($) {
    "use script";

    //image uploader
    $('.product-images').imageUploader({
        imagesInputName: 'product_images',
        maxFiles: 5,
    });

    $('.imgCloseBtn').on('click', function (e){
        e.preventDefault();
        $.ajax({
            type:'delete',
            url:'/admin/e-commerce/product/image/'+$(this).parent().find('img').attr('data-role'),
            success:function (data){
                $(this).parent().remove();
                toastr.success('One product image has been deleted successfully');
            }
        })
    });
    $(document).on('click', '.ecommerceProductActivationBtn', function (){
        activation($(this).attr('datasrc'), $(this).attr('datatype'))
    });
    $(document).on('click', '.ecommerceFeaturedActivationBtn', function (){
        activation($(this).attr('datasrc'), $(this).attr('datatype'))
    });
    $(document).on('click', '.ecommerceNewArrivalActivationBtn', function (){
        activation($(this).attr('datasrc'), $(this).attr('datatype'))
    });
    $(document).on('click', '.ecommercePopularActivationBtn', function (){
        activation($(this).attr('datasrc'), $(this).attr('datatype'))
    });
    $(document).on('click', '.ecommerceBestsellerActivationBtn', function (){
        activation($(this).attr('datasrc'), $(this).attr('datatype'))
    });
    $(document).on('click', '.ecommerceTrendingActivationBtn', function (){
        activation($(this).attr('datasrc'), $(this).attr('datatype'))
    });
    const activation = (datasrc, datatype) => {
        $.ajax({
            type: 'post',
            url: '/admin/e-commerce/feature-activation/'+datasrc,
            data: {
                type: datatype,
            },
            success:function (data){
                toastr[data.alertType](data.message)
            }
        })
    };

    //get pro-category acording to sub-category
    $('#subCategory').on('change', function (){
        $.ajax({
            type:'get',
            url: '/admin/e-commerce/category-sub-category/'+$(this).val(),
            success:function (data) {
                console.log(data);
                $('#proCategory').empty().append(data);
            }
        });
    });

    if ($('#subCategory').val()){
        $.ajax({
            type:'get',
            url: '/admin/e-commerce/category-sub-category/'+$('#subCategory').val(),
            success:function (data) {
                $('#proCategory').empty().append(data);
                hasProCategory();
            }
        });
    }

    const hasProCategory = () => {
        let subcategoryId = $('#proCategory').attr('data-role');
        if (subcategoryId){
            let options = document.querySelector('#proCategory').getElementsByTagName('option');
            for (let o = 0; o < options.length; o++){
                if (options[o].getAttribute('value') == subcategoryId){
                    options[o].setAttribute('selected', 'selected');
                }
            }
        }
    };

    //delete category
    $(document).on('click', '.deleteProductBtn', deleteASingleRow);
    function deleteASingleRow(){
        swal({
            title: "Are you sure?",
            text: "Once you delete, You can not recover this Product and related files.",
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
