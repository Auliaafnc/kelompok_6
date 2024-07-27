(function ($) {
  "use strict";

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Sticky Navbar
  $(window).scroll(function () {
    if ($(this).scrollTop() > 0) {
      $(".navbar").addClass("nav-sticky");
    } else {
      $(".navbar").removeClass("nav-sticky");
    }
  });

  // Dropdown on mouse hover
  $(document).ready(function () {
    function toggleNavbarMethod() {
      if ($(window).width() > 992) {
        $(".navbar .dropdown")
          .on("mouseover", function () {
            $(".dropdown-toggle", this).trigger("click");
          })
          .on("mouseout", function () {
            $(".dropdown-toggle", this).trigger("click").blur();
          });
      } else {
        $(".navbar .dropdown").off("mouseover").off("mouseout");
      }
    }
    toggleNavbarMethod();
    $(window).resize(toggleNavbarMethod);
  });

  // Main carousel
  $(".carousel .owl-carousel").owlCarousel({
    autoplay: true,
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    items: 1,
    smartSpeed: 300,
    dots: false,
    loop: true,
    nav: false,
  });

  // // Date and time picker
  // $("#date").datetimepicker({
  //   format: "L",
  // });
  // $("#time").datetimepicker({
  //   format: "LT",
  // });

  // Slider Home carousels
  $(".slider-home-carousel").owlCarousel({
    center: true,
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 2,
      },
      768: {
        items: 3,
      },
      992: {
        items: 4,
      },
      1100: {
        items: 5,
      },
    },
  });

  // Related post carousel
  $(".related-slider").owlCarousel({
    autoplay: true,
    dots: false,
    loop: true,
    nav: true,
    navText: [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
      },
      768: {
        items: 2,
      },
    },
  });
})(jQuery);

// // take away //
// document.addEventListener("DOMContentLoaded", function () {
//   const minusButtonsTakeaway = document.querySelectorAll(".minus-btn-takeawayst");
//   const plusButtonsTakeaway = document.querySelectorAll(".plus-btn-takeawayst");
//   const totalPriceTakeawayElement = document.getElementById(
//     "total-price-takeawayst"
//   );

//   minusButtonsTakeaway.forEach((button) => {
//     button.addEventListener("click", function () {
//       const input = this.nextElementSibling;
//       let value = parseInt(input.value);
//       if (value > 0) {
//         value--;
//         input.value = value;
//         updateTotalPriceTakeaway();
//       }
//     });
//   });

//   plusButtonsTakeaway.forEach((button) => {
//     button.addEventListener("click", function () {
//       const input = this.previousElementSibling;
//       let value = parseInt(input.value);
//       value++;
//       input.value = value;
//       updateTotalPriceTakeaway();
//     });
//   });

//   function updateTotalPriceTakeaway() {
//     let totalPrice = 0;
//     const menuItems = document.querySelectorAll(".takeaway-section .menu-item");
//     menuItems.forEach((item) => {
//       const priceText = item.querySelector(".menu-details span").textContent;
//       const price = parseInt(priceText.match(/\d+/)[0]) * 1000;
//       const quantity = parseInt(item.querySelector(".quantity input").value);
//       totalPrice += price * quantity;
//     });
//     totalPriceTakeawayElement.textContent = `Rp. ${totalPrice.toLocaleString()}`;
//   }

//   const confirmButton = document.getElementById("confirm-btn-menu");
//   confirmButton.addEventListener("click", function () {
//     const selectedMenuItems = [];
//     const menuItems = document.querySelectorAll(".takeaway-section .menu-item");
//     menuItems.forEach((item, index) => {
//       const menuName = item
//         .querySelector(".menu-details span")
//         .textContent.split(" (")[0];
//       const quantity = parseInt(item.querySelector(".quantity input").value);
//       if (quantity > 0) {
//         selectedMenuItems.push(`${index + 1}. ${menuName} (${quantity})`);
//       }
//     });

//     if (selectedMenuItems.length === 0) {
//       alert("Silakan pilih setidaknya satu item dari menu.");
//       return;
//     }

//     const totalPrice = totalPriceTakeawayElement.textContent;
//     localStorage.setItem("totalPriceTakeaway", totalPrice);
//     localStorage.setItem(
//       "selectedMenuItemsTakeaway",
//       JSON.stringify(selectedMenuItems)
//     );
//     window.location.href = "takeawayform.html";
//   });
// });

