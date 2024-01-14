<script type="text/javascript">

$(document).on('input', '.change_product_qty', function(){
    var product_qty = $(".change_product_qty").val();
    $('.qty_put').attr('product_quantity',product_qty)
})

$(document).delegate('.p_color_list','click',function () {
    var color = $( this ).val();
    var size = $('input[name=size]:checked').val();
    var set_data = size+"=="+color;

    $('#color').val(color);
    $(".qty_put").attr("product_color_size",set_data);
});

$(document).delegate('.p_size_list','click',function () {
    var size = $( this ).val();
    var color = $('input[name=color]:checked').val();
    var set_data = size+"=="+color;

    $('#size').val(size);
    $(".qty_put").attr("product_color_size",set_data);
});

$(document).delegate("#rating-form",'submit',function(e) {
  e.preventDefault();
  
  var url = jQuery(this).attr('action');

  var data = jQuery( this ).serializeArray();

  $.ajax({
      url: url,
      method: "POST",
      data: {_token: '{!! csrf_token() !!}', data: data},
      dataType: "json",
      beforeSend: function (xhr) {

      }
  }).done(function (response) {
      
      alert(response.message);

  }).fail(function (jqXHR, textStatus) {
      alert("Request failed: " + jqXHR.responseText);
  });

});

$(document).delegate(".add_to_cart_ajax",'click',function(e) {

      e.preventDefault();
      var product_id = jQuery(this).attr('product_id');
      var product_quantity = jQuery(this).attr('product_quantity');
      var url = jQuery(this).attr('data_href');
      var product_color_size = jQuery(this).attr('product_color_size');

      var color = $('#color').val();
      var size = $('#size').val();
      
      var slect_color_size = 'exists';

      if( color == 'color' || size == 'size'){
        if(color == 'color' && size == 'size'){
          if($("Request:radio[name='color']").is(":checked") && $("Request:radio[name='size']").is(":checked")){
            var slect_color_size = 'exists';
          }else{
            var slect_color_size = 'not_exists';
            $('#popup_modal .message-body').html('<h2>Please select color & size..</h2>');
            $('#popup_modal').modal('show');
          }
        }else if(color == 'color'){
          if($("Request:radio[name='color']").is(":checked")){
            var slect_color_size = 'exists';
          }else{
            var slect_color_size = 'not_exists'; 
            $('#popup_modal .message-body').html('<h2>Please select color..</h2>');
            $('#popup_modal').modal('show');
          }
        }else{
          if($("Request:radio[name='size']").is(":checked")){
            var slect_color_size = 'exists';
          }else{
            var slect_color_size = 'not_exists'; 
            $('#popup_modal .message-body').html('<h2>Please select size..</h2>');
            $('#popup_modal').modal('show');
          }
        }
      }


      if(slect_color_size == 'exists'){

          jQuery.ajax({
            url: url,
            method: "POST",
            data: {_token: '{!! csrf_token() !!}', product_id:product_id,product_quantity:product_quantity,product_color_size:product_color_size},
            dataType: "json",
            beforeSend: function (xhr) {

            }
        }).done(function (response) {

          jQuery('#cart_data_put').html(response.cart_body);
          jQuery('#total_item_put').html(response.total_item);        
          
          window.location.href = "{{ route('web.my.cart') }}";

        }).fail(function (jqXHR, textStatus) {
            alert("Request failed: " + jqXHR.responseText);
        });

      }

       

    return false;
});


$(document).delegate(".shop-cart-add",'click',function(e) {

      e.preventDefault();
      var product_id = jQuery(this).attr('product_id');
      var product_quantity = jQuery(this).attr('product_quantity');
      var url = jQuery(this).attr('data_href');
     
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {_token: '{!! csrf_token() !!}', product_id:product_id,product_quantity:product_quantity},
            dataType: "json",
            beforeSend: function (xhr) {

            }
        }).done(function (response) {

          jQuery('#cart_data_put').html(response.cart_body);
          jQuery('#total_item_put').html(response.total_item);        
          $('.sidebar-active').addClass('inside');
          $('.wrapper').addClass('overlay-active');
          // window.location.href = "{{ route('web.my.cart') }}";
          setTimeout(function() {
              $('.sidebar-active').removeClass('inside');
              $('.wrapper').removeClass('overlay-active');}, 2500); //25 sec

        }).fail(function (jqXHR, textStatus) {
            alert("Request failed: " + jqXHR.responseText);
        });

        

    return false;
});



