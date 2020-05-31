<p></p>
<!-- Google Translate -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10"></div>
        <div class="col-lg-2" align="right">
            <div id="google_translate_element"> 
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                    }
                </script>
                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>      
            </div>
        </div>
    </div>
</div>
<!-- Blogs and Title -->
<div class="container-fluid">
    <div class =" container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <h1 class="display-5 py-3">Welcome to Pawsome, <?php if(!empty($_SESSION)){echo $_SESSION['Username'];}?></h1>

                <p class="lead">A place for amazing stories about the cutest, funniest and most adventurous furry beings.</p>
                <!--<hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </p>-->
                <!--                <div class="card mb-4">-->
                                     <!-- <img class="card-img-to">-->  
                <?php
                foreach ($blogposts as $blogpost) {
                    try {
                        if (empty($blogpost->blogPostPhoto)) {
                            throw new Exception("Picture is not available");
                        } else {
                            $filePath = $blogpost->blogPostPhoto;
                            $splitFilePath = explode('/', $filePath);
                            $imageName = end($splitFilePath);
                            //echo "<div>";
                            $img = "<img class='card-img-top' src='views/images/$imageName' alt='Card image cap';/>";
//                          echo $img;
                        }
                    } catch (Exception $e) {
                        echo 'Message: ' . $e->getMessage();
                    }
                    ?>                
                    <div class='card mb-4'>
    <!--  the below line will show the following <img class='card-img-top' src='views/images/$imageName' alt='Card image cap';/>-->
                        <?php echo $img; ?>
                        <div class="card-body">
                            <h2 class="card-title">                    
                                <?php echo $blogpost->blogPostName; ?> 
                            </h2>
                            <p class="card-text">   <?php echo $blogpost->blogPostSubName; ?>  </p>
                            <a class="btn btn-primary" href='?controller=blogpost&action=read&id=<?php echo $blogpost->blogpostID; ?>'>Read More &rarr;</a>    
                        </div>
                        <div class="card-footer text-muted">
                            <?php echo "Posted: " .   $blogpost->datePosted; ?> 
                              <?php if(!empty($_SESSION)){ ?>
                            <a href='?controller=blogpost&action=update&id=<?php echo $blogpost->blogpostID; ?>'>Edit</a>
                            <a href='?controller=blogpost&action=delete&id=<?php echo $blogpost->blogpostID; ?>'> Delete</a>
                              <?php }?>
                        </div>                      
                    </div>
                    <div class="display-4"> </div>           
                <?php } ?>
            </div> 


            <div class="col-md-2"></div>
        </div>
    </div>

</div>
</div>
</div>




<!--             Blog Post #2 
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on January 1, 2017 by
                    <a href="#">Start Bootstrap</a>
                </div>
            </div>-->

<!--           Side Widget 
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
     /.row 

  </div>
   /.container -->