document.addEventListener("DOMContentLoaded", function () {
  // Set the minimum date for the takeaway date input
  const takeawayDateInput = document.getElementById("takeaway-date");

  // Get today's date in YYYY-MM-DD format
  const today = new Date();
  const yyyy = today.getFullYear();
  const mm = String(today.getMonth() + 1).padStart(2, "0");
  const dd = String(today.getDate()).padStart(2, "0");

  const formattedToday = `${yyyy}-${mm}-${dd}`;
  takeawayDateInput.setAttribute("min", formattedToday);
  const timeButtons = document.querySelectorAll(".time-btn-TA");
  let selectedTimeButton = null;

  timeButtons.forEach((button) => {
    button.addEventListener("click", function () {
      if (selectedTimeButton) {
        selectedTimeButton.classList.remove("selected");
      }
      selectedTimeButton = this;
      this.classList.add("selected");
    });
  });

  const confirmButton = document.getElementById("confirm-btn-TA");
  const totalPriceTakeawayElement = document.createElement("div");
  totalPriceTakeawayElement.textContent =
    localStorage.getItem("totalPriceTakeaway");

  confirmButton.addEventListener("click", function () {
    const takeawaydate = document.getElementById("takeaway-date").value;
    const nameinput = document.getElementById("name-input").value;
    const telpinput = document.getElementById("telp-input").value;

    const pesaninput = document.getElementById("pesan-input").value;
    const additionalpayment =
      document.getElementById("additional-payment").value;
    const selectedTime = selectedTimeButton
      ? selectedTimeButton.textContent
      : null;
    const selectedMenuItems = JSON.parse(
      localStorage.getItem("selectedMenuItemsTakeaway")
    );

    if (
      !takeawaydate ||
      !selectedTime ||
      !selectedMenuItems ||
      !nameinput ||
      !telpinput ||
      !additionalpayment
    ) {
      alert("Harap diisi semua detail untuk melakukan pemesanan (Take Away).");
      return;
    }

    alert(
      `Detail Pemesanan (Take away) Berhasil Dibuat!
      *Nama Pemesan: ${nameinput}
      *Kontak: ${telpinput} 
      *Tanggal: ${takeawaydate},(${selectedTime} WIB)
      *Pesan Tambahan: ${pesaninput}
      *Menu yang dipilih:\n${selectedMenuItems.join("\n")}
      *Total Harga: ${totalPriceTakeawayElement.textContent}
      *Jenis Pembayaran: ${additionalpayment}
      \nTerimaksih sudah melakukan pemesanan, kami akan mengkonfirmasi kembali melalui whatsapps. enjoy`
    );
  });
});

// reservation.html
document.addEventListener("DOMContentLoaded", function () {
  // Set the minimum date for the takeaway date input
  const takeawayDateInput = document.getElementById("reservation-date");

  // Get today's date in YYYY-MM-DD format
  const today = new Date();
  const yyyy = today.getFullYear();
  const mm = String(today.getMonth() + 1).padStart(2, "0");
  const dd = String(today.getDate()).padStart(2, "0");

  const formattedToday = `${yyyy}-${mm}-${dd}`;
  takeawayDateInput.setAttribute("min", formattedToday);

  const confirmButtonRSV = document.getElementById("confirm-btn-RSV");
  let selectedTime = null;

  const timeButtons = document.querySelectorAll(".time-btn");
  timeButtons.forEach((button) => {
    // Set data-time attribute for each button
    button.setAttribute("data-time", button.textContent);

    button.addEventListener("click", function () {
      if (selectedTime) {
        selectedTime.classList.remove("selected");
      }
      selectedTime = this;
      this.classList.add("selected");
    });
  });

  confirmButtonRSV.addEventListener("click", function () {
    const reservationDate = document.getElementById("reservation-date").value;
    const areaPreference = document.getElementById("area-preference").value;
    const pesanOpsional = document.getElementById("pesan-input").value; // Get the optional message

    if (!reservationDate || !areaPreference || !selectedTime) {
      alert("Harap diisi semua detail untuk melakukan pemesanan.");
      return;
    }

    // Simpan data di localStorage
    localStorage.setItem("reservationDate", reservationDate);
    localStorage.setItem("areaPreference", areaPreference);
    localStorage.setItem("pesanOpsional", pesanOpsional); // Save the optional message
    localStorage.setItem(
      "selectedTime",
      selectedTime.getAttribute("data-time")
    );

    // Arahkan ke halaman reservationmenu.html
    window.location.href = "reservationmenu.html";
  });
});

