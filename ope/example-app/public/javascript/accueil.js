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


  let lastActivity = Date.now();
  const inactivityTimeout = 10000; // 1 seconde

  document.addEventListener("mousemove", () => {
    lastActivity = Date.now();
    hideErrorMessage();
  });

  document.addEventListener("keydown", () => {
    lastActivity = Date.now();
    hideErrorMessage();
  });

  function checkInactivity() {
    const currentTime = Date.now();
    const inactiveTime = currentTime - lastActivity;

    if (inactiveTime >= inactivityTimeout) {
      document.getElementById("block").style.display = "block";
      showErrorMessage();
    } else {
      document.getElementById("block").style.display = "none";
      hideErrorMessage();
    }

    requestAnimationFrame(checkInactivity);
  }

  function showErrorMessage() {
    const errorMessage = document.getElementById("error-message");
    errorMessage.style.display = "block";
    errorMessage.style.opacity = "1";
  }

  function hideErrorMessage() {
    const errorMessage = document.getElementById("error-message");
    errorMessage.style.opacity = "0";
    setTimeout(() => {
      errorMessage.style.display = "none";
    }, 500);
  }

  checkInactivity();



  // Récupérer l'élément de l'icône de message
const messageIcon = document.querySelector('.sidebar-item i.fa-comment-alt');
const messageContainer = document.querySelector('#message-container');

// Ajouter un écouteur d'événement sur l'icône de message
messageIcon.addEventListener('click', () => {
    messageContainer.classList.toggle('show');
    fetchMessages();
});

async function fetchMessages() {
    try {
        const response = await fetch('/messages');
        const messages = await response.json();

        const messageList = document.querySelector('#message-container .message-list');
        messageList.innerHTML = '';

        messages.forEach(message => {
            const messageElement = document.createElement('div');
            messageElement.classList.add('message');
            messageElement.textContent = `${message.user.name}: ${message.content}`;
            messageList.appendChild(messageElement);
        });
    } catch (error) {
        console.error('Erreur lors de la récupération des messages:', error);
    }
}