$_ready(function(){

	$_(".nav .menu-icon").click(function(){
		$_(this).parent().find("ul").toggleClass("active");
		$_(this).toggleClass('fa-bars fa-times');
	});

	$_(".nav li").click(function(){
		if($_(".menu-icon").isVisible()){
			$_(".menu-icon").toggleClass('fa-bars fa-times');
			$_(this).parent().parent().find("ul").toggleClass("active");
		}
	});

	$_("form").submit(function(e){
		e.preventDefault();
		Request.post("/Corpse/corpse/" + $_("input[type='hidden']").value(), "add=" + encodeURI($_("input[name='add']").value()),{

			onsuccess: function(data){
				console.log(data);
			},

			onerror: function(){

			}
		});
	});

});
