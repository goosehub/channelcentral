	$(window).load(function(){ 
    $('#preloader').fadeOut(1000,function(){$(this).remove();});
});

$(document).ready(function()
{

// Here is the initial intro Animations

function intro_animation()
{
		$('.intro_1').textillate({
        minDisplayTime: 1500,
        in:{ 
			effect: 'rollIn',
	        callback: function () 
	        {
	        	$('.intro_1').textillate('out');
	        }
		},
		out: { 
			effect: 'rollOut',
	        callback: function () 
	        {
	        	$('.intro_2').textillate('in');
	        }
        }
    });
		$('.intro_2').textillate({
        autoStart: false,
        minDisplayTime: 1500,
        in:{ 
			effect: 'rollIn',
	        callback: function () 
	        {
	        	$('.intro_2').textillate('out');
	        }
		},
		out: { 
			effect: 'rollOut',
	        callback: function () 
	        {
	        	$('.intro_3').textillate('in');
	        }
        }
    });
		$('.intro_3').textillate({
        autoStart: false,
        minDisplayTime: 1500,
        in:{ 
			effect: 'rollIn',
	        callback: function () 
	        {
	        	$('.intro_3').textillate('out');
	        }
		},
		out: { 
			effect: 'rollOut',
	        callback: function () 
	        {
	        	$('.intro_1').textillate('in');
	        }
        }
    });
}

setTimeout(function() { 
	intro_animation();
}, 5000);

function animateCheckAndAction(see, action) {
    var $see = $(see);
    var $action = $(action);
	$see.css({ 'visibility': 'visible' });
	$see.addClass('animated '+action+'');
}

setTimeout(function(){
  $('#intro_1').addClass('animated swing');
  $('#intro_2').addClass('animated rubberBand');
  $('#intro_3').addClass('animated shake');
}, 8000);

animateCheckAndAction('.main-title', 'bounceInLeft');
animateCheckAndAction('.login_cnt', 'fadeInDown');
animateCheckAndAction('.hr', 'zoomIn');

// animateCheckAndAction('.intro_1', 'bounceInLeft');
// animateCheckAndAction('.intro_2', 'bounceInRight');
// animateCheckAndAction('.intro_3', 'bounceInLeft');

animateCheckAndAction('.start_channel_header', 'fadeInRightBig');
animateCheckAndAction('.search', 'fadeInLeftBig');

animateCheckAndAction('.active_channels_header', 'flipInX');
animateCheckAndAction('.no_active_channels', 'flipInX');
animateCheckAndAction('.empty_channels_header', 'flipInX');
animateCheckAndAction('.random_channel', 'flipInY');
animateCheckAndAction('.active_channel_item', 'flipInY');
animateCheckAndAction('.empty_channel_item', 'flipInY');

animateCheckAndAction('.github_note', 'fadeInDown');

animateCheckAndAction('#copyright', 'fadeInUp');
animateCheckAndAction('.developed_by', 'fadeInUp');
animateCheckAndAction('.email', 'fadeInUp');
animateCheckAndAction('.skype', 'fadeInUp');
animateCheckAndAction('.footer_pipe', 'fadeInUp');


});