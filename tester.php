<!DOCTYPE html>
<html>
<head>
  <style>
    #modal {
      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999;
      visibility: visible; /* Initially visible */
    }
    #modal-message {
      background-color: #fff;
      padding: 20px;
      font-size: 18px;
      text-align: center;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div id="modal">
    <button id="modal-message" onclick="toggleFullScreen()">Press F11 to start the examination</button>
  </div>

  <script>
    var modal = document.getElementById('modal');
    var modalMessage = document.getElementById('modal-message');
    var isExamStarted = false;

    document.addEventListener('keydown', function(event) {
      if (event.key === 'F11') 
      {
        if (isExamStarted) 
        {
          modal.style.visibility = 'visible';
          modalMessage.innerText = 'Press F11 to start the examination';
          isExamStarted = false;
        } 
        else 
        {
          modal.style.visibility = 'hidden';
          isExamStarted = true;
        }
      } 
      else 
      {
        // Prevent the default behavior if F11 key is not pressed
        event.preventDefault();
      }
    });

    function toggleFullScreen() 
    {
      const doc = window.document;
      const docEl = doc.documentElement;

      const requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
      const exitFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

      if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) 
      {
        requestFullScreen.call(docEl);
        modal.style.visibility = 'hidden';
        isExamStarted = true;
      } 
      else 
      {
        exitFullScreen.call(doc);
      }
    }
  </script>
</body>
</html>
