<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>| Modifier</title>
    
  <link rel="icon" href="{{ asset('img/favicon3.ico') }}" type="image/x-icon">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style> body {
    background-color: #001b4d;
    color: white;
  }
  .form-control {
    background-color: #001b4d;
    color: white;
    border-color: white;
  }
  .btn-primary {
    background-color: #001b4d;
    border-color: white;
  }
  .btn-primary:hover {
    background-color: white;
    color: #001b4d;
  }
  .btn-back {
    position: absolute;
    top: 20px;
    left: 20px;
    display: flex;
    align-items: center;
    color: white;
    text-decoration: none;
  }
  .btn-back:hover{
      text-decoration: none;
  }
  .btn-back i {
    margin-right: 5px;
    text-decoration: none;
  }
  .back-to-top {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #008dfa;
  color: #fff;
  width: 40px;
  height: 40px;
  text-align: center;
  line-height: 40px;
  
  z-index: 999;
}

.back-to-top:hover {
  background-color: #bababb;
}

/* Facultatif : Animer la transition pour une apparence plus douce */
.back-to-top {
  transition: all 0.3s ease-in-out;
}
</style>
</head>
<body>
<a href="{{ route('equipement') }}" class="btn-back">
  <i class="fas fa-arrow-left"></i>
  Retour
</a>
<a href="#" id="back-to-top" class="back-to-top">
    <i class="fas fa-arrow-up"></i>
  </a>
<div class="container my-5">
  <h1 class="text-center mb-4">Modifier l'équipement</h1>
 

  <form method="post" action="{{ route('update.equipmener',$equipement->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="equipmentName">Nom de l'équipement</label>
        <input type="text" class="form-control" id="equipmentName" name="name" value="{{ $equipement->name }}" readonly>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="equipmentType">Type d'équipement</label>
        <input type="text" class="form-control" id="equipmentType" name="type" value="{{ $equipement->type }}">
        @error('type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="equipmentDescription">Description</label>
        <textarea class="form-control" id="equipmentDescription" name="equipment-description" rows="3">{{ $equipement->description }}</textarea>
        @error('equipment-description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="manufacturer">Fabricant</label>
        <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ $equipement->fabricant  }}">
    </div>
    <div class="form-group">
        <label for="model">Modèle</label>
        <input type="text" class="form-control" id="model" name="modele" value="{{ $equipement->modele }}">
    </div>
    <div class="form-group">
        <label for="serialNumber">Numéro de série</label>
        <input type="text" class="form-control" id="serialNumber" name="serial-number" value="{{ $equipement->numero_serie }}">
    </div>
    <div class="form-group">
        <label for="purchaseDate">Date d'achat</label>
        <input type="date" class="form-control" id="purchaseDate" name="purchase-date" value="{{ $equipement->date_achat  }}">
    </div>
    <div class="form-group">
        <label for="supplier">Fournisseur</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="{{ $equipement->fournisseur  }}">
    </div>
    <div class="form-group">
        <label for="location">Emplacement</label>
        <input type="text" class="form-control" id="location" name="location" value="{{ $equipement->emplacement }}">
    </div>  
    <div class="form-group">
        <label for="nextCalibration">Date de prochaine calibration</label>
        <input type="date" class="form-control" id="nextCalibration" name="next-calibration" value="{{ $equipement->date_prochaine_calibration }}">
    </div>
    <div class="form-group">
        <label for="userManual">Manuel de l'utilisateur</label>
        <input type="file" class="form-control-file" id="userManual" name="user-manual">
    </div>
    <div class="form-group">
        <label for="safetyPrecautions">Précautions de sécurité</label>
        <textarea class="form-control" id="safetyPrecautions" name="safety-precautions" rows="3">{{ $equipement->precautions_securite }}</textarea>
    </div>
    <div class="form-group">
        <label for="trainingRequired">Formation requise</label>
        <textarea class="form-control" id="trainingRequired" name="required-training" rows="3">{{ $equipement->formation_requise  }}</textarea>
    </div>
    <div class="form-group">
        <label for="warrantyInfo">Informations sur la garantie</label>
        <input type="text" class="form-control" id="warrantyInfo" name="warranty-info" value="{{ $equipement->instructions_utilisation }}">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-info">Enregistrer les modifications</button>
    </div>
</form>
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
