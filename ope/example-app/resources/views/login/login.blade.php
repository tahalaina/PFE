<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | Authentification</title>
    
    
    <link rel="icon" href="{{ asset('img/favicon3.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-left">
            <div class="welcome-message">
                <h1>Bienvenue sur notre plateforme</h1>
                <p>Connectez-vous pour accéder à vos données de laboratoire.</p>
            </div>
            <div class="welcome-image">
                <img src="{{ asset('img/authentification.png') }}" alt="Bienvenue">
            </div>
        </div>
        <div class="auth-right">
            <div class="auth-card">
                <h2>Connexion</h2>
                @if ($errors->any())
    <x-alert type="danger">
        <h5>Erreurs :</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-alert>
@endif
                 <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email Académique" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" class="form-control" name="password"  placeholder="Mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Se Connecter</button>
                </form>
                <div class="auth-footer">
                    <p>Vous n'avez pas de compte?<a href="{{ route('inscrire') }}" class="create-account"> Inscrivez-vous</a></p>
                    <p><a href="{{ route('forget') }}" class="forgot-password">Mot de passe oublié ?</a></p>
                    <p class="copyright">©2024 Tous droits réservés</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    window.addEventListener('beforeunload', function (e) {
  e.preventDefault();
  e.returnValue = '';
});

// Étape 2 : Bloquer la navigation en arrière
window.history.pushState(null, document.title, window.location.href);
window.addEventListener('popstate', function (event) {
  window.history.pushState(null, document.title, window.location.href);
});
</script>