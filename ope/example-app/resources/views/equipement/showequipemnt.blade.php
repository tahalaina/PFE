<x-master title="equipements">






















<div class="container mt-5">
    <h1>Équipements</h1>
    <div class="row mb-3">
        <div class="col-md-6">
            <input type="text" class="form-control" id="search-input" placeholder="Rechercher par nom">
        </div>
        <div class="col-md-6">
            <select class="form-control" id="rows-per-page">
                <option value="5">Afficher 5 lignes</option>
                <option value="10">Afficher 10 lignes</option>
                <option value="20">Afficher 20 lignes</option>
                <option value="50">Afficher 50 lignes</option>
                <option value="100">Afficher 100 lignes</option>
            </select>
        </div>
    </div>
    <table id="equipements-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Modèle</th>
                <th>Etat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipements as $equipement)
            <tr>
                <td>{{ $equipement['name'] }}</td>
                <td>{{ $equipement['modele'] }}</td>
                <td>{{ $equipement['status'] }}</td>
                <td>
                    <a href=""><button type="submit" class="btn btn-success">Modifier</button></a>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script>
    $(document).ready(function() {
        var table = $('#equipements-table').DataTable({
            "language": {
                "search": "Rechercher :"
            },
            "lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]]
        });

        $('#search-input').on('keyup', function() {
            table.search(this.value).draw();
        });

        $('#rows-per-page').on('change', function() {
            table.page.len(this.value).draw();
        });
    });</script>

</x-master>