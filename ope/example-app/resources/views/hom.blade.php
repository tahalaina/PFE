<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page D'accueil</title>
  <link rel="icon" href="{{ asset('img/favicon3.ico') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <style>
    body {
      padding-top: 70px;
      background-image: url('{{ asset("img/acceuil.jpg") }}');
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
  
    .navbar {
      background-color: white;
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
  
    .content {
      flex: 1;
      padding: 40px 0;
      display: flex;
      justify-content: center;
      align-items: center;
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
      margin-top: 150px;
    }
  
    .footer:hover {
      background-color: #001b4d;
    }
  
    .sidebar {
      position: fixed;
      top: 68px;
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
  
    .alert {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 50%;
      max-width: 400px;
     
      background-color: rgb(255, 255, 255);
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
  
    .alert h2 {
      margin-bottom: 10px;
      color: #333;
    }
  
    .timer {
      font-size: 20px;
      font-weight: bold;
      color: #333;
      margin-bottom: 20px;
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
    }
  
    .chart-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 330px; /* Ajuster la hauteur */
      width: 800px;  /* Ajuster la largeur */
      margin: 20px auto;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  
    .sidebar-right {
      position: fixed;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      top: 68px; /* Ajustez la valeur en fonction de votre barre de navigation */
      right: 0;
      width: 200px; /* Ajustez la largeur selon vos besoins */
      height: 50%; /* Occupera toute la hauteur de l'écran */
      background-color: rgba(255, 255, 255, 0.8); /* Couleur de fond de la barre latérale */
      padding: 20px; /* Marge intérieure */
      box-shadow: -4px 0 8px rgba(0, 0, 0, 0.1); /* Ombre pour effet de profondeur */
      z-index: 100; /* Assurez-vous qu'elle est au-dessus du contenu principal */
    }
  
    .sidebar-right h3 {
      font-size: 18px;
      margin-bottom: 10px;
      font-size: 18px;
  font-weight: bold;
    }
  
    .sidebar-right ul {
      list-style-type: none; /* Supprimer les puces des listes */
      padding: 0;
    }
  
    .sidebar-right ul li {
      margin-bottom: 10px;
      font-size: 16px;
    }
  
    /* Style pour les liens des réservations, si nécessaire */
    .sidebar-right ul li a {
      text-decoration: none;
      color: #333;
    }
  
    /* Style pour les liens des réservations au survol */
    .sidebar-right ul li a:hover {
      color: #007bff;
    }
    .sidebar-right .fas {
  margin-right: 10px;
  color: #007bff;
}

.sidebar-right .reservation-name {
  font-weight: bold;
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
  </style>
  
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="../img/logo.png" alt="Mon site">
      </a>
      <div class="navbar-nav ml-auto">
        @php
          $id = Illuminate\Support\Facades\Auth::id();
          $utilisateur = App\Models\etudiant::find($id);
        @endphp
        <a class="nav-link user-initial" href="{{ route('profile.edit') }}" title="{{ $utilisateur->name }}">
          {{ strtoupper(substr($utilisateur->name, 0, 1)) }}
        </a>
      </div>
    </div>
  </nav>

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
    @if ($utilisateur->role === 'admin')
      <a class="nav-link" href="{{ route('utiliosateur.index') }}" title="Utilisateur">
        <i class="fas fa-users"></i>
        <span>Utilisateur</span>
      </a>
    @endif
    <a class="nav-link" href="{{ route('logout') }}" title="Déconnecter">
      <i class="fas fa-sign-out-alt"></i>
      <span>Déconnecter</span>
    </a>
  </div>
<br>

  <div class="container">
    <h1 class="text-center mt-5 text-white">Statistiques de laboratoire</h1>
    <div class="chart-container">
      <canvas id="equipmentChart"></canvas>
    </div>
  </div>
  <div class="sidebar-right">
    <h3><a href="{{  route('reservation.show')}}" style="text-decoration: none">
      Réservations :</a></h3>
    <ul>
      @if (@empty($reservations))
        <p>Aucune réservation pour le moment</p>
      @elseif (count($reservations) == 1)
        <li>
          
          @foreach($reservations as $reservation)
          @php
$equipement = App\Models\Equipement::find($reservation->equipement_id);          @endphp
          <span class="reservation-name"><a href="{{  route('plus',$reservation->equipement_id)}}" style="text-decoration: none">Nom :{{ $equipement->name }}</a></span>
         <br> <span class="countdown" data-end-date="{{ $reservations[0]->date_fin }}">
            <i class="fas fa-clock"></i><p>La réservation se terminera dans :</p>
            <span class="countdown-time"></span>
          </span>
          <!-- Ajoutez d'autres informations de réservation selon vos besoins -->
        </li>
        @endforeach
      @else
        @foreach($reservations as $reservation)
          <li>
            <i class="fas fa-calendar-check"></i>
            @php
$equipement = App\Models\Equipement::find($reservation->equipement_id);          @endphp
            <span class="reservation-name"><a href="{{  route('plus',$reservation->equipement_id)}}" style="text-decoration: none">Nom:{{ $equipement->name }}</a></span>
            <br><span class="countdown" data-end-date="{{ $reservation->date_fin }}">
              <i class="fas fa-clock"></i>
              <span class="countdown-time"></span>
            </span>
            <!-- Ajoutez d'autres informations de réservation selon vos besoins -->
          </li>
        @endforeach
      @endif
    </ul>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
  var countdownElements = document.querySelectorAll('.countdown');

  function updateCountdown() {
    countdownElements.forEach(function(countdownElement) {
      var endDate = new Date(countdownElement.dataset.endDate);
      var now = new Date();
      var timeDiff = endDate - now;

      if (timeDiff > 0) {
        var days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

        countdownElement.querySelector('.countdown-time').textContent = `${days}j ${hours}h ${minutes}m ${seconds}s`;
      } else {
        countdownElement.querySelector('.countdown-time').textContent = 'Terminé';
      }
    });
  }

  setInterval(updateCountdown, 1000);
});
    document.addEventListener('DOMContentLoaded', function() {
      var ctx = document.getElementById('equipmentChart').getContext('2d');
      var chartData = @json($chartData);

      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: chartData.labels,
          datasets: chartData.datasets
        },
        options: {
          responsive: true,
          maintainAspectRatio: false, // Désactiver la préservation du ratio pour une taille flexible
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
  
    // Vérifier l'activité de l'utilisateur toutes les 1 minute
    let lastActivity = new Date().getTime();
    setInterval(function() {
      let currentTime = new Date().getTime();
      let inactiveTime = currentTime - lastActivity;
      if (inactiveTime >= 60000) { // 1 minute d'inactivité
        Swal.fire("Vous êtes inactif depuis 1 minute", "", "danger");
      }
    }, 60000); // Vérifier toutes les 1 minute

    // Mettre à jour la dernière activité à chaque interaction de l'utilisateur
    document.addEventListener('mousemove', function() {
      lastActivity = new Date().getTime();
    });
    document.addEventListener('keydown', function() {
      lastActivity = new Date().getTime();
    });
  </script>

  <footer class="footer fixed-bottom">
    <p class="text-center">&copy; iGesLab. Tous droits réservés</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
