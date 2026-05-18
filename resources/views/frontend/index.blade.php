<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $setting->meta_title ?? 'The Real Fragrance World | Premium Attars & Perfumes' }}</title>

    <meta name="description"
          content="{{ $setting->meta_description ?? 'Luxury attars, perfumes, oud collection, discovery sets and WhatsApp ordering by The Real Fragrance World.' }}" />

    @if(!empty($setting->meta_keywords))
        <meta name="keywords" content="{{ $setting->meta_keywords }}">
    @endif

    @if(!empty($setting->canonical_url))
        <link rel="canonical" href="{{ $setting->canonical_url }}">
    @endif

    @if(!empty($setting->og_image_url))
        <meta property="og:image" content="{{ $setting->og_image_url }}">
    @endif

    @if(!empty($setting->favicon_url))
        <link rel="icon" href="{{ $setting->favicon_url }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>

    <div class="topbar">
        <div class="container topbar-inner">
            <div class="topbar-left">
                <span>
                    <i class="bi bi-cash-coin"></i>
                    COD Available
                </span>

                <span>
                    <i class="bi bi-globe2"></i>
                    Wholesale & International Orders
                </span>
            </div>

            @if(!empty($setting->whatsapp_number))
                <a class="topbar-call"
                   href="https://wa.me/{{ $setting->whatsapp_number }}"
                   target="_blank">
                    <i class="bi bi-whatsapp"></i>
                    {{ $setting->primary_phone ?? $setting->whatsapp_number }}
                </a>
            @endif
        </div>
    </div>

    <header class="site-header" id="siteHeader">
        <div class="container header-inner">

            <a href="#home" class="brand" aria-label="{{ $setting->website_name ?? 'The Real Fragrance World' }} Home">

                @if(!empty($setting->logo_url))
                    <img src="{{ $setting->logo_url }}"
                         alt="{{ $setting->website_name ?? 'The Real Fragrance World' }} Logo"
                         class="brand-logo" />
                @else
                    <img src="{{ asset('assets/img/logo.webp') }}"
                         alt="{{ $setting->website_name ?? 'The Real Fragrance World' }} Logo"
                         class="brand-logo" />
                @endif

                <span class="brand-copy">
                    <strong>{{ $setting->website_name ?? 'The Real Fragrance World' }}</strong>

                    @if(!empty($setting->website_tagline))
                    @else
                        <small>Zahid Tanwar</small>
                    @endif
                </span>
            </a>

            <nav class="navbar" id="navbar">
                <a href="#home" class="active">Home</a>
                <a href="#products">Products</a>
                <a href="#categories">Categories</a>
                <a href="#about">About</a>
                <a href="#why">Why Choose Us</a>
                <a href="#contact">Contact</a>
            </nav>

            <div class="header-actions">
                @if(!empty($setting->whatsapp_number))
                    <a href="https://wa.me/{{ $setting->whatsapp_number }}"
                       class="btn btn-dark"
                       target="_blank">
                        <i class="bi bi-whatsapp"></i>
                        Order Now
                    </a>
                @endif

                <button class="menu-btn"
                        id="menuBtn"
                        aria-label="Open Menu"
                        aria-expanded="false">
                    <i class="bi bi-list"></i>
                </button>
            </div>

        </div>
    </header>

  <main>
    <section class="hero" id="home">
      <div class="hero-bg-glow"></div>
      <div class="container hero-grid">
        <div class="hero-content">
          <span class="eyebrow reveal"><i class="bi bi-stars"></i> Luxury Fragrances, Made Accessible</span>
          <h1 class="reveal">Discover Rare & Authentic Fragrances</h1>
          <p class="hero-text reveal">Experience premium attars and perfumes crafted with elegance, depth and long-lasting aroma. Explore luxury fragrance blends inspired by oud, rose, musk, citrus and timeless oriental notes.</p>
          <div class="hero-actions reveal">
            <a href="#products" class="btn btn-dark"><i class="bi bi-bag-heart"></i> Explore Collection</a>
