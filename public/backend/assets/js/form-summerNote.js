//---------------------------------------------------------------------------------------------
// - SUMMERNOTE INIT --------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
(function($)
{
    "use strict";
    $('textarea').summernote({
        placeholder: 'Wright your content................',
        minHeight: 350,
        maxHeight: 400,
        styleTags: ['p', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
        fontNames: ['Arial', 'Roboto', 'Times New Roman', 'Verdana'],
        fontNamesIgnoreCheck: ['Roboto'],
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    $('#shortDescription').summernote('destroy');
})(jQuery);

