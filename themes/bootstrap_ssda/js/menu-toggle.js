window.onload = function() {
  var showSearchBtn = document.getElementById("show-search-btn");
  var mobileLogo = document.getElementById("mobile-logo");
  var menuBtn = document.querySelector(".navbar-toggle");
  var cancelSearchBtn = document.getElementById("cancel-search-btn");
  var searchForm = document.getElementById("islandora-solr-simple-search-ssda-custom-form");

  var menuElements = [showSearchBtn, mobileLogo, menuBtn, cancelSearchBtn, searchForm];

  showSearchBtn.addEventListener("click", mobileMenuToggle);
  cancelSearchBtn.addEventListener("click", mobileMenuToggle);

  function mobileMenuToggle() {
    for (i = 0; i < menuElements.length; i++) {
      var menuElement = menuElements[i];

      toggleVisibility(menuElement);
      toggleAnimation(menuElement);
    }
  }

  function toggleVisibility(el) {
    if (el.id == "islandora-solr-simple-search-ssda-custom-form") {
      el.classList.toggle("hidden-xs");
      return;
    }

    el.classList.toggle("hidden");
    el.classList.toggle("visible-xs");
  }

  function toggleAnimation(el) {
    if (el.classList.contains("visible-xs") || (!el.classList.contains("hidden-xs") && (el.id == "islandora-solr-simple-search-ssda-custom-form"))) {
      el.classList.add("animated", "fadeIn");
    }
    else {
      el.classList.remove("animated", "fadeIn");
    }
  }
}
