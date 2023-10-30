
    $(document).ready(function() {
        $('#navbarDropdown1').on('click', function(e) {
            e.preventDefault();
            $('#userDropdown').toggleClass('show');
        });
    });

    // Close the dropdown when clicking outside of it
    $(document).click(function(e) {
        if (!$(e.target).closest('#navbarDropdown1').length && !$(e.target).closest('#userDropdown').length) {
            $('#userDropdown').removeClass('show');
        }
    });



    