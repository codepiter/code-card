	$(document).ready(function() {

	$('#carouselExample').bind('slide.bs.carousel', function (e) {

    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 4;
    var totalItems = $('#carouselExample .carousel-item').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            if (e.direction=="left") {
				
				     $('#carouselExample .carousel-item').eq(i).appendTo('#carouselExample .carousel-inner');
            }
            else {

                $('#carouselExample .carousel-item').eq(0).appendTo('#carouselExample .carousel-inner');
            }
        }
		}
	});
	
	$('#carouselNeg').bind('slide.bs.carousel', function (e) {

    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 4;
    var totalItems = $('#carouselNeg .carousel-item').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            if (e.direction=="left") {
				
				     $('#carouselNeg .carousel-item').eq(i).appendTo('#carouselNeg .carousel-inner');
            }
            else {

                $('#carouselNeg .carousel-item').eq(0).appendTo('#carouselNeg .carousel-inner');
            }
        }
		}
	});

});	



$(document).ready(function() {

	$('#carouselEdit').bind('slide.bs.carousel', function (e) {
	

    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 4;
    var totalItems = $('#carouselEdit .carousel-item').length;
   
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            if (e.direction=="left") {
				
				     $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {

                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});

});
	
$(document).ready(function() {
   $("#row-video").css("display", "none");

   
   $(".carousel-col img").click( function(){
	   
	  
	     var $templ = $("#template").val();
		 
	  if($templ == 12 ){
			$("#row-video").css("display", "block"); 
	
			$("#row-foto").css("display", "none");
		}else{
			$("#row-video").css("display", "none"); 
			
			$("#row-foto").css("display", "block");
		}
	});
});









//slider personas
/*
$('.carousel[data-type="multi"] .item').each(function() {
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < 2; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});


*/

	
$(".template1").click( function(){
	$("#template").val("1");
	
	$("img").css('border', 'none');
	$("img").css('padding', '0px');

	
	$(".template1").css('border', '3px solid orange');
	$(".template1").css('padding', '5px');
	
	});
	
$(".template2").click( function(){
	$("#template").val("2");
	
	$("img").css('border', 'none');
	$("img").css('padding', '0px');

	
	$(".template2").css('border', '3px solid orange');
	$(".template2").css('padding', '5px');

	
	});
	
$(".template3").click( function(){
	$("#template").val("3");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	$(".template3").css('border', '3px solid orange');
	$(".template3").css('padding', '5px');
	
	});
	
$(".template4").click( function(){
	$("#template").val("4");
	
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	$(".template4").css('border', '3px solid orange');
	$(".template4").css('padding', '5px');
	
	});
	

$(".template5").click( function(){
	$("#template").val("5");
	
	$("img").css('border', 'none');
	$("img").css('padding', '0px');

	
	$(".template5").css('border', '3px solid orange');
	$(".template5").css('padding', '5px');
	
	});
	
$(".template6").click( function(){
	$("#template").val("6");
	
	$("img").css('border', 'none');
	$("img").css('padding', '0px');

	
	$(".template6").css('border', '3px solid orange');
	$(".template6").css('padding', '5px');

	
	});
	
$(".template7").click( function(){
	$("#template").val("7");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	$(".template7").css('border', '3px solid orange');
	$(".template7").css('padding', '5px');
	
	});
	
$(".template8").click( function(){
	$("#template").val("8");
	
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	$(".template8").css('border', '3px solid orange');
	$(".template8").css('padding', '5px');
	
	});
	

$(".template9").click( function(){
	$("#template").val("9");
	
	$("img").css('border', 'none');
	$("img").css('padding', '0px');

	
	$(".template9").css('border', '3px solid orange');
	$(".template9").css('padding', '5px');
	
	});
	
$(".template10").click( function(){
	$("#template").val("10");
	
	$("img").css('border', 'none');
	$("img").css('padding', '0px');

	
	$(".template10").css('border', '3px solid orange');
	$(".template10").css('padding', '5px');

	
	});
	
$(".template11").click( function(){
	$("#template").val("11");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	$(".template11").css('border', '3px solid orange');
	$(".template11").css('padding', '5px');
	
	});
	
$(".template12").click( function(){
	$("#template").val("12");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	$(".template12").css('border', '3px solid orange');
	$(".template12").css('padding', '5px');
	
	});
	
$(".template13").click( function(){
	$("#template").val("13");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	$(".template13").css('border', '3px solid orange');
	$(".template13").css('padding', '5px');
	
	});
	
$(".template14").click( function(){
	$("#template").val("14");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	$(".template14").css('border', '3px solid orange');
	$(".template14").css('padding', '5px');
	
	});
	
$(".template15").click( function(){
	$("#template").val("15");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	$(".template15").css('border', '3px solid orange');
	$(".template15").css('padding', '5px');
	
	});
	
$(".template16").click( function(){
	$("#template").val("16");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	$(".template16").css('border', '3px solid orange');
	$(".template16").css('padding', '5px');
	
	});
	
$(".template17").click( function(){
	$("#template").val("17");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	$(".template17").css('border', '3px solid orange');
	$(".template17").css('padding', '5px');
	
	});
	



//slider negocios

$(".template18").click( function(){
	$("#template").val("18");
	
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	
	$(".template18").css('border', '3px solid orange');
	$(".template18").css('padding', '5px');
	
});
	
$(".template19").click( function(){
	$("#template").val("19");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	
	$(".template19").css('border', '3px solid orange');
	$(".template19").css('padding', '5px');

	
});

$(".template20").click( function(){
	$("#template").val("20");
	
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	
	$(".template20").css('border', '3px solid orange');
	$(".template20").css('padding', '5px');
	
});
	
$(".template21").click( function(){
	$("#template").val("21");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	
	$(".template21").css('border', '3px solid orange');
	$(".template21").css('padding', '5px');

	
});	
$(".template22").click( function(){
	$("#template").val("22");
		
	$("img").css('border', 'none');
	$("img").css('padding', '0px');
	
	
	$(".template22").css('border', '3px solid orange');
	$(".template22").css('padding', '5px');

	
});