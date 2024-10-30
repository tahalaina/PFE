<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('css/form.css')  }}">
</head>
<body>
  
    <div class="form-container">
    <a href="{{ route('show') }}" class="back-link"><i class="fas fa-arrow-left"></i>Retour</a>
   
        <h1 class="text-center mb-4">Formulaire de profil</h1>
       
        @if ($errors->any())
        <x-alert type="danger">
            <h5>Errors:</h5>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
        @endif

        @php
     $id=Illuminate\Support\Facades\Auth::id();
    $utilisateur=App\Models\etudiant::find($id);
        @endphp
        <form action="{{ route('inscrire.edite',$id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="profile-picture-container">
                <label for="profile-picture" class="profile-picture">
                    <i class="fas fa-upload"></i>
                    <input type="file" id="profile-picture" name="profile-picture">
                </label>
            </div>
         
            <div class="form-group">
                <i class="fas fa-briefcase"></i>
                <input type="text" class="form-control" id="title" name="titre" placeholder="Titre" required>
            </div>
            <div class="form-group">
                <i class="fas fa-university"></i>
                <input type="text" class="form-control" id="institution" name="affilation" placeholder="Affiliation institutionnelle" required>
            </div>
            <div class="form-group">
                <i class="fas fa-building"></i>
                <input type="text" class="form-control" id="department" name="departement" placeholder="Département" required>
            </div>
          
            <div class="form-group">
                <i class="fas fa-phone"></i>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Numéro de téléphone" required>
            </div>
            <div class="form-group">
                <i class="fas fa-search"></i>
                <input type="text" class="form-control" id="research-area" name="Domaine" placeholder="Domaine de recherche" required>
            </div>
            <div class="form-group">
                <i class="fas fa-graduation-cap"></i>
                <input type="text" class="form-control" id="doctoral-training" name="Formation" placeholder="Formation doctorale" required>
            </div>
            <div class="form-group">
                <i class="fas fa-star"></i>
                <input type="text" class="form-control" id="specialty" name="Specialite" placeholder="Spécialité" required>
            </div>
            <div class="form-group">
                <i class="fas fa-tools"></i>
                <textarea class="form-control" id="technical-skills" rows="3" name="Compet" placeholder="Compétences techniques" required></textarea>
            </div>
            <div class="form-group">
                <i class="fas fa-link"></i>
                <input type="text" class="form-control" id="social-links" name="liens" placeholder="Liens sociaux/académiques" required>
            </div>
            <div class="form-group availability-container">
                <i class="fas fa-calendar-alt"></i>
                <input type="date" class="form-control" id="availability-start" name="Ddebut" placeholder="Date de début" required>
                <input type="time" class="form-control" id="availability-start-time" name="Hdebut" placeholder="Heure de début" required>
            </div>
            <div class="form-group availability-container">
                <i class="fas fa-calendar-alt"></i>
                <input type="date" class="form-control" id="availability-end" name="Dfin" placeholder="Date de fin" required>
                <input type="time" class="form-control" id="availability-end-time" name="Hfin" placeholder="Heure de fin" required>
            </div>
            <div class="form-group">
                <i class="fas fa-comments"></i>
                <input type="text" class="form-control" id="contact-preferences" name="Preferences" placeholder="Préférences de contact" required>
            </div>
            <button type="submit" name="btn_img"  class="btn btn-primary btn-block">Enregistrer</button>
           
        </form>
    </div>
</body>
</html>