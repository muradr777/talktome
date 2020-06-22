<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/roots.php'); ?>

<header>
    <div class="logo-elem">
        <span class="logo-text">Wallace</span>
    </div>
</header>

<main class="wrap-it">
    <div class="wl-container" style="background-image: url('uploads/bg01.jpg');">
        <form id="wl-create" class="wl-btn">
            <button class="btn-x" type="submit">Generate</button>
            <div class="loading-wait">
                <span class="iVisible">W</span>
            </div>
            <div class="upload-lnk">
                <a href="/upload.php" class="">/upload</a>
            </div>
        </form>
        <div class="wl-overlay"></div>
    </div>
</main>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/structure/footer.php'); ?>