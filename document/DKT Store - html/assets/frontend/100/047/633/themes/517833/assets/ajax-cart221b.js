(function($) {
	$(document).ready(function() {
            t.init()
        });
	var t = {
			timeout: null,
            init: function() {                
				this.initDropDownCart();				
				this.initAddToCart();
				this.initProductAddToCart();
				this.initModal();
            },
			initDropDownCart: function() {				
				t.checkItemsInDropdownCart();
				$(".content-mini-cart .remove a").click(function(n) {
					n.preventDefault();
					var r = $(this).parents("li").attr("id");
					r = r.match(/\d+/g);
					Bizweb.removeItem(r, function(e) {
						t.doUpdateDropdownCart(e)
					})
				});
			},
			checkItemsInDropdownCart: function() {
                if ($(".content-mini-cart .has-items ul").children().length > 0) {					
                    $(".content-mini-cart .no-item").hide();
                    $(".content-mini-cart .has-items").show()
                } else {
                    $(".content-mini-cart .has-items").hide();
                	$(".content-mini-cart .no-item").show()
				}
            },
			 doAjaxAddToCart: function(n, r, i, s) {
					$.ajax({
						type: "POST",
						url: "/cart/add.js",
						data: "quantity=" + r + "&variantId=" + n,
						dataType: "json",
						success: function(n) {
							$(".ajax-success-modal").find(".ajax-product-title").text(i);
							$(".ajax-success-modal").find(".ajax-product-image").attr("src", s);					
							
							t.showModal(".ajax-success-modal");
							t.updateDropdownCart()
						},
						error: function(n, r) {						
							$('.ajax-error-message').text($.parseJSON(n.responseText).description);
							t.showModal('.ajax-error-modal');

						}
					})
				},
				updateDropdownCart: function() {
					Bizweb.getCart(function(e) {
						t.doUpdateDropdownCart(e)
					})
				},
		         doUpdateDropdownCart: function(n) {
					var r = '<li class="clearfix" id="item-{ID}"><div class="image"><a href="{URL}"><img src="{IMAGE}" alt="{TITLE}" title="{TITLE}" class="img-responsive"></a></div><div class="info"><h3><a href="{URL}">{TITLE}</a></h3><p>{QUANTITY} x {PRICE}</p></div><div class="remove"><a href="javascript:void(0);"><i class="fa fa-times"></i></a></div></li>';
					$(".mini-cart-count").text(n.item_count);
					$(".content-mini-cart .has-items .total-price").html(Bizweb.formatMoney(n.total_price, window.money_format));
					$(".content-mini-cart .has-items ul").html("");
					if (n.item_count > 0) {
						for (var i = 0; i < n.items.length; i++) {
							var s = r;
							s = s.replace(/\{ID\}/g, n.items[i].variant_id);
							s = s.replace(/\{URL\}/g, n.items[i].url);
							s = s.replace(/\{TITLE\}/g, n.items[i].name);
							s = s.replace(/\{VARIANT_TITLE\}/g, n.items[i].variant_title);
							s = s.replace(/\{QUANTITY\}/g, n.items[i].quantity);
							s = s.replace(/\{IMAGE\}/g, Bizweb.resizeImage(n.items[i].image, "small"));
							s = s.replace(/\{PRICE\}/g, Bizweb.formatMoney(n.items[i].price, window.money_format));
							$(".content-mini-cart .has-items ul").append(s)
						}
						$(".content-mini-cart .has-items .remove a").click(function(n) {
							n.preventDefault();
							var r = $(this).parents("li").attr("id");
							r = r.match(/\d+/g);
							Bizweb.removeItem(r, function(e) {
								t.doUpdateDropdownCart(e)
							})
						});

					}
					t.checkItemsInDropdownCart()
				},
				initProductAddToCart: function(){
				if ($('.product-add-to-cart').length > 0){
					$('.product-add-to-cart').click(function(n){
						n.preventDefault();
						if($(this).attr('disabled') != 'disabled'){
							
							var r = $(".product-form select[name=variantId]").val();
							if (!r){
								r = $(".product-form input[name=variantId]").val();								
							}
							var i = $(".product-form input[name=quantity]").val();
							if (!i) {
								i = 1
							}
							var s = $('.product-detail .top .info h1').text();							
							var o = $('#large-image').attr('src');
							t.doAjaxAddToCart(r,i,s,o)
						}
					})
				}
			},
			initAddToCart: function(){
				if ($('.add-cart').length > 0){
					$('.add-cart').click(function(n){
						n.preventDefault();
						if($(this).attr('disabled') != 'disabled'){
							var r = $(this).parents('.product-loop');
							var i = $(r).attr('id');
							i = i.match(/\d+/g);				
							
							var s = $('#product-actions-' + i + ' input[name=variantId]').val();							
							
							var o = $('#product-actions-' + i + ' input[name=quantity]').val();
							if (!o) {
								o = 1
							}
							
							var u = $(r).find('h3.name').text();
							
							var a = $(r).find('.image .img-responsive').attr('src');
							
							t.doAjaxAddToCart(s,o,u,a)
						}
					})
				}
			},
			showModal: function(n) {
				$(n).fadeIn(500);
				t.timeout = setTimeout(function() {
					$(n).fadeOut(5000)
				}, 5e3)
			},
			initModal: function(){
				$('.close-modal').click(function(){
					clearTimeout(t.timeout);
					$('.ajax-success-modal').fadeOut(300);
				})
			}
	}
})(jQuery)