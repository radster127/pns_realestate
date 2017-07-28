function swAlert(title, text, type, callback, loader){

	if(loader != null){

		loader = loader;

	}
	else{

		loader = false;

	}
	swal({
	  title: title,
	  text: text,
	  type: type,
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes",
	  closeOnConfirm: false,
	  showLoaderOnConfirm: loader
	},
	function(){
	  callback();
	});

}