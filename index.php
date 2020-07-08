<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/roots.php'); ?>

<main class="wrapper">

    <div class="answer-wrap shown"><span class="answer"></span></div>

    <div class="form-wrap">
        <form id="mindForm">
            <div class="form-group">
                <label for="message">What're you thinkin of?</label>
                <input id="message" name="message" type="text" placeholder="Type your message here..." autocomplete="off"/>
                <span id="alert" class="alert"></span>
            </div>
        </form>
    </div>

</main>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/structure/footer.php'); ?>