webpackJsonp([2],{37:function(t,e){function s(){o.click(function(){var t=($(this).data("id"),$(this).data("route")),e=$(this).closest("tr");axios.post(t).then(function(t){toastr.success("The user was deleted."),e.remove()})["catch"](function(t){})})}function n(){c.submit(function(t){t.preventDefault();var e=$(this).serialize(),s=this.action;axios.post(s,e).then(function(t){toastr.success("The user has been created."),loader.reload()})["catch"](function(t){})})}function a(){i.on("change",function(){var t=$(this).val(),e=($(this).data("id"),$(this).data("route"));axios.post(e,{group:t}).then(function(t){toastr.success("The user's group has changed")}).caatch(function(t){})})}var o=$(".delete-user"),c=$("#new-user-form"),i=$(".change-group");s(),n(),a()}},[37]);