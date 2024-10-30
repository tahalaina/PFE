<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
   

     
  <link rel="stylesheet" href="{{ asset('css/equipement.css') }}">
  <link rel="stylesheet" href="{{ asset('css/plaging.css') }}">
   
    <title>| Modifier</title>
    
    <link rel="icon" href="{{ asset('img/favicon3.ico') }}" type="image/x-icon">
</head>
<style>
    .back-to-top {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #333;
  color: #fff;
  width: 40px;
  height: 40px;
  text-align: center;
  line-height: 40px;
  border-radius: 50%;
  z-index: 999;
}

.back-to-top:hover {
  background-color: #fe0707;
}

/* Facultatif : Animer la transition pour une apparence plus douce */
.back-to-top {
  transition: all 0.3s ease-in-out;
}
</style>
<body>
    @include('layout.falshback')
  
<div class="container mt-5">
    <h1>Modifier la Réservation</h1>
   

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date_debut">Date de Début</label>
            <input type="date" name="date_debut" class="form-control" value="{{ $reservation->date_debut }}" required>
        </div>
        <div class="form-group">
            <label for="date_fin">Date de Fin</label>
            <input type="date" name="date_fin" class="form-control" value="{{ $reservation->date_fin }}" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="window.history.back();">Retour</button>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@include('layout.footer')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</body>
