function addToCart(productId) {
    fetch(BASE_URL + 'cart/add/' + productId, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest' // Pour que PHP détecte l'AJAX
            }
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success && data.redirect) {
                window.location.href = data.redirect;
            }
            else if (data.success) {
                const msg = document.getElementById('cart-message');
                if (msg) {
                    msg.style.display = 'inline';
                    setTimeout(() => msg.style.display = 'none', 10000);
                }
                location.reload();
            }
        })
        .catch(error => console.error('Error:', error));
}