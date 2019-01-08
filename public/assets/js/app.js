$('.btn-delete-keranjang').on('click', function(){
    var csrf_token = $('meta[name="csrf-token"]').attr('content'),
        id = $(this).attr('data-id'),
        url = $('#ch').attr('href');
      $.ajax({
          url : url + '/cart/' +id,
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function (data) {
              location.reload();
              console.log(data);
          },
      });
});

$('.btn-bayar').on('click', function(){
    var kode = $('#kode').text(),
        totalbayar = $('#totalbayar').attr('total'),
        url = $('#btn-bayar').attr('href');

    alert("Lanjut ke Pembayaran?");
});

$(window).on('load', function(){
    $('#uks').hide(); $('#ukm').hide(); $('#ukl').hide(); $('#ukxl').hide(); $('#ukinput').hide();
    var total = $('#total-harga-cart').text(),
        status = $('#status-transaksi').attr('status');
    if (total == 0) {
        $('#btn-checkout').hide(); $('#kode-unik').hide(); $('#total-bayar').hide(); 
        $('#button-bayar').hide(); $('.table-cart').hide();
        $('#cart-empty').text("Keranjang kosong"); 
        if (status > 0) {
            $('#pembayaran-kosong').hide();
            $('#text-pembayaran-kosong').text("Tidak ada yang harus dibayar"); 
        }else{
            $('#pembayaran-kosong').show();
        }
    }else{
        $('#btn-checkout').show();  
        if (status > 0) {
            $('#pembayaran-kosong').hide();
            $('#text-pembayaran-kosong').text("Tidak ada yang harus dibayar");
        }else{
            $('#text-pembayaran-kosong').hide();
            $('#pembayaran-kosong').show();
        }  
    }
    

});

$("#uk").on('change', function(){
    switch ($(this).val()) {
        case '':
           $('#uks').hide(); $('#ukm').hide(); $('#ukl').hide(); $('#ukxl').hide(); $('#ukinput').hide();
           break;
        case 'S':
            var val = $("#uks").attr("max");
            // $("#push").html(val);
            $("#ukinput").attr("max", val);
            $('#ukinput').show();
           break;
        case 'M':
            var val = $("#ukm").attr("max");
            // $("#push").html(val);
            $("#ukinput").attr("max", val);
            $('#ukinput').show();
           break;
        case 'L':
            var val = $("#ukl").attr("max");
            // $("#push").html(val);
            $("#ukinput").attr("max", val);
            $('#ukinput').show();
           break; 
        case 'XL':
            var val = $("#ukxl").attr("max");
            // $("#push").html(val);
            $("#ukinput").attr("max", val);
            $('#ukinput').show();
           break; 
   }
});

$('body').on('click', '.modal-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    // $('#modal-title').text(title);
    // $('#modal-btn-save').removeClass('hide')
    // .text(me.hasClass('edit') ? 'Update' : 'Create');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) { 
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});

$('#modal-btn-save').click(function (event) {
    event.preventDefault();

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]') == undefined ? 'POST' : 'PUT';

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');

    $.ajax({
        url : url,
        method: method,
        data : form.serialize(),
        success: function (response) {
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#kemeja-table').DataTable().ajax.reload();
            $('#kain-table').DataTable().ajax.reload();

        },
        error : function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block"><strong>' + value + '</strong></span>');
                });
            }
        }
    })
});

$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: 'Are you sure want to delete ' + title + ' ?',
        text: 'You won\'t be able to revert this!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function (response) {
                    $('#kain-table').DataTable().ajax.reload();
                    swal({
                        type: 'success',
                        title: 'Success!',
                        text: 'Data has been deleted!'
                    });
                },
                error: function (xhr) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });
                }
            });
        }
    });
});

$('body').on('click', '.btn-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').addClass('hide');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});
