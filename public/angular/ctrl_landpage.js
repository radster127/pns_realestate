app.controller("landpage", function($scope, $http) {

	$scope.viewBuilding = function(){/*leave this blank*/}
	
	$scope.focusImage = function(index){
		
		$('#buildingCarousel').find('img').parent('.item').removeClass('active');
		$('#buildingCarousel').find('li').removeClass('active');
		$('img[src= "'+$scope.imageList[index].image_name+'"]').parent('.item').addClass('active');
		$('#buildingCarousel').find('[data-slide-to="'+index+'"]').addClass('active')
	}

});

$(".building-item").on("click", function(){
	
	$("#previewImage").attr('src', $(this).find('.prevImage').attr('src'));
	$("#viewBuildingModal").modal("show");
	
	// $("#build-details").html($(this).find('.building-details').html());
	var details = $(this).find('.building-details').html().split('<br>');
	console.log(details);
	for(var i = 0; i < $(".detail-td").length; i++){
		
		$(".detail-td:eq("+i+")").find('span').html(details[i]);

	}

	var json = eval($(this).find('.image-content').html());


	angular.element($('#landpage')).scope().imageList = json;

	$('#img-thumb').perfectScrollbar({

		suppressScrollY: true,
		handlers: ['drag-scrollbar', 'keyboard', 'wheel', 'touch']

	});

});

$('.modal-content').hover(function(){

	$("#img-thumb").scrollTop($("#img-thumb").scrollTop()+1);
	$("#img-thumb").scrollTop($("#img-thumb").scrollTop()-1);
	$("#img-thumb").perfectScrollbar("update");

});

$(document).ready(function(){

	for(var i = 0; i < $('.building-details').length; i++){

		var details = $('.building-details:eq('+i+')').html().split('<br>');

		$(".preview-details:eq("+i+")").html(
			'<div class="caption">' +
                '<h4>'+details[0]+'</h4>' +
                '<p>' +details[10]+ '</p>' +
                '<h5>' +details[1]+' </h5>' +
            '</div>'
			








			/*"<table class='table-bordered table-hover' style='width:100%'>"+
				"<tr>"+
					"<td>"+
						"<b>"+details[0]+"</b>"+
					"</td>"+
				"</tr>"+
				"<tr>"+
					"<td>"+
						details[10]+
					"</td>"+
				"</tr>"+
				"<tr>"+
					"<td>"+
						"<b>"+details[1]+"</b>"+
					"</td>"+
				"</tr>"+
			"</table>"*/

			);

	}

});

$('#building-location').on('click', function(){

	$("#viewBuildingModal").modal("hide");

});

// $(".carousel-control").addClass("hidden");
