
    document.querySelectorAll('.see-more').forEach(function (link) {
        link.addEventListener('click', function () {
            var descriptionContainer = this.closest('.description-container');
            var shortDescription = descriptionContainer.querySelector('.description-short');
            var fullDescription = descriptionContainer.querySelector('.description-full');

            // Toggle visibility
            if (fullDescription.style.display === 'none') {
                fullDescription.style.display = 'inline';
                shortDescription.style.display = 'none';
                this.textContent = 'See Less';  // Change link text to "See Less"
            } else {
                fullDescription.style.display = 'none';
                shortDescription.style.display = 'inline';
                this.textContent = 'See More';  // Change link text to "See More"
            }
        });
    });


