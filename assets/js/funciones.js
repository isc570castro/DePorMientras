  $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: 'Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#datepicker").datepicker();
});

 $( function() {
    $( "#sortable1, #sortable2,#sortable3,#sortable4,#sortable5,#sortable6,#sortable7,#sortable8,#sortable9,#sortable10" ).sortable({
      placeholder: 'placeholder',
      cursor: "move",
      opacity: 0.7, helper: "clone", 
      cursorAt: { top: 20, left: 56 }, 
      revert: true,
      connectWith: ".connectedSortable",
      update: function(event,ui) {
        var postDataA=$('#sortable1').sortable('serialize');
        var postDataB=$('#sortable2').sortable('serialize');
   $.post("Ajax2.php",{list1:postDataA,list2:postDataB},function(o){
    console.log(o); 
    },'json');
         
         }
    });
  } );