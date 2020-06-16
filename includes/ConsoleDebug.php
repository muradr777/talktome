<?php 

class ConsoleDebug {
    private $message;

    public function __construct($message) {
        $this->message = $message;

        $this->doConsole($this->message);
    }

    public function doConsole($msg) {
        echo <<<HTML
            <script>console.log("Debug: {$msg}")</script>
HTML;
    }
}