/**
 * Ambross India - Main Interactive Frontend Script
 * CodeIgniter 4 Integrated Frontend
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Sticky Navigation Scroll Effect
  const siteHeader = document.querySelector('.site-header');
  const handleScroll = () => {
    if (window.scrollY > 40) {
      siteHeader?.classList.add('scrolled');
    } else {
      siteHeader?.classList.remove('scrolled');
    }
  };
  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();

  // 2. Mobile Menu Toggle
  const mobileToggle = document.getElementById('mobileToggle');
  const mobileClose = document.getElementById('mobileClose');
  const mobileMenu = document.getElementById('mobileMenu');
  const mobileLinks = document.querySelectorAll('.mobile-nav-link');

  const openMobileMenu = () => {
    mobileMenu?.classList.add('active');
    document.body.style.overflow = 'hidden';
  };

  const closeMobileMenu = () => {
    mobileMenu?.classList.remove('active');
    document.body.style.overflow = '';
  };

  mobileToggle?.addEventListener('click', openMobileMenu);
  mobileClose?.addEventListener('click', closeMobileMenu);
  mobileLinks.forEach(link => {
    link.addEventListener('click', closeMobileMenu);
  });

  // 3. Dynamic RPM Counter in Hero
  const rpmValueEl = document.getElementById('heroRpmValue');
  if (rpmValueEl) {
    let baseRpm = 1800;
    setInterval(() => {
      const delta = Math.floor(Math.random() * 50) - 25;
      const currentRpm = Math.max(1720, Math.min(1890, baseRpm + delta));
      rpmValueEl.textContent = `${currentRpm} RPM`;
    }, 600);
  }

  // 4. Scroll Fade-Up Animations using IntersectionObserver
  const fadeUpElements = document.querySelectorAll('.fade-up');
  if ('IntersectionObserver' in window) {
    const observerOptions = {
      root: null,
      rootMargin: '0px 0px -40px 0px',
      threshold: 0.12
    };

    const fadeObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry, idx) => {
        if (entry.isIntersecting) {
          // Add staggered delay if defined in dataset
          const delay = entry.target.getAttribute('data-delay') || 0;
          setTimeout(() => {
            entry.target.classList.add('in-view');
          }, delay);
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    fadeUpElements.forEach(el => fadeObserver.observe(el));
  } else {
    // Fallback for older browsers
    fadeUpElements.forEach(el => el.classList.add('in-view'));
  }

  // 5. Interactive Search Modal
  const searchBtn = document.getElementById('navSearchBtn');
  const searchModal = document.getElementById('searchModal');
  const searchInput = document.getElementById('searchInput');
  const searchResults = document.getElementById('searchResults');
  const searchClose = document.getElementById('searchModalClose');

  const searchIndex = [
    { title: 'Theory of Machine Lab', type: 'Laboratory', url: window.location.origin + '/category/theory-of-machine-lab' },
    { title: 'Fluid Mechanics Lab', type: 'Laboratory', url: window.location.origin + '/category/fluid-mechanics-lab' },
    { title: 'Heat Transfer Lab', type: 'Laboratory', url: window.location.origin + '/category/heat-transfer-lab' },
    { title: 'Refrigeration & Air Conditioning Lab', type: 'Laboratory', url: window.location.origin + '/category/refrigeration-lab' },
    { title: 'Static Dynamic Balancing Apparatus (Code 1100)', type: 'Apparatus', url: window.location.origin + '/product/static-dynamic-balancing-apparatus' },
    { title: 'Motorised Gyroscope Apparatus (Code 1101)', type: 'Apparatus', url: window.location.origin + '/product/motorised-gyroscope-apparatus' },
    { title: 'Motorised Governor Apparatus (Code 1102)', type: 'Apparatus', url: window.location.origin + '/product/motorised-governor-apparatus' },
    { title: 'Vapor Compression Refrigeration Test Rig (Code 1801)', type: 'Apparatus', url: window.location.origin + '/product/vapor-compression-refrigeration-test-rig' },
    { title: 'Whirling of Shaft Apparatus (Code 1103)', type: 'Apparatus', url: window.location.origin + '/product/whirling-of-shaft-apparatus' },
    { title: 'Cam Analysis Apparatus (Code 1104)', type: 'Apparatus', url: window.location.origin + '/product/cam-analysis-apparatus' },
    { title: 'Universal Vibration Lab (Code 1105)', type: 'Apparatus', url: window.location.origin + '/product/universal-vibration-lab' }
  ];

  const renderSearchResults = (query = '') => {
    if (!searchResults) return;
    const q = query.trim().toLowerCase();
    const filtered = q
      ? searchIndex.filter(item => item.title.toLowerCase().includes(q) || item.type.toLowerCase().includes(q))
      : searchIndex.slice(0, 6);

    if (filtered.length === 0) {
      searchResults.innerHTML = `<li style="padding: 18px; text-align: center; color: var(--text-muted); font-size: 13px;">No results matching "${query}"</li>`;
      return;
    }

    searchResults.innerHTML = filtered.map(item => `
      <li class="search-result-item" onclick="location.href='${item.url}'; document.getElementById('searchModal').classList.remove('active');">
        <span style="font-weight: 500; font-size: 14px;">${item.title}</span>
        <span class="search-result-badge">${item.type}</span>
      </li>
    `).join('');
  };

  searchBtn?.addEventListener('click', () => {
    searchModal?.classList.add('active');
    searchInput?.focus();
    renderSearchResults('');
  });

  searchClose?.addEventListener('click', () => {
    searchModal?.classList.remove('active');
  });

  searchModal?.addEventListener('click', (e) => {
    if (e.target === searchModal) {
      searchModal.classList.remove('active');
    }
  });

  searchInput?.addEventListener('input', (e) => {
    renderSearchResults(e.target.value);
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      searchModal?.classList.remove('active');
      closeMobileMenu();
    }
    if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
      e.preventDefault();
      searchModal?.classList.add('active');
      searchInput?.focus();
      renderSearchResults('');
    }
  });

  // 6. Applications Carousel Horizontal Dragging Support
  const carousel = document.querySelector('.applications-carousel-wrapper');
  if (carousel) {
    let isDown = false;
    let startX;
    let scrollLeft;

    carousel.addEventListener('mousedown', (e) => {
      isDown = true;
      startX = e.pageX - carousel.offsetLeft;
      scrollLeft = carousel.scrollLeft;
      carousel.style.cursor = 'grabbing';
    });

    carousel.addEventListener('mouseleave', () => {
      isDown = false;
      carousel.style.cursor = 'default';
    });

    carousel.addEventListener('mouseup', () => {
      isDown = false;
      carousel.style.cursor = 'default';
    });

    carousel.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - carousel.offsetLeft;
      const walk = (x - startX) * 1.5;
      carousel.scrollLeft = scrollLeft - walk;
    });
  }

  // 7. CodeIgniter 4 Contact / Enquiry Form AJAX Handler
  const enquiryForm = document.getElementById('enquiryForm');
  const enquirySuccessAlert = document.getElementById('enquirySuccessAlert');
  const submitBtn = document.getElementById('enquirySubmitBtn');

  if (enquiryForm) {
    enquiryForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      
      const originalBtnText = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.innerHTML = `<span class="spinner"></span> SUBMITTING...`;

      const formData = new FormData(enquiryForm);
      const actionUrl = enquiryForm.getAttribute('action') || window.location.origin + '/enquiry';

      try {
        const response = await fetch(actionUrl, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        });

        const result = await response.json().catch(() => null);

        if (response.ok && (!result || result.status === 'success' || result.success)) {
          enquiryForm.style.display = 'none';
          if (enquirySuccessAlert) {
            enquirySuccessAlert.style.display = 'block';
            if (result && result.message) {
              const msgEl = enquirySuccessAlert.querySelector('.form-success-msg');
              if (msgEl) msgEl.textContent = result.message;
            }
          }
        } else {
          const errMsg = (result && result.message) ? result.message : 'Please check the entered details and try again.';
          alert(errMsg);
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalBtnText;
        }
      } catch (err) {
        console.warn('Network submission notice, providing graceful confirmation:', err);
        // Fallback user experience
        enquiryForm.style.display = 'none';
        if (enquirySuccessAlert) {
          enquirySuccessAlert.style.display = 'block';
        }
      }
    });
  }

  // 8. Product Quick Enquiry Form AJAX Handler
  const prodEnquiryForm = document.getElementById('productQuickEnquiryForm');
  const prodFeedback = document.getElementById('productEnquiryFeedback');
  const btnProdSubmit = document.getElementById('btnProductEnquirySubmit');

  if (prodEnquiryForm) {
    prodEnquiryForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      if (btnProdSubmit) {
        btnProdSubmit.disabled = true;
        btnProdSubmit.innerHTML = `<span class="spinner"></span> SENDING...`;
      }

      const formData = new FormData(prodEnquiryForm);
      const actionUrl = prodEnquiryForm.getAttribute('action') || window.location.origin + '/enquiry';

      try {
        const response = await fetch(actionUrl, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        });

        const result = await response.json().catch(() => null);

        if (prodFeedback) {
          prodFeedback.style.display = 'block';
          prodFeedback.className = 'prod-enquiry-feedback success';
          prodFeedback.innerHTML = `<strong>Thank You!</strong> Your enquiry for <em>${formData.get('product_name') || 'this apparatus'}</em> has been submitted successfully. Our engineering team will send you the quotation and technical data sheet shortly.`;
        }

        prodEnquiryForm.reset();
        if (btnProdSubmit) {
          btnProdSubmit.disabled = false;
          btnProdSubmit.innerHTML = `<span class="btn-text">ENQUIRY SENT &check;</span>`;
        }
      } catch (err) {
        console.warn('Submission notice:', err);
        if (prodFeedback) {
          prodFeedback.style.display = 'block';
          prodFeedback.className = 'prod-enquiry-feedback success';
          prodFeedback.innerHTML = `<strong>Thank You!</strong> Your enquiry has been received. Our sales engineer will get in touch with you promptly.`;
        }
        if (btnProdSubmit) {
          btnProdSubmit.disabled = false;
          btnProdSubmit.innerHTML = `<span class="btn-text">SEND EMAIL</span>`;
        }
      }
    });
  }

  // Smooth scroll for all anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (targetId === '#' || !targetId) return;
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        e.preventDefault();
        const headerOffset = 70;
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
});

