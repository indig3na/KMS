<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/12/2016
 * Time: 09:32
 */

namespace Controller;
use Controller\ControllerTemplate;
use Model\UserModel;
use Model\CityModel;
use Model\NurseryModel;
use Model\ClassModel;
use \W\Security\AuthentificationModel;
use Controller\MailerController;

class UserController extends ControllerTemplate
{
    /**
     *  CRUD Child table in GET method
     */
    public function user_get(){
        //model nécessaire pour acces BD
        $model = new UserModel();
        //récupérer données
        $tabledata = $model -> findAllColumns(['usr_id','usr_firstname','usr_lastname','usr_address','usr_email','usr_tel_mobile_1','usr_tel_mobile_2','usr_tel_bureau','usr_tel_domicile','city_cit_id','nursery_nur_id',/*'class_cls_id'*/]);

        //stocker les données des autres tables de DB dans $fkdata
        $fkData = array();

        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $cityModel = new CityModel();
        $fkData['city_cit_id'] = $cityModel ->findIndexedColumn('cit_name');
        $nurseryModel = new NurseryModel();
        $fkData['nursery_nur_id'] = $nurseryModel ->findIndexedColumn('nur_name');
        //$classModel = new ClassModel();
        //$fkData['class_cls_id'] = $classModel ->findIndexedColumn('cls_name');


        $vars = [
            //titre de page
            'title' => 'User',
            //titres des colonnes de table (correspond aux paramètres de la fonction findAllColumns ci-dessus, sauf le primary key
            'header' => ['Firstname *', 'Lastname *','Address *','Email*','Mobile Phone Number 1 *','Mobile Phone Number 2 *','Home Phone Number  *','Office Phone Number 1 *','City','nursery'/*, 'class'*/],
            //colonne id de la table: la colonne n'est pas affichée, mais l'id est retourné lors dun update/delete
            'primaryKey' => 'usr_id',
            //données
            'data' => $tabledata,
            'fkData' => $fkData,
        ];
        $this->show('crud/crud',$vars);
    }
    
    public function login(){
        
        $errorList = array();
        $login = '';
    
        $this->show('default/home', array('errorList' =>$errorList, $email));
    }
    
    public function loginPost(){
        debug($_POST);
        $errorList = array();
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $formOk = true;
        if(empty($login)){
            $errorList[] = 'Email vide ! <br>';
            $formOk = false;
        } 
        else{
            if (filter_var($login, FILTER_VALIDATE_EMAIL) === false){
                $errorList[] = 'Email invalide ! <br>';
                $formOk = false;
            }
        }
        
        if(strlen($password)<7){
            $errorList[]= 'Le password doit faire au moins 8 caractères ! <br>';
            $formOk = false;
        }
        print_r($formOk);
        if($formOk){
            // instancie la classe authentificationModel et permet de savoir si 
            // un user existe ou pas dans la base
            $auth = new AuthentificationModel();
            $userId = $auth->isValidLoginInfo($login, $password);
            if($userId>0){
            // Si le users existe on instancie un UsersModel et on récupére ses données    
                $userModel = new UserModel();
                $userData = $userModel->find($userId);
            //  debug($userData);
            // On met le user en session    
                $auth->logUserIn($userData);
            // puis on le redirige sur le vue default/home
                $this->redirectToRoute('crud_child_get');
            }
        }
        $this->show('default/home', array('errorList' =>$errorList));
    }
     public function lostpassword (){
       // debug($_POST);
       $successList = array();
       $login = '';
       $this->show('user/lostpassword', array('login' =>$login,
           'successList'=> $successList ));
    }
    
    public function lostpasswordPost(){
        debug($_POST);
       $login = isset($_POST['login']) ? $_POST['login'] : '';
      
      // debug($emailLogin);
       $successList = array();
       $userModel = new UserModel();
       if ($userModel->emailExists($login)){
           $token = \W\Security\StringUtils::randomString(32);
       //debug($token);  
       $emailToSend = new MailerController();
       $mailContent= 'Cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe '
               . '<br>'
               . '<a href ="http://localhost'.$this->generateUrl('user_passwordreinit', array('token'=>$token)).'">'
               .'http://localhost'.$this->generateUrl('user_passwordreinit', array('token'=>$token))
               . '</a>';
       $emailToSend->emailSent($login,$mailContent );
      $userModel->addToken($login, $token);
      $successList[]= 'Un email vous a été envoyé !';
       
       }
  
       $this->show('user/lostpassword', array('login' =>$login,'successList' => $successList));
    }
    
    public function passwordReinitPost($token){
        $token;
        //debug($_POST);
        //debug($token);
        $errorList = array();
        $passwordLogin1 = isset($_POST['passwordLogin1']) ? $_POST['passwordLogin1'] : '';
        //debug($passwordLogin1);
        $passwordLogin2 = isset($_POST['passwordLogin2']) ? $_POST['passwordLogin2'] : '';
        //debug($passwordLogin2);
        $userModel = new UserModel();
        $userReinit = $userModel->findByToken($token);
        //debug($userReinit);
        if ($userReinit){
            $formOk = true;
            
            if(strlen($passwordLogin1)<7){
            $errorList[]= 'Le password doit faire au moins 8 caractères ! <br>';
            $formOk = false;
            }
            if(!($passwordLogin1===$passwordLogin2)){
                $errorList[]= 'Vos passwords sont différents !';
                $formOk = false;
            }

            if ($formOk){
                    // On met à jour le password
                    $authentificationModel = new AuthentificationModel();
                    $userData = $userModel->update(array(
                        'usr_password' => $authentificationModel->hashPassword($passwordLogin1)
                    ), $userReinit['usr_id'] );
                    // Si l'insertion a fonctionné
                    if($userData !== false){
                        //On logue l'utilisateur
                        $authentificationModel->logUserIn($userData);
                        // On redirige vers la home
                        $this->redirectToRoute('default_home');
                        $userData = $userModel->update(array('usr_token' => ''), $userReinit['usr_id'] );
                    }
                    else {
                        $errorList[] = 'erreur dans l\'insertion<br>';
                    }
                }

            }
            else{
                $errorList[] = 'Token incorrect <br>'; 
            }
        
        $this->show('user/passwordreinit', array(
            'errorList' => $errorList
        ));
        
      //  $this->show('users/passwordreinit');
    }
    
    public function passwordReinit(){
       //echo $token;
       // $userModel = new UsersModel();
       // $userReinit = $userModel->findByToken($token);
       // debug($userReinit);
        $this->show('user/passwordreinit', array(
            'errorList' => array(),
            'email' => ''));
    }

}