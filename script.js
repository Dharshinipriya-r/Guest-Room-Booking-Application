document.getElementById("room-form").addEventListener("submit", function(event) {
    event.preventDefault();
    // Fetch form data
    const roomName = document.getElementById("room-name").value;
    const minBookingDays = document.getElementById("min-booking-days").value;
    const maxBookingDays = document.getElementById("max-booking-days").value;
    const rentAmount = document.getElementById("rent-amount").value;
    const roomPhoto = document.getElementById("room-photo").files[0];

    // Perform form validation

    // Prepare form data to send to backend
    const formData = new FormData();
    formData.append("roomName", roomName);
    formData.append("minBookingDays", minBookingDays);
    formData.append("maxBookingDays", maxBookingDays);
    formData.append("rentAmount", rentAmount);
    formData.append("roomPhoto", roomPhoto);

    // Send form data to backend using fetch API or AJAX
    // Example:
    fetch("/api/create-room", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Handle success or error response from backend
        console.log(data);
    })
    .catch(error => {
        console.error("Error:", error);
    });
});
