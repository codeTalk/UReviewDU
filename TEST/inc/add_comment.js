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
	    $.post("addComment.php", 
	        {
	            comment: $(".courseID").val(),
	            table: $('.table:click').val()
	        }, 
	         {
	            comment: $(".courseCode").val(),
	            table: $('.table:click').val()
	        }, 
	        function(data){
	            $("div#content").empty();
	            switch($('.table:checked').val())
	            {
	                case 'courseID': 
	                    
	                    break;
	                case 'courseCode': 
	                   
	                   
	                    break;
	               	 case 'courseComm': 
	                   
	                   
	                    break;
	            } 
			
			$.each(data, function(){
                $("div#content").append(" this.name + ");
            });	

	        },
	        "json");
	}
</script>