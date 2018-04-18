window.onload = function () {
  var windowWidth = document.documentElement.clientWidth;
  var twitter = document.getElementById("twitter-timeline-container");

  if (windowWidth > 768 && twitter) {
    var introHeight = window.getComputedStyle(document.querySelector(".col-sm-8"),null).getPropertyValue("height");
    introHeight = introHeight.replace("px","");
    introHeight -= 6; // To compensate for weird whitespace under map
    document.getElementById("twitter-timeline-container").style.maxHeight = introHeight + "px";
  }
}

