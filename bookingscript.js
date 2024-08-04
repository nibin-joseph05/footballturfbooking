$(document).ready(function () {
    // Open the modal when the "Book Now" button is clicked
    $('#openModalButton').click(function () {
        $('#bookingModal').css('display', 'block');
    });

    // Close the modal when the "x" button is clicked
    $('#closeModal').click(function () {
        $('#bookingModal').css('display', 'none');
    });

    // Close the modal when clicking outside the modal
    $(window).click(function (e) {
        if (e.target.id === 'bookingModal') {
            $('#bookingModal').css('display', 'none');
        }
    });

    // Prevent form submission
    $('#booking-form').submit(function (e) {
        e.preventDefault();
        // Handle form submission (AJAX) as shown in your previous code
    });
});
