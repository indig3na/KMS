<?php
/**
 * Created by PhpStorm.
 * User: Hicham
 * Date: 21/12/2016
 * Time: 20:41
 */

namespace Controller;
use Controller\ControllerTemplate;
use Model\ContactModel;


class ContactController extends ControllerTemplate {

    public function contact_get()
    {
        $errorList = array();
        $this->show('contact/contact', array('errorList' =>$errorList));
    }

    public function contact_post()
    {
        if (!empty($_POST)) {
            //debug($_POST);
            $succesList = array();
            $success = false;
            $errorList = array();
            $data = array();

            $name = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : '';
            $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
            $subject = isset($_POST['subject']) ? strip_tags($_POST['subject']) : '';
            $message = isset($_POST['message']) ? strip_tags($_POST['message']) : '';
            $parentName = isset($_POST['parentName']) ? trim($_POST['parentName']) : '';
            //print_r($_POST);

            if (empty($name)) {
                $errorList[] = 'Nom vide !';
                $success = false;
            }
            if (strlen($name) < 3) {
                $errorList[] = 'Nom doit comprendre au moins 3 caractères';
                $Success = false;
            }
            if (empty($email)) {
                $errorList[] = 'email vide !';
                $formOk = false;
            } else {
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    $errorList[] = 'Email invalide !';
                    $success = false;
                }
            }

            if (empty($message)) {
                $errorList[] = 'message vide !';
                $success = false;
            }


            $data = [
                'ctc_name' => $name,
                'ctc_email' => $email,
                'ctc_subject' => $subject,
                'ctc_message' => $message,
                'user_usr_id' =>$parentName
            ];
            // if no error
            if (empty($errorList)) {
                //model to access db
                $model = new ContactModel();
                //insert contact data
                $insertData = $model->insert($data);
                // if not inserted error
                if ($insertData === false) {
                    $errorList[] = 'Erreur d\'insertion';
                } else {
                    $succesList[] = 'Message envoyé';
                    $success = true;
                }

            }
            // show json errorList and/or successList message
            if ($success) {
                $this->showJson(['code' => 1, 'message' => implode('<br>', $succesList)]);
            } else {
                $this->showJson(['code' => 0, 'message' => implode('<br>', $errorList)]);
            }
        }

        $this->show('contact/contact', array('errorList' =>$errorList));
    }
}

