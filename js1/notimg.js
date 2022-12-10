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
$("#file").upload("notimg.php", function(success){
$(".image-div img").attr("src", "uploades/d-notes/" + success);
	
	}, function(prog, value) {
		$( ".saveim" ).focus(function() {
			$(".btn button-custom btn-custom-two").show();
         });
	});
});




