document.addEventListener("DOMContentLoaded", function () {
    const roomTypes = [
      {
        type: "Single Room",
        description: "A cozy room perfect for solo travelers.",
        image: "single room.jpg"
    
      },
      {
        type: "Double Room",
        description: "A comfortable room for two guests.",
        image: "double room.webp"
      },
      {
        type: "Deluxe Room",
        description: "Luxurious accommodations for a special stay.",
        image: "deluxe room.webp"
      },
      {
        type: "Queen Room",
        description: "A spacious room with a queen-sized bed.",
        image: "queen room.jpg"
      },
      {
        type: "Family Room",
        description: "Perfect for families with ample space for everyone.",
        image: "family room.jpg"
      }
    ];
  
    const cardContainer = document.getElementById("room-cards");
  
    roomTypes.forEach(room => {
      const card = document.createElement("div");
      card.classList.add("card");
  
      const image = document.createElement("img");
      image.src = room.image;
      image.alt = room.type;
      card.appendChild(image);
  
      const heading = document.createElement("h2");
      heading.textContent = room.type;
      card.appendChild(heading);
  
      const description = document.createElement("p");
      description.textContent = room.description;
      card.appendChild(description);
  
      cardContainer.appendChild(card);
    });
  });
  