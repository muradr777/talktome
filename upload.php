<?php
require_once('/Applications/XAMPP/xamppfiles/htdocs/wallace/structure/head.php');

$msgError = "Error. Something went wrong.";
$msgSuccess = "Success! Image was uploaded.";
?>

<main class="wl-upload">
    <form id="updImgForm" method="POST" action="./ajax/uploadFile.php" enctype="multipart/form-data">
        <label for="upload">Upload:</label>
        <input type="file" name="file_upload" />
        <button name="submit">Submit</button>
    </form>
    <?php
    if ($res = (bool) $_GET['res']) {
        $alertClass = $res ? 'success' : 'error';
        $message = $res ? $msgSuccess : $msgError;
        echo <<<HTML
            <div class="alert {$res}">
                {$message}
            </div>
HTML;
    }
    ?>

</main>


<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/wallace/structure/footer.php'); ?>