$(document).delegate('.item-qty', 'change', function () {
        var data = [];
        $(document).find('.cart_item_tr').each(function (index, value) {
            var product_id = $(value).attr('product_id');
            var quantity = $(value).find('.item-qty').val();

            data.push({
                'product_id': product_id,
                'product_quantity': quantity
            })
        });


        var url = '{{ route('web.cart.update') }}';

        $.ajax({
            url: url,
            method: "POST",
            data: {_token: '{!! csrf_token() !!}', data: data},
            dataType: "json",
            beforeSend: function (xhr) {

            }
        }).done(function (response) {
            
            if(response.result == 'success')
            {
                location.reload();
            }

        }).fail(function (jqXHR, textStatus) {
            alert("Request failed: " + jqXHR.responseText);
        });

        return false;
    });

$(document).delegate('.coupon_btn', 'click', function () {
  var coupon_code = $('#coupon_code').val();
  if(coupon_code == ''){
    $('#popup_modal .message-body').html('<h2>Please put valid coupon code</h2>');
    $('#popup_modal').modal('show');
  }else{

    var url = '{{ route('web.cart.coupon') }}';

    $.ajax({
        url: url,
        method: "POST",
        data: {_token: '{!! csrf_token() !!}', coupon_code: coupon_code},
        dataType: "json",
        beforeSend: function (xhr) {

        }
    }).done(function (response) {
        
        if(response.result == 'success')
        {
            location.reload();
        }else{
          $('#popup_modal .message-body').html('<h2>'+response.message+'</h2>');
          $('#popup_modal').modal('show');
        }

    }).fail(function (jqXHR, textStatus) {
        alert("Request failed: " + jqXHR.responseText);
    });

  }
});

$(document).delegate('.transaction_btn', 'click', function () {
  var transaction_number = $('#transaction_number').val();
  if(transaction_number == ''){
    $('#popup_modal .message-body').html('<h2>Please enter transaction number</h2>');
    $('#popup_modal').modal('show');
  }else{

    var url = '{{ route('web.cart.payment.transaction') }}';

    var data = [];
    var order_id = $('#order_id').val();
    
    data.push({
        'transaction_number': transaction_number,
        'order_id': order_id
    })

    $.ajax({
        url: url,
        method: "POST",
        data: {_token: '{!! csrf_token() !!}', data: data},
        dataType: "json",
        beforeSend: function (xhr) {

        }
    }).done(function (response) {
        
      if(response.result == 'success')
      {
        window.location.replace(response.message);
      }else{
        $('#popup_modal .message-body').html('<h2>'+response.message+'</h2>');
        $('#popup_modal').modal('show');
      }

    }).fail(function (jqXHR, textStatus) {
        alert("Request failed: " + jqXHR.responseText);
    });

  }
});

$(document).delegate('.item-shipping', 'change', function () {
        var data = [];
        var item_shipping = $(this).val();
        var product_id = $(this).parent().parent().parent().attr('product_id');
        
        data.push({
            'product_id': product_id,
            'shipping_key': item_shipping
        })

        var url = '{{ route('web.cart.shipping.update') }}';

        $.ajax({
            url: url,
            method: "POST",
            data: {_token: '{!! csrf_token() !!}', data: data},
            dataType: "json",
            beforeSend: function (xhr) {

            }
        }).done(function (response) {
            
            if(response.result == 'success')
            {
                location.reload();
            }

        }).fail(function (jqXHR, textStatus) {
            alert("Request failed: " + jqXHR.responseText);
        });

        return false;
    });


    $(document).delegate('.remove_product_cart', 'click', function () {
        var product_id = $(this).attr('product_id');
        var url = '{{ route('web.cart.remove.item') }}';

        $.ajax({
            url: url,
            method: "POST",
            data: {_token: '{!! csrf_token() !!}', product_id: product_id},
            dataType: "json",
            beforeSend: function (xhr) {

            }
        }).done(function (response) {
            
            location.reload();
            
        }).fail(function (jqXHR, textStatus) {
            alert("Request failed: " + jqXHR.responseText);
        });

        return false;

    });


    $(document).delegate('.open-customer-edit-modal','click',function () {

          var url = $(this).attr('data-href');
          var id = '';

          $.ajax({
            url: url,
            method: "GET",
            data: {id:id},
            dataType: "json",
            beforeSend: function( xhr ) {

            }
          }).done(function( response ) {
            if(response.result == 'success'){

              $('.open_modal_update .modal-body').html(response.content);
              
              $('.open_modal_update').modal('show');

            }else{

            }
          }).fail(function( jqXHR, textStatus ) {

          });


          return false;


        });


