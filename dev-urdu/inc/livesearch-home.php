<script type="text/javascript">
	$(document).ready(function(){
	    $(".keywords").keyup(function(){
	        getData();
	    });
	    $(".table").click(function(){
	        getData();
	    });
	});
	
	function getData(){
	    $.post("search.php", 
	        {
	            keywords: $(".keywords").val(),
	            table: $('.table:checked').val()
	        }, 
	        function(data){
	            $("div#content").empty();
	            var phppage, ext;
	            switch($('.table:checked').val())
	            {
	                case 'professor': 
	                    phppage = 'prof';
	                    ext = '.php?pID=';
	                    break;
	                case 'department': 
	                    phppage = 'dept';
	                    ext = '.php?dID=';
	                    break;
	                case 'course': 
	                    phppage = 'course';
	                    ext = '.php?cID=';
	                    break;
	            } 
			
			$.each(data, function(){
                $("div#content").append(" <a href='" + phppage + ext + this.id + "'>" + this.name + "</a>");
            });	

	        },
	        "json");
	}
</script>