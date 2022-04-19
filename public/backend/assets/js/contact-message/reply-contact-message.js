(function ($) {
    "use script";
    const replyBtn = document.querySelectorAll('.contactMessageReplyBtn');
    Array.from(replyBtn).map((item, key) => {
        item.addEventListener('click',() => {
            getMessage(item.getAttribute('data-id'));
        })
    });

    const getMessage = (message) => {
        $.ajax({
            type: 'get',
            url: `/admin/contact-message/${message}`,
            success:function (data) {
                messageWindow(data);
            }
        })
    };

    const messageWindow = (data) => {
        // console.log();
        // return;
        let form = document.getElementById('replyMailModal').querySelector('form');
        let submitBtn = document.getElementById('replyMailModal').querySelector('.submitBtn');
        form.querySelector('input[name="to_email"]').value = data.email;
        form.querySelector('textarea[name="message"]').innerHTML = data.contact_message;
        if (!data.reply_message){
            form.action = data.url;
            form.querySelector('textarea[name="message_text"]').removeAttribute('readonly');
            form.querySelector('textarea[name="message_text"]').innerHTML = '';
            form.parentElement.parentElement.querySelector('#replyMailModalLongTitle').innerHTML = 'Reply Mail';
            form.parentElement.parentElement.querySelector('.submitBtn').classList.remove('d-none');
            $('#replyMailModal').modal('show');
            submitBtn.addEventListener('click', () => {
                form.submit();
            })
        }else {
            form.action = 'javascript:void(0)';
            form.querySelector('textarea[name="message_text"]').setAttribute('readonly','readonly');
            form.querySelector('textarea[name="message_text"]').innerHTML = data.reply_message.message;
            form.parentElement.parentElement.querySelector('#replyMailModalLongTitle').innerHTML = 'View Mail';
            form.parentElement.parentElement.querySelector('.submitBtn').classList.add('d-none');
            $('#replyMailModal').modal('show');
        }
    };
})(jQuery);
