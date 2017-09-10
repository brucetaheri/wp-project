<?php
/*
Plugin Name: Tegrita API
 */

function sendError_badRequest() {
    header("HTTP/1.1 400 Bad Request");
    header("Content-type: application/json", false);
}

function sendError_methodNotAllowed() {
    header("HTTP/1.1 405 Method Not Allowed");
    header("Content-type: application/json", false);
}

function register_service_preview() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // it's a post, so let's continue.
        $postedData = json_decode(file_get_contents("php://input"), true);
        // next, validate that the 'data' field is present.
        if (
            isset($postedData) &&
            isset($postedData['data']) &&
            is_array($postedData['data'])
        ) {
            $invalidDataFieldsPresent = false;
            $invalidDataFields = array();

            // validate name
            if (!isset($postedData['data']['name'])) {
                array_push($invalidDataFields, 'name');
                $invalidDataFieldsPresent = true;
            }
            // validate phone
            if (!isset($postedData['data']['phone'])) {
                array_push($invalidDataFields, 'phone');
                $invalidDataFieldsPresent = true;
            }
            // validate emailAddress
            if (!isset($postedData['data']['emailAddress'])) {
                array_push($invalidDataFields, 'emailAddress');
                $invalidDataFieldsPresent = true;
            }

            /**
             * @todo validate comments section
             */

            if ($invalidDataFieldsPresent) {
                header("HTTP/1.1 400 Bad Request");
                header("Content-type: application/json", false);
                echo json_encode(array(
                    'success' => false,
                    'reason'  => 'invalidFields',
                    'invalidFields' => $invalidDataFields
                ));
                die();
            } else {
                $emailTo       = 'sales@tegrita.com';
                $emailSubject  = '[tegrita.com] Registration';
                $emailMessage  = "name:  ".$postedData['data']['name']."\r\n";
                $emailMessage .= "email: ".$postedData['data']['emailAddress']."\r\n";
                $emailMessage .= "phone: ".$postedData['data']['phone']."\r\n\r\n";
                $emailMessage .= "comments: ".(isset($postedData['data']['comments']) ? $postedData['data']['comments'] : '')."\r\n";
                //$emailMessage = 'name: '.$_POST['data']['name'].', email: '.$_POST['data']['emailAddress'].', phone: '.$_POST['data']['phone'].', comments: '.(isset($_POST['data']['comments']) ? $_POST['data']['comments'] : '').'';
                // wp_mail($emailTo, $emailSubject, $emailMessage, 'Content-type: text/html\r\n');
                wp_mail($emailTo, $emailSubject, $emailMessage);
                wp_send_json_success(array(
                    'success' => true
                ));
            }


        } else {
            // no data field, so it's a malformed request
            sendError_badRequest();
            die();
        }
    } else {
        // must be a post. return an error.
        sendError_methodNotAllowed();
        die();
    }

}
add_action('wp_ajax_register_service_preview', 'register_service_preview');
add_action('wp_ajax_nopriv_register_service_preview', 'register_service_preview');
