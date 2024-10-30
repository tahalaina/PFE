<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
            body {
      background-color: #001b4d;
      color: #ffffff;
    }
    a {
      color: #ffffff;
    }
    a:hover {
      color: #cccccc;
    }
    .btn-primary {
      background-color: #065dff;
      border-color: #001b4d;
    }
    .btn-primary:hover {
      background-color: #fcfcfc;
      border-color: #00244d;
      color: #000000;
    }
    .copyright-text:hover {
      color: #87ceeb;
    }
    h1, h5 {
      transition: color 0.3s ease;
    }
    h1:hover, h5:hover {
      color: #87ceeb;
    }
    .back-to-home {
      color: #ffffff;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .back-to-home:hover {
      color: #87ceeb;
      text-decoration: none;
    }
    .back-to-home i {
      margin-right: 5px;
    }
    .bg-body-secondary {
        background-color: #e8e8e8; /* Exemple de couleur secondaire personnalisée */
    }
    </style>
</head>
<body>
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
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-right mb-3">
                <a href="{{ route('home') }}" class="back-to-home"><i class="fas fa-arrow-left"></i>Accueil</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <img src="https://via.placeholder.com/150" alt="Profile Picture" class="img-fluid rounded-circle mb-3">
            </div>
            <div class="col-md-9">
                <h1>{{ $etudiant->name }}</h1>
                <h5>Chercheur</h5>
                <p>Faculté de médecine, de pharmacie et de médecine dentaire de Fès</p>
                <div class="row">
                  <div class="col-sm-6">
                    <p><strong>Email:</strong> {{ $etudiant->email }}</p>
                    <p><strong>Phone:</strong> {{ $etudiant->numero_telephone }}</p>
                  </div>
                  <div class="col-sm-6">
                    <p><strong>Domaine de recherche :</strong> {{ $etudiant->domaine_recherche }}</p>
                    <p><strong>Formation doctorale  :</strong>  {{ $etudiant->formation_doctorale }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <p><strong>Specialization:</strong>  {{ $etudiant->specialite }}</p>
                    <p><strong>Current Projects:</strong></p>
                    <ul>
                      <li>{{ $etudiant->projets_en_cours }}</li>
                    </ul>
                  </div>
                  <div class="col-sm-6">
                    <p><strong>Publications:</strong></p>
                    <ul>
                      <li> {{ $etudiant->publications ?: 'Aucune publication définie.' }}</li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <p><strong>Compétences techniques :</strong> {{ $etudiant->competences_techniques }}</p>
                  </div>
                  <div class="col-sm-6">
                    <p><strong>Social/Academic Links:</strong></p>
                    <a href="https://www.linkedin.com/in/johndoe" target="_blank">LinkedIn</a> |
        
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <p><strong>Disponibilité :</strong>{{ $etudiant->disponibilite }}</p>
                  </div>
                  <div class="col-sm-6">
                    <p><strong>Contact Preference:</strong> {{ $etudiant->preferences_contact }}</p>
                  </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">Editer Profile</button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <p class="copyright-text">&copy; 2024 {{ $etudiant->name  }} Profile. All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- Modal d'édition du profil -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="" id="editProfileModalLabel" style="color: black;"><strong>Editer Profile</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
              @csrf
              @method('PUT')
            
              <div class="form-row">
                <div class="form-group col-md-12">
                  
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $etudiant->name }}" readonly>
                      </div>
                </div>
            </div>
              
                  
               
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-envelope text"></i> </span>
                          </div>
                          <input type="email" class="form-control" id="email" name="email" value="{{ $etudiant->email }}">

                        </div>
                  </div>
                    <div class="form-group col-md-6">
                      
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" class="form-control" id="department" name="departement" placeholder="Département" required>
                          </div>
                    </div>
                </div>
                
              
                <div class="form-row">
                  <div class="form-group col-md-6">
                    
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"> <i class="fas fa-clock"></i></span>
                          </div>
                          <input type="text" class="form-control" id="disponibilite" name="disponibilite" placeholder="Disponibilité" required>
                        </div>
                  </div>
                  <div class="form-group col-md-6">
                      
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"> <i class="fas fa-phone"></i></span>
                          </div>
                          <input type="tel" class="form-control" id="numero_telephone" name="numero_telephone" placeholder="Numéro de téléphone" required>
                        </div>
                  </div>
              </div>
            
              


              <div class="form-row">
                <div class="form-group col-md-6">
                  
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
                      </div>
                </div>
                <div class="form-group col-md-6">
                    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" name="confirmation-password" id="confirmation-password" class="form-control" placeholder="Confirmation" required>
                      </div>
                </div>
            </div>
           
          </div>
          <div class="modal-footer bg-body-secondary">
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
          </form>
        </div>
      </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
