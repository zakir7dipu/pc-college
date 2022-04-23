(function ($) {
    "use script";
    /* =============== DEMO =============== */
    // menu items
    var arrayjson;
    $.ajax({
        type: 'get',
        url: '/admin/settings/menu/create',
        success:function (data){
            console.log(data)
            arrayjson = data;
            memuBulder(arrayjson)
        }
    })

    function memuBulder(arrayjson) {
        // icon picker options
        var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
        // sortable list options
        var sortableListOptions = {
            placeholderCss: {'background-color': "#cccccc"}
        };

        var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
        editor.setForm($('#frmEdit'));
        editor.setUpdateButton($('#btnUpdate'));
        editor.setData(arrayjson);
        $('#btnReload').on('click', function () {
            editor.setData(arrayjson);
        });

        $('#btnOutput').on('click', function () {
            var str = editor.getString();
            // $("#out").text(str);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // console.log(str);
            // return
            $.ajax({
                type: 'post',
                url: '/admin/settings/menu',
                data: {
                    'items': str
                },
                success: function (data) {
                    setTimeout(()=>{
                        if (data.alert_type == 'success'){
                            location.reload();
                        }
                    },1000);

                }
            })

        });

        $("#btnUpdate").click(function () {
            editor.update();
        });

        $('#btnAdd').click(function () {
            editor.add();
        });
    }
    /* ====================================== */

    /** PAGE ELEMENTS **/
    // $('[data-toggle="tooltip"]').tooltip();
    // $.getJSON( "https://api.github.com/repos/davicotico/jQuery-Menu-Editor", function( data ) {
    //     $('#btnStars').html(data.stargazers_count);
    //     $('#btnForks').html(data.forks_count);
    // });
})(jQuery);
