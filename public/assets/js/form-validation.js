(function($) {
  'use strict';
    // validate signup form on keyup and submit
   //  $.validator.addMethod("regex", function(value, element, regexpr) {
   //   return regexpr.test(value);
   // }, "Masukan Nama Pariwisata Dengan Benar.");

    $("#create-tours").validate({
      rules: {
        name: {
          required: true,
          minlength: 4
          // regex: /^[a-zA-Z\s]*$/
        },
        address: {
          required: true,
          minlength: 4
        },
        region: {
          required: true,
          minlength: 4
        },
        price: {
          required: true,
          minlength: 4
        },
        description: {
          required: true,
          minlength: 4
        },
        image: {
          required: true
        },
        panorama: {
          required: true
        },
        lat: {
          required: true
        },
        long: {
          required: true
        }
      },
      messages: {
        name: {
          required: "Masukan Nama Pariwisata",
          minlength: "Nama Pariwisata minimal 5 Karakter"
        },
        address: {
          required: "Masukan Alamat",
          minlength: "Alamat minimal 4 Karakter"
        },
        region: {
          required: "Masukan Kecamatan",
          // minlength: "Alamat minimal 4"
        },
        price: {
          required: "Masukan HTM",
          // minlength: "Alamat minimal 4"
        },
        description: {
          required: "Masukan Deskripsi",
          // minlength: "Alamat minimal 4"
        },
        image: {
          required: "",
        },
        panorama: {
          required: "",
        },
        lat: {
          required: "",
        },
        long: {
          required: "",
        }
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    $("#update-tours").validate({
      rules: {
        name: {
          required: true,
          minlength: 4
          // regex: /^[a-zA-Z\s]*$/
        },
        address: {
          required: true,
          minlength: 4
        },
        region: {
          required: true,
          minlength: 4
        },
        price: {
          required: true,
          minlength: 4
        },
        description: {
          required: true,
          minlength: 4
        },
        lat: {
          required: true
        },
        long: {
          required: true
        }
      },
      messages: {
        name: {
          required: "Masukan Nama Pariwisata",
          minlength: "Nama Pariwisata minimal 5 Karakter"
        },
        address: {
          required: "Masukan Alamat",
          minlength: "Alamat minimal 4 Karakter"
        },
        region: {
          required: "Masukan Kecamatan",
          // minlength: "Alamat minimal 4"
        },
        price: {
          required: "Masukan HTM",
          // minlength: "Alamat minimal 4"
        },
        description: {
          required: "Masukan Deskripsi",
          // minlength: "Alamat minimal 4"
        },
        lat: {
          required: "",
        },
        long: {
          required: "",
        }
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
})(jQuery);
