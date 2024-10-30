(function () {
  const mobNavigation = () =>{
    const DOM = { }

    const cacheDOM =()=>{
      DOM.dropdownIcons = document.querySelectorAll('.wp-block-navigation__submenu-icon');
      DOM.subMenuItems = document.querySelectorAll('.wp-block-navigation__submenu-container');
    }

    const eventListeners=()=> {
      DOM.dropdownIcons.forEach(icon => {
        icon.addEventListener('click', function (e) {
          e.preventDefault();
          const submenu = icon.nextElementSibling;
          submenu.classList.toggle('is-subMenu--active');
        });
      });
    }

    const init = () => {
      cacheDOM();
      eventListeners();
    }

    return { init };
  }

  const classToggleAutocompleter = () => {
    const autoCompleteWrappers = document.querySelectorAll(
      ".cm-news-demo-autocomplete"
    );
    if (autoCompleteWrappers) {
      autoCompleteWrappers.forEach((element) => {
        const autoCompleteField = element.querySelector(".aa-Input");
        if (autoCompleteField) {
          // Add event listener to autocomplete field
          autoCompleteField.addEventListener("focus", function () {
            // Create a MutationObserver instance
            const observer = new MutationObserver(function (
              mutationsList,
              observer
            ) {
              // Check if .aa-Panel element exists in the DOM
              const aaPanel = document.querySelector(".aa-Panel");
              if (aaPanel) {
                // Add 'aa-panel--fullwidth' class to 'aa-Panel'
                aaPanel.classList.add("aa-panel--fullwidth");
                // Disconnect observer since we found what we were looking for
                observer.disconnect();
              }
            });

            // Start observing changes in the DOM subtree
            observer.observe(document.body, { subtree: true, childList: true });
          });
        }
      });
    }
  };

  document.addEventListener("DOMContentLoaded", () => {
    mobNavigation().init();
    classToggleAutocompleter();
  });
})();
