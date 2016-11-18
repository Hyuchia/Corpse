$_ready(function(){

	$_("form.new-corpse").submit(function(e){
		e.preventDefault();
		Request.post("/Corpse/corpse/", "title=" + encodeURI($_("input[name='title']").value()) + "&" +  "initial=" + encodeURI($_("input[name='initial']").value() ),{

			onload: function(data){
				console.log(data);
			},

			error: function(){

			}
		});
	});

	$_("form.new-fragment").submit(function(e){
		e.preventDefault();
		Request.post("/Corpse/corpse/" + $_("input[type='hidden']").value(), "add=" + encodeURI($_("input[name='add']").value()),{

			onload: function(data){
				console.log(data);
			},

			error: function(){

			}
		});
	});


	$_("[data-trigger]").click(function(){
		switch($_(this).data("trigger")){
			case "full-corpse":
				Request.json("/Corpse/" + $_(this).data("corpse"), {
					onload: function(data){
						console.log(data);
					},

					error: function(data){
						console.log(data);
					}
				});
				break;
			case "fragment":
					Request.json("/Corpse/corpse" + $_(this).data("corpse"), {
						onload: function(data){
							console.log(data);
						},

						error: function(data){
							console.log(data);
						}
					});
					break;
		}
	});

});
