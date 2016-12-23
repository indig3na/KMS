<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/12/2016
 * Time: 09:14
 */

namespace Controller;
use Controller\ControllerTemplate;
use Model\ChildModel;
use Model\UserFunctionsModel;
use Model\ClassModel;

class ChildController extends ControllerTemplate
{
    /**
     *  CRUD Child table in GET method
     */
    public function child_get(){
        //model to access db
        $model = new ChildModel();
        //get datas
        if (isset ($_GET['class'])){
            $class = intval($_GET['class']);
            $tabledata = $model -> findAllColumns(['chd_img_path','chd_id','chd_firstname','chd_lastname','chd_birthday','chd_gender','chd_hobbies','chd_comments','class_cls_id','user_usr_id'],'class_cls_id',$class);    
        } elseif (isset ($_GET['parent'])){
            $parent = intval($_GET['parent']);
            $tabledata = $model -> findAllColumns(['chd_img_path','chd_id','chd_firstname','chd_lastname','chd_birthday','chd_gender','chd_hobbies','chd_comments','class_cls_id','user_usr_id'],'user_usr_id',$parent);    
        } else {
            $tabledata = $model -> findAllColumns(['chd_img_path','chd_id','chd_firstname','chd_lastname','chd_birthday','chd_gender','chd_hobbies','chd_comments','class_cls_id','user_usr_id']);    
        }
        if(!empty($_GET['id'])) {
            $childData = $model->find($_GET['id']);
        }
        else
        {
            $childData = '';
        }
        //stocker les données des autres tables de DB dans $fkdata
        $fkData = array();
        //$flData = array();

        //Pour chaque Foreign key, initialiser le modèle et stocker la table de valeurs

        $userModel = new UserFunctionsModel();
        $fkData['user_usr_id'] = $userModel ->findIndexedColumns(['usr_firstname','usr_lastname'],' ','WHERE usr_role = "ROLE_PAR"');

        $classModel = new ClassModel();
        $fkData['class_cls_id'] = $classModel ->findIndexedColumn('cls_name');
        
        $vars = [

            //titre de page
            'title' => 'Enfant',
            //titres des colonnes de table (correspond aux paramètres de la fonction findAllColumns ci-dessus, sauf le primary key
            'header' => ['','Prénom', 'Nom','Date de naissance','Sexe','Intérêts','Commentaires','Classe','Parent'],

            //colonne id de la table: la colonne n'est pas affichée, mais l'id est retourné lors dun update/delete
            'primaryKey' => 'chd_id',
            //données
            'data' => $tabledata,
            //'ignoreData' => ['chd_img_path'],
            'img' => ['chd_img_path'],
            'childData' => $childData,
            'fkData' => $fkData//,
            //'flData' => $flData
        ];
        $this->allowTo('ROLE_ADMIN');
        $this->show('child/child',$vars);
    }



