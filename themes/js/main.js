

var orderstate = 0;

if (orderstate == 0) {
	$(".button-content").html("Continue");
	$(".checkout-credit").hide();
	$("#mymodalclose").hide();
	$("#mymodalcancel").hide();
} 
var proprice=$('#hidproamt').val();
var shop = [
  {
    name: $('#hidproname').val(),
    price: Number(proprice),
    quantity: 0,
    description: ['','']
  }
  
];

var vm = new Vue({
  el: "#ordering",
  data: {
    items: [],
    shop: shop,
    showCart: false,
    verified: false     
  },
  computed: {
    total() {
      var total1 = 0;
      var roundedtotal1 = 0;
      for(var i = 0; i < this.items.length; i++) {  
        total1 += this.items[i].price;
         roundedtotal1 = Number((total1).toPrecision(5))
      }
      return roundedtotal1;
    },
    maintotal() {
      var total = 0;
      var total1 = 0;
      for(var i = 0; i < this.items.length; i++) {
        total1 += this.items[i].price;
      }
	    var discprice=$('#hiddiscamt').val();
		var shippprice=$('#hidshippamt').val();
        total1 += Number(shippprice);// adding up shipping price
		total1 -= Number(discprice);// Subtracting up discount price
        total = Number((total1).toPrecision(5));
		//alert(Number(discprice));
      return total;
    }
  },
  methods: {
    addToCart(item) {
		if(this.items.length<5){
      item.quantity += 1;
      this.items.push(item);
		}else{
		alert("Maximum quantity per order is 5 units");	
		}
    },
    removeFromCart(item) {
	if(this.items.length>1){	
      item.quantity -= 1;
      this.items.splice(this.items.indexOf(item), 1);
	  }else{
		alert("Minimum quantity per order is 1 unit");	
		}
    },
	manualrun(item) {
	  item.quantity += 1;
      this.items.push(item);
	  $( "#manualrun1" ).trigger( "click" );
    },
	manualrun1(item) {
	 item.quantity -= 1;
     this.items.splice(this.items.indexOf(item), 1);
    }
  }
});
$(document).ready(function() {
	  $( "#addbutton" ).trigger( "click" );

    
    $("#billing_country").change(function()
    {
        if($(this).find(":selected").data("number") === undefined)
        {
            $("#billing_country_code").attr("placeholder",  '-');
        }
        else
        {
            $("#billing_country_code").attr("placeholder",  $(this).find(":selected").data("number"));
			$("#billing_country_code_hid").attr("value",  $(this).find(":selected").data("number"));
        }
    });
	$("#shipping_country").change(function()
    {
        if($(this).find(":selected").data("othervalue") === undefined)
        {
            
        }
        else
        {
			$("#right_ship_price_swap").show();
			 $('#hidshippamt').val($(this).find(":selected").data("othervalue"));
			$("#ship-price").text('$'+$(this).find(":selected").data("othervalue"));
			$("#right_ship_price").text('$'+$(this).find(":selected").data("othervalue"));
			$("#ship_country").text($(this).find(":selected").data("othervalue1"));
			$( "#manualrun" ).trigger( "click" );
        }
    });
    
	$('.order-summary button').click(function(){
        
                    $('ul.order-tabs li').removeClass('current');
					$('.tab-content').removeClass('current');
					$('#tab2').addClass('current');
					$("#order-tab-2").addClass('current');
					$("#action_form").val('UPDATE');
					$(".checkout-credit").hide();
					$(".checkout-button").show();
					
					
	});
    $('#tab2').css({pointerEvents: "none"});
	$('#tab3').css({pointerEvents: "none"});
	$('ul.order-tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.order-tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	});
    
    $('.checkout-button').click(function(){
		var tab_id = $(this).attr('data-tab');
        //alert(tab_id);
		var tab1=$("#tab1").hasClass('current');
		var tab2=$("#tab2").hasClass('current');
		var tab3=$("#tab3").hasClass('current');
		var fndtab='';
		
		if($("#tab1").hasClass('current')){ fndtab=1 ;}
		else if($("#tab2").hasClass('current')){ fndtab=2 ;}
		else if($("#tab3").hasClass('current')){ fndtab=3 ;}
		else{ fndtab='0' ;}
		
		if(fndtab<3){
			if(fndtab==2){
				if(validform()){
					$('ul.order-tabs li').removeClass('current');
					$('.tab-content').removeClass('current');
					$('#tab'+fndtab).addClass('done');
					$("#tab"+fndtab+" .tab-number").html('<i class="ionicons ion-android-done"></i>');
					fndtab++;
					$('#tab'+fndtab).addClass('current');
					$("#order-tab-"+fndtab).addClass('current');
					$('#tab2').css({pointerEvents: "auto"});
					
							
							$.ajax({
							type: "POST",
							url: "retailpack/ajaxupdate",
							data: $('#billing-form, #shipping-form').serialize(),
							dataType: "html",
							beforeSend: function(xhr){	
							//document.getElementById('discount_msg').innerHTML='Updating..';
							$('.loading').show();
							},
							success: function(msg){
								$('.loading').hide();
							msg = msg.replace(/\s/g,'');
							if(msg=="DONE")
							{
							 $(".checkout-credit").show();
							 $(".checkout-button").hide();
							 $("#cusname").text($("#billing_name").val());
							 $("#cusemail").text($("#billing_email").val());
							 $("#cusmobile").text($("#billing_country_code_hid").val()+$("#billing_mobile_number").val());
							 
							 $("#cusaddress1").text($("#shipping_address1").val());
							 $("#cusaddress2").text($("#shipping_address2").val());
							 $("#cuscity").text($("#shipping_city").val());
							 $("#cusstate").text($("#shipping_state").val());
							 $("#cuspostcode").text($("#shipping_postcode").val());
							 $("#cuscountry").text($('#shipping_country').find(':selected').attr('data-othervalue1'));
							//document.getElementById('discount_msg').innerHTML='<span class="desc">Discount Price</span><span id="discount_value">'+msg+'</span>';
							
							}else{
							//document.getElementById('discount_msg').innerHTML='<span style="color:#FF0000">Code Not Valid</span></li>';
							
							}
							}
							
							});
				}else{
					
				}
			}else{
					$('ul.order-tabs li').removeClass('current');
					$('.tab-content').removeClass('current');
					$('#tab'+fndtab).addClass('done');
					$("#tab"+fndtab+" .tab-number").html('<i class="ionicons ion-android-done"></i>');
					fndtab++;
					$('#tab'+fndtab).addClass('current');
					$("#order-tab-"+fndtab).addClass('current');
					$('#tab2').css({pointerEvents: "auto"});
			}
		}
		
		//validform();
	});
   $('#adyen-encrypted-form').on('submit',(function(e) {
				e.preventDefault();
				var formData = new FormData(this);
				var quantity=$('#quantity').val();
				//formData.append('quantity', quantity);
				var inst = $('[data-remodal-id=modal]').remodal();
                    $.ajax({
							type: "POST",
							url: "redirecturl",
							data: formData,
							dataType: "json",
							cache:false,
							contentType: false,
							processData: false,
							beforeSend: function(xhr){	
							//document.getElementById('discount_msg').innerHTML='Updating..';
							inst.open();
		                    $('#paysubmit').hide();
							},
							success: function(msg){
							//msg = msg.replace(/\s/g,'');
							if(msg['status']=="DONE")
							{
								//alert("succ");
							 //$(".checkout-credit").show();
							//document.getElementById('discount_msg').innerHTML='<span class="desc">Discount Price</span><span id="discount_value">'+msg+'</span>';
							//$( "#mymodalclose" ).show();
							//$( "#mymodalcancel" ).show();
							//$( "#mymodalimg" ).hide();
							//$( "#mymodalcontent" ).text("Payment made sucessfully. Please check your email "+$("#billing_email").val()+" for more information");
							setTimeout(function(){ inst.close();}, 6000);
							window.location.href = "redirecturl";
							$("#thankyou_email").text($("#billing_email").val());
							$("#thankyou_amount").text(msg['amount']);
							$("#thankyou_invoice").text(msg['invoice']);
							$('.passed').show();
							$('.failed').hide();
							
							}else{
								//alert("fail");
							//document.getElementById('discount_msg').innerHTML='<span style="color:#FF0000">Code Not Valid</span></li>';
							//$( "#mymodalcontent" ).text("Payment failed <br> <br>"+msg);
							$('.passed').hide();
							$('.failed').show();
							setTimeout(function(){ inst.close(); }, 600);
							}
							}
							
							});
					
	})); 
$(document).on('closed', '.remodal', function (e) {
      $('.thank-you').show();
	  $('.order').hide();
});
$(document).on('cancellation', '.remodal', function () {
     $('.thank-you').show();
	 $('.order').hide(); 
});

});   
    
