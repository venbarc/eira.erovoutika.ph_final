<!DOCTYPE html>
<html>
<head>
  <title>Automatic Fullscreen</title>
</head>
<body>

  <h1>Welcome to the Fullscreen Page</h1>

  <script>
    // Function to handle fullscreen request
    function requestFullscreen() {
      const element = document.documentElement;
      if (element.requestFullscreen) {
        element.requestFullscreen();
      } else if (element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
      } else if (element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
      } else if (element.msRequestFullscreen) {
        element.msRequestFullscreen();
      }
    }

    // Automatically request fullscreen mode when the page loads
    window.addEventListener('load', requestFullscreen);
  </script>

</body>
</html>
