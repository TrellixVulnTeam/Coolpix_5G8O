<?php ob_start(); ?>
<?php include("includes/admin_header.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>
<?php $user = User::find_by_id($_SESSION['user_id']); ?>


    <?php  
/* ---------------------------------------------------------------------------- */



    if(empty($_GET['id'])){  

    redirect("photos.php?page=1");

    }else{


         $photo = Photo::find_by_id($_GET['id']);
    
        if(isset($_POST['update'])) {

            if($photo){

            $photo->title = $_POST['title'];
            $photo->username = $_POST['username'];
            $photo->caption =$_POST['caption'];
            $photo->alternate_text =$_POST['alternate_text'];
            $photo->description =$_POST['description'];
            
            $photo->save();
            redirect("photos.php");
            $session->message("The photo {$photo->filename} by {$photo->username} has been updated");


            }
        
        }else{

       

        }

    }

  

/* ---------------------------------------------------------------------------- */

?>

        <!-- Navigation -->
       
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


<!-- Brand and toggle get grouped for better mobile display -->

        <?php include("includes/top_nav.php"); ?>




            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

       <?php include("includes/side_nav.php"); ?>

            <!-- /.navbar-collapse -->
        </nav>






        <div id="page-wrapper">

        <div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Photos
            <small>Subheading</small>
        </h1>
        
    <form action="" method="post">  

    <div class="col-md-8"> 
 
    <div class="form-group">
    
    <label for="">Title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $photo->title; ?>">
    
    </div>
    <div class="form-group">
    
    <label for="">Username</label>
    <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
    
    </div>
 
    <div class="form-group">
    
        <a class="thumbnail" href="#"><img class="thumbnail" src="<?php echo $photo->picture_path(); ?>" alt=""></a>
    </div>

    <div class="form-group">

    <label for="">Caption</label>
    <input type="text" name="caption" class="form-control" value="<?php echo $photo->caption; ?>">
    
    </div>
   
    <div class="form-group">

    <label for="">Alternate Text</label>
    <input type="text" name="alternate_text" class="form-control" value="<?php echo $photo->alternate_text; ?>">
    
    </div>
   
    <div class="form-group">

    <label for="">Description</label>
    <textarea class="form-control" name="description" id="" cols="30" rows="10" ><?php echo $photo->description; ?></textarea>    

    </div>
   
    
    </div> 


    <div class="col-md-4" >
   <div  class="photo-info-box">
     <div class="info-box-header">
        <h4>INFO <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
     </div>
   <div class="inside">
   <div class="box-inner">
      <p class="text">
        <span class="glyphicon glyphicon-calendar"></span> Uploaded on: <?php echo $photo->upload_date; ?>
       </p>
       <p class="text ">
         Photo Id: <span class="data photo_id_box"><?php echo $photo->id; ?></span>
       </p>
       <p class="text ">
        Username: <span class="data photo_id_box"><?php echo $photo->username; ?></span>
       </p>
       <p class="text">
         Filename: <span class="data"><?php echo $photo->filename; ?></span>
       </p>
      <p class="text">
       File Type: <span class="data"><?php echo $photo->type; ?></span>
      </p>
      <p class="text">
        File Size: <span class="data"><?php echo $photo->size; ?></span>
      </p>
   </div>
   <div class="info-box-footer clearfix">
     <div class="info-box-delete pull-left">
         <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
     </div>
     <div class="info-box-update pull-right ">
         <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                     </div>   
                 </div>
            </div>          
        </div>
      </div>

     </form>  <!-- end of edit form -->

    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/admin_footer.php"); ?>