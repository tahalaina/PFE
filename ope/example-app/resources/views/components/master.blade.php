<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

     
  <link rel="stylesheet" href="{{ asset('css/equipement.css') }}">
  <link rel="stylesheet" href="{{ asset('css/plaging.css') }}">
  
    @props(['title'])
    <title>| {{ $title }}</title>
    
    <link rel="icon" href="{{ asset('img/favicon3.ico') }}" type="image/x-icon">
</head>
<style>
      body {
        padding-top: 70px;
      }
</style>
<body>
    @include('layout.nav')
   
   <main> 
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
         
        
    
        
      
        {{ $slot }}
    </div></main> 

    <a href="#" id="back-to-top" class="back-to-top">
      <i class="fas fa-arrow-up"></i>
    </a>
    @include('layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('javascript/equipement.js') }}"></script>

</body>
</html>
<script>
  document.getElementById('main-icon').addEventListener('click', function() {
      var extraIcons = document.getElementById('extra-icons');
      if (extraIcons.classList.contains('show')) {
          extraIcons.classList.remove('show');
          setTimeout(() => {
              extraIcons.style.display = 'none';
          }, 300); // Correspond au temps de la transition
      } else {
          extraIcons.style.display = 'block';
          setTimeout(() => {
              extraIcons.classList.add('show');
          }, 10); // Permet d'attendre le prochain cycle de rendu pour ajouter la classe
      }
  });

  // Optionally, close the extra icons when clicking outside
  document.addEventListener('click', function(event) {
      var isClickInside = document.getElementById('main-icon').contains(event.target) || document.getElementById('extra-icons').contains(event.target);
      if (!isClickInside) {
          var extraIcons = document.getElementById('extra-icons');
          if (extraIcons.classList.contains('show')) {
              extraIcons.classList.remove('show');
              setTimeout(() => {
                  extraIcons.style.display = 'none';
              }, 300); // Correspond au temps de la transition
          }
      }
  });
</script>