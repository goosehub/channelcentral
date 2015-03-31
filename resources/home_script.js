	$(window).load(function(){ 
    $('#preloader').fadeOut(2000,function(){$(this).remove();});
});

$(document).ready(function()
{

// Here is the initial intro Animations

function intro_animation()
{
	setTimeout(function() { 
		$('.intro_1').textillate('in');
	}, 2000);

	setTimeout(function() { 
		$('.intro_1').textillate('out');
	}, 4000);

	setTimeout(function() { 
		$('.intro_2').textillate('in');
	}, 6000);

	setTimeout(function() { 
		$('.intro_2').textillate('out');
	}, 8000);

	setTimeout(function() { 
		$('.intro_3').textillate('in');
	}, 10000);

	setTimeout(function() { 
		$('.intro_3').textillate('out');
	}, 12000);
}

intro_animation();

setInterval(function(){
	intro_animation();
}, 12000);

// function intro_1()
// {
// 	$('.intro_1').textillate({
// 	  selector: '.texts',
// 	  loop: true,
// 	  minDisplayTime: 1000,
// 	  initialDelay: 50,
// 	  autoStart: true,
// 	  in: {
// 	    effect: 'rollIn',
// 	    delayScale: 1,
// 	    delay: 50,
// 	    shuffle: false,
// 	    callback: function () {}
// 	  },
// 	  out: {
// 	    effect: 'rollOut',
// 	    delayScale: 1,
// 	    delay: 50,
// 	    shuffle: false,
// 	    callback: function () {}
// 	  },
// 	  // callback that executes once textillate has finished 
// 	  callback: function () {}
// 	});
// }
// function intro_2()
// {
// 	$('.intro_2').textillate({
// 	  selector: '.texts',
// 	  loop: false,
// 	  minDisplayTime: 1000,
// 	  initialDelay: 50,
// 	  autoStart: true,
// 	  in: {
// 	    effect: 'rollIn',
// 	    delayScale: 1,
// 	    delay: 50,
// 	    shuffle: false,
// 	    callback: function () {}
// 	  },
// 	  out: {
// 	    effect: 'rollOut',
// 	    delayScale: 1,
// 	    delay: 50,
// 	    shuffle: false,
// 	    callback: function () {}
// 	  },
// 	  // callback that executes once textillate has finished 
// 	  callback: function () {}
// 	});
// }
// function intro_3()
// {
// 	$('.intro_3').textillate({
// 	  selector: '.texts',
// 	  loop: false,
// 	  minDisplayTime: 1000,
// 	  initialDelay: 50,
// 	  autoStart: true,
// 	  in: {
// 	    effect: 'rollIn',
// 	    delayScale: 1,
// 	    delay: 50,
// 	    shuffle: false,
// 	    callback: function () {}
// 	  },
// 	  out: {
// 	    effect: 'rollOut',
// 	    delayScale: 1,
// 	    delay: 50,
// 	    shuffle: false,
// 	    callback: function () {}
// 	  },
// 	  // callback that executes once textillate has finished 
// 	  callback: function () {}
// 	});
// }

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

animateCheckAndAction('.github_note', 'fadeInLeft');

animateCheckAndAction('#copyright', 'fadeInUp');
animateCheckAndAction('.developed_by', 'fadeInUp');
animateCheckAndAction('.email', 'fadeInUp');
animateCheckAndAction('.skype', 'fadeInUp');
animateCheckAndAction('.footer_pipe', 'rotateIn');


});