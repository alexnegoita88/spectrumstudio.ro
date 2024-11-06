// Get elements by their IDs
const searchIcon = document.getElementById('search-icon');
const searchIconAlt = document.getElementById('search-icon-alt');
const searchPopup = document.getElementById('search-popup');
const closeSearchPopup = document.getElementById('close-search-popup');

// Event listener to open the search popup
if (searchIcon) {
    searchIcon.addEventListener('click', function() {
        searchPopup.classList.remove('hidden');
    });
}

if (searchIconAlt) {
    searchIconAlt.addEventListener('click', function() {
        searchPopup.classList.remove('hidden');
    });
}

// Event listener to close the search popup
if (closeSearchPopup) {
    closeSearchPopup.addEventListener('click', function() {
        searchPopup.classList.add('hidden');
    });
}

// Optional: Close the popup when clicking outside of it
window.addEventListener('click', function(event) {
    if (event.target === searchPopup) {
        searchPopup.classList.add('hidden');
    }
});







// Get elements by their IDs
const searchIconMobile = document.getElementById('search-icon-mobile');
const searchInputContainer = document.getElementById('search-input-container');

// Toggle the visibility of the search input when the search icon is clicked
searchIconMobile.addEventListener('click', function() {
    searchInputContainer.classList.toggle('hidden');
});