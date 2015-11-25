<?php
/**
*author: Agatha Adjoa Maison
*date: 23rd November, 2015
*description: A class that handles AJAX requests
*/
    if(!isset($_REQUEST['cmd'])){
        echo '{"result":0,message:"unknown command"}';
        exit();
    }
    $cmd=$_REQUEST['cmd'];
    switch($cmd)
    {
        case 1:
            addRecipe();
        break;

        case 2:
            viewRecipe();
        break;

        case 3:
            rateRecipe();
        break;

        case 4:
            addChef();
        break;

        case 5:
            viewChef();
        break;

        case 6:
            addFavorite();
        break;

        case 7:
            viewFavorite();
        break;

        case 8:
            removeFavorite();
        break;

        case 9:
            addIngredient();
        break;

        case 10:
            viewIngredient();
        break;

        case 11:
            addInstruction();
        break;

        case 12:
            viewInstruction();
        break;

        case 13:
            addUser();
        break;

        case 14:
            getUsername();
        break;

        case 15:
            getUserNumber();
        break;

        case 16:
            getUser();
        break;

        default:
            echo '{"result":0,"message":"unknown command"}';
        break;
    }

    /**
    *description: A function that receives parameters from the url to add a recipe
    * to the database. It echos a result of 1 when successful or 0 if unscuccessful
    * in JSON format.
    */
    function addRecipe(){
      $name=$_REQUEST['name'];
      $chef=$_REQUEST['chef'];
      $overview=$_REQUEST['overview'];
      $ingr=$_REQUEST['ingr'];
      $inst=$_REQUEST['inst'];
      $image= $_REQUEST['image'];
      $cat=$_REQUEST['cat'];

      include("recipe.php");
      $obj = new recipe();
      if($obj->addRecipe($name, $chef, $overview, $ingr,$inst,$image,$cat)){
          echo '{"result":1}';
      }else {
          echo '{"result":0}';
      }
  }






        }
?>
