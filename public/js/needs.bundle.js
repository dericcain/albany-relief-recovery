webpackJsonp([2],{34:function(t,n,e){"use strict";function s(){f.submit(function(t){t.preventDefault(),u.a.post(this.action,$(this).serialize()).then(function(t){toastr.success("You're form was submitted!"),o()})["catch"](function(t){})})}function o(){document.getElementById("needs-form").reset()}function c(){s()}var i=e(1),u=e.n(i),f=$("#needs-form");c()}},[34]);