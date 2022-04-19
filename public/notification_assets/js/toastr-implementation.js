(function ($) {
    "use script";
    const sessionHasMessage = document.getElementById('sessionHasMessage');
    const sessionHasError = document.getElementById('sessionHasError');

    if (sessionHasMessage){
        let type = sessionHasMessage.querySelector('.sessionMessageType');
        let message = sessionHasMessage.querySelector('.sessionMessage');
        switch (type.value) {
            case 'info':
                toastr.info(message.value);
                break;

            case 'warning':
                toastr.warning(message.value);
                break;

            case 'success':
                toastr.success(message.value);
                break;

            case 'error':
                toastr.error(message.value);
                break;
        }
    }

    if(sessionHasError){
        let message = sessionHasError.querySelectorAll('.sessionMessage');
        Array.from(message).map((item, key) => {
            console.log(item);
            toastr.error(item.value);
        })
    }
})(jQuery);
