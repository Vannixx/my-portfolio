// Add loader-active class to the body to disable scrolling
function showLoader() {
    document.body.classList.add('loader-active');
  }
  
  // Remove loader-active class from the body to enable scrolling
  function hideLoader() {
    document.body.classList.remove('loader-active');
  }
  
  // Example usage:
  // Call showLoader() when the loader is displayed
  showLoader();
  
  // Call hideLoader() when the loader is hidden
  setTimeout(function() {
    hideLoader();
  }, 2200); // Adjust the timeout based on your loader animation duration
  