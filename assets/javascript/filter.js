document.addEventListener("DOMContentLoaded", function () {
  const checkboxes = document.querySelectorAll(".filter-type");
  const cars = document.querySelectorAll(".car-details");

  function applyFilters() {
    // اجمع الفلاتر المحددة حسب النوع
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

      // عرض السيارة فقط إذا تطابق النوع والسعة معًا
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

  // ✅ فلترة عند تحريك الشريط
  priceRange.addEventListener("input", filterCarsByPrice);

  // ✅ فلترة مباشرة عند تحميل الصفحة
  filterCarsByPrice();
});



