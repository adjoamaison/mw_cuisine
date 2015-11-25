<?php
	/**
	*author: Agatha Adjoa Maison
	*date: 22nd November, 2015
	*description: A class that manages the interactions of instructions of a recipe with the database
	*/
	include("adb.php");
	class instructions extends adb{
		/**
		*description: A function to add instructions of a recipe to the database
		*@param recipe
		*@param instruction
		*@return sql result set
		*/
		function addInstruction($recipe,$instruction){
			$str_query="INSERT INTO cuisine_instruction SET recipe_id='$recipe', instruction='$instruction'";
			return $this->query($str_query);
		}

		/**
		*description: A function to view the instructions of a particular recipe
		*@return sql result set
		*/
		function getInstruction($id){
			$str_query="SELECT instruction FROM cuisine_instruction WHERE recipe_id='$id'";
			return $this->query($str_query);
		}
	}
  ?>