@if(!empty($setting->whatsapp_number))
    <a href="https://wa.me/{{ $setting->whatsapp_number }}"
       class="btn btn-light"
       target="_blank">
        <i class="bi bi-whatsapp"></i>
        Order on WhatsApp
    </a>
@else
    <a href="https://wa.me/918591114751"
       class="btn btn-light"
       target="_blank">
        <i class="bi bi-whatsapp"></i>
        Order on WhatsApp
    </a>
@endif          </div>
          <div class="hero-stats reveal">
            <div><strong>20+</strong><span>Years Experience</span></div>
            <div><strong>COD</strong><span>Available in India</span></div>
            <div><strong>100%</strong><span>Premium Selection</span></div>
          </div>
        </div>

       <div class="hero-visual reveal">
  <div class="gold-orb">
    <img src="assets/img/hero.png"
         alt="The Real Fragrance World Perfume"
         class="hero-perfume-img">
  </div>

  <div class="float-card float-card-one">
    <i class="bi bi-flower1"></i>
    <div>
      <small>Signature Notes</small>
      <strong>Oud • Rose • Musk</strong>
    </div>
  </div>

  <div class="float-card float-card-two">
    <i class="bi bi-gem"></i>
    <div>
      <small>Premium Feel</small>
      <strong>Elegant Packaging</strong>
    </div>
  </div>
</div>
      </div>
    </section>

    <div class="marquee">
      <div class="marquee-track">
        <span><i class="bi bi-stars"></i> Premium Attars</span><span><i class="bi bi-stars"></i> Luxury Perfumes</span><span><i class="bi bi-stars"></i> Discovery Sets</span><span><i class="bi bi-stars"></i> Wholesale Orders</span><span><i class="bi bi-stars"></i> International Enquiries</span>
        <span><i class="bi bi-stars"></i> Premium Attars</span><span><i class="bi bi-stars"></i> Luxury Perfumes</span><span><i class="bi bi-stars"></i> Discovery Sets</span><span><i class="bi bi-stars"></i> Wholesale Orders</span><span><i class="bi bi-stars"></i> International Enquiries</span>
      </div>
    </div>

    <section class="section products" id="products">
      <div class="container">
        <div class="section-head reveal">
          <span class="eyebrow"><i class="bi bi-bag-heart"></i> Signature Collection</span>
          <h2>Our Premium Fragrance Collection</h2>
          <p>Beautiful product cards for attars, perfumes and discovery sets with direct WhatsApp order conversion.</p>
        </div>
        <div class="product-grid">

   @forelse($products as $product)
    <article class="product-card reveal">

        <div class="product-img">
            <span class="product-tag">
                {{ $product->category ?? 'Product' }}
            </span>

            @if($product->thumb_url)
                <img src="{{ $product->thumb_url }}"
                     alt="{{ $product->name }}"
                     class="product-media-img">
            @else
                <div class="mini-bottle"></div>
            @endif

            @if($product->video_url)
                <button type="button"
                        class="product-video-play open-product-video"
                        data-video-url="{{ $product->video_url }}"
                        data-product-name="{{ $product->name }}">
                    <i class="bi bi-play-fill"></i>
                </button>
            @endif
        </div>

        <div class="product-body">
            <h3>{{ $product->name }}</h3>

            @if($product->size)
                <p><strong>{{ $product->size }}</strong></p>
            @endif

            @if($product->short_description)
                <p>{{ $product->short_description }}</p>
            @endif

            <div class="price-row">
                @if($product->old_price)
                    <del>₹{{ number_format($product->old_price, 0) }}</del>
                @endif

                @if($product->sale_price)
                    <strong>₹{{ number_format($product->sale_price, 0) }}</strong>
                @endif
            </div>

            <button type="button"
                    class="btn btn-dark open-order-form"
                    data-product-name="{{ $product->name }}"
                    data-product-size="{{ $product->size }}"
                    data-product-price="{{ $product->sale_price }}"
                    data-whatsapp-number="918591114751">
                <i class="bi bi-whatsapp"></i>
                Order on WhatsApp
            </button>
        </div>

    </article>
