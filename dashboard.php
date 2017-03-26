<?php
require 'includes/config.php';

//Add data to the page

if ($_SERVER["REQUEST_METHOD"]== "POST") {
$title= $_POST['title'];
$url= $_POST['url'];
$content= $_POST['content'];
$link= $_POST['link'];

$didInsertWork = addProjectToDatabase($dbh, $title, $url, $content, $link);

// die(var_dump($didInsertWork));

if ($didInsertWork) {
    // echo "your insert was successful";
}

}

require 'partials/header.php';
require 'partials/nav.php';


?> 
    
    <div id="app">

       

        <!-- Start of Content -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dashboard
                        </div>
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" method="POST" action="dashboard.php">
                                <!-- Form Title -->
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Add new project
                                    </label>
                                </div>

                                <!-- Title Input -->
                                <div class="form-group">
                                    <label for="title" class="col-md-4 control-label">Title</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="" required="" autofocus="">
                                    </div>
                                </div>

                                <!-- Image Url Input -->
                                <div class="form-group">
                                    <label for="url" class="col-md-4 control-label">Image Url</label>

                                    <div class="col-md-6">
                                        <input id="url" type="text" class="form-control" name="url" value="" required="" autofocus=""  onchange="readURL(this)">
                                    </div>
                                </div>

                                <!-- Content Input -->
                                <div class="form-group">
                                    <label for="content" class="col-md-4 control-label">Content</label>

                                    <div class="col-md-6">
                                        <input id="content" type="text" class="form-control" name="content" value="" required="" autofocus="">
                                    </div>
                                </div>

                                <!-- Link Input -->
                                <div class="form-group">
                                    <label for="link" class="col-md-4 control-label">Link</label>

                                    <div class="col-md-6">
                                        <input id="link" type="text" class="form-control" name="link" value="" required="" autofocus="">
                                    </div>
                                </div>

                                 <!-- Submit Button -->
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Image Display Thumbnail -->
                    <div class="form-group">
                        <img style="display: block;" width="300px" height="200px" id="projectThumbnail" src="img/place-holder.png" class="img-responsive">
                    </div>
                </div>

            </div>
        </div>
        <!-- End of Content -->
    </div>
    <!-- Scripts -->
    <?php 
    require 'partials/footer.php';
    ?>
