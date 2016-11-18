<?php

    /**
     * Class for the main template
     *
     * Any information requested by the template will be provided by this class
     * as well as it's behaviour.
     */
    class corpseAdd extends Template{

        // Set Meta Tags Information.
        public $_title = "Aegis Framework";

        // Set what page and template should be used to render this template.
        function __construct($id){
			global $db;

			$this -> setPage("home.html");
            $this -> setTemplate("corpseAdd.html");
			$this -> id = $id;

			if($db -> exists("Corpse", "ID", $id)){
				$corpse = $db -> select("Corpse", ["Title", "Content"], "ID", $id)[0];

				$this -> _title = $corpse["Title"];
				$text = explode("\n", $corpse["Content"]);
				array_pop($text);

                foreach($text as $index => $t){
                    $text[$index] = "<p>".$text[$index]."</p>";
                }

				$this -> first = $text[0];
				$this -> last = end($text);
			}else{
				HTTP::error(404);
			}



        }



    }

?>
