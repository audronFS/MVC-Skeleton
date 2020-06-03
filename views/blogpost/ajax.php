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
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />-->
    </head>
    <body>
  <div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
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
    </body>
</html>


<script>
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
