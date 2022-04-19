function img_pathUrl(input){
    $('#modalImageShow')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
}

(function ($) {
    "use script";
    let paymentBtns = document.querySelectorAll('.paymentBtn');
    Array.from(paymentBtns).map((item, key) => {
        item.addEventListener('click', (e) => {
            e.preventDefault();

            const moduleName = item.getAttribute('alt');
            if(moduleName === 'money_transfer') {
                // moneyTransferModal();
                // return;
                // if activate shurjaPay
                $('#preloadModal').modal('show');
                getForm(item, `${item.getAttribute('alt').replace('_', '')} Method`);
            } else {
                $('#preloadModal').modal('show');
                getForm(item, `${item.getAttribute('alt').replace('_', '')} Method`);
            }
        });
    });

    const getForm = (item, title) => {
        $.ajax({
            type: 'get',
            url: item.getAttribute('data-role'),
            success:function (data){
                createNewModel(title, data);
            }
        });
    };

    const moneyTransferModal = () => {
        swal({
            title: "Payment gateway!",
            text: "To add any payment gateway please contact with +8801764470022",
            icon: "warning",
            dangerMode: true,
            buttons: {
                confirm: {
                    text: "Ok",
                    value: true,
                    visible: true,
                    closeModal: true
                },
            },
        })
    };

    const createNewModel = (title, element) => {
        // create modal
        let modal = document.createElement('div');
        modal.className = 'modal fade';
        modal.id = 'cashOnDeliveryModal';
        modal.setAttribute('tabindex', '-1');
        modal.setAttribute('role', 'dialog');
        modal.setAttribute('aria-labelledby', 'exampleModalCenterTitle');
        modal.setAttribute('aria-hidden', 'true');
        document.querySelector('body').appendChild(modal);

        // create modal dialog box
        let modalDialog = document.createElement('div');
        modalDialog.className = 'modal-dialog modal-dialog-centered';
        modalDialog.setAttribute('role', 'document');
        modal.appendChild(modalDialog);

        // create modal content
        let modalContent = document.createElement('div');
        modalContent.className = 'modal-content';
        modalDialog.appendChild(modalContent);

        // create modal header and insert all elements
        let modalHeader = document.createElement('div');
        modalHeader.className = 'modal-header';
        modalContent.appendChild(modalHeader);

        let modalTitle = document.createElement('h5');
        modalTitle.className = 'modal-title';
        modalTitle.innerText = title;
        let modalCloseBtn = document.createElement('button');
        modalCloseBtn.type = 'button';
        modalCloseBtn.className = 'close';
        modalCloseBtn.setAttribute('data-dismiss', 'modal');
        modalCloseBtn.setAttribute('aria-label', 'Close');
        let icon = document.createElement('span');
        icon.setAttribute('aria-hidden', true);
        icon.innerHTML = "&times;";
        modalCloseBtn.appendChild(icon);

        modalHeader.appendChild(modalTitle);
        modalHeader.appendChild(modalCloseBtn);


        // modal body
        let modalBody = document.createElement('div');
        modalBody.className = 'modal-body';
        modalBody.innerHTML = element;
        modalContent.appendChild(modalBody);

        // modal footer
        let modalFooter = document.createElement('div');
        modalFooter.className = 'modal-footer';
        modalContent.appendChild(modalFooter);
        // modal footer close btn
        let modalFooterCloseBtn = document.createElement('button');
        modalFooterCloseBtn.type = 'button';
        modalFooterCloseBtn.className = 'btn btn-secondary rounded';
        modalFooterCloseBtn.setAttribute('data-dismiss', 'modal');
        modalFooterCloseBtn.innerText = 'Close';
        modalFooter.appendChild(modalFooterCloseBtn);
        // modal footer save btn
        let modalFooterSaveBtn = document.createElement('button');
        modalFooterSaveBtn.type = 'button';
        modalFooterSaveBtn.className = 'btn btn-danger rounded';
        // modalFooterSaveBtn.setAttribute('data-dismiss', 'modal');
        modalFooterSaveBtn.innerText = 'Save';
        modalFooter.appendChild(modalFooterSaveBtn);

        modalFooterSaveBtn.addEventListener('click', (e) => {
            e.preventDefault();
            modalFooterSaveBtn.parentElement.parentElement.querySelector('form').submit();
        });

        $(`#${modal.id}`).modal('show').on('hidden.bs.modal', function (e) {
            $(`#${modal.id}`).remove();
        }).on('shown.bs.modal', function () {
            $('#preloadModal').modal('hide');
        });
    }
})(jQuery);
