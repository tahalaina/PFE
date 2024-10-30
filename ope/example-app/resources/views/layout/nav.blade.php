@php
    $id=Illuminate\Support\Facades\Auth::id();
    $utilisateur=App\Models\etudiant::find($id);

@endphp

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" >
  <a class="navbar-brand" href="{{ route('equipement') }}">
    <img src="../img/Logo.png" alt="Gestion des équipements de laboratoire" height="30" style="background-color: white;">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse "  id="navbarNav">
    <ul class="navbar-nav ml-auto">
      
     
       
      </li><li class="nav-item">
        <a class="nav-link" href="{{ route('equipement') }}"><i class="fas fa-tools"></i> Gestion equipement</a>
      </li>
  
   
      <li class="nav-item">
        <a class="nav-link" href="{{ route('index.equipement') }}"><i class="fas fa-calendar-alt"></i> Planification</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('reservation.show') }}"><i class="fas fa-list"></i> Mes réservations</a>
      </li>
      @if ($utilisateur->role  =='admin')
          
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('historique') }}"><i class="fas fa-chart-line"></i> Traçabilité</a>
      </li>
      @endif
    </ul>
  </div>
</nav>