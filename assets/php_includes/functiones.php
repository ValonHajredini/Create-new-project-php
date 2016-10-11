<?php
/**
 * Makes the name of the project camelcase
 * */
function filterTheProjectName( $projectName){

    if (isset($projectName)){
        $finalProjectName = [];
        $projectName = explode(' ', $projectName);
        foreach ($projectName as $projectWord){
            $word = ucfirst($projectWord);
            $finalProjectName[] = $word;
        }
        $finalProjectName = implode("",$finalProjectName);
        return $finalProjectName;
    }else {
        return "";
    }
}
function makeDirectory($projectName){
    if (mkdir($projectName.'/', 0777, true)) {
        return true;
    }else {
        return false;
    }
}
function file_force_contents($dir, $contents){
    mkdir("".$dir."/classes", 0777, true);
    $index = "index.php";
    $workflow = "workflow.php";
    file_put_contents("$dir/$workflow", $contents);
    file_put_contents("$dir/$index", "<?php \n");
}
function indexContent($projectName){
    $content = "<?php include \"../assets/php_includes/header.php\";?>
<h2><a href=\"http://php.dev/\"><img src=\"../assets/images/back.png\" width=\"30\" height=\"60\"  alt=\"\"></ing></a><img src=\"../assets/images/php_projects.png\" width=\"50\" height=\"60\" alt=\"\"> My PHP Project [ ".$projectName." ]</h2><hr>
<?php include \"index.php\"?>
<?php include \"../assets/php_includes/footer.php\";?>

";
    return $content;
}
function deleteTheProject($path){
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
            deleteTheProject(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }

    else if (is_file($path) === true)
    {
        return unlink($path);
    }

    return false;
    echo "Project wos deleted! ";
//    if (!is_dir($projectName)) {
//        mkdir($projectName);
//    }
//
//    rmdir($projectName);
}