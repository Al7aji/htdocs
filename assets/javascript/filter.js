document.addEventListener("DOMContentLoaded", function () {
  const checkboxes = document.querySelectorAll(".filter-type");
  const cars = document.querySelectorAll(".car-details");

  function applyFilters() {
    
    const selectedTypes = Array.from(document.querySelectorAll('input[data-filter="type"]:checked')).map(cb => cb.value);
    const selectedCapacities = Array.from(document.querySelectorAll('input[data-filter="capacity"]:checked')).map(cb => cb.value);

    cars.forEach(car => {
      const carType = car.getAttribute("data-type");
      const carCapacity = parseInt(car.getAttribute("data-capacity"));

      let matchType = selectedTypes.length === 0 || selectedTypes.includes(carType);

      let matchCapacity = false;
      if (selectedCapacities.length === 0) {
        matchCapacity = true;
      } else {
        selectedCapacities.forEach(val => {
          if (val === "8" && carCapacity >= 8) matchCapacity = true;
          if (parseInt(val) === carCapacity) matchCapacity = true;
        });
      }

      
      if (matchType && matchCapacity) {
        car.style.display = "block";
      } else {
        car.style.display = "none";
      }
    });
  }

  checkboxes.forEach(cb => {
    cb.addEventListener("change", applyFilters);
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const priceRange = document.getElementById("price-range");
  const priceLabel = document.querySelector(".range-label");
  const cars = document.querySelectorAll(".car-details");

  function filterCarsByPrice() {
    const maxPrice = parseFloat(priceRange.value);
    priceLabel.textContent = `Max. €${maxPrice.toFixed(2)}`;

    cars.forEach(car => {
      const carPrice = parseFloat(car.getAttribute("data-price"));

      if (!isNaN(carPrice) && carPrice <= maxPrice) {
        car.style.display = "block";
      } else {
        car.style.display = "none";
      }
    });
  }

  
  priceRange.addEventListener("input", filterCarsByPrice);

  
  filterCarsByPrice();
});



