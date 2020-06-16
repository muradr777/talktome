<?php

class Message {
    public function showUploadAlert() : bool {
        $msgError = "Error. Something went wrong.";
        $msgSuccess = "Success! Image was uploaded.";
        if (isset($_GET['res'])) {
            $res = $_GET['res'];
    
            $alertClass = $res ? 'success' : 'error';
            $message = $res ? $msgSuccess : $msgError;
    
            echo <<<HTML
                <div class="alerts {$alertClass}">
                    {$message}
                </div>
HTML;
    
            return true;
        }
        return false;
    }
}


