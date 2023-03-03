(function($){
	"use strict";
	$(document).ready(function(){

		$('#header .mid-header .mini-cart .icon').click(function(e){
			
			if($(window).width() < 767){
				window.location.href='/cart'
			}
		})

		$('.xemthem').click(function(e){		
			$(this).parent().parent().find('.fix-show').addClass('show');
			$(this).hide();
			$('.thugon').show();
		})
		$('.thugon').click(function(e){		
			$(this).parent().parent().find('.fix-show').removeClass('show');
			$(this).hide();
			$('.xemthem').show();
		})

		$('.owl-slider').owlCarousel({
			singleItem: true,
			autoPlay: 8000,
			pagination: false,
			navigation: true,
			navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
		});
		$('.owl-home-blog-bottompage').owlCarousel({
			items: 4,
			itemsDesktop: [1199,4],
			itemsDesktopSmall: [979,3],
			itemsTablet: [768,2],
			itemsMobile: [479,1],
			autoPlay: false,
			pagination: false,
			navigation: true,
			navigationText: ['<i class="fa fa-caret-left"></i>','<i class="fa fa-caret-right"></i>']
		});
		$('.owl-home-blog-sidebar').owlCarousel({
			items: 1,
			itemsDesktop: [1199,1],
			itemsDesktopSmall: [979,1],
			itemsTablet: [768,1],
			itemsMobile: [479,1],
			autoPlay: 10000,
			pagination: false,
			navigation: true,
			navigationText: ['<i class="fa fa-caret-left"></i>','<i class="fa fa-caret-right"></i>']
		});
		$('.owl-brands').owlCarousel({
			items: 6,
			itemsDesktop: [1199,6],
			itemsDesktopSmall: [979,4],
			itemsTablet: [768,3],
			itemsMobile: [479,1],
			autoPlay: 10000,
			pagination: false,
			navigation: true,
			navigationText: ['<i class="fa fa-caret-left"></i>','<i class="fa fa-caret-right"></i>']
		});
		$('.product-detail .thumbnail-image').owlCarousel({
			items: 5,
			itemsDesktop: [1199,5],
			itemsDesktopSmall: [979,4],
			itemsTablet: [768,3],
			itemsMobile: [479,2],
			autoPlay: false,
			pagination: false,
			navigation: true,
			navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
		});
		$('.wrapper-tab-collections').each(function(){
			var $this = $(this);
			$(this).find('.head-tabs').first().addClass('active');
			$(this).find('.content-tab').first().show();
			$this.find('.owl-tab-collections').owlCarousel({
				singleItem: true,
				pagination: false,
				navigation: true,
				navigationText: ['<i class="fa fa-caret-left"></i>','<i class="fa fa-caret-right"></i>']
			});
			$this.find('.head-tabs').on('click', function(){
				if(!$(this).hasClass('active')){
					$this.find('.head-tabs').removeClass('active');
					var $src_tab = $(this).attr("data-src");
					$this.find($src_tab).addClass("active");
					$this.find(".content-tab").hide();
					var $selected_tab = $(this).attr("href");
					$this.find($selected_tab).show();
				}
				return false;
			})

		});
		$(function(){
			$('#large-image').elevateZoom({
				zoomType: "window",
				cursor: "pointer",
				scrollZoom: true,
				zoomWindowFadeIn: 300,
				zoomWindowFadeOut: 500,
				zoomWindowOffetx: 15
			});
			$('.thumbnail-image a').click(function () {
				var smallImage = $(this).attr('data-image');
				var largeImage = $(this).attr('data-zoom-image');
				var ez = $('#large-image').data('elevateZoom');

				ez.swaptheimage(smallImage, largeImage);
				return false;
			});
		});
		$(function(){
			var $this = $('.special-collection');
			$this.find('.head-tabs').first().addClass('active');
			$this.find('.content-tab').first().show();
			$this.find('.head-tabs').on('click',function(){
				if(!$(this).hasClass('active')){
					$this.find('.head-tabs').removeClass('active');
					var $src_tab = $(this).attr("data-src");
					$this.find($src_tab).addClass("active");
					$this.find(".content-tab").hide();
					var $selected_tab = $(this).attr("href");
					$this.find($selected_tab).show();
				}
				return false;
			})
		});
		$('.product-detail').find('.head-tabs').on('click', function(){
			if(!$(this).hasClass('active')) {
				$('.product-detail .head-tabs').removeClass('active');
				var $src_tab = $(this).attr('data-src');
				$($src_tab).addClass('active');
				$('.product-detail').find('.content-tabs').hide();
				var $selected_tab = $(this).attr("href");
				$($selected_tab).show();
			}
			return false;    
		});
		$(function(){
			var $this = $('.mobile-main-menu');
			$('.toggle-main-menu').click(function(){	 		
				if ($this.is(':hidden')){
					$this.stop(true,true).slideDown(300);
				} else {
					$this.stop(true,true).slideUp(300);
				}
			});
			$this.accordion({
				accordion: false,
				speed: 300,
				closedSign: '+',
				openedSign: '-'
			});
		}); 	

	});
	$(window).on('load resize',function() {        
		aside_category();        
	});
	function aside_category() {
		var ww = document.body.clientWidth; 		
		if (ww < 992) {			
			$('.aside-category .has-submenu>a').addClass('clickable');
			$('.aside-category .has-submenu .submenu').hide();
			$(function(){
				$('.aside-category .has-submenu .clickable').each(function(){
					var $this = $(this);					
					$this.unbind('click').bind('click', function(e){											 	
						e.preventDefault();					
						if ($this.next('.submenu').is(':hidden')){	 						
							$this.next('.submenu').show(); 
						}else {
							$this.next('.submenu').hide(); 
						}					
					}) 	 				
				});
			});												
		} else {			
			$('.aside-category .has-submenu>a').unbind('click').removeClass('clickable');										
			$('.aside-category .has-submenu .submenu').removeAttr('style'); 			
		}

	}

})(jQuery);