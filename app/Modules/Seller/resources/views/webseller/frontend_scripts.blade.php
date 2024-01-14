<script type="text/javascript">

  $(document).ready(function() {

      $(".btn-image-plus").click(function(){ 
        var html = $(".clone").html();
        $(".increment-image").before(html);
      });

      $("body").on("click",".btn-image-plus-more",function(){ 
        $(this).parents(".control-group").remove();
      });

  });
	
	$(document).delegate('#product_form_basic_info','submit',function () {
      
       var data = $(this).serializeArray();
       var product_id = $('#product_id').val();

        $.ajax({
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url: '{{ url("seller-basic-info-add") }}'+'/'+product_id,
            method: 'patch',
            data: data,
            dataType: "json",
            success:function(data){
              
              alert(data.message);

            }
        });

      return false;
    }); 


    $(document).delegate('#product_description','submit',function () {

     var data = $(this).serializeArray();
     var product_id = $('#product_id').val();

     $.ajax({
      headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
      url: '{{ url("seller-description-update") }}'+'/'+product_id,
      type: 'patch',
      data: data,
      dataType: "json",
            success:function(data){
            
                if(data.result=="success")
                {                  
                  var priority = 'success';
                  var title    = data.result;
                  var message  = data.message;
                  alert(message);
                }
                else
                {
                    var priority = 'danger';
                    var title    = data.result;
                    var message  = data.message;
                    alert(message);
                }
            }
        });
     return false;
   });

    //product attribute form
    $(document).delegate('#product_attribute_form','submit',function () {
       var data=$(this).serializeArray();
       var product_id=$('#product_id').val();

       $.ajax({
         headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
         url: '{{ url("seller-attribute-update") }}'+'/'+product_id,
         type: 'patch',
         data: data,
         dataType: "json",
         success:function(data){
              if(data.result=="success"){
                      
                  var priority = 'success';
                  var title    = data.result;
                  var message  = data.message;

                  alert(message);

                }else{
                  var priority = 'danger';
                  var title    = data.result;
                  var message  = data.message;

                  alert(message)
                }
            }
       });
        return false;
    });


    //product shippings form
    $(document).delegate('#product_shipping_form','submit',function () {
       var data=$(this).serializeArray();
       var product_id=$('#product_id').val();

       $.ajax({
         headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
         url: '{{ url("seller-product-shipping-update") }}'+'/'+product_id,
         type: 'patch',
         data: data,
         dataType: "json",
         success:function(data){
              if(data.result=="success"){
                      
                  var priority = 'success';
                  var title    = data.result;
                  var message  = data.message;

                  alert(message);

                }else{
                  var priority = 'danger';
                  var title    = data.result;
                  var message  = data.message;

                  alert(message)
                }
            }
       });
        return false;
    });

    //product coupon form
    $(document).delegate('#product_coupon_form','submit',function () {
       var data=$(this).serializeArray();
       var product_id=$('#product_id').val();

       $.ajax({
         headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
         url: '{{ url("seller-product-coupon-update") }}'+'/'+product_id,
         type: 'patch',
         data: data,
         dataType: "json",
         success:function(data){
              if(data.result=="success"){
                      
                  var priority = 'success';
                  var title    = data.result;
                  var message  = data.message;

                  alert(message);

                }else{
                  var priority = 'danger';
                  var title    = data.result;
                  var message  = data.message;

                  alert(message)
                }
            }
       });
        return false;
    });


    function DeleteImage(id) {

      $.confirm({
        title:'Confirm!',
        content:'<b style="color:red">Are Your Confirm To Delete ?</b>',
        theme: 'modern',
        closeIcon: true,
        animation: 'scale',
        type: 'red',
        buttons:{
          ok:function() {
            $.ajax({
              url: "{{URL::to('seller-image-delete')}}/"+id,
              type: 'GET',
              data: {},
              success:function(data) {
                if(data=="true"){
                  $.alert({
                    title: 'Success !',
                    content: '<b style="color:green">Image Deleted Successfully</b>',
                    autoClose: 'ok|2000',
                  });
                  $('#parent-'+id).fadeOut();
                }else if(data=="false"){
                  $.alert({
                    title: 'Whoops !',
                    content: '<b style="color:green">Something Went Wrong!!</b>',
                    autoClose: 'ok|2000',
                  });
                }
              }
            });

          },
          close:function() {

          }
        },
      });

    }

    $(document).delegate('#seoform','submit',function () {

     var data = $(this).serializeArray();
     var product_id = $('#product_id').val();

     $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("seller-seo-update") }}'+'/'+product_id,
        type: 'patch',
        data: data,
        dataType: "json",
            success:function(data){
            
                if(data.result=="success")
                {
                  
                  var priority = 'success';
                  var title    = data.result;
                  var message  = data.message;
                  alert(message);
                }
                else
                {
                    var priority = 'danger';
                    var title    = data.result;
                    var message  = data.message;
                    alert(message);
                }
            }
        });
     return false;
   }); 


    $(document).delegate('#product_category_form','submit',function () {

     var data = $(this).serializeArray();
     var product_id = $('#product_id').val();


     $.ajax({
      headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
      url: '{{ url("seller-category-update") }}'+'/'+product_id,
      type: 'patch',
      data: data,
      dataType: "json",
            success:function(data){
            
                if(data.result=="success")
                {
                  
                  var priority = 'success';
                  var title    = data.result;
                  var message  = data.message;
                  alert(message);
                }
                else
                {
                    var priority = 'danger';
                    var title    = data.result;
                    var message  = data.message;
                    alert(message);
                }
            }
        });
     return false;
   }); 

   $(document).delegate('.product_attribute_form','submit',function () {
   var data=$(this).serializeArray();
   var product_id=$('#product_id').val();

   $.ajax({
     headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
     url: '{{ url("seller-attribute-update") }}'+'/'+product_id,
     type: 'patch',
     data: data,
     dataType: "json",
     success:function(data){
          if(data.result=="success"){
                  
              var priority = 'success';
              var title    = data.result;
              var message  = data.message;

            }else{
                    var priority = 'danger';
                    var title    = data.result;
                    var message  = data.message;

                }
            }
   });
    return false;
});  


 $(document).delegate('#inventory_form','submit',function () {
       var data=$(this).serializeArray();
       var product_id=$('#product_id').val();

       $.ajax({
         headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
         url: '{{ url("seller-inventory-update") }}'+'/'+product_id,
         type: 'patch',
         data: data,
         dataType: "json",
         success:function(data){
              if(data.result=="success"){
                      
                  var priority = 'success';
                  var title    = data.result;
                  var message  = data.message;
                  alert(message);
                  
                }else{
                        var priority = 'danger';
                        var title    = data.result;
                        var message  = data.message;
                        alert(message);
                    }
                }
       });
        return false;
    });  


</script>