$(function () {
    $('.contact-form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();

        if (form.parsley().isValid()){
            var originalFormHtml = form.html();
            var formData = form.serialize();
            form.html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');

            $.ajax({
                type: 'POST',
                url: form.attr('action'), // Your form script
                data: formData,
                success: function(data) {
                    form.fadeOut(500, function(){
                        form.html(data.message).fadeIn();
                    });
                },
                error: function(data) {
                    form.fadeOut(500, function() {
                        form.html(originalFormHtml).fadeIn();
                    });
                }
            });
        }
    });
});