// reservationmenu.html
document.addEventListener("DOMContentLoaded", function () {
  const minusButtons = document.querySelectorAll(".minus-btn");
  const plusButtons = document.querySelectorAll(".plus-btn");
  const totalPriceElement = document.getElementById("total-price");

  minusButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const input = this.nextElementSibling;
      let value = parseInt(input.value);
      if (value > 0) {
        value--;
        input.value = value;
        updateTotalPrice();
      }
    });
  });

  plusButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const input = this.previousElementSibling;
      let value = parseInt(input.value);
      value++;
      input.value = value;
      updateTotalPrice();
    });
  });

  function updateTotalPrice() {
    let totalPrice = 0;
    const menuItems = document.querySelectorAll(".menu-item");
    menuItems.forEach((item) => {
      const priceText = item.querySelector(".menu-details span").textContent;
      const price = parseInt(priceText.match(/\d+/)[0]) * 1000;
      const quantity = parseInt(item.querySelector(".quantity input").value);
      totalPrice += price * quantity;
    });
    totalPriceElement.textContent = `Rp. ${totalPrice.toLocaleString()}`;
  }

  const confirmButton = document.getElementById("confirm-btn");
  confirmButton.addEventListener("click", function () {
    const nameInput = document.getElementById("name-input").value;
    const telpInput = document.getElementById("telp-input").value;
    const additionalPayment =
      document.getElementById("additional-payment").value;

    const reservationDate = localStorage.getItem("reservationDate");
    const areaPreference = localStorage.getItem("areaPreference");
    const selectedTime = localStorage.getItem("selectedTime");
    const pesanOpsional = localStorage.getItem("pesanOpsional"); // Retrieve the optional message
    const selectedMenuItems = [];

    const menuItems = document.querySelectorAll(".menu-item");
    let foodCount = 0;
    let drinkCount = 0;

    menuItems.forEach((item, index) => {
      const menuName = item
        .querySelector(".menu-details span")
        .textContent.split(" (")[0];
      const quantity = parseInt(item.querySelector(".quantity input").value);
      if (quantity > 0) {
        selectedMenuItems.push(`${index + 1}. ${menuName} (${quantity})`);
        if (index < 2) {
          // Assuming first two items are food
          foodCount += quantity;
        } else {
          // Assuming the rest are drinks
          drinkCount += quantity;
        }
      }
    });

    if (
      !selectedMenuItems.length ||
      !nameInput ||
      !telpInput ||
      !additionalPayment
    ) {
      alert("Harap diisi semua detail untuk melakukan pemesanan.");
      return;
    }

    if (foodCount < 2 || drinkCount < 2) {
      alert("Harap pesan minimal 2 item makanan dan 2 item minuman.");
      return;
    }

    alert(
      `Detail Pemesanan Berhasil Dibuat!
      *Nama Pemesan: ${nameInput}
      *Telepon: ${telpInput}
      *Tanggal Reservasi: ${reservationDate}, (${selectedTime} WIB)
      *Preferensi Area: ${areaPreference}
      *Pesan Opsional: ${pesanOpsional} 
      *Menu yang dipilih:\n${selectedMenuItems.join("\n")}
      *Total Harga: ${totalPriceElement.textContent}
      *Metode Pembayaran: ${additionalPayment}
      \nTerimaksih sudah melakukan reservasi, kami akan mengkonfirmasi kembali melalui whatsapps. enjoy`
    );
  });
});

// JS langkah langkah di service //
document.addEventListener("DOMContentLoaded", function () {
  // Langkah-langkah reservasi (Reservasi)
  var reservasiButton = document.querySelector(
    '.service-item a[href="#stepRSV"]'
  );
  var reservasiSection = document.getElementById("stepRSV");

  reservasiButton.addEventListener("click", function (event) {
    event.preventDefault();
    var offset = document.querySelector(".navbar").offsetHeight; // Ambil tinggi navbar
    var targetPosition = reservasiSection.offsetTop - offset;
    window.scrollTo({ top: targetPosition, behavior: "smooth" });
  });

  // Langkah-langkah pemesanan take away (Take Away)
  var takeawayButton = document.querySelector(
    '.service-item a[href="#stepTA"]'
  );
  var takeawaySection = document.getElementById("stepTA");

  takeawayButton.addEventListener("click", function (event) {
    event.preventDefault();
    var offset = document.querySelector(".navbar").offsetHeight; // Ambil tinggi navbar
    var targetPosition = takeawaySection.offsetTop - offset;
    window.scrollTo({ top: targetPosition, behavior: "smooth" });
  });
});

// Inih buat dari yang order memenggil ke service //
document.getElementById("linkRSV").addEventListener("click", function (event) {
  event.preventDefault(); // Mencegah tautan default
  window.location.href = "service.html#stepRSV";
});

document.getElementById("linkTA").addEventListener("click", function (event) {
  event.preventDefault(); // Mencegah tautan default
  window.location.href = "service.html#stepTA";
});
