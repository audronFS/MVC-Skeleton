<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Blog Posts search via PHP, AJAX and jQuery</title>

<!--   <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>-->
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
    </head>
    <body>
       <div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>New feature added yesterday!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
</div>
        <div class="container">
            <br />
            <h2 align="center"></h2><br />
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="text" name="search_text" id="search_text" placeholder="Search for your blog post by name, title or content" class="form-control" />
                </div>
            </div>
            <br />
            <div id="result"></div>
        </div>
  



<script>

//$(document).ready(function(e){
//	$("#search_text").keyup(function(){
//		$("#result").show();
//		var query = $(this).val();
//                console.log(query);
//		$.ajax({
//			type: 'POST',
//			url: '?controller=blogpost&action=search',
//			data:  {query: query},
//                        datatype: text;
//			success: function(data){
//				$("#result").html(data);
//                                console.log(data);
//			}
//		});
//	});
//});

$(document).ready(function () {


                function load_data(query)
                {
                    $.ajax({
                        url: "?controller=blogpost&action=search",
                        method: "POST", //method type
                        data: {query: query},
                        success: function (data)
                        {
                            $('#result').html(data);
                            console.log(data);
                        }
                    });
                }
                $('#search_text').keyup(function () {
                    var search = $(this).val();
                    if (search != '') //even if there is no search, still load the whole books table.
                    {
                        load_data(search);
                    } 
                });
            });
</script>

</body>
</html>
