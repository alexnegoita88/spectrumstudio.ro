document.addEventListener('DOMContentLoaded', function () {
    console.log('JavaScript loaded'); // Add this line
    const sortSelect = document.querySelector('select[name="sort"]');
    const form = document.getElementById('sort-form');

    sortSelect.addEventListener('change', function () {
        // console.log('Sort changed:', sortSelect.value); // Add this line
        form.submit();
    });
});