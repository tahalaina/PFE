<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">


     
  <link rel="stylesheet" href="{{ asset('css/plaging.css') }}">
  
   
    <title>|Mes reservations</title>
    
    <link rel="icon" href="{{ asset('img/favicon3.ico') }}" type="image/x-icon">
</head>
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
    
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>
    @include('layout.nav')
   
 
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
              icon: 'errors',
              title: 'errors!',
              text: '{{ session('errors') }}',
          });
      </script>
  @endif
         
        
    
        
      
     <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('home') }}" id="navbarDropdown" role="button">
                  Accueil
                </a>
              </li>
             
              <li class="breadcrumb-item">Equipements</li>
              <li class="breadcrumb-item active">Mes Reservations</li>
            </ol>
          </nav><div class="sidebar">
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
                    @endphp @if ($utilisateur->role ==='admin')
            <a class="nav-link" href="{{ route('utiliosateur.index') }}" title="Utilisateur">
              <i class="fas fa-users"></i>
              <span>Utilisateurs</span>
            </a>@endif
            <a class="nav-link" href="{{ route('logout') }}" title="Déconnecter">
                <i class="fas fa-sign-out-alt"></i>
                <span>Déconnecter</span>
              </a>
          </div>
          
          <div class="container my-4">
            <h1>Mes Réservations</h1>
            <div style="margin-left: 1000px">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Rechercher
                </button>
            </div><br>
            <div class="table-responsive">
                @if($reservations->isEmpty())
                    <p class="text-center">Aucune réservation disponible.</p>
                @else
                    <table class="table table-striped reservation-table">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Modèle</th>
                                <th scope="col">Date de début</th>
                                <th scope="col">Date de fin</th>
                                <th scope="col">Temps restant</th> <!-- New Column for Countdown -->
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                @php
                                    $equipment = App\Models\Equipement::find($reservation->equipement_id);
                                @endphp
                                <tr>
                                    <td>{{ $equipment->name ?? 'Non spécifié' }}</td>
                                    <td>{{ $equipment->modele ?? 'Non spécifié' }}</td>
                                    <td>{{ $reservation->date_debut }}</td>
                                    <td>{{ $reservation->date_fin }}</td>
                                    <td id="countdown-{{ $reservation->id }}"></td> <!-- Countdown Timer Cell -->
                                    <td>
                                        <!-- Formulaire de suppression -->
                                        <form action="{{ route('annuler', $reservation->id) }}" method="POST" class="d-inline-block" onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Bouton de suppression -->
                                            <button type="submit" class="icon-btn cancel text-danger" title="Annuler">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        <!-- Bouton de modification -->
                                        <a href="#" class="icon-btn edit text-warning" title="Modifier" data-bs-toggle="modal" data-bs-target="#editReservationModal{{ $reservation->id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Function to update countdown
                                        function updateCountdown(endDate, elementId) {
                                            const countdownElement = document.getElementById(elementId);
        
                                            // Update the count down every 1 second
                                            const countdownInterval = setInterval(function() {
                                                const now = new Date().getTime();
                                                const distance = new Date(endDate).getTime() - now;
        
                                                // Time calculations for days, hours, minutes and seconds
                                                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
                                                // Display the result in the element with id="countdown-{{ $reservation->id }}"
                                                countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        
                                                // If the count down is finished, write some text
                                                if (distance < 0) {
                                                    clearInterval(countdownInterval);
                                                    countdownElement.innerHTML = "Expiré";
                                                }
                                            }, 1000);
                                        }
        
                                        // Check if date_fin is defined
                                        @if ($reservation->date_fin)
                                            updateCountdown('{{ $reservation->date_fin }}', 'countdown-{{ $reservation->id }}');
                                        @else
                                            document.getElementById('countdown-{{ $reservation->id }}').innerHTML = "Date non définie";
                                        @endif
                                    });
                                </script>
                            @endforeach
                        </tbody>
                    </table>
                       
                @endif
            </div>
        </div>
        
        
        @foreach ($reservations as $reservation)
        <div class="modal fade" id="editReservationModal{{$reservation->id}}" tabindex="-1" aria-labelledby="editReservationModalLabel{{$reservation->id}}" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title text-black" id="editReservationModalLabel{{$reservation->id}}"> Modifier la réservation   <i class="fas fa-edit text-success"></i></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <!-- Formulaire de modification de la réservation -->
                      <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
                          @csrf
                        @method('PUT')
      
                          <!-- Champ de date de début -->
                          <div class="mb-3">
                             <label for="start_date" class="form-label text-dark">Date de début</label>
                              <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $reservation->date_debut }}">
                          </div>
      
                          <!-- Champ de date de fin -->
                          <div class="mb-3">
                              <label for="end_date" class="form-label text-dark">Date de fin</label> 
                              <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $reservation->date_fin }}">
                          </div>
      
                          <!-- Autres champs de formulaire pour la modification de la réservation -->
                          <div class="modal-footer bg-body-secondary">
                          <button type="submit" class="btn text-bg-success" onclick="confirmUpdate()">Enregistrer les modifications</button>
                          <button type="button"  class="btn text-bg-danger" data-bs-dismiss="modal">Fermer</button>
                          </div> </form>
                  </div> 
                  
                  </div>
                  @endforeach
              </div>
          </div>
      </div>
    </div>
     
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black" id="staticBackdropLabel"> <strong style="text-align: center">Mes Réservations</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire de recherche -->
                    <form action="{{ route('recherche.equipements') }}" method="get">
                        @csrf
    
                    
                        <div class="form-row">
                          <div class="form-group ">
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"style="min-width: 200px;">Nom D'equipemnt</span>
                                  </div>
                                  <input type="text" class="form-control" name="name" id="equipmentName" placeholder="Entrez le nom de consommable">
                              </div>
                          </div>
                          
                      </div>
                     
                          <div class="form-group ">
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" style="min-width: 200px;">Date De debut</span>
                                  </div>
                                  <input type="date" class="form-control" name="date_reception" id="date_reception">
                              </div>
                          </div>
                        
                          <div class="form-group ">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="min-width: 200px;">Date De fin</span>
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

      @include('layout.footer')
      <a href="#" id="back-to-top" class="back-to-top">
          <i class="fas fa-arrow-up"></i>
      </a>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <!-- JavaScript Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
     
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
                    confirmButtonText: "Oui, supprimer !",
                    cancelButtonText: " Non, annuler !",
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

    
      function confirmUpdate() {
            // Affiche l'alerte de succès après la mise à jour
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Votre réservation a été mise à jour.",
                showConfirmButton: false,
                timer: 1500
            });
        }
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
</body>
</html>
