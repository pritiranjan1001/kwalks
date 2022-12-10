$(".image-div").mouseover(
	function(){
		$(".upload-btn").show();
	}
);

$(".image-div").mouseout(
	function(){
		$(".upload-btn").hide();
	}
);

$("#file").on("change", function(){

	$("#file").upload("upload.php", function(success){

		$(".image-div img").attr("src", "d_user_images/" + success);
		$(".saveim").show("src", "uploades/user_images/" + success);
	}, function(prog, value) {

		$( ".saveim" ).focus(function() {
			$(".btn button-custom btn-custom-two").show();
         });
	});

});