@empty
    <div class="text-center">
        <p>No products available right now.</p>
    </div>
@endforelse

<!-- PRODUCT VIDEO MODAL START -->
<div class="product-video-modal-overlay" id="productVideoModal">
    <div class="product-video-modal-box">

        <button type="button" class="product-video-close" id="productVideoClose">
            <i class="bi bi-x-lg"></i>
        </button>

        <div class="product-video-modal-head">
            <span>
                <i class="bi bi-play-circle"></i>
                Product Video
            </span>

            <h3 id="productVideoTitle">Product Video</h3>
        </div>

        <div class="product-video-modal-frame">
            <video id="productVideoPlayer" controls playsinline>
                <source src="" type="video/mp4">
            </video>
        </div>

    </div>
</div>
<!-- PRODUCT VIDEO MODAL END -->

<style>
  .product-img {
    position: relative;
}

.product-video-play {
    position: absolute;
    right: 16px;
    bottom: 16px;
    width: 54px;
    height: 54px;
    border: 0;
    border-radius: 50%;
    background: linear-gradient(135deg, #11100d, #2b1b0c, #b88718);
    color: #ffffff;
    display: grid;
    place-items: center;
    font-size: 26px;
    cursor: pointer;
    z-index: 5;
    box-shadow: 0 16px 40px rgba(43, 27, 12, 0.28);
    transition: all 0.35s ease;
}

.product-video-play::before {
    content: "";
    position: absolute;
    inset: -8px;
    border-radius: 50%;
    border: 1px solid rgba(184, 135, 24, 0.35);
    animation: videoPulse 1.8s ease-in-out infinite;
}

.product-video-play:hover {
    transform: scale(1.08);
}

.product-video-play i {
    margin-left: 3px;
}

@keyframes videoPulse {
    0% {
        opacity: 0.8;
        transform: scale(0.9);
    }

    100% {
        opacity: 0;
        transform: scale(1.35);
    }
}

.product-video-modal-overlay {
    position: fixed;
    inset: 0;
    z-index: 99999;
    background: rgba(17, 16, 13, 0.72);
    backdrop-filter: blur(18px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 18px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.35s ease;
}

.product-video-modal-overlay.active {
    opacity: 1;
    visibility: visible;
}

.product-video-modal-box {
    width: min(860px, 100%);
    background:
        radial-gradient(circle at top right, rgba(217, 180, 92, 0.22), transparent 35%),
        #fffaf0;
    border: 1px solid rgba(184, 135, 24, 0.25);
    border-radius: 34px;
    padding: 24px;
    position: relative;
    box-shadow: 0 40px 120px rgba(0, 0, 0, 0.38);
    transform: translateY(28px) scale(0.96);
    transition: all 0.35s ease;
}

.product-video-modal-overlay.active .product-video-modal-box {
    transform: translateY(0) scale(1);
}

.product-video-close {
    position: absolute;
    top: 18px;
    right: 18px;
    width: 44px;
    height: 44px;
    border: 0;
    border-radius: 50%;
    background: #ffffff;
    color: #2b1b0c;
    cursor: pointer;
    z-index: 3;
    box-shadow: 0 12px 32px rgba(43, 27, 12, 0.14);
}

.product-video-modal-head {
    padding-right: 52px;
    margin-bottom: 18px;
}

.product-video-modal-head span {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 7px 13px;
    border-radius: 999px;
    background: rgba(184, 135, 24, 0.12);
    color: #6f4d05;
    font-size: 11px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.08em;
}

.product-video-modal-head h3 {
    font-family: "Cormorant Garamond", serif;
    font-size: 38px;
    line-height: 1;
    color: #2b1b0c;
    margin-top: 14px;
}

.product-video-modal-frame {
    width: 100%;
    aspect-ratio: 16 / 9;
    border-radius: 26px;
    overflow: hidden;
    background: #11100d;
}

.product-video-modal-frame video {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
    background: #11100d;
}

@media (max-width: 575px) {
    .product-video-play {
        width: 48px;
        height: 48px;
        font-size: 22px;
        right: 12px;
        bottom: 12px;
    }

    .product-video-modal-box {
        padding: 18px;
        border-radius: 26px;
    }

    .product-video-modal-head h3 {
        font-size: 30px;
    }

    .product-video-modal-frame {
        border-radius: 20px;
    }
}
</style>
<script>
  const productVideoModal = document.getElementById("productVideoModal");
const productVideoClose = document.getElementById("productVideoClose");
const productVideoPlayer = document.getElementById("productVideoPlayer");
const productVideoTitle = document.getElementById("productVideoTitle");

document.querySelectorAll(".open-product-video").forEach((button) => {
    button.addEventListener("click", function () {
        const videoUrl = this.dataset.videoUrl;
        const productName = this.dataset.productName || "Product Video";

        if (!videoUrl) return;

        productVideoTitle.textContent = productName;
        productVideoPlayer.querySelector("source").src = videoUrl;
        productVideoPlayer.load();

        productVideoModal.classList.add("active");
        document.body.style.overflow = "hidden";
    });
});

function closeProductVideoModal() {
    productVideoModal.classList.remove("active");
    document.body.style.overflow = "";

    productVideoPlayer.pause();
    productVideoPlayer.currentTime = 0;
    productVideoPlayer.querySelector("source").src = "";
    productVideoPlayer.load();
}

if (productVideoClose) {
    productVideoClose.addEventListener("click", closeProductVideoModal);
}

if (productVideoModal) {
    productVideoModal.addEventListener("click", function (event) {
        if (event.target === productVideoModal) {
            closeProductVideoModal();
        }
    });
}
</script>
</div>
      </div>
    </section>

    
<!-- PRODUCT ORDER MODAL START -->
<div class="order-modal-overlay" id="orderModalOverlay">
    <div class="order-modal">

        <button type="button" class="order-modal-close" id="orderModalClose">
            <i class="bi bi-x-lg"></i>
        </button>

        <div class="order-modal-head">
            <span>
                <i class="bi bi-whatsapp"></i>
                WhatsApp Order
            </span>

            <h3>Complete Your Order Details</h3>

            <p>
                Fill your delivery details. After submit, your order details will open on WhatsApp.
            </p>
        </div>

        <form id="whatsappOrderForm" class="order-form">

            <input type="hidden" id="orderWhatsappNumber" value="918591114751">

            <div class="form-group">
                <label>Product Name</label>
                <input type="text" id="orderProductName" readonly>
            </div>

            <div class="form-group">
                <label>Size</label>
                <input type="text" id="orderProductSize" readonly>
            </div>

            <div class="form-group">
                <label>Your Name *</label>
                <input type="text" id="customerName" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label>Full Address *</label>
                <textarea id="customerAddress" rows="3" placeholder="Enter full address" required></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Road</label>
                    <input type="text" id="customerRoad" placeholder="Road / Street">
                </div>

                <div class="form-group">
                    <label>Landmark</label>
                    <input type="text" id="customerLandmark" placeholder="Nearby landmark">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Pincode *</label>
                    <input type="text" id="customerPincode" placeholder="Pincode" required>
                </div>

                <div class="form-group">
                    <label>City *</label>
                    <input type="text" id="customerCity" placeholder="City" required>
                </div>
            </div>

            <div class="form-group">
                <label>Contact Number *</label>
                <input type="tel" id="customerPhone" placeholder="Enter contact number" required>
            </div>

            <button type="submit" class="btn btn-primary order-submit-btn">
                <i class="bi bi-whatsapp"></i>
                Submit & Send to WhatsApp
            </button>

        </form>
    </div>
</div>
<!-- PRODUCT ORDER MODAL END -->





    <section class="section categories" id="categories">
      <div class="container">
        <div class="section-head reveal"><span class="eyebrow"><i class="bi bi-grid"></i> Shop by Category</span><h2>Choose Your Fragrance Mood</h2></div>
        <div class="category-grid">
          <div class="category-card reveal"><i class="bi bi-droplet-half"></i><h3>Attars</h3><p>Oil based rich fragrances.</p></div>
          <div class="category-card reveal"><i class="bi bi-gem"></i><h3>Perfumes</h3><p>Luxury spray collection.</p></div>
          <div class="category-card reveal"><i class="bi bi-tree"></i><h3>Oud</h3><p>Deep woody fragrance.</p></div>
          <div class="category-card reveal"><i class="bi bi-flower1"></i><h3>Floral</h3><p>Rose and soft notes.</p></div>
          <div class="category-card reveal"><i class="bi bi-box2-heart"></i><h3>Sets</h3><p>Discovery vial sets.</p></div>
          <div class="category-card reveal"><i class="bi bi-globe2"></i><h3>Wholesale</h3><p>Bulk order enquiries.</p></div>
        </div>
      </div>
    </section>

    <section class="section about" id="about">
      <div class="container about-grid">
        <div class="about-visual reveal">
    <div class="about-card">
        <img src="assets/img/about-fragrance.png"
             alt="Luxury Fragrance Journey"
             class="about-card-img">

        <div class="about-card-content">
            <h3>A Luxury Fragrance Journey</h3>
            <p>Built on experience, authenticity and a passion for rare aromas.</p>
        </div>
    </div>

    <div class="experience-badge">
        <strong>20+</strong>
        <span>Years<br>Experience</span>
    </div>
</div>
        <div class="about-content reveal">
            <span class="eyebrow">
                <i class="bi bi-award"></i> Brand Story</span>
                <h2>Fragrance Craft Inspired by Elegance</h2>
                <p>The Real Fragrance World brings rare, authentic and premium fragrances closer to fragrance lovers. The landing page highlights trust, premium presentation, WhatsApp ordering and wholesale enquiry conversion.</p>
                <div class="about-points">
                    <div>
                        <i class="bi bi-check-circle-fill"></i> Authentic fragrance selection</div>
                        <div><i class="bi bi-check-circle-fill"></i> Premium attars & perfumes</div>
                        <div><i class="bi bi-check-circle-fill"></i> COD and WhatsApp ordering</div>
                        <div><i class="bi bi-check-circle-fill"></i> Wholesale enquiries available</div>
                    </div>
                    <a href="https://wa.me/918591114751" class="btn btn-dark">
                        <i class="bi bi-whatsapp"></i> Connect on WhatsApp</a>
                </div>
      </div>
    </section>

    <section class="section why" id="why">
      <div class="container">
        <div class="section-head reveal"><span class="eyebrow"><i class="bi bi-shield-check"></i> Why Choose Us</span><h2>Premium Trust Points</h2></div>
        <div class="why-grid">
          <div class="why-card reveal"><i class="bi bi-patch-check"></i><h3>Authentic Fragrances</h3><p>Carefully selected premium oils and blends with rich fragrance profiles.</p></div>
          <div class="why-card reveal"><i class="bi bi-clock-history"></i><h3>Long Lasting Aroma</h3><p>Deep, elegant and memorable fragrance experience for daily and special use.</p></div>
          <div class="why-card reveal"><i class="bi bi-cash-coin"></i><h3>COD Available</h3><p>Easy ordering support with WhatsApp-based quick purchase flow.</p></div>
          <div class="why-card reveal"><i class="bi bi-box-seam"></i><h3>Premium Packaging</h3><p>Elegant presentation ideal for gifting and personal fragrance collections.</p></div>
          <div class="why-card reveal"><i class="bi bi-people"></i><h3>Wholesale Orders</h3><p>Bulk order support for resellers, distributors and fragrance businesses.</p></div>
          <div class="why-card reveal"><i class="bi bi-globe2"></i><h3>International Enquiry</h3><p>Dedicated WhatsApp assistance for international fragrance orders.</p></div>
        </div>
      </div>
    </section>

   

  

    <section class="section reviews">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">
                <i class="bi bi-chat-heart"></i>
                Reviews
            </span>
            <h2>What Customers Say</h2>
        </div>

        <div class="review-grid">
            @forelse($testimonials as $testimonial)
                <div class="review-card reveal">
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            {{ $i <= $testimonial->rating ? '★' : '☆' }}
                        @endfor
                    </div>

                    <p>{{ $testimonial->review_text }}</p>

                    <strong>{{ $testimonial->customer_name }}</strong>

                    <span>{{ $testimonial->product_name }}</span>
                </div>
            @empty
                <div class="review-card reveal">
                    <div class="stars">★★★★★</div>
                    <p>No reviews available right now.</p>
                    <strong>The Real Fragrance World</strong>
                    <span>Customer Reviews</span>
                </div>
            @endforelse
        </div>
    </div>
</section>

   <section class="section faq-contact" id="contact">
    <div class="container faq-contact-grid">

        <div class="faq-wrap reveal">
            <span class="eyebrow">
                <i class="bi bi-question-circle"></i>
                FAQ
            </span>

            <h2>Quick Questions</h2>

            <div class="faq-list">

                <div class="faq-item active">
                    <button class="faq-q">
                        Do you provide COD?
                        <i class="bi bi-chevron-down"></i>
                    </button>

                    <div class="faq-a">
                        <p>Yes, COD availability can be confirmed on WhatsApp before placing your order.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-q">
                        How can I place an order?
                        <i class="bi bi-chevron-down"></i>
                    </button>

                    <div class="faq-a">
                        <p>Click any WhatsApp order button and send the product name to confirm price, delivery and stock.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-q">
                        Are wholesale orders available?
                        <i class="bi bi-chevron-down"></i>
                    </button>

                    <div class="faq-a">
                        <p>Yes, wholesale and reseller enquiries can be handled directly on WhatsApp.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-q">
                        Do you ship internationally?
                        <i class="bi bi-chevron-down"></i>
                    </button>

                    <div class="faq-a">
                        <p>International order enquiries are supported through WhatsApp discussion.</p>
                    </div>
                </div>

            </div>
        </div>

        <aside class="contact-card reveal">
            <h3>Contact & Order</h3>

            <p>
                Connect for product orders, wholesale enquiries and international fragrance support.
            </p>

            <div class="contact-list">

                @if(!empty($setting->whatsapp_number))
                    <a href="https://wa.me/{{ $setting->whatsapp_number }}" target="_blank">
                        <i class="bi bi-whatsapp"></i>
                        <span>
                            <small>WhatsApp</small>
                            <strong>{{ $setting->primary_phone ?? $setting->whatsapp_number }}</strong>
                        </span>
                    </a>
                @endif

                @if(!empty($setting->primary_phone))
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $setting->primary_phone) }}">
                        <i class="bi bi-telephone"></i>
                        <span>
                            <small>Call</small>
                            <strong>{{ $setting->primary_phone }}</strong>
                        </span>
                    </a>
                @endif

                @if(!empty($setting->email_address))
                    <a href="mailto:{{ $setting->email_address }}">
                        <i class="bi bi-envelope"></i>
                        <span>
                            <small>Email</small>
                            <strong>{{ $setting->email_address }}</strong>
                        </span>
                    </a>
                @endif

                @if(!empty($setting->office_address) || !empty($setting->store_address))
                    <div>
                        <i class="bi bi-geo-alt"></i>
                        <span>
                            <small>Office / Store</small>
                            <strong>
                                @if(!empty($setting->office_address))
                                    {{ $setting->office_address }}
                                @endif

                                @if(!empty($setting->office_address) && !empty($setting->store_address))
                                    <br>
                                @endif

                                @if(!empty($setting->store_address))
                                    {{ $setting->store_address }}
                                @endif
                            </strong>
                        </span>
                    </div>
                @endif

                @if(!empty($setting->business_hours))
                    <div>
                        <i class="bi bi-clock"></i>
                        <span>
                            <small>Business Hours</small>
                            <strong>{{ $setting->business_hours }}</strong>
                        </span>
                    </div>
                @endif

            </div>

            @if(!empty($setting->whatsapp_number))
                <a href="https://wa.me/{{ $setting->whatsapp_number }}"
                   class="btn btn-dark"
                   target="_blank">
                    <i class="bi bi-whatsapp"></i>
                    Order on WhatsApp
                </a>
            @endif
        </aside>

    </div>
