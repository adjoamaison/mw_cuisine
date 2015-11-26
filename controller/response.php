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
            getUser();
        break;

        // case 15:
        //
        // break;
        //
        // case 16:
        //
        // break;

        default:
            echo '{"result":0,"message":"unknown command"}';
        break;
    }

    /**
    *description: A function that receives parameters from the url to add a recipe
    * to the database. It echos a result of 1 when successful or 0 if unsuccessful
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

      include("../model/recipe.php");
      $obj = new recipe();
      if($obj->addRecipe($name, $chef, $overview, $ingr,$inst,$image,$cat)){
          echo '{"result":1}';
      }else {
          echo '{"result":0}';
      }
    }

  /**
  *description: A function that displays recipes in the database.
  *It echos a result of 1 when successful or 0 if unsuccessful
  * in JSON format.
  */
  function viewRecipe(){
    include("../model/recipe.php");
    $obj=new recipe();

    if($obj->viewRecipe()) {
      $row=$obj->fetch();
      echo '{"result":1,"recipes":[';
      while($row){
        echo json_encode($row);
        $row=$obj->fetch();
        if($row){
          echo ",";
        }
      }
      echo "]}";
    }
    else {
      echo '{"result":0}';
    }
  }

  /**
  *description: A function that rates a given recipe by incrementing its count by one.
  * It echos a result of 1 when successful or 0 if unsuccessful
  * in JSON format.
  */
  function rateRecipe(){
      $id = $_REQUEST['id'];
      include("../model/recipe.php");
      $obj=new recipe();

      if($obj->rateRecipe($id)) {
          echo '{"result":1}';
      }
      else {
          echo '{"result":0}';
      }
  }

  /**
  *description: A function that receives parameters from the url to add a new chef
  * The parameters are name, number, address and email of the new chef.
  * It echos a result of 1 when successful or 0 if unsuccessful
  * in JSON format.
  */
  function addchef(){
    $name=$_REQUEST['name'];
    $number=$_REQUEST['number'];
    $address=$_REQUEST['address'];
    $email= $_REQUEST['email'];

    include("../model/chef.php");
    $obj = new chef();
    if($obj->addChef($name, $number, $address, $email)){
      echo '{"result":1}';
    }else {
      echo '{"result":0}';
    }
  }

  /**
  *description: A function that views chef recorded in the database.
  * It echos a result of 1 when successful or 0 if unsuccessful
  * in JSON format.
  */
  function viewChef(){
    include("../model/chef.php");
    $obj=new chef();

    if($obj->viewChef()) {
      $row=$obj->fetch();
      echo '{"result":1,"chefs":[';
      while($row){
        echo json_encode($row);
        $row=$obj->fetch();
        if($row){
          echo ",";
        }
      }
      echo "]}";
    }
    else {
      echo '{"result":0}';
    }
  }

    /**
    *description: A function that receives parameters from the url to add a user's favorite recipe.
    * It echos a result of 1 when successful or 0 if unsuccessful
    * in JSON format.
    */
    function addFavorite(){
      $name=$_REQUEST['name'];
      $recipe=$_REQUEST['recipe'];

      include("../model/favorite.php");
      $obj = new favorite();
      if($obj->addFavorite($name, $recipe)){
          echo '{"result":1}';
      }else {
          echo '{"result":0}';
      }
    }

    /**
    *description: A function that views a user's favorited recipes using parameter from url.
    * It echos a result of 1 when successful or 0 if unsuccessful
    * in JSON format.
    */
    function viewFavorite(){
      $name=$_REQUEST['name'];
      include("../model/favorite.php");
      $obj=new favorite();

      if($obj->viewFavorite($name)) {
        $row=$obj->fetch();
        echo '{"result":1,"favorites":[';
        while($row){
          echo json_encode($row);
          $row=$obj->fetch();
          if($row){
            echo ",";
          }
        }
        echo "]}";
      }
      else {
        echo '{"result":0}';
      }
    }

    /**
    *description: A function that removes a user's favorited recipe from the list
    * of favorites using parameters (name and id) from url.
    * It echos a result of 1 when successful or 0 if unsuccessful
    * in JSON format.
    */
    function removeFavorite(){
      $id = $_REQUEST['id'];
      $name=$_REQUEST['name'];
      include("../model/favorite.php");
      $obj=new favorite();

      if($obj->removeFavorite($id, $name)) {
        echo '{"result":1}';
      }
      else {
        echo '{"result":0}';
      }
    }

    /**
    * description: A function that adds ingredients to the database using parameters (recipe id and name) from url.
    * It echos a result of 1 when successful or 0 if unsuccessful in JSON format.
    */
    function addIngredient(){
        $recipe=$_REQUEST['recipe'];
        $ingre=$_REQUEST['ingre'];

        include("../model/ingredient.php");
        $obj = new ingredient();
        if($obj->addIngredient($recipe, $ingre)){
            echo '{"result":1}';
        }else {
            echo '{"result":0}';
        }
    }

    /**
    * description: A function that displays all the ingredients of a particular recipe using parameters from url.
    * It echos a result of 1 when successful or 0 if unsuccessful in JSON format.
    */
    function viewIngredient(){
        $id=$_REQUEST['id'];
        include("../model/ingredient.php");
        $obj=new ingredient();

        if($obj->getIngredients($id)) {
            $row=$obj->fetch();
            echo '{"result":1,"ingredients":[';
            while($row){
                echo json_encode($row);
                $row=$obj->fetch();
                if($row){
                    echo ",";
                }
            }
            echo "]}";
        }
        else {
            echo '{"result":0}';
        }
    }

    /**
    * description: A function that displays all the ingredients of a particular recipe using parameters from url.
    * It echos a result of 1 when successful or 0 if unsuccessful in JSON format.
    */
    function addInstruction(){
        $recipe=$_REQUEST['recipe'];
        $instr=$_REQUEST['instruction'];

        include("instruction.php");
        $obj = new instruction();
        if($obj->addInstruction($recipe, $instr)){
            echo '{"result":1}';
        }else {
            echo '{"result":0}';
        }
    }

    /**
    * description: A function that displays all the ingredients of a particular recipe using parameters from url.
    * It echos a result of 1 when successful or 0 if unsuccessful in JSON format.
    */
    function viewInstruction(){
        $id=$_REQUEST['id'];
        include("instruction.php");
        $obj=new instruction();

        if($obj->getInstruction($id)) {
            $row=$obj->fetch();
            echo '{"result":1,"instructions":[';
            while($row){
                echo json_encode($row);
                $row=$obj->fetch();
                if($row){
                    echo ",";
                }
            }
            echo "]}";
        }else {
            echo '{"result":0}';
        }
    }

    /**
    * description: A function that adds a new user to the database using parameters from url.
    * It echos a result of 1 when successful or 0 if unsuccessful in JSON format.
    */
    function addUser(){
        $name = $_REQUEST['name'];
        $pword = $_REQUEST['pword'];
        $num = $_REQUEST['number'];
        include("user.php");
        $obj=new user();

        if($obj->addUser($name, $pword, $num)) {
            echo '{"result":1}';
        }else {
            echo '{"result":0}';
        }
    }

/**
* description: A function that gets a user using parameters from url.
* It echos a result of 1 when successful or 0 if unsuccessful in JSON format.
*/
function getUser(){
    $id=$_REQUEST['id'];
    include("user.php");
    $obj=new user();

    if($obj->getUser($id)) {
        $row=$obj->fetch();
        echo '{"result":1,"user":[';
            echo json_encode($row);
        echo "]}";
    }else {
        echo '{"result":0}';
    }
}
?>
