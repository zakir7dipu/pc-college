(function ($) {
    "use script";
    const phone = document.querySelector('#WAButton').getAttribute('datasrc');
    $('#WAButton').floatingWhatsApp({
        phone: phone, //WhatsApp Business phone number
        headerTitle: 'Chat with us on WhatsApp!', //Popup Title
        popupMessage: 'Hello, how can we help you?', //Popup Message
        showPopup: true, //Enables popup display
        buttonImage: '<img src="../../upload/settings/whatsapp.svg" />', //Button Image
        // headerColor: 'crimson', //Custom header color
        // backgroundColor: 'crimson', //Custom background button color
        position: "left" //Position: left | right

    });
})(jQuery);


