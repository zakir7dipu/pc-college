(function ($) {
    "use script";
    const adminUserAddBtn = document.querySelector('.adminUserAddBtn');
    const AdminUserDestroyBtn = document.querySelectorAll('.userDestroyBtn');
    adminUserAddBtn.addEventListener('click', (e) => {
        e.preventDefault();
        $('#userModalCenter').modal('show');
    });



    $('.userDestroyBtn').on('click', function () {
        swal({
            title: "Are you sure?",
            text: "Once you delete, You can not recover this user and related files.",
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
                console.log($(this).find('.deleteForm')[0]);
                $(this).find('.deleteForm').submit();
            }
        });
    });

})(jQuery);
