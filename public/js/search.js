document.addEventListener("DOMContentLoaded", function() {
    const allSearchInputs = document.querySelectorAll('.searchInput');

    allSearchInputs.forEach(input => {
        input.addEventListener('input', function() {
            let query = this.value.trim();
            const dropdown = this.parentElement.querySelector('.search_results_dropdown')

            if (query.length > 1) {
                fetch('index.php?action=item_search', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'query=' + encodeURIComponent(query)
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() !== "") {
                        dropdown.innerHTML = data;
                        dropdown.style.display = 'block';
                    } else {
                        dropdown.style.display = 'none';
                    }
                })
                .catch(err => console.error("Erreur recherche:", err));
            } else {
                dropdown.style.display = 'none';
            }
        });
    });

    document.addEventListener('click', function(e) {
        if (!e.target.classList.contains('searchInput')) {
            document.querySelectorAll('.search_results_dropdown').forEach(dropdown => {
                dropdown.style.display = 'none';
            });
        }
    });
});