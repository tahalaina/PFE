<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation de mot de passe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Réinitialiser le mot de passe</h4>
                    </div>
                    <div class="card-body">
                        @include('layout.falshback')
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Adresse e-mail :</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>