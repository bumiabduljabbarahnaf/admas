(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

 // file name preview
 (function () {
    'use strict';
    $('.input-file').each(function () {
        var $input = $(this),
            $label = $input.next('.js-labelFile'),
            labelVal = $label.html();

        $input.on('change', function (element) {
            var fileName = '';
            if (element.target.value) fileName = element.target.value.split('\\').pop();
            fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label
                .removeClass('has-file').html(labelVal);
        });
    });
})();

// image preview
function tampilkanPreview(gambar, idpreview) {
    var gb = gambar.files;
    for (var i = 0; i < gb.length; i++) {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview = document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType)) {
            preview.file = gbPreview;
            reader.onload = (function (element) {
                return function (e) {
                    element.src = e.target.result;
                };
            })(preview);
            reader.readAsDataURL(gbPreview);
        } else {
            Swal.fire(
                'Tipe file tidak boleh',
                'Harus format gambar',
                'error'
            )
        }
    }
}

function reload(){
    $.confirm({
        title: '',
        content: 'Terdapat kesalahan saat pengiriman data, Segarkan halaman ini?',
        icon: 'icon icon-all_inclusive',
        theme: 'supervan',
        closeIcon: true,
        animation: 'scale',
        type: 'orange',
        autoClose: 'ok|10000',
        escapeKey: 'cancelAction',
        buttons: {   
            ok: {
                text: "ok!",
                btnClass: 'btn-primary',
                keys: ['enter'],
                action: function(){
                    document.location.reload();
                }
            },
            cancel: function(){
                console.log('the user clicked cancel');
            }
        }
    });
}