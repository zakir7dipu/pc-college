(function ($) {
    "use script";
    // productOrderApprovalForm
    const form = document.getElementById('productOrderApprovalForm');
    const select = form.querySelector('select');
    select.addEventListener('change', () => {
        form.submit();
    })
})(jQuery)
