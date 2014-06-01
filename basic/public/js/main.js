$(function(){

    var hash = window.location.hash;

    $("input[name=photo]").change(function (){
    	if($("input[name=photo]")[0].files[0].size>=1048576){
    		alert('La imagen seleccionada es muy grande y puede tardar más de 1 minuto en cargar, es aconsejable seleccionar una más pequeña.');
		}
    });

	if ($("section#portada").length){

		$("section#portada").click( function(){
			window.location="home";
		});
	}

	if ($("section#register").length){ 
	}
	if($("section#clients").length){ 
		if( hash == '#formClient' ){
			$(hash).modal('show'); 	 
			inputOpen();
			showSubClient();
		}
		$('.popup-add').popover({
        	placement : 'left',
        	html : true
    	}); 
    	$('.popup-add').on("click", function (){
    		$(".popover-content").html($("#add-subclient").html());
    		$("input[name=id_parent]").val($(this).parent().parent().children().children().attr("href").replace('#', '')); 
    	});
		$( "input" ).on( "click", inputOpen);
		$( "#addsubclient" ).on( "click", addSubClient);
		$( "#deletesubclient" ).on( "click", deleteSubClient);

	}
	if($("section#contacts").length){  

	}
	if($("section#status").length){  

		$.fn.datepicker.defaults.language = "es";
		$.fn.datepicker.defaults.format = "dd-mm-yyyy";
		$('.input-append.date').datepicker({ 
		    todayBtn: false,
		    language: "es",
			autoclose: true, 
	  		format: 'dd-mm-yyyy',
	  		todayHighlight: true
		});  
		$('.box-radio').tooltip();
	    $('#timepicker').timepicker({
            minuteStep: 5,
            showInputs: false,
            disableFocus: true,
            showMeridian: false
        }); 
		getUrlVal();
	 	setMagazineEdition($('select[name=magazines]').val()); 
		$(".input-append.date.filter").datepicker().on("changeDate", function(e){ 
			input = $(e['target']).attr("name"); 
			fecha = pad(e['date'].getDate())+'-'+pad(e['date'].getMonth()+1)+'-'+e['date'].getFullYear();
			datesStart();
			sort = $("select[name=sort]").val();
			revista = $('select[name=magazines]').val(); 
			if($('select[name=editions]').val()!=0)
				edition = $('select[name=editions]').val();  
			client = $('select[name=clients]').val();  
			executive = $('select[name=executive]').val(); 
			color = $('select[name=color]').val();  
			search = $('input[name=search]').val(); 
			if(input == 'date-ini')
				($('input[name=date-end]').val())?alldate='&date-ini='+fecha+'&date-end='+dateEnd:alldate='&date-ini='+fecha+'&date-end='+today; 
			else
				($('input[name=date-ini]').val())?alldate='&date-ini='+dateIni+'&date-end='+fecha:alldate='&date-ini='+today+'&date-end='+fecha;
			path = '?sort='+sort+alldate;
			//console.log(alldate);
			($('select[name=magazines]').val())?path+='&magazines='+revista:path; 
    		(typeof(edition) != "undefined" && typeof(edition) != "object" && edition != 0)?path+='&edition='+edition:path;  
		    (client && client!=0)?path+='&client='+client:path; 
		    (executive && executive!=0)?path+='&executive='+executive:path; 
			setLocation();		 
		}); 
		$("select[name=sort], select[name=magazines], select[name=editions], select[name=clients], select[name=executive], select[name=color]").on( 'change', function(){  		
			datesStart();  
			sort = $("select[name=sort]").val();    
			revista = $('select[name=magazines]').val();  
			editionRow = $('select[name=editions]').val(); 
			client = $('select[name=clients]').val();  
			executive = $('select[name=executive]').val(); 
			color = $('select[name=color]').val(); 
			search = $('input[name=search]').val(); 
			if(editionRow.length >= 0 && editionRow!=0) 
				edition = editionRow;	 	
			if($(this).attr('name')=='magazines')
				edition = 0; 
			setFilterData();	 
			setLocation();  
		});   
		$(document).keypress(function(e) {
		    if(e.which == 13) {
	 			setVariables();
		    }
		});
		$("#send-search").on('click', function(){  
			setVariables(); 
		});	
		function setVariables(){ 
			datesStart();  
			sort = $("select[name=sort]").val();    
			revista = $('select[name=magazines]').val();  
			editionRow = $('select[name=editions]').val(); 
			client = $('select[name=clients]').val();  
			executive = $('select[name=executive]').val(); 
			color = $('select[name=color]').val();  
			search = $('input[name=search]').val();  
			setFilterData();
			setLocation();  
		}
		var actualClient;
		var actualSatutus;
		$(".editStatus").on('click', function(){ 
			var tab = this.href.split("#");  
			actualSatutus = tab[1];
			localStorage.setItem('actualSatutus', actualSatutus);
			$('#form-edit-status :input[name=id_status]').val( $('#'+actualSatutus+' :input[name=id_status]').val() ); 
			$('#form-edit-status :input[name=status]').val( $('#'+actualSatutus+' :input[name=status]').val() );
			$('#form-edit-status :input[name=edition]').val( $('#'+actualSatutus+' :input[name=edition]').val() );
			$('#form-edit-status :input[name=magazine]').val( $('#'+actualSatutus+' :input[name=magazine]').val() );
			$('#form-edit-status :input[name=comments]').val( $('#'+actualSatutus+' :input[name=comments]').val() );
			$('#form-edit-status :input[name=id_user]').val( $('#'+actualSatutus+' :input[name=id_user]').val() );
			$('#form-edit-status :input[name=id_client]').val( $('#'+actualSatutus+' :input[name=id_client]').val() );
			actualClient = $('#'+actualSatutus+' :input[name=id_client]').val(); 
			localStorage.setItem('actualClient', actualClient); 
			$('#form-edit-status :input[name=date]').datepicker('update', $('#'+actualSatutus+' :input[name=date]').val() );  
			$('#form-edit-status :input[name=time]').val( $('#'+actualSatutus+' :input[name=time]').val() ); 
			$('#form-edit-status :radio[name=color] ').filter( '[value='+$('#'+actualSatutus+' :input[name=color]').val()+']' ).prop('checked', true);
			console.log("click "+actualSatutus);
		}); 
	    $('#formStatusEdit').on('shown.bs.modal', function() { 
	    	actualClient = localStorage.getItem('actualClient');
	    	actualSatutus = localStorage.getItem('actualSatutus');
			console.log("modal "+actualClient+"  "+actualSatutus);
			setClientContactsSelect(actualClient, $('#'+actualSatutus+' :input[name=id_contact]').val()); 
	    })
	}
	if($("section#users").length){ 
			 
	} 

	$('#sandbox-container .input-append.date').datepicker({
	    startView: 2,
	    todayBtn: false,
	    language: "es",
		autoclose: true, 
  		format: 'dd-mm-yyyy',
  		todayHighlight: true
	}); 

	if( hash == '#formStatus' || hash == '#formContact' || hash == '#formStatusEdit' )
		$(hash).modal('show');  
	else if(hash == '#perfilEdit'){
		$('#perfil').hide();
		$(hash).show(400);
	}  
	else
		$(hash).collapse('show'); 
	if(hash.substring(0,4) == '#sub'){  
		$( "#"+$(hash).parent().parent().parent().attr("id") ).collapse('show');
	} 

	$("#edit-perfil").click(function(){
		$("#perfil").toggle(400);
		$("#perfilEdit").toggle(400); 
	});

}); 

    
