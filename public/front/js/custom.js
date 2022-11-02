
var baseurl=  window.location.origin + '/cms/public';
function setlang(value){
  $.ajax({
  	url: baseurl + "/set-language",
  	data:{data:value},
  	success: function(result){
   	location.reload();
  }
});
}



