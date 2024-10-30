<!-- Fichier JavaScript 'histroiquejs.blade.php' -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        // Écoute de l'événement 'keyup' sur l'input de recherche
        $(document).on('keyup', '#recherche', function(e) {
            e.preventDefault();
            let search = $('#recherche').val();

            // Envoi d'une requête AJAX pour récupérer les résultats de la recherche
            $.ajax({
                url: "{{ route('recherche.historique') }}",
                method: 'GET',
                data: { search: search },
                success: function(data) {
                    // Mise à jour du contenu de la div 'table-data' avec les résultats de la recherche
                    $('#table-data').html(data);
                    // Si aucun équipement n'a été trouvé, affichage d'un message d'erreur
                    if (data.message == "aucun equipement trouvé") {
                        $('#table-data').html('<span class="text-danger">aucun equipement trouvé</span>');
                    }
                }
            });
        });
    });
</script>