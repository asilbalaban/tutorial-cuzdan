$(function() {
  $( "#baslangic" ).datepicker({
    defaultDate: "+1w",
    changeMonth: false,
    numberOfMonths: 1,
    dateFormat: "yy-mm-dd",
    onClose: function( selectedDate ) {
        ( "option", "minDate", selectedDate );
    },
    onSelect: function (selectedDate) {
      var bitis = $('#bitis').datepicker({dateFormat: "yy-mm-dd"}).val();
      window.location = base_url+"cuzdan/genelBakis?baslangic="+selectedDate+"&bitis="+bitis;
    }
  });
  $( "#bitis" ).datepicker({
    defaultDate: "+1w",
    changeMonth: false,
    numberOfMonths: 1,
    dateFormat: "yy-mm-dd",
    onClose: function( selectedDate ) {
      $( "#baslangic" ).datepicker( "option", "maxDate", selectedDate );
    },
    onSelect: function (selectedDate) {
      var baslangic = $('#baslangic').datepicker({dateFormat: "yy-mm-dd"}).val();
      window.location = base_url+"cuzdan/genelBakis?baslangic="+baslangic+"&bitis="+selectedDate;
    }
  });
});
