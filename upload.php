<?php 
    require_once('/Applications/XAMPP/xamppfiles/htdocs/wallace/roots.php'); 
    $message = new Message();
?>

<main class="wl-upload">
    
    <div class="back-lnk">
        <a href="/">/BACK</a>
    </div>
    
    <form id="updImgForm" method="POST" action="./actions/uploadFile.php" enctype="multipart/form-data">
        <label for="upload">Upload:</label>
        <input type="file" name="file_upload" />
        <button name="submit">Submit</button>
    </form>


    <?php 
        $message->showUploadAlert(); 
    ?>

</main>

<?php require_once('/Applications/XAMPP/xamppfiles/htdocs/wallace/structure/footer.php'); ?>