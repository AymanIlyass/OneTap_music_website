  window.addEventListener("load", () => {
  const sounds = document.querySelectorAll(".sound");
  console.log(sounds);
  const pads = document.querySelectorAll(".pads div");
  const visual = document.querySelector(".visual");
  const colors = [
      "#60d394",
      "#d36060",
      "#c060d3",
      "#d3d160",
      "#606bd3",
      "#60c2d3"
            ];

  pads.forEach((pad, index) => {
      pad.addEventListener("click", function() {
        sounds[index].currentTime = 0;
        sounds[index].play();
        createBubble(index);
          });
    });

    document.onkeyup = function(e) {
        if (e.which == 65) {
                  sounds[0].currentTime = 0;
                  sounds[0].play();
                  createBubble(0);
        } else if (e.which == 83) {
                  sounds[1].currentTime = 0;
                  sounds[1].play();
                  createBubble(1);
        } else if (e.which == 68) {
                  sounds[2].currentTime = 0;
                  sounds[2].play();
                  createBubble(2);
        } else if (e.which == 70) {
                  sounds[3].currentTime = 0;
                  sounds[3].play();
                  createBubble(1);
        } else if (e.which == 71) {
                  sounds[4].currentTime = 0;
                  sounds[4].play();
                  createBubble(4);
        } else if (e.which == 72) {
                  sounds[5].currentTime = 0;
                  sounds[5].play();
                  createBubble(5);
        }
    };

    const createBubble = index => {
    const bubble = document.createElement("div");
    visual.appendChild(bubble);
    bubble.style.backgroundColor = colors[index];
    bubble.style.animation = `jump 1s ease`;
    bubble.addEventListener("animationend", function() {
         visual.removeChild(this);
       });
  };
});