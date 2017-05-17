<?php
function sendMail($to, $from, $subject, $messageee) {
// Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
    $headers .= "From:Team Settlemetal <$from>" . "\r\n";
    mail($to, $subject, $messageee, $headers);
}

?>