// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

function pad(s) { return (s < 10) ? '0' + s : s; }
function getURLParameter(name) {
  return decodeURI(
   (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
   );
}
function datesStart(){  
    today = new Date();
    today = pad(today.getDate())+'-'+pad(today.getMonth()+1)+'-'+today.getFullYear();  
    x = $('input[name=date-ini]').val().split('-');
    dateIni = new Date(x[2],parseInt(x[1]-1),parseInt(x[0])); 
    dateIni = pad(dateIni.getDate())+'-'+pad(dateIni.getMonth()+1)+'-'+dateIni.getFullYear();  
    y = $('input[name=date-end]').val().split('-');
    dateEnd = new Date(y[2],parseInt(y[1]-1),parseInt(y[0]));
    dateEnd = pad(dateEnd.getDate())+'-'+pad(dateEnd.getMonth()+1)+'-'+dateEnd.getFullYear();  
}
function getUrlVal(){    
    if(getURLParameter('sort') != 'null' )  
        $('select[name=sort]').val(getURLParameter('sort'));  
    if(getURLParameter('date-ini') != 'null' && getURLParameter('date-end') != 'null'){  
        inidate = getURLParameter('date-ini').split('-');
        ini = new Date(inidate[2],parseInt(inidate[1]-1),parseInt(inidate[0]));  
        enddate = getURLParameter('date-end').split('-');
        end = new Date(enddate[2],parseInt(enddate[1]-1),parseInt(enddate[0])); 
        $('input[name=date-ini]').datepicker('update', ini); 
        $('input[name=date-end]').datepicker('update', end);        
    } 
    if(getURLParameter('magazine') != 'null' )
        $('select[name=magazines]').val(getURLParameter('magazine'));  
    if(getURLParameter('client') != 'null' )  
        $('select[name=clients]').val(getURLParameter('client')); 
    if(getURLParameter('executive') != 'null' )  
        $('select[name=executive]').val(getURLParameter('executive'));  
    if(getURLParameter('color') != 'null' )  
        $('select[name=color]').val(getURLParameter('color'));  
} 
function getUrlValEdition(){ 
    if(getURLParameter('edition') != 'null' )  
        $('select[name=editions]').val(getURLParameter('edition')); 
}
function setLocation(){
    url = document.location["pathname"]; 
    document.location = url+path;    
}
function setFilterData(){
    if($('input[name=date-ini]').val() && $('input[name=date-end]').val())
        alldate='&date-ini='+dateIni+'&date-end='+dateEnd;
    else if($('input[name=date-ini]').val() && !$('input[name=date-end]').val())
        alldate='&date-ini='+dateIni+'&date-end='+today;
    else
        alldate = '';
    (alldate)?path='?sort='+sort+alldate:path='?sort='+sort;  
    (revista)?path+='&magazine='+revista:path; 
    (typeof(edition) != "undefined" && typeof(edition) != "object" && edition != 0)?path+='&edition='+edition:path;  
    (client && client!=0)?path+='&client='+client:path; 
    (executive && executive!=0)?path+='&executive='+executive:path; 
    (color && color!=0)?path+='&color='+color:path; 
}
function inputOpen(){
    if( $( "input:checked" ).val() ==1 ){
            $('#subclients').show('300');
          }
          else{
            $('#subclients').hide('300');
            var subclient = 0;  
            while($("input[name='sub-cl-name"+subclient+"']").val()){   
                $("input[name='sub-cl-name"+subclient+"']").val(''); 
                subclient ++ ;
            }
          }
}
function addSubClient(){
    var subclient = 0;  
    while($("input[name='sub-cl-name"+subclient+"']").val()){  
        if($("input[name='sub-cl-name"+(subclient+1)+"']").val()==""){ 
            $("#inputsubclient"+(subclient+1)).show('400');
            return false;
        }
        subclient ++ ;
    }
}
function showSubClient(){
    var subclient = 0;  
    while($("input[name='sub-cl-name"+subclient+"']").val()){   
        $("#inputsubclient"+subclient).show('400'); 
        subclient ++ ;
    }
}
function deleteSubClient(){
    var subclient = 8;  
    while($("input[name='sub-cl-name"+subclient+"']").val()=="" && subclient>0){  
        if($("input[name='sub-cl-name"+(subclient)+"']").val()==""){ 
            $("#inputsubclient"+(subclient)).hide('400');
        }
        subclient -- ;
    }
}
function setMagazineEdition(magazine){
    $.ajax({
      type: "POST",
      url: "/avefenix/basic/public/status/edition/"+magazine 
    })
      .done(function( edition ) {
        if(edition[0]){  
            $('select[name=editions]')
            .html($("<option></option>")
            .attr("value",'0')
            .text('Edición'));  
            $.each(edition, function(key, value) {    
                $('select[name=editions]')
                    .append($("<option></option>")
                    .attr("value",value['edition'])
                    .text(value['edition'])); 
            });
            $('select[name=editions]').removeClass('hidden');
            getUrlValEdition();
        }
      }); 
}


