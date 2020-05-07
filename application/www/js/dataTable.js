$(document).ready(function() {
  $("#datatable").DataTable({
    responsive: true,
    lengthMenu: [[5, 10, 15, 20],[5, 10, 15, 20]],
    iDisplength: 5,
    columnDefs: [
      { responsivePriority: 1, targets: 0 },
      { responsivePriority: 2, targets: -1 },
      { responsivePriority: 3, targets: -1 }
    ],
    language:{
      "decimal":        "",
      "emptyTable":     "pas de donné disponible dans la table",
      "info":           "Affichage de _START_ à _END_ sur _TOTAL_ entries",
      "infoEmpty":      "Affiche de 0 à 0 sur 0 resultats",
      "infoFiltered":   "(filtré de _MAX_ resultats total)",
      "infoPostFix":    "",
      "thousands":      ",",
      "lengthMenu":     "Affiche _MENU_ resultats",
      "loadingRecords": "Chargement...",
      "processing":     "En traitement...",
      "search":         "Recherche:",
      "zeroRecords":    "Aucun enregistrements correspondants trouvés",
      "paginate": {
          "first":      "Premier",
          "last":       "Dernier",
          "next":       "Suivant",
          "previous":   "précédent"
      },
      "aria": {
          "sortAscending":  ": activer pour trier la colonne en ordre croissant",
          "sortDescending": ": activer pour trier la colonne en ordre décroissant"
      }
    }

  });
});