</section>

<style>
    .map-frame {
    width: 100%;
    height: 360px;
    border-radius: 28px;
    overflow: hidden;
    box-shadow: 0 24px 70px rgba(43, 27, 12, 0.10);
}

.map-frame iframe {
    width: 100%;
    height: 100%;
    border: 0;
}
</style>
  </main>

 <footer class="footer">
    <div class="container">
        <div class="footer-grid">

            <div>
                @if(!empty($setting) && $setting->footer_logo_url)
                    <img src="{{ $setting->footer_logo_url }}"
                         alt="{{ $setting->website_name ?? 'The Real Fragrance World' }}"
                         class="footer-logo">
                @elseif(!empty($setting) && $setting->logo_url)
                    <img src="{{ $setting->logo_url }}"
                         alt="{{ $setting->website_name ?? 'The Real Fragrance World' }}"
                         class="footer-logo">
                @else
                    <img src="{{ asset('assets/img/logo.webp') }}"
                         alt="{{ $setting->website_name ?? 'The Real Fragrance World' }}"
                         class="footer-logo">
                @endif

                <p>
                    {{ $setting->website_tagline ?? 'Premium attars, luxury perfumes and discovery sets with elegant WhatsApp-first ordering experience.' }}
                </p>
            </div>

            <div>
                <h3>Links</h3>
                <a href="#home">Home</a>
                <a href="#products">Products</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
            </div>

            <div>
                <h3>Categories</h3>
                <a href="#products">Attars</a>
                <a href="#products">Perfumes</a>
                <a href="#products">Oud Collection</a>
                <a href="#products">Discovery Sets</a>
            </div>

            <div>
                <h3>Order</h3>

                <p>
                    @if(!empty($setting->primary_phone))
                        Phone: {{ $setting->primary_phone }}<br>
                    @endif

                    @if(!empty($setting->whatsapp_number))
                        WhatsApp: {{ $setting->primary_phone ?? $setting->whatsapp_number }}<br>
                    @endif

                    @if(!empty($setting->email_address))
                        Email: {{ $setting->email_address }}
                    @endif
                </p>

                <div class="footer-social">
                    @if(!empty($setting->facebook_url))
                        <a href="{{ $setting->facebook_url }}" target="_blank" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                    @endif

                    @if(!empty($setting->instagram_url))
                        <a href="{{ $setting->instagram_url }}" target="_blank" aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                    @endif

                    @if(!empty($setting->youtube_url))
                        <a href="{{ $setting->youtube_url }}" target="_blank" aria-label="YouTube">
                            <i class="bi bi-youtube"></i>
                        </a>
                    @endif
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <span>
                {{ $setting->copyright_text ?? '© 2025 The Real Fragrance World. All Rights Reserved.' }}
            </span>

            <span>
                {{ $setting->developer_credit ?? 'Premium Landing Page Design' }}
            </span>
        </div>
    </div>
</footer>

@if(!empty($setting->whatsapp_number))
    <a class="whatsapp-float"
       href="https://wa.me/{{ $setting->whatsapp_number }}"
       aria-label="WhatsApp"
       target="_blank">
        <i class="bi bi-whatsapp"></i>
    </a>
@endif

<div class="mobile-bottom-bar">
    @if(!empty($setting->whatsapp_number))
        <a href="https://wa.me/{{ $setting->whatsapp_number }}" target="_blank">
            <i class="bi bi-whatsapp"></i>
            WhatsApp
        </a>
    @endif

    @if(!empty($setting->primary_phone))
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $setting->primary_phone) }}">
            <i class="bi bi-telephone"></i>
            Contact
        </a>
    @endif
</div>

<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>

<style>
    .footer-social {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 14px;
}

.footer-social a {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    background: rgba(184, 135, 24, 0.14);
    color: #d9b45c;
    transition: all 0.3s ease;
}

.footer-social a:hover {
    background: #b88718;
    color: #ffffff;
    transform: translateY(-3px);
}
</style>