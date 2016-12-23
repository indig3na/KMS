<?php

namespace Controller;
use Model\ContactModel;

class DefaultController extends ControllerTemplate
{

    /**
     * Page d'accueil par défaut
     */
    public function home()
    {
        $errorList = array();
        $this->show('default/home', array('errorList'=>$errorList));
        $this->show('default/home');
    }


    public function home_post(){

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
                'ctc_message' => $message
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
                $this ->redirectToRoute('default_home');
            } else {
                $this->showJson(['code' => 0, 'message' => implode('<br>', $errorList)]);
            }
        }

        $this->show('default/home', array('errorList' =>$errorList));
    }

}