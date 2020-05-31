<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-2"></div>
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4"><?php echo $blogpost->blogPostName; ?></h1>


            <!-- Date/Time 
            <p>Posted on January 1, 2019 at 12:00 PM</p>
    
            <hr>-->

            <!-- Preview Image -->
            <img class="img-fluid rounded" alt="" >
            <?php
            $file = $blogpost->blogPostPhoto;
            if (file_exists($file)) {
                $file = explode('/', $file, 5);
                $img = "<img src='$file[4]' width='150' />";
                echo $img;
            } else {
                echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
            }
            ?>
            <h2><?php echo $blogpost->blogPostSubName; ?></h2>
            <hr>

            <!-- Post Content -->
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

            <hr>

            <div class="card my-4 p-3">
                <h5>Comments:</h5>
                <?php
                try {
                    if ($comments) {
                        foreach ($comments as $comment1) {
                            ?> 
                            <div class="card my-4 p-3">
                                <p> <b>Username: </b> <?php echo $comment1->username; ?></p>
                                <p><b>Comment: <br></b> <?php echo $comment1->commentContent; ?></p>
                                <p><b>Posted on: </b> <?php echo $comment1->commentTime; ?></p>            
                                <a href='?controller=blogpost&action=read&id=<?php echo $_GET['id']; ?>&CommentID=<?php echo $comment1->commentID; ?>'><button class="btn btn-primary" type="submit">Delete</button></a> &nbsp; &nbsp; 
                            </div>
                            <?php
                        }
                    } else {
                        throw new Exception('No comments submitted');
                    }
                } catch (Exception $e) {
                    ?>

                    <p> <?php echo '' . $e->getMessage(); ?></p>
                    <?php
                }
                ?>
            </div>



            <div class="card my-4 p-3">
                <form action="" method="POST" class="" enctype="multipart/form-data">    
                    <h5>Leave a comment</h5>
                    <div class="card-body">
                        <p>
                            <textarea class="form-control" rows="1" name="Username" placeholder="Name" required></textarea>    
                        </p>
                        <p>
                            <textarea class="form-control" rows="3" name="CommentContent" placeholder="Comment" required></textarea>

                        </p>          

                        <div  class="form-group">
                            <button class="btn btn-primary" type="submit">Comment</button>
                        </div> 
                    </div>
                </form>

            </div>

        </div>
        <div class="col-lg-2"></div>

    </div>
</div>







