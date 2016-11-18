<?php

    /**
     * Class for the main template
     *
     * Any information requested by the template will be provided by this class
     * as well as it's behaviour.
     */
    class corpse extends Template{

        // Set Meta Tags Information.
        public $_title = "Corpse App";

        // Set what page and template should be used to render this template.
        function __construct($id){
			global $db;

			$this -> setPage("home.html");
            $this -> setTemplate("corpse.html");

			if($db -> exists("Corpse", "ID", $id)){
				$corpse = $db -> select("Corpse", ["Title", "Content"], "ID", $id)[0];

				$this -> _title = $corpse["Title"];
				$this -> _content = "";

                $text = explode("\n", $corpse["Content"]);
				array_pop($text);

                foreach($text as $index => $t){
                    $this -> _content .= "<p>".$text[$index]."</p>";
                }


			}else{
				HTTP::error(404);
			}



        }



    }

?>
