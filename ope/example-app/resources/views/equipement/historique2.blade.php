<x-master title="Traçabilité">
  
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('home') }}" id="navbarDropdown" role="button">
              Accueil
            </a>
          </li>
         
          <li class="breadcrumb-item">Equipements</li>
          <li class="breadcrumb-item active">Gestion</li>
        </ol>
      </nav>
      <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><i class="fas fa-history mr-2"></i>Historique des équipements</div>
                    <div class="card-body">
                        <form class="form-inline d-flex justify-content-center align-items-center" method="POST" action="{{ route('recherche.historique') }}">
                            @csrf
                            <div class="form-group mr-3">
                                <input type="text" class="form-control" name="nom_equipement" placeholder="le nom complet d'équipement">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Rechercher</button>
                        </form>
                        
                        <div>
                            @if($equipement)
                                <h1>Historique de l'équipement : {{ $equipement->name }}</h1>
                                
                                <h2>Réservations :</h2>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Utilisateur</th>
                                            <th>Date de début</th>
                                            <th>Date de fin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reservations as $reservation)
                                            <tr>
                                                @php
                                                    $user = app/etudiant::find($reservation->etudiant_id);
                                                @endphp
                                                   <td>{{ $reservation->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $reservation->date_debut  }}</td>
                                                <td>{{ $reservation->date_fin  }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    
                                <h2>Maintenances :</h2>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date de début</th>
                                            <th>Date de fin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($maintenances as $maintenance)
                                            <tr>
                                                <td>{{ $maintenance->id }}</td>
                                                <td>{{ $maintenance->date_debut }}</td>
                                                <td>{{ $maintenance->date_fin  }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Aucun équipement trouvé pour la recherche "{{ $query }}".</p>
                                <!-- Vous pouvez afficher un message indiquant qu'aucun équipement correspondant n'a été trouvé -->
                            @endif
                        </div>
    
    
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-master>