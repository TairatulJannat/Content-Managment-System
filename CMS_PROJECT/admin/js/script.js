$(document).ready(function(){
         ClassicEditor
         .create( document.querySelector( '#body' ) )
         .catch( error => {
             console.error( error );
         } );


         $('#selectAllBoxes').click(function(event){

            if(this.checked) {
    
                $('.checkBoxes').each(function(){
    
                    this.checked = true;
    
                });
    
            } else {
    
    
                $('.checkBoxes').each(function(){
    
                    this.checked = false;
    
                });
    
    
            }
    
        });
    


});
setInterval(function(){
    loadUsersOnline();
},500);


function loadUsersOnline(){
    $.get("function.php?onlineusers=result", function(data){
        $(".usersonline").text(data);
    });
}

loadUsersOnline();



