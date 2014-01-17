$("#newpconfirm").change(function(){
     if($(this).val() != $("#newp").val()){
               alert("values do not match");
               //more processing here
     }
});
