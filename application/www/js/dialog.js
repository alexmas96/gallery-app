'use strict';
/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////
function dialog(){
    $(document).on("click", ".open-AddBookDialog", function () {
        
        console.log($(this).data('name'));
        var photo = $(this).data("photo");
        var picture = document.getElementById("moddal-photo");
        var removePaintBtn = document.getElementById("removePaintBtn");
        console.log(getWwwUrl()+"/images/paints/"+photo);

        // Recuperation des variable passé par le data-set de l'element
        var paintId = $(this).data('id');
        var paintName = $(this).data("name");
        var photoPath = getWwwUrl()+"/images/paints/"+photo ;
        $(".modal-body #paintId").val( paintId );
        $(".modal-body #paintName").val(paintName);
        console.log(paintId);
        // formation du lien pour la confirmation de la suppression d'une image
        var url = getRequestUrl()+"/remove?id="+$(this).data('id');
        removePaintBtn.setAttribute("href", url)
        picture.src =  photoPath;
   });
}

/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////

dialog();

