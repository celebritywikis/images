(function($) {
	"use strict"

	// Fixed Nav
	var lastScrollTop = 0;
	$(window).on('scroll', function() {
		var wScroll = $(this).scrollTop();
		if (wScroll > $('#nav').height()) {
			if (wScroll < lastScrollTop) {
				$('#nav-fixed').removeClass('slide-up').addClass('slide-down');
			} else {
				$('#nav-fixed').removeClass('slide-down').addClass('slide-up');
			}
		}
		lastScrollTop = wScroll
	});

	// Search Nav
	$('.search-btn').on('click', function() {
		$('.search-form').addClass('active');
	});

	$('.search-close').on('click', function() {
		$('.search-form').removeClass('active');
	});

	// Aside Nav
	$('#nav-aside').hide();
	$(document).click(function(event) {

		if (!$(event.target).closest($('#nav-aside')).length) {
			if ($('#nav-aside').hasClass('active')) {
				$('#nav-aside').removeClass('active');
				$('#nav').removeClass('shadow-active');
				$('#nav-aside').show();

			} else {
				if ($(event.target).closest('.aside-btn').length) {
					$('#nav-aside').addClass('active');
					$('#nav').addClass('shadow-active');
					$('#nav-aside').show();
				}
			}
		}
	});

	$('.nav-aside-close').on('click', function() {
		$('#nav-aside').removeClass('active');
		$('#nav').removeClass('shadow-active');
		$('#nav-aside').hide();
	});

	// Sticky Shares
	var $shares = $('.sticky-container .sticky-shares'), $sharesHeight = $shares
			.height(), $sharesTop, $sharesCon = $('.sticky-container'), $sharesConTop, $sharesConleft, $sharesConHeight, $sharesConBottom, $offsetTop = 80;

	function setStickyPos() {
		if ($shares.length > 0) {
			$sharesTop = $shares.offset().top
			$sharesConTop = $sharesCon.offset().top;
			$sharesConleft = $sharesCon.offset().left;
			$sharesConHeight = $sharesCon.height();
			$sharesConBottom = $sharesConHeight + $sharesConTop;
		}
	}

	function stickyShares(wScroll) {
		if ($shares.length > 0) {
			if ($sharesConBottom - $sharesHeight - $offsetTop < wScroll) {
				$shares.css({
					position : 'absolute',
					top : $sharesConHeight - $sharesHeight,
					left : 0
				});
			} else if ($sharesTop < wScroll + $offsetTop) {
				$shares.css({
					position : 'fixed',
					top : $offsetTop,
					left : $sharesConleft
				});
			} else {
				$shares.css({
					position : 'absolute',
					top : 0,
					left : 0
				});
			}
		}
	}

	$(window).on('scroll', function() {
		stickyShares($(this).scrollTop());
	});

	$(window).resize(function() {
		setStickyPos();
		stickyShares($(this).scrollTop());
	});

	setStickyPos();
	
	
	
	$('.more').click(function(e) {
		  e.preventDefault();
		  $(this).text(function(i, t) {
		    return t == 'Read less' ? 'Read more...' : 'Read less';
		  }).prev('.more-cont').slideToggle()
		});
	
	
	
	$('.images-right').click(function(){
		$(".onclickshows").slideToggle();
	});
	
	function AddReadMore() {
        //This limit you can set after how much characters you want to show Read More.
        var carLmt = 120;
        // Text to show when text is collapsed
        var readMoreTxt = " ... Read More";
        // Text to show when text is expanded
        var readLessTxt = " Read Less";


        //Traverse all selectors with this class and manupulate HTML part to show Read More
        $(".addReadMore").each(function() {
            if ($(this).find(".firstSec").length)
                return;

            var allstr = $(this).text();
            if (allstr.length > carLmt) {
                var firstSet = allstr.substring(0, carLmt);
                var secdHalf = allstr.substring(carLmt, allstr.length);
                var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
                $(this).html(strtoadd);
            }

        });
        //Read More and Read Less Click Event binding
        $(document).on("click", ".readMore,.readLess", function() {
            $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
        });
    }
    $(function() {
        //Calling function after Page Load
        AddReadMore();
    });
	

})(jQuery);
