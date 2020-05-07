// Script pour afficher l'image a upload
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadForm + img').remove();
            $('#uploadForm').after('<img src="'+e.target.result+'" height="300px" width:auto color:white; />');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#fileToUpload").change(function () {
    filePreview(this);
    console.log(this);
});

