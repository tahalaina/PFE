<x-master title="Équipements">

<div>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('home') }}" id="navbarDropdown" role="button">
        Accueil
      </a>
    </li>
   
    <li class="breadcrumb-item">Equipements</li>
    <li class="breadcrumb-item active">Gestion</li>
  </ol>
<div>
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
          @endphp @if ($utilisateur->role ==='admin')
  <a class="nav-link" href="{{ route('utiliosateur.index') }}" title="Utilisateur">
    <i class="fas fa-users"></i>
    <span>Utilisateur</span>
  </a>@endif
  <a class="nav-link" href="{{ route('logout') }}" title="Déconnecter">
    <i class="fas fa-sign-out-alt"></i>
    <span>Déconnecter</span>
  </a>
</div>
@php
$disponibles = 0;
$enMaintenance = 0;
$reserves = 0;

foreach ($equipements as $equipement) {
    if ($equipement->status == 'disponible') {
        $disponibles++;
    } elseif ($equipement->status == 'maintenance') {
        $enMaintenance++;
    } elseif ($equipement->status == 'reserve') {
        $reserves++;
       
    }
}

@endphp
<div class="container my-5">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header"><i class="fas fa-chart-pie mr-2"></i>Vue d'ensemble de l'inventaire</div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="card bg-primary text-white transition-card">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                  <h5 class="card-title mb-4"><i class="fas fa-check-circle mr-2"></i>Équipements disponibles</h5>
                  <p class="card-text display-4 count-up" data-count="{{ $disponibles }}">{{ $disponibles }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card bg-secondary text-white transition-card">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                  <h5 class="card-title mb-4"><i class="fas fa-clock mr-2"></i>Équipements réservé</h5>
                  <p class="card-text display-4 count-up" data-count="{{ $reserves }}">{{ $reserves }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card bg-danger text-white transition-card">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                  <h5 class="card-title mb-4"><i class="fas fa-tools mr-2"></i>Équipements en maintenance</h5>
                  <p class="card-text display-4 count-up" data-count="{{ $enMaintenance }}">{{ $enMaintenance }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

      
  
    <div class="row my-5" id="equipement">
      <div class="col-12">
        <div class="card">
          <div class="card-header"><i class="fas fa-tools mr-2"></i>Gestion et suivi des équipements</div>
          <div class="card-body">
            <form action="{{ route('equipments.search') }}" method="GET" class="form-inline">
              <div class="form-group mr-3">
                <input type="text" class="form-control" name="search" id="search" placeholder="Rechercher un équipement">
              </div>
              <div class="form-group mr-3">
                <select class="form-control" name="status" id="status_filter">
                  <option value="">Tous les équipements</option>
                  <option value="disponible">Équipements disponibles</option>
                  <option value="reserve">Équipements réserve</option>
                  <option value="maintenance">Équipements en maintenance</option>
                </select>
              </div>
              <button type="submit" class="btn  text-bg-primary ml-3" title=""><i class="fas fa-search"></i> Rechercher</button>@php
                  $id=Illuminate\Support\Facades\Auth::id();
    $utilisateur=App\Models\etudiant::find($id);
              @endphp @if ($utilisateur->role ==='admin')
              <button type="button" class="btn text-bg-primary  ml-3" id="add-equipment" title="Ajouter"><i class="fas fa-plus"></i> </button>@endif
            </form>
            <!-- Display search results -->
           
            @if(isset($equipments2))
            <div class="mt-3">
              @if(count($equipments2) > 0)
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Type</th>
                    <th scope="col">Modèle</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($equipments2 as $equipment2)
                    <tr>
                      <td>{{ $equipment2->name }}</td>
                      <td>{{ $equipment2->type }}</td>
                      <td>{{ $equipment2->modele }}</td>
                      <td>
                        @if($equipment2->status != 'maintenance')
                        <a href="{{ route('plagnifier',$equipment2->id) }}" class="btn-action text-success btn-planning">
                          <i class="fas fa-calendar-alt"></i>
                        </a>&nbsp;
                        @endif
                        <a href="{{ route('plus',$equipment2->id) }}" class="btn-action text-info btn-edit">
                          <i class="fas fa-info-circle"></i>
                        </a>&nbsp;
                        <!-- Bouton modifier -->@if ($utilisateur->role ==='admin')
                        <a href="{{ route('edit.equipmener',$equipment2->id) }}" class="btn-action text-warning btn-edit">
                          <i class="fas fa-edit"></i>
                        </a>
                        <!-- Bouton supprimer -->
                        <form action="{{ route('delete.equipmener',$equipment2->id) }}" method="POST"  class="d-inline-block" onsubmit="return confirmDelete(event)">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn-action text-danger btn-delete" title="Annuler">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>@endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              
              @else
                <p class="text-center">Aucun équipement trouvé</p>
              @endif
            </div>
          @endif
          </div>
        </div>
      </div>
    </div>
    
    </div>
    
    
 
      </div>
     
      


      <div id="equipment-modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span><br>
          <div class="form-container">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
          <form action="{{ route('ajouter.equipement') }}" method="post"  enctype="multipart/form-data">
           @csrf
      <div class="form-group">
        <label for="equipment-name">
          <i class="fas fa-tag"></i>
          Nom de l'équipement :
        </label>
        <input type="text" class="form-control" id="equipment-name" name="name" placeholder="Entrez le nom de l'équipement" required>
      </div>
    
      <div class="form-group">
        <label for="equipment-type">
          <i class="fas fa-object-group"></i>
          Type d'équipement :
        </label>
        <input type="text" class="form-control" id="equipment-type" name="type" placeholder="Entrez le Type de l'équipement" required>
      </div>
    
      <div class="form-group">
        <label for="equipment-description">
          <i class="fas fa-align-left"></i>
          Description :
        </label>
        <textarea class="form-control" id="equipment-description" name="equipment-description" placeholder="Entrez une Description" maxlength="200" required></textarea>
      </div>
    
      <div class="form-group">
        <label for="manufacturer">
          <i class="fas fa-industry"></i>
          Fabricant :
        </label>
        <input type="text" class="form-control" id="manufacturer" name="manufacturer"  placeholder="Entrez le Fabricant de l'équipement" required>
      </div>
    
      <div class="form-group">
        <label for="model">
          <i class="fas fa-code-branch"></i>
          Modèle :
        </label>
        <input type="text" class="form-control" id="model" name="modele" placeholder="Entrez le Modèle de l'équipement" required>
      </div>
    
      <div class="form-group">
        <label for="serial-number">
          <i class="fas fa-barcode"></i>
          Numéro de série :
        </label>
        <input type="text" class="form-control" id="serial-number" name="serial-number"placeholder="Entrez Le numéro de série"  required>
      </div>
    
      <div class="form-group">
        <label for="purchase-date">
          <i class="fas fa-calendar-alt"></i>
          Date d'achat :
        </label>
        <input type="date" class="form-control" id="purchase-date" name="purchase-date" required>
      </div>
    
      <div class="form-group">
        <label for="supplier">
          <i class="fas fa-truck-loading"></i>
          Fournisseur :
        </label>
        <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Entrez Le fournisseur " required>
      </div>
    
      <div class="form-group">
        <label for="location">
          <i class="fas fa-map-marker-alt"></i>
          Emplacement :
        </label>
        <input type="text" class="form-control" id="location" name="location"  name="safety-precautions" placeholder="Entrez L'emplacement physique où l'équipement est conservé " required>
      </div>
    
      <div class="form-group">
        <label for="current-status">
          <i class="fas fa-cog"></i>
          Statut actuel :
        </label>
        <select class="form-control" id="current-status" name="current-status" required>
          <option value="">Sélectionnez un statut</option>
          <option value="disponible">Disponible</option>
          <option value="maintenance">En maintenance</option>
          <option value="horsservice">Hors service</option>
          <option value="attente">en attente</option>
        </select>
      </div>
    
      <div class="form-group">
        <label for="next-calibration">
          <i class="fas fa-wrench"></i>
          Date de prochaine calibration :
        </label>
        <input type="date" class="form-control" id="next-calibration" name="next-calibration">
      </div>
    
      <div class="form-group">
        <label for="user-manual">
          <i class="fas fa-book"></i>
          Manuel de l'utilisateur :
        </label>
        <input type="file" class="form-control-file" id="user-manual" name="user-manual">
      </div>
    
      <div class="form-group">
        <label for="safety-precautions">
          <i class="fas fa-exclamation-triangle"></i>
          Précautions de sécurité :
        </label>
        <textarea class="form-control" id="safety-precautions" name="safety-precautions" placeholder="Entrez les'exigence de sécurité"></textarea>
      </div>
    
      <div class="form-group">
        <label for="required-training">
          <i class="fas fa-graduation-cap"></i>
          Formation requise :
        </label>
        <textarea class="form-control" id="required-training" name="required-training" placeholder="Entrez une formation spécialisée "></textarea>
      </div>
    
      <div class="form-group">
        <label for="usage-instructions">
          <i class="fas fa-directions"></i>
          Instructions d'utilisation :
        </label>
        <textarea class="form-control" id="usage-instructions" name="usage-instructions" placeholder="Entrez Les Instructions d'utilisation"></textarea>
      </div>
    
      <div class="form-group">
        <label for="warranty-info">
          <i class="fas fa-shield-alt"></i>
          Informations sur la garantie :
        </label>
        <textarea class="form-control" id="warranty-info" name="warranty-info" placeholder="Entrez les détails de la garantie"></textarea>
      </div>
    
      <button type="submit" class="btn btn-primary" name="submit">Ajouter l'équipement</button>
    </form>
          </div>
        </div>
      </div>

      


</x-master>