<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/roots.php'); ?>

<main class="wrapper">

    <div class="answer-wrap"><span id="answer"></span></div>

    <div class="form-wrap">
        <form id="mindForm">
            <div class="form-group">
                <label for="message">What're you thinking about?</label>
                <input id="message" name="message" type="text" placeholder="Type your message here..." autocomplete="off"/>
                <span id="alert" class="alert"></span>
            </div>
        </form>
        <button id="volDown" type="button" class="volWrap vLeft">
            <i class="fas fa-volume-up"></i>
        </button>
        <button id="volUp" type="button" class="volWrap vRight">
            <i class="fas fa-volume-mute"></i>
        </button>
        <span class="user-headset">
            Headphones recommended <i class="fas fa-headphones"></i>
        </span>
    </div>
    <div id="player"></div>

</main>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/structure/footer.php'); ?>