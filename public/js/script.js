// DENNIS Web Application - Client-side JavaScript

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DENNIS Web Application Loaded');
    
    // Add smooth scrolling
    addSmoothScrolling();
    
    // Add form validation
    addFormValidation();
});

/**
 * Add smooth scrolling to anchor links
 */
function addSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            const target = document.querySelector(href);
            
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
}

/**
 * Add client-side form validation
 */
function addFormValidation() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.style.borderColor = '#e74c3c';
                } else {
                    input.style.borderColor = '#bdc3c7';
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                console.warn('Form validation failed');
            }
        });
    });
}

/**
 * Utility function to fetch data
 */
async function fetchData(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return await response.json();
    } catch (error) {
        console.error('Fetch error:', error);
    }
}
