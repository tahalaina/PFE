<x-master title="reservation">
   
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}" id="navbarDropdown" role="button">
            Accueil
          </a></li>
          <li class="breadcrumb-item">Équipements</li>
          <li class="breadcrumb-item active">Planification</li>
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
          <span>Utilisateur</span>
        </a>@endif
        <a class="nav-link" href="{{ route('logout') }}" title="Déconnecter">
          <i class="fas fa-sign-out-alt"></i>
          <span>Déconnecter</span>
        </a>
      </div>
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
    <div class="row justify-content-center">
      <div class="col-md-8"> <!-- Increased width for better layout -->
          <div class="card bg-light mb-4 custom-card">
              <div class="card-header text-white custom-card-header">
                  <h2 class="card-title mb-0"><i class="fas fa-tools form-icon"></i> Planifier l'équipement</h2>
              </div>
              <div class="card-body">
       
            @if ($errors->any())
                <x-alert type="danger">
                    <h5>Erreurs :</h5>
                    <ul>
                        @foreach ($errors->all() as $error)
                            @switch($error)
                                @case('The start_date field is required.')
                                    <li>Le champ Date de début est requis.</li>
                                    @break
                                @case('The end_date field is required.')
                                    <li>Le champ Date de fin est requis.</li>
                                    @break
                                @case('The end_date must be a date after start_date.')
                                    <li>La date de fin doit être postérieure à la date de début.</li>
                                    @break
                                @default
                                    <li>{{ $error }}</li>
                            @endswitch
                        @endforeach
                    </ul>
                </x-alert>
            @endif
            
                  <form action="{{ route('equipemntstore') }}" method="POST">
                      @csrf
                      <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>Sélectionner</th>
                                  <th>Nom</th>
                                  <th>Modèle</th>
                                  <th>PDF</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($equipements as $equipement)
                                  @if ($equipement->status === 'disponible')
                                      <tr>
                                          <td><input type="radio" name="equipement_id" value="{{ $equipement->id }}"></td>
                                          <td>{{ $equipement->name }}</td>
                                          <td>{{ $equipement->modele }}</td>
                                          <td><a href="{{ $equipement->pdf_link }}" target="_blank">Voir le PDF</a></td>
                                      </tr>
                                  @endif
                              @endforeach
                          </tbody>
                      </table>
                       
                  <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-lg-end">
                        {{ $equipements->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
                      <br>
                      <div class="form-group">
                          <label for="start_date" class="text-custom"><i class="fas fa-calendar-alt form-icon"></i> Date de début</label>
                          <input type="date" class="form-control" id="start_date" name="start_date" required>
                      </div>
                      <div class="form-group">
                          <label for="end_date" class="text-custom"><i class="fas fa-calendar-alt form-icon"></i> Date de fin</label>
                          <input type="date" class="form-control" id="end_date" name="end_date" required>
                      </div>
                      <div class="form-group">
                          <label for="status" class="text-custom"><i class="fas fa-info-circle form-icon"></i> Etat</label>
                          <select class="form-control" id="status" name="status">
                              <option value="maintenance">Maintenance</option>
                              <option value="reserve">Réservé</option>
                          </select>
                      </div>
                      <br>
                      <button type="submit" class="btn custom-btn text-white"><i class="fas fa-calendar-check form-icon"></i> Planifier</button>
                  </form>
                
              </div>
          </div>
      </div>
  </div>
  
  
      <script>
        function scrollToTop() {
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        }
      </script>
    
    </x-master>