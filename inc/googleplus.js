/**
 * @author Paul Chan / KF Software House 
 * http://www.kfsoft.info
 *
 * Version 0.5
 * Copyright (c) 2010 KF Software House
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php
 *
 */
	
(function($) {

    var _options = null;

	jQuery.fn.MyGooglePlusOneButton = function(options) {
		_options = $.extend({}, $.fn.MyGooglePlusOneButton.defaults, options);
		
		var bPageCorner = true;
		var gPlus1 = '<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>';
		
		var sizeStr = "";
		sizeStr = ' data-size="' + _options.size + '"';
		
		var countStr = "";
		if (!_options.bCount)
			countStr = ' data-count="false" ';
		else
			countStr = ' data-count="true" ';
		
		if (_options.cornerNo==1)
		{
			//gPlus1 += '<DIV style="' + _options.topLeftCss + '"><g:plusone'+ countStr +'></g:plusone></DIV>';
			gPlus1 += '<DIV style="' + _options.topLeftCss + '"> <div class="g-plusone" '+ countStr +' '+sizeStr+'"></div></DIV>';
		}
		else if (_options.cornerNo==2)
		{
			//gPlus1 += '<DIV style="' + _options.topRightCss + '"><g:plusone'+ countStr +'></g:plusone></DIV>';
			gPlus1 += '<DIV style="' + _options.topRightCss + '"> <div class="g-plusone" '+ countStr +' '+sizeStr+'"></div></DIV>';
		}
		else if (_options.cornerNo==3)
		{
			//gPlus1 += '<DIV style="' + _options.bottomLeftCss + '"><g:plusone'+ countStr +'></g:plusone></DIV>';
			gPlus1 += '<DIV style="' + _options.bottomLeftCss + '"> <div class="g-plusone" '+ countStr +' '+sizeStr+'"></div></DIV>';
		}
		else if (_options.cornerNo==4)	
		{
			//gPlus1 += '<DIV style="' + _options.bottomRightCss + '"><g:plusone'+ countStr +'></g:plusone></DIV>';
			gPlus1 += '<DIV style="' + _options.bottomRightCss + '"> <div class="g-plusone" '+ countStr +' '+sizeStr+'"></div></DIV>';
		}
		else
		{
			//gPlus1 += '<g:plusone'+ countStr +'></g:plusone>';
			gPlus1 += '<div class="g-plusone" '+ countStr +' '+sizeStr+'"></div>';
			bPageCorner = false;
		}
		
		if (bPageCorner)
			$("body").append(gPlus1);
		else
			$(this).append(gPlus1);

		return true;
	}
	
	//default values
	jQuery.fn.MyGooglePlusOneButton.defaults = {
		topRightCss: 'position:fixed;top:8.5%; right:10.3%;z-index:99999', // EDIT THIS TO CHANGE POSITION GOOGLE+ Plugin (Upper Right)
		cornerNo: 1, //1: top left, 2: top right, 3:bottom left, 4: bottom right
		size: 'medium', //small | medium | standard | tall
		bCount:true
	};
})(jQuery);