<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="{{ asset('css/plaging.css') }}">
 
  <title>| Historique</title>
  
  <link rel="icon" href="{{ asset('img/favicon3.ico') }}" type="image/x-icon">
</head>
<style>
    body {
      padding-top: 70px;
    }
 /* Pagination */
.pagination {
  display: flex;
  justify-content: center;
  margin-top: 1rem;
}

.pagination .page-item {
  margin: 0 0.25rem;
}

.pagination .page-link {
  color: #007bff;
  background-color: #fff;
  border: 1px solid #dee2e6;
  padding: 0.5rem 0.75rem;
  border-radius: 0.25rem;
  transition: all 0.3s ease;
}

.pagination .page-link:hover {
  color: #0056b3;
  background-color: #e9ecef;
  border-color: #dee2e6;
}

.pagination .page-item.active .page-link {
  z-index: 3;
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.pagination .page-item.disabled .page-link {
  color: #6c757d;
  pointer-events: none;
  background-color: #fff;
  border-color: #dee2e6;
}
</style>
<body>
    @include('layout.nav')
   
   <main> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session()->has('success'))
          <script>
              Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: '{{ session('success') }}',
              });
          </script>
      @endif
      @if (session()->has('error'))
      <script>
          Swal.fire({
              icon: 'error',
              title: 'error!',
              text: '{{ session('error') }}',
          });
      </script>
  @endif
         
        
    
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Accueil</a>
            </li>
            <li class="breadcrumb-item">Equipements</li>
            <li class="breadcrumb-item active">Gestion</li>
        </ol>
    </nav>
    <div class="sidebar">
        <a class="nav-link" href="{{ route('home') }}" title="Accueil">
          <i class="fas fa-home"></i>
          <span>Accueil</span>
        </a>
        <a class="nav-link" href="{{ route('equipement') }}" title="Équipement">
          <i class="fas fa-toolbox"></i>
          <span>Équipement</span>
        </a>
        <a class="nav-link" href="{{ route('consomable') }}" title="Consommable">
          <i class="fas fa-box-open"></i>
          <span>Consommable</span>
        </a>
        @php
            $id = Illuminate\Support\Facades\Auth::id();
            $utilisateur = App\Models\Etudiant::find($id);
        @endphp
        @if ($utilisateur->role === 'admin')
        <a class="nav-link" href="{{ route('utiliosateur.index') }}" title="Utilisateur">
          <i class="fas fa-users"></i>
          <span>Utilisateur</span>
        </a>
        @endif
        <a class="nav-link" href="{{ route('logout') }}" title="Déconnecter">
          <i class="fas fa-sign-out-alt"></i>
          <span>Déconnecter</span>
        </a>
    </div>
    <div id="table-data" class="table-data container mt-4">
        @if (session()->has('alert-warning'))
            <div class="alert alert-warning">{{ session('alert-warning') }}</div>
        @endif

        <h1 class="text-center">Historique de l'équipement :</h1>
        <div class="text-center">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-left: 1000px">
                Rechercher
            </button>
        </div>

        <!-- Bootstrap Modal for Search -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> <strong class="text-black">Rechercher</strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('recherche.historique') }}" method="GET" >
                            <!-- Add your form fields for search here -->
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tools"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="name" id="equipmentName" placeholder="Entrez le nom d'equipement">
                                    </div>
                                </div></div>
                                
                    </div>
                    <div class="modal-footer bg-body-secondary">
                        <button type="submit" class="btn btn-success">Rechercher</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    </div> </form>
                </div>
            </div>
        </div>

        <h2 class="text-center">Réservations :</h2>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Utilisateur</th>
                        <th>Equipement</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipements as $equipement)
                        @if (isset($reservations[$equipement->id]))
                            @foreach ($reservations[$equipement->id] as $reservation)
                                <tr>
                                    <td>{{ $reservation->id }}</td>
                                    @php
                                        $user = App\Models\Etudiant::find($reservation->etudiant_id);
                                        $equipment = App\Models\Equipement::find($reservation->equipement_id);
                                    @endphp
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $equipment->name }}</td>
                                    <td>{{ $reservation->date_debut }}</td>
                                    <td>{{ $reservation->date_fin }}</td>
                                </tr>
                            @endforeach
                            
                        @endif
                    @endforeach
                </tbody>
            
            </table>
       
        </div>
        
        <!-- Pagination Links -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-lg-end">
                {{ $equipements->links('pagination::bootstrap-4') }}
            </ul>
        </nav>
    </div>

   </main> 

    <a href="#" id="back-to-top" class="back-to-top">
      <i class="fas fa-arrow-up"></i>
    </a>
    @include('layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('javascript/equipement.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<script>
  document.getElementById('main-icon').addEventListener('click', function() {
      var extraIcons = document.getElementById('extra-icons');
      if (extraIcons.classList.contains('show')) {
          extraIcons.classList.remove('show');
          setTimeout(() => {
              extraIcons.style.display = 'none';
          }, 300); // Correspond au temps de la transition
      } else {
          extraIcons.style.display = 'block';
          setTimeout(() => {
              extraIcons.classList.add('show');
          }, 10); // Permet d'attendre le prochain cycle de rendu pour ajouter la classe
      }
  });

  // Optionally, close the extra icons when clicking outside
  document.addEventListener('click', function(event) {
      var isClickInside = document.getElementById('main-icon').contains(event.target) || document.getElementById('extra-icons').contains(event.target);
      if (!isClickInside) {
          var extraIcons = document.getElementById('extra-icons');
          if (extraIcons.classList.contains('show')) {
              extraIcons.classList.remove('show');
              setTimeout(() => {
                  extraIcons.style.display = 'none';
              }, 300); // Correspond au temps de la transition
          }
      }
  });
</script>