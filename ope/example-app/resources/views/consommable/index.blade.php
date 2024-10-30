<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>| Gestion consommables</title>
  <link rel="icon" href="{{ asset('img/favicon3.ico') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <style>
    .icon-btn {
            border: none;
            background: none;
            cursor: pointer;
        }
        .icon-btn i {
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        .icon-btn.cancel:hover i {
            color: #dc3545; /* Red color for cancel icon */
        }
    body {
      background-image: url('{{ asset("img/acceuil.jpg") }}');
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4); /* Dark overlay to ensure text readability */
      z-index: 1;
    }

    .content-container {
      position: relative;
      z-index: 2;
      flex: 1;
      padding: 40px 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .navbar {
      background-color: white;
      position: relative;
      z-index: 2;
    }

    .navbar-brand img {
      height: 40px;
    }

    .navbar-nav .nav-link {
      color: #333;
    }

    .navbar-nav .nav-link.active {
      color: #007bff;
    }

    .block {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      text-align: center;
      margin: 0 1px 40px;
      height: 300px;
      width: 200px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: transform 0.3s;
    }

    .block:hover {
      transform: scale(1.05);
    }

    .block h3 {
      margin-bottom: 20px;
    }

    .block p {
      flex-grow: 1;
    }

    .btn-primary {
      background-color: #001b4d;
      border-color: #001b4d;
    }

    .footer {
      background-color: #001b4d;
      color: white;
      padding: 10px 0;
      font-size: 14px;
      position: relative;
      z-index: 2;
    }

    .footer:hover {
      background-color: #001b4d;
    }

    .table-hover tbody tr:hover {
      background-color: #f5f5f5;
    }

    .table {
      color: white;
    }

    .table th, .table td {
      color: white;
    }

    .table .btn-action {
      cursor: pointer;
      font-size: 18px;
    }

    .table .btn-action:hover {
      color: #007bff;
    }

    .table .btn-delete:hover {
      color: red;
    }

    .sidebar {
      position: fixed;
      top: 68PX;
      bottom: 0;
      left: 0;
      width: 70px;
      background-color: #001b4d;
      z-index: 3;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 10px 0;
    }

    .sidebar .nav-link {
      color: white;
      margin-bottom: 20px;
      text-align: center;
    }

    .sidebar .nav-link i {
      display: block;
      font-size: 24px;
    }

    .sidebar .nav-link span {
      font-size: 12px;
    }

    .sidebar .nav-link:hover {
      color: #007bff;
    }
    .icon-btn {
            border: none;
            background: none;
            cursor: pointer;
        }
        .icon-btn i {
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        .icon-btn.cancel:hover i {
            color: #dc3545; /* Red color for cancel icon */
        }
        .reservation-table thead {
            background-color: #007bff;
            color: white;
        }
        .reservation-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .reservation-table tbody tr:hover {
            background-color: #d3e0ea;
        }
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            width: 40px;
            height: 40px;
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }
        .back-to-top:hover {
            background-color: #0056b3;
        }
        .back-to-top i {
            font-size: 18px;
        }
        .icon-btn.edit i {
        font-size: 1.2rem;
        transition: color 0.3s ease; /* Transition de couleur sur 0.3 seconde */
    }

    /* Effet de survol */
    .icon-btn.edit:hover i {
        color: #ffc107; /* Nouvelle couleur lors du survol */
    }
    .btn-group-custom {
    text-align: left; /* Alignement à gauche */
}
.user-initial {
        display: inline-block;
        width: 30px;
        height: 30px;
        background-color: #007bff;
        color: rgb(0, 0, 0);
        border-radius: 50%;
        text-align: center;
        line-height: 15px;
        font-size: 20px;
        font-weight: bold;
    } .form-group {
            margin-bottom: 1.5rem;
        }
        .input-group-text {
            width: 2.5rem;
            text-align: center;
        }
        .modal-body p {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .modal-body p i {
            margin-right: 10px;
            color: #adadad;
        }
        
  </style></head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}">
            <img src="../img/logo.png" alt="Mon site">
          </a>
          <div class="navbar-nav ml-auto">
             @php
            $id=Illuminate\Support\Facades\Auth::id();
     $utilisateur=App\Models\etudiant::find($id);
     @endphp  
            <a class="nav-link user-initial" href="{{ route('profile.edit') }}" title="{{ $utilisateur->name }}">
              {{ strtoupper(substr($utilisateur->name, 0, 1)) }}
          </a>
          </div>
        </div>
      </nav>
    
      <div class="overlay"></div>
    
    
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      @if (session()->has('error'))
      <script>
        Swal.fire({
          icon: 'error',
          title: 'error!',
          text: '{{ session('error') }}',
        });
      </script>
      @endif

      @if (session()->has('success'))
      <script>
        Swal.fire({
          icon: 'success',
          title: 'success!',
          text: '{{ session('success') }}',
        });
      </script>
      @endif
      
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
           $id=Illuminate\Support\Facades\Auth::id();
    $utilisateur=App\Models\etudiant::find($id);
    @endphp  @if ($utilisateur->role ==='admin')
    <a class="nav-link" href="{{ route('utiliosateur.index') }}" title="Utilisateur">
      <i class="fas fa-users"></i>
      <span>Utilisateur</span>
    </a>@endif
    <a class="nav-link" href="{{ route('logout') }}" title="Déconnecter">
      <i class="fas fa-sign-out-alt"></i>
      <span>Déconnecter</span>
    </a>
  </div>

  <div class="content-container" style="margin-left: 60px;">
    <div class="container">
        <h2 class="text-center text-white"><strong>Liste Des Consommables</strong></h2>  
        <div class="btn-group-custom">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Rechercher
            </button>
            <button type="button" class="btn btn-success" style="margin-left: 930px" id="add-equipment" title="Ajouter" data-bs-toggle="modal" data-bs-target="#plusIconModal">
                <i class="fas fa-plus"></i>
            </button>
        </div>

        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>name</th>
                    <th>type</th>
                    <th>Chercheur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consumables as $consumable)
                    @php
                        $etudiand = App\Models\etudiant::find($consumable->etudiant_id);
                    @endphp
                    <tr>
                        <td>{{ $consumable->name }}</td>
                        <td>{{ $consumable->type }}</td>
                        <td>{{ $etudiand->name }}</td>
                        <td>
                            <form action="{{ route('delete.consommable', $consumable->id) }}" method="POST" class="d-inline-block" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="icon-btn danger text-white" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>&nbsp;
                            <button type="button" class="icon-btn edit text-white" data-bs-toggle="modal" data-bs-target="#userModal{{ $consumable->id }}" title="Voir plus d'informations">
                                <i class="fas fa-info-circle"></i>
                            </button>&nbsp;
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Ensure pagination links are styled properly -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-lg-end">
                {{ $consumables->links('pagination::bootstrap-4') }}
            </ul>
        </nav>
    </div>
