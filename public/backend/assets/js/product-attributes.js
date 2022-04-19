(function ($){
    "use script";

    $('.addAttributBtn').on('click', function (){
        $(this).parent().parent().find('.appendInputs').append(
            '<div class="col-lg-6 col-md-12 form-group">\n' +
            '    <select class="attribute form-control">\n' +
            '        <option value="{{ null }}">Select One</option>\n' +
            '        <option value="color">Color</option>\n' +
            '        <option value="size">Size</option>\n' +
            '        <option value="close">Close</option>\n' +
            '    </select>\n' +
            '</div>');

        $(this).parent().parent().find('select').on('change', function (){
            $(this).parent().addClass('closeable-light');
            const validValue = ['color', 'size', 'close'];
            let value = $(this).val();
            if (!validValue.includes(value)){
                return;
            }else if(value === validValue[0]){
                $(this).parent().html(
                    '<i class="far fa-times-circle right-0 closeBtn" datatype="null"></i>\n'+
                    '<div class="row">\n' +
                    '    <div class="col-6">\n' +
                    '        <label>Color Name</label>\n' +
                    '        <input type="text" name="color_name[]" class="form-control" required>\n' +
                    '    </div>\n' +
                    '    <div class="col-6">\n' +
                    '        <label>Color Hex</label>\n' +
                    '        <input type="text" name="color_details[]" class="form-control" required>\n' +
                    '    </div>\n' +
                    // '    <div class="col-3">\n' +
                    // '        <label>Image</label>\n' +
                    // '        <input type="file" name="color_image[]">\n' +
                    // '    </div>\n' +
                    '</div>');
            }else if(value === validValue[1]){
                $(this).parent().html(
                    '<i class="far fa-times-circle right-0 closeBtn" datatype="null"></i>\n'+
                    '<div class="row">\n' +
                    '    <div class="col-6">\n' +
                    '        <label>Size Name</label>\n' +
                    '        <input type="text" name="size_name[]" class="form-control" required>\n' +
                    '    </div>\n' +
                    '    <div class="col-6">\n' +
                    '        <label>Dimension</label>\n' +
                    '        <input type="text" name="size_details[]" class="form-control" required>\n' +
                    '    </div>\n' +
                    // '    <div class="col-3">\n' +
                    // '        <label>Image</label>\n' +
                    // '        <input type="file" name="size_image[]">\n' +
                    // '    </div>\n' +
                    '</div>');
            }else if(value === validValue[2]){
                $(this).parent().remove();
            }

            $('.closeBtn').on('click', function (e){
                e.preventDefault();
                if ($(this).attr('datatype') !== 'null'){

                }else {
                    $(this).parent().remove();
                }
            });
        });
    });

    if ($('#getProductAllAttribute').attr('datasrc')){
        $.ajax({
            type: 'get',
            url: '/admin/e-commerce/product/'+$('#getProductAllAttribute').attr('datasrc'),
            success:function (data){
                viewColorAttributes(data.colors);
                viewSizeAttributes(data.sizes);

                $('.closeBtn').on('click', function (e){
                    e.preventDefault();
                    if ($(this).attr('datatype') !== 'null'){
                        $.ajax({
                            type: 'delete',
                            url: '/admin/e-commerce/product/atribute-item/'+$(this).attr('datatype'),
                            success:function (data){
                                $(this).parent().remove();
                                toastr.success('Attribute item has been deleted successfully');
                            }
                        })
                    }else {
                        $(this).parent().remove();
                    }
                });
            }
        })
    }

    const viewColorAttributes = data => {
        let container = document.querySelector('.appendInputs');

        Array.from(data).map(item => {
            let childContainer = document.createElement('div');
            childContainer.classList.add('col-lg-6', 'col-md-12', 'form-group', 'closeable-light');

            let closeBtn = document.createElement('i');
            closeBtn.setAttribute('datatype', item.id);
            closeBtn.classList.add('far', 'fa-times-circle', 'right-0', 'closeBtn');
            childContainer.appendChild(closeBtn);

            let row = document.createElement('div');
            row.classList.add('row');
            let inputBox = document.createElement('div');
            inputBox.classList.add('col-6');
            let labelName = document.createElement('label');
            labelName.innerHTML = 'Color Name';
            inputBox.appendChild(labelName);
            let inputName = document.createElement('input');
            inputName.type = 'text';
            inputName.name = 'color_name[]';
            inputName.className = 'form-control';
            inputName.required = true;
            inputName.value = item.name;
            inputBox.appendChild(inputName);
            row.appendChild(inputBox);

            let inputBox2 = document.createElement('div');
            inputBox.classList.add('col-6');
            let labelDetails = document.createElement('label');
            labelDetails.innerHTML = 'Color Hex';
            inputBox2.appendChild(labelDetails);
            let inputdetails = document.createElement('input');
            inputdetails.type = 'text';
            inputdetails.name = 'color_details[]';
            inputdetails.className = 'form-control';
            inputdetails.required = true;
            inputdetails.value = item.details;
            inputBox2.appendChild(inputdetails);
            row.appendChild(inputBox2);

            childContainer.appendChild(row);
            container.appendChild(childContainer);
        });
    }

    const viewSizeAttributes = data => {
        let container = document.querySelector('.appendInputs');

        Array.from(data).map(item => {
            let childContainer = document.createElement('div');
            childContainer.classList.add('col-lg-6', 'col-md-12', 'form-group', 'closeable-light');

            let closeBtn = document.createElement('i');
            closeBtn.classList.add('far', 'fa-times-circle', 'right-0', 'closeBtn');
            closeBtn.setAttribute('datatype', item.id);
            childContainer.appendChild(closeBtn);

            let row = document.createElement('div');
            row.classList.add('row');
            let inputBox = document.createElement('div');
            inputBox.classList.add('col-6');
            let labelName = document.createElement('label');
            labelName.innerHTML = 'Size Name';
            inputBox.appendChild(labelName);
            let inputName = document.createElement('input');
            inputName.type = 'text';
            inputName.name = 'size_name[]';
            inputName.className = 'form-control';
            inputName.required = true;
            inputName.value = item.name;
            inputBox.appendChild(inputName);
            row.appendChild(inputBox);

            let inputBox2 = document.createElement('div');
            inputBox.classList.add('col-6');
            let labelDetails = document.createElement('label');
            labelDetails.innerHTML = 'Dimension';
            inputBox2.appendChild(labelDetails);
            let inputdetails = document.createElement('input');
            inputdetails.type = 'text';
            inputdetails.name = 'size_details[]';
            inputdetails.className = 'form-control';
            inputdetails.required = true;
            inputdetails.value = item.details;
            inputBox2.appendChild(inputdetails);
            row.appendChild(inputBox2);

            childContainer.appendChild(row);
            container.appendChild(childContainer);
        });
    }
})(jQuery)
