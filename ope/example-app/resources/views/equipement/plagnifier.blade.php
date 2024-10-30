<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>| Plagnifier Equipement</title>
    <link rel="icon" href="{{ asset('img/favicon3.ico') }}" type="image/x-icon">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #001b4d;
            color: white;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #1e90ff;
            border-color: #1e90ff;
        }
        .btn-primary:hover {
            background-color: #87ceeb;
            border-color: #87ceeb;
        }
        .return-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            font-size: 24px;
            background-color: #1e90ff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .return-to-top:hover {
            background-color: #87ceeb;
        }
        .return-button {
            position: fixed;
            top: 20px;
            left: 20px;
            font-size: 24px;
            background-color: transparent;
            border: none;
            color: white;
            cursor: pointer;
        }
        .return-button:hover {
            color: #87ceeb;
        }
    </style>
</head>
<body>
    <h1>Planifier l'équipement {{ $equipement->nom }}</h1>

    <button class="return-button" onclick="window.history.back();"><i class="fas fa-arrow-left"></i></button>

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
    @if (session()->has('danger'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Danger!',
                text: '{{ session('danger') }}',
            });
        </script>
    @endif

    <form action="{{ route('execute', $equipement->id) }}" method="POST" class="container">
        @csrf
        <div class="form-group">
            <label for="event">Événement</label>
            <select class="form-control" id="event" name="event" required>
                <option value="reservation">Réservation</option>
                <option value="maintenance">Maintenance</option>
            </select>
        </div>
        <div class="form-group">
            <label for="debut">Date de début</label>
            <input type="date" class="form-control" id="debut" name="debut" required>
        </div>
        <div class="form-group">
            <label for="fin">Date de fin</label>
            <input type="date" class="form-control" id="fin" name="fin" required>
        </div>
        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>

    <button class="return-to-top" id="return-to-top"><i class="fas fa-arrow-up"></i></button>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show or hide the return-to-top button
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('#return-to-top').fadeIn();
                } else {
                    $('#return-to-top').fadeOut();
                }
            });

            // Scroll to top
            $('#return-to-top').click(function() {
                $('html, body').animate({ scrollTop: 0 }, 600);
                return false;
            });
        });
    </script>
</body>
</html>
