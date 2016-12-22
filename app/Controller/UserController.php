<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/12/2016
 * Time: 09:32
 */

namespace Controller;
use Model\UserModel;
use Model\UserFunctionsModel;
use Model\CityModel;
use Model\NurseryModel;
use Model\ClassModel;
use \W\Security\AuthentificationModel;
use Controller\MailerController;

class UserController extends ControllerTemplate
{
    
    
    public function admin_get(){
        $this->user_get('ROLE_ADMIN');
    }
    
    public function edu_get(){
        $this->user_get('ROLE_EDU');
    }
    
    public function par_get(){
        $this->user_get('ROLE_PAR');
    }
    public function admin_post(){
        $this->user_post();
    }
    
    public function edu_post(){
        $this->user_post();
    }
    
    public function par_post(){
        $this->user_post();
    }
    
    /**
     *  CRUD Child table in GET method
     */
    public function user_get($role=NULL){
        //model nécessaire pour acces BD
        $model = new UserFunctionsModel();
        //récupérer données
        switch ($role){
            case 'ROLE_ADMIN':
                $prettyRole = 'administrateur';
                $query = [['usr_id','usr_firstname','usr_lastname','usr_email','usr_tel_mobile_1','city_cit_id','nursery_nur_id'],'usr_role','ROLE_ADMIN'];
                $header =['Prénom ', 'Nom ','Adresse E-mail',' No. téléphone principal','Ville','Établissement'];
                break;
            case 'ROLE_EDU':
                $prettyRole = 'éducateur';
                $query = [['usr_id','usr_firstname','usr_lastname','usr_email','usr_tel_mobile_1','city_cit_id','nursery_nur_id','class_cls_id'],'usr_role','ROLE_EDU'];
                $header =['Prénom ', 'Nom ','Adresse E-mail',' No. téléphone principal','Ville','Établissement', 'Classe'];
                break;
            case 'ROLE_PAR':
                $prettyRole = 'parent';
                $query = [['usr_id','usr_firstname','usr_lastname','usr_email','usr_tel_mobile_1','city_cit_id','nursery_nur_id'],'usr_role','ROLE_PAR'];
                $header =['Prénom ', 'Nom ','Adresse E-mail',' No. téléphone principal','Ville','Établissement'];
                break;
            default: 
                $prettyRole = 'utilisateur';
                $query = [['usr_id','usr_firstname','usr_lastname','usr_email','usr_tel_mobile_1','city_cit_id','nursery_nur_id','class_cls_id'],'',''];
                $header =['Prénom ', 'Nom ','Adresse E-mail',' No. téléphone principal','Ville','Établissement','Classe'];
        }
        $tabledata = $model -> findAllColumns($query[0],$query[1],$query[2]);
        if(!empty($_GET['id'])) {
            $userData = $model->find($_GET['id']);
        }
        else
        {
            $userData = '';
        }
        //stocker les données des autres tables de DB dans $fkdata
        $fkData = array();
       // $flData = array();
       // $fmData = array();

        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs
        $cityModel = new CityModel();
        $fkData['city_cit_id'] = $cityModel ->findIndexedColumn('cit_name');
        $nurseryModel = new NurseryModel();
        $fkData['nursery_nur_id'] = $nurseryModel ->findIndexedColumn('nur_name');
        $classModel = new ClassModel();
        $fkData['class_cls_id'] = $classModel ->findIndexedColumn('cls_name');


        $vars = [
            //titre de page
            'title' => mb_convert_case($prettyRole,MB_CASE_TITLE,'UTF-8'),
            //titres des colonnes de table (correspond aux paramètres de la fonction findAllColumns ci-dessus, sauf le primary key
            'header' => $header,
            //colonne id de la table: la colonne n'est pas affichée, mais l'id est retourné lors dun update/delete
            'primaryKey' => 'usr_id',
            //données
            'data' => $tabledata,
            'userData' => $userData,
            'fkData' => $fkData,
            'role' => $role

        ];
        $this->allowTo('ROLE_ADMIN');
        $this->show('user/user',$vars);
    }
    
