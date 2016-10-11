<?php
$dir ="".dirname(__FILE__)."\\"; // Current location for generating new workspace
include "assets/php_includes/functiones.php";
if (isset($_POST['submit'])){
    $projectname = filterTheProjectName($_POST['project_name']);
    if ($projectname != '' and $projectname != null){
//        makeDirectory($projectname);
        file_force_contents($projectname, indexContent($projectname));
    }
}

$dirs = scandir($dir);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">
            <h2><a href="http://php.dev/"><img src="assets/images/blank.png" width="15" height="60"  alt=""></ing></a><img src="assets/images/php_projects.png" width="50" height="60" alt=""> My PHP Projects</h2>
        </div>
        <div class="col-md-5">
            <div class="form-groupp" >
                <button onclick="showForm()" id="new_form_button" class="btn btn-primary">New Project</button>
            </div>
            <form action="" id="new_project_form" style="display: none;" method="POST">
                <div class="form-groupp" >
                    <input type="text" name="project_name" class="" id="project_name"  placeholder="Type The name of new project" >
                    <input type="submit" name="submit" value="NEW PROJECT" id="new_submit_button" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
<?php
foreach ($dirs as $directory){
    $dirFolder = explode('.', $directory);
    if ($directory != '.' and $directory != '..' and $directory  != ".idea" AND $directory != "assets" and $directory != "index.php" and $directory != "db_to_json"){
        if (count($dirFolder) == 1){
        ?>
            <div class="col-md-3">
                <a href="<?php echo $directory?>/workflow.php" class="link">
                    <div class="well project">
                        <img src="assets/images/project_img.png" alt="" width="30" height="30">
                        <h3 style="text-align: center;">
                            <?php echo strtoupper($directory); ?>
                        </h3>
                    </div>
                </a>
            </div>
        <?php
        }
    }
}
?>
</div>
</div>
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/showForm.js"></script>
</body>
</html>
