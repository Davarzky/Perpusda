document.addEventListener("DOMContentLoaded", function() {
    var toggleHeaderBtn = document.querySelector(".toggle-header-btn");
    var menuBar = document.getElementById("menuBar");
  
    toggleHeaderBtn.onclick = function() {
      menuBar.classList.toggle("d-none"); 
    };
  });
  document.addEventListener('DOMContentLoaded', function() {
    const maxVisibleBooks = {
        favorites: 6,
        new: 3
    };

    const favoriteBooks = document.querySelectorAll('#favorite-books .book-item');
    const newBooks = document.querySelectorAll('#new-books .book-item');

    function updateVisibility() {
        const seeMoreFavoritesBtn = document.getElementById('see-more-favorites');
        const seeMoreNewBtn = document.getElementById('see-more-new');

        if (favoriteBooks.length > maxVisibleBooks.favorites) {
            favoriteBooks.forEach((book, index) => {
                book.style.display = index < maxVisibleBooks.favorites ? 'block' : 'none';
            });
            seeMoreFavoritesBtn.style.display = 'block';
        } else {
            favoriteBooks.forEach(book => book.style.display = 'block');
            seeMoreFavoritesBtn.style.display = 'none';
        }

        if (newBooks.length > maxVisibleBooks.new) {
            newBooks.forEach((book, index) => {
                book.style.display = index < maxVisibleBooks.new ? 'block' : 'none';
            });
            seeMoreNewBtn.style.display = 'block';
        } else {
            newBooks.forEach(book => book.style.display = 'block');
            seeMoreNewBtn.style.display = 'none';
        }
    }

    updateVisibility();

    document.getElementById('see-more-favorites').addEventListener('click', function() {
        favoriteBooks.forEach(book => book.style.display = 'block');
        this.style.display = 'none';
    });

    document.getElementById('see-more-new').addEventListener('click', function() {
        newBooks.forEach(book => book.style.display = 'block');
        this.style.display = 'none';
    });
});
