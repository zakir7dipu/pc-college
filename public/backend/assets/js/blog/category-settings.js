(function($) {
    "use strict";
    $('#addBlogCategoryBtn').on('click', function (){
        $.ajax({
            type: 'get',
            url: '/admin/blog/category/create',
            success:function (data){
                $('#blogCategoryModal').modal('show').find('.modal-content').empty().append(data);
            }
        })
    });

    $('.blogCategoryEditBtn').on('click', function (){
        $.ajax({
            type: 'get',
            url: '/admin/blog/category/'+$(this).attr('datasrc'),
            success:function (data){
                // console.log(data)
                $('#blogCategoryModal').modal('show').find('.modal-content').empty().append(data);
            }
        })
    });

    $('.blogCategoryActivationBtn').on('click', function (){
        $.ajax({
            type: 'get',
            url: '/admin/blog/category/'+$(this).attr('datasrc')+'/edit',
            success:function (data){
                if (data.status){
                    toastr.success(data.message)
                }else {
                    toastr.warning(data.message)
                }
            }
        })
    });

    $('.blogCategoryDestroyBtn').on('click', function(){
        swal({
            title: "Are you sure?",
            text: "Once you delete, You can not recover this blog category and related files.",
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
                $(this).find('.deleteForm').submit();
            }
        });
    })
})(jQuery);
