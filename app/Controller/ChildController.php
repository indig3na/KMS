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
        //model nécessaire pour acces BD
        $model = new ChildModel();
        //récupérer données
        $tabledata = $model -> findAllColumns(['chd_id','chd_firstname','chd_lastname','chd_birthday','chd_gender','chd_hobbies','chd_comments','class_cls_id','user_usr_id','chd_img_path']);
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
            'title' => 'Child',
            //titres des colonnes de table (correspond aux paramètres de la fonction findAllColumns ci-dessus, sauf le primary key
            'header' => ['Firstname *', 'Lastname *','birthday *','gender *','hobbies','comments','Classe','Parent','Portrait'],
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
            if (empty($birthday)) {
                $errorList[] = 'birthday required';
                $success = false;
            }
            if (!($gender === 'F'|| $gender === 'M')) {
                $errorList[] = 'Gender must be F or M';
                $success = false;
            }

            $data = [
                'chd_firstname' => $firstname,
                'chd_lastname' => $lastname,
                'chd_birthday' => $birthday,
                'chd_gender' => $gender,
                'chd_hobbies' => $hobbies,
                'chd_comments' => $comments,

            ];
            // if input ok
            if (empty($errorList)) {

                $model = new ChildModel();
                //Insert data
                if ($method === 'insert') {
                    $childData = $model->insert($data);
                    // if not inserted error
                    if ($childData === false) {
                        $errorList[] = 'Insert Error<br>';
                    } else {
                        $succesList[] = 'child info inserted';
                        $success = true;
                    }
                } //update data for given Id
                elseif ($method === 'update') {
                    $id = $_POST['id'];
                    $updateData = $model->update($data, $id, $stripTags = true);
                    // if not updated error
                    if ($updateData === false) {
                        $errorList[] = 'Update Error<br>';
                    } else {
                        $succesList[] = 'child infos Updated';
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
                // if not updated error
                if ($deletedData === false) {
                    $errorList[] = 'Delete Error<br>';
                } else {
                    $succesList[] = 'child infos Deleted';
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

}