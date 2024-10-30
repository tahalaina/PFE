var modal = document.getElementById("equipment-modal");
var btn = document.getElementById("add-equipment");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Bouton "retour en haut"
window.onload = function() {
  var backToTopButton = document.getElementById("back-to-top");

  window.onscroll = function() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      backToTopButton.style.display = "block";
    } else {
      backToTopButton.style.display = "none";
    }
  };

  backToTopButton.addEventListener("click", function() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  });
};
document.addEventListener('DOMContentLoaded', function() {
  var countUpElements = document.querySelectorAll('.count-up');

  countUpElements.forEach(function(element) {
    var targetCount = parseInt(element.dataset.count);
    var duration = 500; // Durée de l'animation en millisecondes (0.5 seconde)

    var counter = 0;
    var increment = targetCount / (duration / 16); // Incrément à chaque frame (16ms)

    function updateCount() {
      counter += increment;
      if (counter >= targetCount) {
        element.classList.add('target-reached');
        element.textContent = targetCount.toLocaleString();
        element.classList.add('bounce');
        setTimeout(function() {
          element.classList.remove('bounce');
        }, 1000);
      } else {
        element.textContent = Math.floor(counter).toLocaleString();
        requestAnimationFrame(updateCount);
      }
    }

    updateCount();
  });
});

$(document).ready(function() {
  $('#sidebar-toggle').click(function() {
    $('.sidebar').toggleClass('expanded');
    $('#content').toggleClass('expanded');
  });

  $('#userDropdown').click(function() {
    $('#userDropdownMenu').toggle();
  });

  $(document).click(function(e) {
    if (!$(e.target).closest('#userDropdown, #userDropdownMenu').length) {
      $('#userDropdownMenu').hide();
    }
  });
});


function confirmDelete(event) {
    event.preventDefault(); // Prevent form submission

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn text-bg-success",
            cancelButton: "btn text-bg-danger"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: "Êtes-vous sûr ?",
        text: "Cette action est irréversible !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Oui, supprimer !",
        cancelButtonText: " Non, annuler !",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
                title: "Supprimé !",
                text: "Votre réservation a été supprimée.",
                icon: "success"
            }).then(() => {
                event.target.submit();
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Annulé",
                text: "Votre réservation est en sécurité :)",
                icon: "error"
            });
        }
    });
}

// Show or hide the "Back to Top" button
window.addEventListener('scroll', function() {
    const backToTopButton = document.getElementById('back-to-top');
    if (window.scrollY > 300) {
        backToTopButton.style.display = 'block';
    } else {
        backToTopButton.style.display = 'none';
    }
});

// Scroll back to the top when the button is clicked
document.getElementById('back-to-top').addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
  // Fonction pour confirmer la mise à jour
function confirmUpdate() {
// Affiche l'alerte de succès après la mise à jour
Swal.fire({
    position: "center",
    icon: "success",
    title: "Votre réservation a été mise à jour.",
    showConfirmButton: false,
    timer: 1500
});
}

function showBlock(blockId) {
  // Masquer tous les blocs
  var blocks = document.getElementsByClassName("content-block");
  for (var i = 0; i < blocks.length; i++) {
      blocks[i].style.display = "none";
  }

  // Afficher le bloc sélectionné
  var selectedBlock = document.getElementById(blockId);
  selectedBlock.style.display = "block";
}

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
