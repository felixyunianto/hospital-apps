(function($) {
  'use strict';
  /*Summernote editor*/
  if ($("#description").length) {
    $('#description').summernote({
      placeholder: 'Masukan Deskripsi',
      height: 300,
      tabsize: 2,
      toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'italic', 'underline', 'clear']],
    ['fontname', ['fontname']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['insert', ['hr']],
  ],
    });
  }
})(jQuery);