    /**
     * CRUD Child table in POST method
     */
    public function child_post()
    {
        if (!empty($_POST)) {

            $firstname = isset($_POST['chd_firstname']) ? trim(strip_tags($_POST['chd_firstname'])) : '';
            $lastname = isset($_POST['chd_lastname']) ? trim(strip_tags($_POST['chd_lastname'])) : '';
            $birthday = isset($_POST['chd_birthday']) ? trim(strip_tags($_POST['chd_birthday'])) : '';
            $gender = isset($_POST['chd_gender']) ? trim(strip_tags($_POST['chd_gender'])) : '';
            $hobbies = isset($_POST['chd_hobbies']) ? trim(strip_tags($_POST['chd_hobbies'])) : '';
            $comments = isset($_POST['chd_comments']) ? trim(strip_tags($_POST['chd_comments'])) : '';
            $photoId = '';

            $method = $_POST['method'];
            $id = '';

            // children form data validation
            $succesList = array();
            $success = false;
            $errorList = array();
            $data = array();
            if (empty($firstname)) {

                $errorList[] = 'Prénom requis';
                $success = false;
            }
            if (strlen($firstname)<3) {
                $errorList[] = 'Prénom doit comprendre au moins 3 caractères';
                $success = false;
            }
            if (empty($lastname)) {
                $errorList[] = 'Nom requis';
                $success = false;
            }
            if (strlen($lastname)<3) {
                $errorList[] = 'Nom doit comprendre au moins 3 caractères';
                $success = false;
            }
            if (empty($birthday)) {
                $errorList[] = 'Date de naissance requise';
                $success = false;
            }
            if (!($gender === 'F'|| $gender === 'M')) {
                $errorList[] = 'Sexe requis';
                $success = false;
            }
            //if file upoladed


            // Check file size
            //debug(sizeof($_FILES));
            if (sizeof($_FILES) > 500000)
            {
                $errorList[] = "Taille de l'image dépasse 5Mb.";
            }
            elseif (sizeof($_FILES) > 0)
            {
                // get file data from form
                $fileUpload = $_FILES['chd_photo'];
                //Check file security extension
                $extension = substr($fileUpload['name'], -4);
                //check
                if ($extension != '.php') {
                    //Upload file
                    if (move_uploaded_file($fileUpload['tmp_name'], '../public/assets/img/filesId/'.$fileUpload['name'])) {
                        $photoId =$fileUpload['name'];
                        $succesList[]= 'fichier téléversé';
                    }else{

                        $errorList[]= 'Erreur dans le téléversement';
                    }
                }else{
                    $errorList[]= 'Format fichier incorrect';
                }
            }

            // data
            $data = [
                'chd_firstname' => $firstname,
                'chd_lastname' => $lastname,
                'chd_birthday' => $birthday,
                'chd_gender' => $gender,
                'chd_hobbies' => $hobbies,
                'chd_comments' => $comments,
                'chd_img_path' => $photoId
            ];
            // if input ok
            if (empty($errorList)) {

                $model = new ChildModel();
                //Insert data
                if ($method === 'insert') {
                    $childData = $model->insert($data);
                    // if not inserted error
                    if ($childData === false) {

                        $errorList[] = 'Erreur d\'insertion<br>';
                    } else {
                        $succesList[] = 'Information sur l\'enfant inséré';
                        $success = true;
                    }
                } //update data for given Id
                elseif ($method === 'update') {
                    $id = $_POST['id'];
                    $updateData = $model->update($data, $id, $stripTags = true);
                    // if not updated error
                    if ($updateData === false) {
                        $errorList[] = 'Erreur de mise à jour<br>';
                    } else {
                        $succesList[] = 'Information sur l\'enfant mis à jour';
                        $success = true;
                    }
                }


            }
            //delete data for a given Id
            if ($method === 'delete') {
                $id = $_POST['id'];
                $model = new ChildModel();
                $deletedData = $model->delete($id);
                // if not deleted error
                if ($deletedData === false) {
                    $errorList[] = 'Erreur de suppression<br>';
                } else {

                    $succesList[] = 'Information sur l\'enfant supprimé';
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
    public function childList_get($userId){
       // debug($userId);
        $child = new ChildModel();
        $childList = $child ->getListClass($userId);
       // debug($childList);
        
       $this->show('child/childList_get',array('childList'=> $childList));
    }
    public function childClassList_get($classId){
       // debug($userId);
        $child = new ChildModel();
        $childList = $child ->getListByClass($classId);
       $this->show('child/childList_get',array('childList'=> $childList));
    }
    public function childParentList_get($userId){
       // debug($userId);
        $child = new ChildModel();
        $childList = $child ->getListByParent($userId);
       $this->show('child/childList_get',array('childList'=> $childList));
    }
    
        public function parentList_get($classeId){
       // debug($classeId);
        $child = new ChildModel();
        $parentList = $child ->getParentList($classeId);
       // debug($parentList);
        
       $this->show('child/parentList_get',array('parentList'=> $parentList));
    }

}