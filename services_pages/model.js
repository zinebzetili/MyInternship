const modal = document.getElementById("modal");

const toggleModal = (value) => {
  if (value === "open") {
    modal.style.display = "block";
    window.addEventListener("click", closeModalOnClickOutside);
    document.body.style.overflow = "hidden";
  }
  if (value === "close") {
    modal.style.display = "none";
    window.removeEventListener("click", closeModalOnClickOutside);
    document.body.style.overflow = "visible";
  }
};

const closeModalOnClickOutside = (event) => {
  if (event.target === modal) {
    toggleModal("close");
  }
};