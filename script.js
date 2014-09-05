$(document).ready(function() {	
	$("#addlinkbox").fadeOut(0);
	$("#createfolderbox").fadeOut(0);

	$("#addlink").click(function() {
		$("#addlinkbox").slideToggle("slow");
	});
	
	$("#createFolder").click(function() {
		$("#createfolderbox").slideToggle("slow");
	});	
	
	//Neuen Link zur Datenbank hinzufügen
	$("#addlinksubmit").click(function() {
		$.post( "api.php", { action: "addlink", title: $("#addlinktitle").val(), url: $("#addlinkurl").val(), folder: $("#addlinkfolder").val() });
		$("#addlinkbox").slideToggle("fast");
		$("#addlinktitle").val("");
		$("#addlinkurl").val("");
		$("#addlinkfolder").val("main");
		alert("Um den neuen Link in der Cloud angezeigt zu bekommen, müssen sie derzeitig noch manuell die Seite neuladen (F5)");
	});
	
	//Neuen Ordner zur Datenbank hinzufügen
	$("#createfoldersubmit").click(function() {		
		$.post( "api.php", { action: "createfolder", name: $("#createfoldername").val()});
		$("#createfolderbox").slideToggle("fast");
		$("#createfoldername").val("");
	});	
	
	//Link aus Datenbank löschen
	$("img").click(function() {
		$.post( "api.php", { action: "deletelink", title: this.id } );
		alert(this.id);
	})
	
	$("ul").not($("ul.window")).fadeOut(0);
	$("ul.main").fadeIn(0);
	
	$("li").click(function() {
		$("ul" + "." + $(this).attr("class")).slideToggle();
	});

});