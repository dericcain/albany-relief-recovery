webpackJsonp([6],{33:function(e,a,t){"use strict";function n(){i.DataTable({autoWidth:!1,pageLength:25,colReorder:!0,language:{lengthMenu:"_MENU_",search:"_INPUT_",searchPlaceholder:"Search for anything in the table..."},sDom:"Rfrtlip"})}function o(){l.click(function(){var e,a=$(this);a.hasClass("mark-pending")?e={pending:!0}:a.hasClass("mark-complete")&&(e={complete:!0}),h.a.post(a.data("route"),e).then(function(e){toastr.success("The need has been updated."),loader.reload()})["catch"](function(e){})})}function c(){$('[data-toggle="popover"]').popover()}function s(){n(),c(),o()}var r=t(0),h=t.n(r),i=$("#needs-table"),l=$(".change-status");s()}},[33]);