</div>

  @foreach ($consumables as $consumable)
  <div class="modal fade" id="userModal{{ $consumable->id }}" tabindex="-1" aria-labelledby="userModalLabel{{ $consumable->id }}" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="userModalLabel{{ $consumable->id }}">
                      
                      <strong class="text-center"> {{ $consumable->name }}</strong>
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p><i class="fas fa-user"></i><strong>Nom complet :</strong> &nbsp;{{ $consumable->name }}</p>
                <p><i class="fas fa-object-group"></i><strong>Type :</strong>&nbsp; {{ $consumable->type }}</p>
                <p><i class="fas fa-calendar-alt"></i><strong>Date de réception :</strong> &nbsp;{{ $consumable->date_reception }}</p>
                <p><i class="fas fa-calendar-times"></i><strong>Date d'expiration :</strong> &nbsp;{{ $consumable->date_expiration }}</p>
                <!-- Add more fields as needed -->
            </div>
              <div class="modal-footer bg-body-secondary">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
              </div>
          </div>
      </div>
  </div>
@endforeach  

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title tex" id="staticBackdropLabel"> <strong style="text-align: center">Recherche Consommable</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire de recherche -->
                <form action="{{ route('recheche') }}" method="get">
                    @csrf

                
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-tools"></i></span>
                              </div>
                              <input type="text" class="form-control" name="name" id="equipmentName" placeholder="Entrez le nom de consommable">
                          </div>
                      </div>
                      <div class="form-group col-md-6">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-tags"></i></span>
                              </div>
                              <input type="text" class="form-control" name="type" id="equipmentType" placeholder="Entrez le type de consommable">
                          </div>
                      </div>
                  </div>
                 
                      <div class="form-group ">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" style="min-width: 200px;">Date De Réception</span>
                              </div>
                              <input type="date" class="form-control" name="date_reception" id="date_reception">
                          </div>
                      </div>
                    
                      <div class="form-group ">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="min-width: 200px;">Date D'éxpiration</span>
                            </div>
                            <input type="date" class="form-control" name="date_expiration" id="date_expiration">
                        </div>
                    </div>
                  

        </div>
        <div class="modal-footer bg-body-secondary">
          <button type="submit" class="btn btn-success">Rechercher</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
      </div>
  </form>
    </div>
