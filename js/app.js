!function(){function e(t,r,i){function n(a,l){if(!r[a]){if(!t[a]){var s="function"==typeof require&&require;if(!l&&s)return s(a,!0);if(o)return o(a,!0);var c=new Error("Cannot find module '"+a+"'");throw c.code="MODULE_NOT_FOUND",c}var d=r[a]={exports:{}};t[a][0].call(d.exports,function(e){var r=t[a][1][e];return n(r||e)},d,d.exports,e,t,r,i)}return r[a].exports}for(var o="function"==typeof require&&require,a=0;a<i.length;a++)n(i[a]);return n}return e}()({1:[function(e,t,r){!function(e){function t(){if(membershipPaymentUrls){var t=e("#member-type").val();if("Benefactor"==t)return membershipPaymentUrls.benefactor;var r=e("#is-grandparent input").is(":checked");if("CKM Member"==t)return r?membershipPaymentUrls.ckm_grandparent:membershipPaymentUrls.ckm_family;if("CKDZ Member"==t)return r?membershipPaymentUrls.dz_grandparent:membershipPaymentUrls.dz_family}return membershipPaymentUrls["default"]}if(document.addEventListener("wpcf7mailsent",function(e){"319"==e.detail.contactFormId&&window.open(t())},!1),e("#member-type, #is-grandparent input").blur(function(){e("body.page-id-176 .block-buttons .nav-item:first-child a").attr("href",t())}),e("body.page-id-176 .block-buttons .nav-item:first-child a").attr("href",t()),e(".navbar .dropdown").hover(function(){e(this).find(".dropdown-menu").first().stop(!0,!0).delay(250).addClass("show")},function(){e(this).find(".dropdown-menu").first().stop(!0,!0).delay(100).removeClass("show")}),e(".navbar .dropdown > a").click(function(){location.href=this.href}),e(".home-hero .swiper-container .swiper-slide").length>1){new Swiper(".home-hero .swiper-container",{loop:!0,slidesPerView:1,centeredSlides:!0,pagination:{el:e(".home-hero .swiper-pagination"),clickable:!0},autoplay:{delay:7e3},watchOverflow:!0})}var r=["white","blue","red","yellow"];e(".lights .light").each(function(){var t=Math.round(Math.random());if(t){var i=Math.floor(4*Math.random()+1)-1;e(this).addClass(r[i]),e(this).attr("data-color",i)}}),e(".lights .light").click(function(){oldColor=e(this).attr("data-color"),e(this).removeClass(r[oldColor]);var t=parseInt(oldColor,10)+1;t>3&&(t=0),e(this).addClass(r[t]),e(this).attr("data-color",t)}),e(".home-about h2").click(function(){e(".lights .light").each(function(){oldColor=e(this).attr("data-color"),e(this).removeClass(r[oldColor]),e(this).attr("data-color",0)})}),e(".block-gallery").each(function(){var t={},r=e(this).find(".swiper-container");e(this).find(".swiper-slide").length>1?t={loop:!1,slidesPerView:3,spaceBetween:20,centeredSlides:!1,watchOverflow:!0,navigation:{nextEl:e(this).find(".swiper-button-next"),prevEl:e(this).find(".swiper-button-prev")},pagination:{el:e(this).find(".swiper-pagination"),clickable:!0,dynamicBullets:!0},breakpoints:{676:{slidesPerView:2,spaceBetween:10},991:{slidesPerView:2,spaceBetween:20}}}:(t={loop:!1,autoplay:!1},e(this).find(".swiper-button-next").remove(),e(this).find(".swiper-button-prev").remove(),e(this).find(".swiper-pagination").remove());new Swiper(r,t)}),e("#lightgallery").lightGallery({selector:".item"}),e(".accordion-show").on("click",function(t){var r=e(this).data("target");e("#"+r+" .collapse").collapse("show")}),e(".accordion-hide").on("click",function(t){var r=e(this).data("target");e("#"+r+" .collapse").collapse("hide")})}(jQuery)},{}]},{},[1]);