     /**
     * CRUD User table in POST method
     */
    public function user_post()
    {
        if (!empty($_POST)) {

            $firstname = isset($_POST['usr_firstname']) ? trim(strip_tags($_POST['usr_firstname'])) : '';
            $lastname = isset($_POST['usr_lastname']) ? trim(strip_tags($_POST['usr_lastname'])) : '';
            $address = isset($_POST['usr_address']) ? trim(strip_tags($_POST['usr_address'])) : '';
            $tel_mobile_1 = isset($_POST['usr_tel_mobile_1']) ? trim(strip_tags($_POST['usr_tel_mobile_1'])) : '';
            $tel_domicile = isset($_POST['usr_tel_domicile']) ? trim(strip_tags($_POST['usr_tel_domicile'])) : '';
            $email = isset($_POST['usr_email']) ? trim(strip_tags($_POST['usr_email'])) : '';
            $role = isset($_POST['usr_role']) ? trim(strip_tags($_POST['usr_role'])) : '';
            $nursery = isset($_POST['nursery_nur_id']) ? trim(strip_tags($_POST['nursery_nur_id'])) : '';
            $city = isset($_POST['city_cit_id']) ? trim(strip_tags($_POST['city_cit_id'])) : '';
            $class = isset($_POST['class_cls_id']) ? trim(strip_tags($_POST['class_cls_id'])) : '';
            
            $method = $_POST['method'];
            $id = '';

            // activity input validation
            $succesList = array();
            $success = false;
            $errorList = array();
            $data = array();
            if (empty($firstname)) {
                $errorList[] = 'firstname required';
                $success = false;
            }
            if (strlen($firstname)<3) {
                $errorList[] = 'firstname must be 3 caractere or more';
                $success = false;
            }
            if (empty($lastname)) {
                $errorList[] = 'laststname required';
                $success = false;
            }
            if (strlen($lastname)<3) {
                $errorList[] = 'lastname must be 3 caractere or more';
                $success = false;
            }
            if (empty($address)) {
                $errorList[] = 'Adresse required';
                $success = false;
            }
            if (empty($email)) {
                $errorList[] = 'Adresse E-mail required';
                $success = false;
            }
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'Adresse E-mail valide required';
                $success = false;
            }
            if(!in_array($role,['ROLE_ADMIN','ROLE_EDU','ROLE_PAR'])){
                $errorList[] = 'Role non reconnu';
                $success = false;
            }

            $data = [
                'usr_firstname' => $firstname,
                'usr_lastname' => $lastname,
                'usr_address' => $address,
                'usr_tel_mobile_1' => $tel_mobile_1,
                'usr_tel_domicile' => $tel_domicile,
                'usr_email' => $email,
                'usr_role' => $role,
                'nursery_nur_id' => $nursery,
                'city_cit_id' => $city,
                'class_cls_id' => $class,

            ];
            // if input ok
            if (empty($errorList)) {

                $model = new UserFunctionsModel();
                //Insert data
                if ($method === 'insert') {
                    $token = \W\Security\StringUtils::randomString(32);
                    $data['usr_token'] = $token;
                    $insertData = $model->insert($data);
                    // if not inserted error
                    if ($insertData === false) {
                        $errorList[] = 'Insert Error<br>';
                    } else {
                        $succesList[] = 'user info inserted';
                        $success = true;
                        
                        $emailToSend = new MailerController();
                        $mailContent= 'Bienvenue sur notre site, '.$firstname.' '.$lastname.'!'
                                . '<br><br>'
                                . 'Cliquez sur le lien ci-dessous pour vous connecter et initialiser votre mot de passe:<br>'
                                . '<a style="display:block;padding:10px;border-radius:10px;background-color:blue" href ="http://localhost'.$this->generateUrl('user_passwordreinit', array('token'=>$token)).'">'
                                .'http://localhost'.$this->generateUrl('user_passwordreinit', array('token'=>$token))
                                . '</a>';
                        $emailToSend->emailSent($email,$mailContent );
                    }
                } //update data for given Id
                elseif ($method === 'update') {
                    $id = $_POST['id'];
                    $updateData = $model->update($data, $id, $stripTags = true);
                    // if not updated error
                    if ($updateData === false) {
                        $errorList[] = 'Update Error<br>';
                    } else {
                        $succesList[] = 'user infos Updated';
                        $success = true;
                    }
                }


            }
            //delete data for a given Id
            if ($method === 'delete') {
                $id = $_POST['id'];
                $model = new UserFunctionsModel();
                $deletedData = $model->delete($id);
                // if not deleted error
                // if not updated error
                if ($deletedData === false) {
                    $errorList[] = 'Delete Error<br>';
                } else {
                    $succesList[] = 'user infos Deleted';
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


    }
    
    public function login(){
        
        $errorList = array();
        $login = '';
    
        $this->show('default/home', array('errorList' =>$errorList, 'login'=> $login));
    }
    
    public function loginPost(){
        //debug($_POST);
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
        //print_r($formOk);
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
                //récupération des infos du user connecté
                $user_logged = $this->getUser();
                $userIdConnected = $user_logged['usr_id'];
               if($user_logged['usr_role']=='ROLE_ADMIN'){
                    $this->redirectToRoute('class_class_get');
                } 
                if($user_logged['usr_role']=='ROLE_PAR') {
                    $this->redirectToRoute('child_parent_child_get', ['userId' => $userIdConnected]);
                }
                if($user_logged['usr_role']=='ROLE_EDU') {
                    $this->redirectToRoute('child_childList_get', ['userId' => $userIdConnected]);
                }
               
            }else{
                $errorList[]='Identifiant ou mot de passe invalide !<br>';
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
    //4
    //   debug($_POST);
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
                        'usr_password' => $authentificationModel->hashPassword($passwordLogin1),
                        'usr_token' => ''
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
    
    public function logout(){
        $auth = new AuthentificationModel();
        $auth->logUserOut();
        // On redirige vers la home
       $this->redirectToRoute('default_home');
    }
    

}