</div>
</div>
<div class="modal fade" id="plusIconModal" tabindex="-1" aria-labelledby="plusIconModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plusIconModalLabel"><strong> Ajouter Consommable</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('ajouter.consommable') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-tag"></i></span>
                          </div>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Entrez le nom de consommable" required>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                    
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-object-group"></i></span>
                          </div>
                          <input type="text" class="form-control" id="type" name="type" placeholder="Entrez le type de consommable" required>
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-12">
                    
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                          </div>
                          <textarea class="form-control" id="description" name="description" placeholder="Entrez une description" maxlength="200" required></textarea>
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                    
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-industry"></i></span>
                          </div>
                          <input type="text" class="form-control" id="manufacturer" name="fabricant" placeholder="Entrez le fabricant de consommable" required>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                      
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                          </div>
                          <input type="date" class="form-control" id="date_reception" name="date_reception" placeholder="Entrez la date de réception" required>
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                     
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                          </div>
                          <input type="date" class="form-control" id="date_expiration" name="date_expiration" placeholder="Entrez la date d'expiration" required>
                      </div>
                  </div>
              </div>
            
             
            </div>
            <div class="modal-footer bg-body-secondary">
              <button type="submit" class="btn btn-success">Ajouter</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
            </form>
          </div>
        </div>
    </div>
</div>

</div>
<footer class="footer">
  <p class="text-center">&copy; iGesLab. Tous droits réservés</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script>

  function confirmDelete(event) {
              event.preventDefault(); // Prevent form submission
  
              const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                      confirmButton: "btn text-bg-success",
                      cancelButton: "btn text-bg-danger"
                  },
                  buttonsStyling: false
              });
              swalWithBootstrapButtons.fire({
                  title: "Êtes-vous sûr ?",
                  text: "Cette action est irréversible !",
                  icon: "warning",
                  showCancelButton: true,
                  cancelButtonText: " Non, annuler !",
                  confirmButtonText: "Oui, supprimer !",
                 
                  reverseButtons: true
              }).then((result) => {
                  if (result.isConfirmed) {
                      swalWithBootstrapButtons.fire({
                          title: "Supprimé !",
                          text: "Votre réservation a été supprimée.",
                          icon: "success"
                      }).then(() => {
                          event.target.submit();
                      });
                  } else if (result.dismiss === Swal.DismissReason.cancel) {
                      swalWithBootstrapButtons.fire({
                          title: "Annulé",
                          text: "Votre réservation est en sécurité :)",
                          icon: "error"
                      });
                  }
              });
          }
</script>
</body>
</html>
