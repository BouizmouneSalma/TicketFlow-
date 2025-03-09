function toggleModal(show) {
    const modal = document.getElementById("ticketModal");
    if (show) {
        modal.classList.remove("hidden");
        modal.classList.add("flex", "opacity-100", "scale-100");
    } else {
        modal.classList.remove("flex", "opacity-100", "scale-100");
        modal.classList.add("hidden");
    }
}

function toggleLoginModal(show) {
const modal = document.getElementById('loginModal');
if (show) {
        modal.classList.remove("hidden");
        modal.classList.add("flex", "opacity-100", "scale-100");
    } else {
        modal.classList.remove("flex", "opacity-100", "scale-100");
        modal.classList.add("hidden");
    }
}

function devModal(show, ticketId = null) {
    const modal = document.getElementById("assignModal");

    if (show) {
        document.getElementById('ticketId').value = ticketId; 
        
        modal.classList.remove("hidden");
        modal.classList.add("flex", "opacity-100", "scale-100");
    } else {
        modal.classList.remove("flex", "opacity-100", "scale-100");
        modal.classList.add("hidden");
    }
}