$(document).delegate(".remove-product-mc",'click',function(e) {

      var product_id = jQuery(this).attr('product_id');

      var url = '{{ route('web.cart.remove.item.mc') }}';

        jQuery.ajax({
            url: url,
            method: "POST",
            data: {_token: '{!! csrf_token() !!}', product_id: product_id},
            dataType: "json",
            beforeSend: function (xhr) {

            }
        }).done(function (response) {
          
          if(response.result == 'success'){
            jQuery('#cart_data_put').html(response.cart_body);
            jQuery('#total_item_put').html(response.total_item);           
          } 

          if(response.result == 'error'){
            jQuery('#cart_data_put').html('');
            jQuery('#total_item_put').html('0');           
          }           
            
            
        }).fail(function (jqXHR, textStatus) {
            alert("Request failed: " + jqXHR.responseText);
        });
  });


$(document).delegate('.update-product-mc', 'change', function () {
    
    var product_id = jQuery(this).attr('product_id');
    var product_qty = jQuery(this).val();

    var data = [];
    
    data.push({
        'product_id': product_id,
        'product_quantity': product_qty
    })

    var url = '{{ route('web.cart.update.mc') }}';

    $.ajax({
        url: url,
        method: "POST",
        data: {_token: '{!! csrf_token() !!}', data: data},
        dataType: "json",
        beforeSend: function (xhr) {

        }
    }).done(function (response) {
        
      if(response.result == 'success')
      {
          jQuery('#cart_data_put').html(response.cart_body);
          jQuery('#total_item_put').html(response.total_item);           
      }

    }).fail(function (jqXHR, textStatus) {
        alert("Request failed: " + jqXHR.responseText);
    });

    return false;
});


$('.price-filter').click(function (index,value) {
     
    var price = $(this).val();
    $('#filter_price').val(price);
    $( "#submit_search_filter" ).submit();
    
});

$('.remove-price-filter').click(function (index,value) {
     
    $('#filter_price').val('');
    $( "#submit_search_filter" ).submit();
    
});

$('#sort_by').change(function (index,value) {

    var sort_by=$("#sort_by option:selected").val();
    $('#filter_sort_by').val(sort_by);
    
    $( "#submit_search_filter" ).submit();

});


$(document).delegate('.add_to_wishlist','click',function () {

    var url = jQuery(this).attr('data_href');
    var product_id = jQuery(this).attr('product_id');

    jQuery.ajax({
        url: url,
        method: "GET",
        data: {product_id:product_id},
        dataType: "json",
        beforeSend: function( xhr ) {
        }
    }).done(function( response ) {
        
        jQuery.noConflict();
        
        jQuery('#popup_modal .message-body').html('<h3>'+response.message+'</h3>');
        jQuery('#popup_modal').modal('show');


    }).fail(function( jqXHR, textStatus ) {

        $('#popup_modal .message-body').html('<h3>Please login your account to wishlist this item</h3>');
        $('#popup_modal').modal('show');
    });

    return false;
});

$('.raty-default').raty();

$(document).ready(function() {

    
  // Sidebar Menu  Dropdown

            var dropdown = document.getElementsByClassName("dropdown-btn");
            var i;

            for (i = 0; i < dropdown.length; i++) {
              dropdown[i].addEventListener("click", function() {
              this.classList.toggle("active");
              var dropdownContent = this.nextElementSibling;
              if (dropdownContent.style.display === "block") {
              dropdownContent.style.display = "none";
              } else {
              dropdownContent.style.display = "block";
              }
              });
            }

});

$(document).delegate(".shipping_cost_class",'click',function(e) {
    
    const  shipping_key = (Math.round(jQuery(this).attr('data') * 100) / 100).toFixed(2);
    var sub_total_amount = (Math.round(findReplace(jQuery('#sub-total-amount').html()) * 100) / 100).toFixed(2);
    var discount_amount = (Math.round(findReplace(jQuery('#discount-amount').html()) * 100) / 100).toFixed(2);
    jQuery('#total-shipping').html('৳ ' + shipping_key);
    var grand_total = (parseFloat(sub_total_amount) + parseFloat(shipping_key)) - parseFloat(discount_amount);
    jQuery('#total-amount').html('৳ ' + (Math.round(grand_total * 100) / 100).toFixed(2));
});

function findReplace(str){
  var res_dollar = str.replace("৳", "");
  var res_space = res_dollar.replace(",", "");
  var result = res_space.replace(" ", "");

  return result;
}
</script>
@yield('pageScript')