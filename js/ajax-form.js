$(document).ready(function(){
 
    $("#submit").click(function{
 
        $.post(
            'connexion.php', // Un script PHP que l'on va créer juste après
            {
                login : $("#Email").val();  // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php
                password : $("#Pwd").val();
            },
 
            function(data){ // Cette fonction ne fait rien encore, nous la mettrons à jour plus tard
            },
 
            'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
         );
 
    });
 
});