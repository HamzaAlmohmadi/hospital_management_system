// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};





function toggleDropdown() {
  const dropdownMenu = document.getElementById('dropdownMenu');
  if (dropdownMenu.style.display === 'block') {
      dropdownMenu.style.display = 'none';
  } else {
      dropdownMenu.style.display = 'block';
  }
}

window.onclick = function(event) {
  if (!event.target.matches('.user') && !event.target.closest('.user')) {
      const dropdownMenu = document.getElementById('dropdownMenu');
      if (dropdownMenu.style.display === 'block') {
          dropdownMenu.style.display = 'none';
      }
  }
};