<script type="text/javascript">
	$.getJSON("pictures.json", function(json){
	    var pics = json.pictures;
	    var pic = Math.floor(Math.random()*pics.length);
	    $("img", { src: pic }).load(function(){
	        $(this).fadeIn("slow");
	    }).appendTo("body");
	});
</script>