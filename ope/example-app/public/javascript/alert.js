setTimeout(function() { 
    const alert = document.getElementById('my-alert'); 
    alert.style.transition = 'opacity 60s ease-in-out';
    alert.style.opacity = '0'; 
    setTimeout(function() { alert.style.display = 'none'; }, 10000); // Attend 0.5 seconde pour cacher l'alerte
  }, 2000); // 10 secondes 