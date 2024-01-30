const backgrounds = ['images/1.jpg', 'images/2.jpg', 'images/3.jpg']; 
let currentIndex = 0;

    function changeBackground() {
      document.body.style.backgroundImage = `url(${backgrounds[currentIndex]})`;
      currentIndex = (currentIndex + 1) % backgrounds.length;
    }

setInterval(changeBackground, 5000);