<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>| Details</title>
    
    <link rel="icon" href="{{ asset('img/favicon3.ico') }}" type="image/x-icon">

</head>
<style>/* Styles pour le lien de retour */
    .btn-light {
        background-color: white;
        border: none;
        color: #001b4d;
    }
    
    .btn-light:hover {
        background-color: #87CEEB; /* Bleu ciel pour le hover */
        color: white;
        border: none;
    }
    
    /* Couleurs pour la carte */
    .card {
        background-color: #f2f2f2;
        color: #001b4d;
    }
    
    .card .card-title i,
    .card .card-text strong i {
        color: #001b4d;
    }
    .back-to-top {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #0084ff;
  color: #fff;
  width: 40px;
  height: 40px;
  text-align: center;
  line-height: 40px;
 
  z-index: 999;
}

.back-to-top:hover {
  background-color: #555;
}

/* Facultatif : Animer la transition pour une apparence plus douce */
.back-to-top {
  transition: all 0.3s ease-in-out;
}

    </style>
<body>
    
    <a href="#" id="back-to-top" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
      </a>
      
    <div class="container my-4" style="background-color: #001b4d; color: white; padding: 20px; border-radius: 10px;">
        <div class="d-flex justify-content-start">
            <a href="{{ route('equipement') }}" class="btn btn-light" style="color: #001b4d; text-decoration: none;">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <h1 class="text-center mt-3">Détails de l'équipement</h1>
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="card" style="background-color: #001b4d; color: #fafafa; border: none;">
                    <div class="card-body">
                        <h5 class=""><i class="fas fa-toolbox"></i> {{ $equipement->name }}</h5>
                        <p class=""><strong><i class="fas fa-tags"></i> Type:</strong> {{ $equipement->type }}</p>
                        <p class=""><strong><i class="fas fa-cube"></i> Modèle:</strong> {{ $equipement->modele }}</p>
                        <p class=""><strong><i class="fas fa-barcode"></i> Numéro de série:</strong> {{ $equipement->numero_serie }}</p>
                        <p class=""><strong><i class="fas fa-calendar-alt"></i> Date d'acquisition:</strong> {{ $equipement->date_achat }}</p>
                        <p class=""><strong><i class="fas fa-truck"></i> Fournisseur:</strong> {{ $equipement->fournisseur }}</p>
                        <p class=""><strong><i class="fas fa-map-marker-alt"></i> Emplacement:</strong> {{ $equipement->emplacement }}</p>
                        <p class=""><strong><i class="fas fa-calendar-alt"></i> Date prochaine calibration:</strong> {{ $equipement->date_prochaine_calibration }}</p>
                        <p class=""><strong><i class="fas fa-exclamation-triangle"></i> Précautions de sécurité:</strong> {{ $equipement->precautions_securite }}</p>
                        <p class=""><strong><i class="fas fa-user-graduate"></i> Formation requise:</strong> {{ $equipement->formation_requise }}</p>
                        <p class=""><strong><i class="fas fa-book"></i> Instructions d'utilisation:</strong> {{ $equipement->instructions_utilisation }}</p>
                        <p class=""><strong><i class="fas fa-shield-alt"></i> Informations garantie:</strong> {{ $equipement->informations_garantie }}</p>
                        <p class=""><strong><i class="fas fa-industry"></i> Fabricant:</strong> {{ $equipement->fabricant }}</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    window.onscroll = function() {scrollFunction()};
  
    function scrollFunction() {
      var backToTopButton = document.getElementById("back-to-top");
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backToTopButton.style.display = "block";
      } else {
        backToTopButton.style.display = "none";
      }
    }
  
    // Facultatif : Ajoutez un effet de défilement fluide lorsque l'icône est cliquée
    document.getElementById("back-to-top").onclick = function() {
      scrollToTop();
    };
  
    function scrollToTop() {
      var currentPosition = document.documentElement.scrollTop || document.body.scrollTop;
      if (currentPosition > 0) {
        window.requestAnimationFrame(scrollToTop);
        window.scrollTo(0, currentPosition - currentPosition / 8);
      }
    }
  </script>
