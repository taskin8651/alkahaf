const header = document.getElementById('siteHeader');
const nav = document.getElementById('navbar');
const menuBtn = document.getElementById('menuBtn');

window.addEventListener('scroll', () => {
  header.classList.toggle('scrolled', window.scrollY > 20);
});

menuBtn.addEventListener('click', () => {
  const isOpen = nav.classList.toggle('active');
  document.body.classList.toggle('nav-open', isOpen);
  menuBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
  menuBtn.innerHTML = isOpen ? '<i class="bi bi-x-lg"></i>' : '<i class="bi bi-list"></i>';
});

document.querySelectorAll('.navbar a').forEach(link => {
  link.addEventListener('click', () => {
    nav.classList.remove('active');
    document.body.classList.remove('nav-open');
    menuBtn.setAttribute('aria-expanded', 'false');
    menuBtn.innerHTML = '<i class="bi bi-list"></i>';
  });
});

document.querySelectorAll('.faq-q').forEach(button => {
  button.addEventListener('click', () => {
    const item = button.closest('.faq-item');
    document.querySelectorAll('.faq-item').forEach(other => {
      if (other !== item) other.classList.remove('active');
    });
    item.classList.toggle('active');
  });
});

const revealObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach(element => revealObserver.observe(element));

const sections = document.querySelectorAll('section[id]');
window.addEventListener('scroll', () => {
  let current = 'home';
  sections.forEach(section => {
    if (window.scrollY >= section.offsetTop - 170) current = section.id;
  });
  document.querySelectorAll('.navbar a').forEach(link => {
    link.classList.toggle('active', link.getAttribute('href') === `#${current}`);
  });
});


 const orderModalOverlay = document.getElementById("orderModalOverlay");
const orderModalClose = document.getElementById("orderModalClose");
const whatsappOrderForm = document.getElementById("whatsappOrderForm");

const orderProductName = document.getElementById("orderProductName");
const orderProductSize = document.getElementById("orderProductSize");
const orderWhatsappNumber = document.getElementById("orderWhatsappNumber");

const customerName = document.getElementById("customerName");
const customerAddress = document.getElementById("customerAddress");
const customerRoad = document.getElementById("customerRoad");
const customerLandmark = document.getElementById("customerLandmark");
const customerPincode = document.getElementById("customerPincode");
const customerPhone = document.getElementById("customerPhone");
const customerCity = document.getElementById("customerCity");

document.querySelectorAll(".open-order-form").forEach((button) => {
    button.addEventListener("click", function () {
        const clickUrl = this.dataset.clickUrl || "";
        const productName = this.dataset.productName || "";
        const productSize = this.dataset.productSize || "";
        const whatsappNumber = this.dataset.whatsappNumber || "918591114751";

        if (clickUrl) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") || "";

            fetch(clickUrl, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Accept": "application/json",
                },
            }).catch(() => {});
        }

        orderProductName.value = productName;
        orderProductSize.value = productSize;
        orderWhatsappNumber.value = whatsappNumber;

        orderModalOverlay.classList.add("active");
        document.body.style.overflow = "hidden";
    });
});

function closeOrderModal() {
    orderModalOverlay.classList.remove("active");
    document.body.style.overflow = "";
}

if (orderModalClose) {
    orderModalClose.addEventListener("click", closeOrderModal);
}

if (orderModalOverlay) {
    orderModalOverlay.addEventListener("click", function (event) {
        if (event.target === orderModalOverlay) {
            closeOrderModal();
        }
    });
}

if (whatsappOrderForm) {
    whatsappOrderForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const number = orderWhatsappNumber.value || "918591114751";

        const message =
`Hello, I want to place an order.

Product Name: ${orderProductName.value}
Size: ${orderProductSize.value}

Customer Details:
Name: ${customerName.value}
Full Address: ${customerAddress.value}
Road: ${customerRoad.value}
Landmark: ${customerLandmark.value}
Pincode: ${customerPincode.value}
Contact Number: ${customerPhone.value}
City: ${customerCity.value}`;

        const whatsappUrl = `https://wa.me/${number}?text=${encodeURIComponent(message)}`;

        window.open(whatsappUrl, "_blank");

        whatsappOrderForm.reset();
        closeOrderModal();
    });
}
