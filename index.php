<?php

	/**
	 * ==============================
	 * Aegis Framework | MIT License
	 * http://www.aegisframework.com/
	 * ==============================
	 */

	/**
	 * Include Aegis Library
	 *
	 * This includes the custom error handlers and the autoload function
	 * required to load classes dynamically.
	 */
	include("lib/Aegis.php");

	/**
	 * Debugging logs are shown on errors by default, to disable them,
	 * uncomment the following line.
	 */
	//Aegis::$debugging = false;

	/**
	 * Set domain name for Router
	 *
	 * This domain name is used for routing purposes and to load all resources
	 * correctly since it's used in the base tag for the pages. Set it to the
	 * path of your project.
	 */
	Router::$domain = "localhost/Corpse";

	$db = new Database(Config::get("DB_User"), Config::get("DB_Pass"), Config::get("DB"));
	/**
	 * Register Routes
	 *
	 * Register all the custom routes for your site, the callback function
	 * will be executed when the route is accessed.
	 */
	Router::get("/", function(){
		return new main();
	});

	Router::get("/{id}", function($id){
		return new corpse($id);
	});

	Router::get("/corpse/{id}", function($id){
		return new corpseAdd($id);
	});

	Router::post("/corpse/{id}", function($id){
		global $db;

		if($db -> exists("Corpse", "ID", $id)){
			if($data = Request::post(["add"])){
				$prev = $db -> select("Corpse", ["Content"], "ID", $id)[0]["Content"];

				$db -> update("Corpse", ["Content" => $prev.$data["add"]."\n"], "ID", $id);
			}
		}
	});

	Router::post("/corpse", function($id){
		global $db;

		if($db -> exists("Corpse", "ID", $id)){
			if($data = Request::post(["title", "initial"])){
				$db -> insert("Corpse", [
					"Title" => $data["title"],
					"Content" => $data["initial"]."\n"
				]);
			}
		}
	});



	/**
	 * Make the router listen to requests.
	 *
	 * The router will now match any request to the previously registered
	 * routes and run the callback function of the match.
	 */
	Router::listen();
?>
