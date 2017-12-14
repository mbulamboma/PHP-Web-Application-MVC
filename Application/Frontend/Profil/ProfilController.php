<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Frontend\Profil;
use \Framework\Controller;
/**
 * Description of PostsController
 *
 * @author mbula
 */
class ProfilController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    //Front-end Index of Gallery
    public function view() {
        $this->oBack->getView('Profil', 'view');     
    }
    public function settings() {
        $this->oBack->getView('Profil', 'settings');     
    }
    //Asynchrone actions
    public function avatar() {
        $avatar_erreur = NULL; $avatar_erreur1 = NULL; $avatar_erreur2 = NULL; $avatar_erreur3 = NULL; $i = 0;
        if (!empty($_FILES['file']['size']))
                {
                    //On définit les variables :
                    $maxsize = 1750000; //Poid de l'image 
                    $maxwidth = 30000; //Largeur de l'image
                    $maxheight = 35000; //Longueur de l'image
                    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); //Liste des extensions valides

                    if ($_FILES['file']['error'] > 0){ $avatar_erreur = "Error while uploading the file"; $i++;}
                    if ($_FILES['file']['size'] > $maxsize){
                            $i++;  $avatar_erreur1 = "The file is too heavy : (<strong>".$_FILES['file']['size']." Octets</strong>    vs <strong>".$maxsize." Octets</strong>;)";
                    }
                    $image_sizes = getimagesize($_FILES['file']['tmp_name']);
                    if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight){
                            $i++; $avatar_erreur2 = "Image too large : (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> vs <strong>".$maxwidth."x".$maxheight."</strong>;)";
                    }

                    $extension_upload = strtolower(substr(  strrchr($_FILES['file']['name'], '.')  ,1));
                    if (!in_array($extension_upload,$extensions_valides) ) { $i++; $avatar_erreur3 = "Wrong extention";}
                }

            //si il n'y a pas d'erreur
            if ($i==0){ $nomavatar=(!empty($_FILES['file']['size']))? $this->move_avatar($_FILES['file']):'';
                $path = './images/profils/'.$nomavatar; $return = array(); $return['path'] = $path;
			echo json_encode($return);}
    }
    
    
    private function move_avatar($avatar){
        $extension_upload = strtolower(substr(  strrchr($avatar['name'], '.')  ,1));
        $name = time();
        $nomavatar = str_replace(' ','',$name).".".$extension_upload;
        $name = "./images/profils/".str_replace(' ','',$name).".".$extension_upload;
        move_uploaded_file($avatar['tmp_name'],$name);
        return $nomavatar;
    }
    private function updatePicture($picname) {
        $this->oManager->updateProfil($picname);
    }
}
