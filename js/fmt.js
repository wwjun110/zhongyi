// http://f2.1lo0.net/code/fmt.js

var Class = {
	  create: function() {
	    return function() {
	      this.initialize.apply(this, arguments);
	    }
	  }
	}	
	Function.prototype.bind = function() {
	  var __method = this, args = $A(arguments), object = args.shift();
	  return function() {
	    return __method.apply(object, args.concat($A(arguments)));
	  }
	}	
	var $A = Array.from = function(iterable) {
	  if (!iterable) return [];
	  if (iterable.toArray) {
	    return iterable.toArray();
	  } else {
	    var results = [];
	    for (var i = 0; i < iterable.length; i++)
	      results.push(iterable[i]);
	    return results;
	  }
	}
	var Float = Class.create();
	Float.prototype = {
		initialize: function(elem, options) {
			this.toDo = options.toDo || function(){},
			this.bodyScrollTop = document.documentElement.scrollTop || document.body.scrollTop,
			this.bodyScrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft,
			this.element = document.getElementById(elem);
			this.dely = options.dely || 500;
			this.top = options.top || 0;
			this.left = options.left || 0;
			
		},
		
		start:function(){
			this.element.style.position = 'absolute';
			this.toDo();
			setInterval(this.toDo.bind(this),this.dely)
		}
	}
	var f = new Float('enetMeng_9v', { dely: 100,
	    toDo: function() {
	        var isIE = document.all && window.external;
	        this.bodyScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	        this.bodyScrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft;
	        if (isIE) {
	            this.docWidth = document.documentElement.clientWidth || document.body.clientWidth;
	            this.docHeight = document.documentElement.clientHeight || document.body.clientHeight;
	        } else {
	            this.docWidth = (document.body.clientWidth > document.documentElement.clientWidth) ? document.documentElement.clientWidth : document.body.clientWidth;
	            this.docHeight = (document.body.clientHeight > document.documentElement.clientHeight) ? document.documentElement.clientHeight : document.body.clientHeight;
	        }

	        this.element.style.top = (this.docHeight - parseInt(this.element.offsetHeight, 10)) + parseInt(this.bodyScrollTop, 10)-dg_9v - 3 + 'px';
	        this.element.style.left = (this.docWidth - parseInt(this.element.offsetWidth, 10)) + parseInt(this.bodyScrollLeft, 10) - 4 + 'px';
	    }
	});
f.start();