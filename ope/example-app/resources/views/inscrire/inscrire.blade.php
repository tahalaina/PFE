<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <link rel="stylesheet" href="{{ asset('css/inscrire.css')  }}">
</head>
<body>
    

    <div class="auth-container">
        <div class="auth-card">
            <h2>Inscription</h2>
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
            <form action="{{ route('inscrire.create') }}" method="POST" >
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <input type="text" id="nom" name="name" class="form-control" placeholder="Nom complet" required>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email-academique" class="form-control" placeholder="Email Académique" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
                    </div>
                    <div class="form-group">
                    <i class="fas fa-lock"></i>
                        <input type="password" name="confirmation-password" id="confirmation-password" class="form-control" placeholder="confirmation" required>
                    </div>
                </div>
                <div class="auth-actions">
                    <button type="submit" class="btn btn-primary" id="submit-btn">Créer un compte</button>
                   &nbsp; &nbsp;&nbsp;<a href="{{  route('show')}}">Se connecter</a>
                </div><br>
                <p class="form-p"></p>
            </form>
            <div class="auth-footer">
                <p class="copyright">©2024,iGesLab Tous droits réservés</p>
            </div>
        </div>
    </div>
</body>
</html>