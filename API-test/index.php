<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination with Search</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Styling untuk pagination seperti yang diberikan */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            gap: 0.25rem;
            padding: 1rem 0;
        }

        .pagination a {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            background-color: #1a1a1a;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .pagination a:hover {
            background-color: #333;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
        }

        .pagination a.disabled {
            background-color: #333;
            color: #777;
            pointer-events: none;
        }

        /* Styling untuk input search */
        .search-bar {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .search-bar input,
        .search-bar select {
            padding: 0.5rem;
            border-radius: 0.375rem;
            border: 1px solid #ddd;
        }

        .search-bar button {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="bg-gray-100 p-8">

    <div class="container mx-auto">
        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Search...">
            <select id="category-select">
                <option value="">Select Category</option>
            </select>
            <button id="submit-btn">Submit</button>
            <button id="clear-btn" class="bg-red-500">Clear</button>
        </div>

        <!-- Kontainer Cards -->
        <div id="card-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Isi konten card akan dimasukkan di sini -->
        </div>

        <!-- Pagination -->
        <ul id="pagination" class="pagination mt-8">
            <!-- Tombol pagination akan dimasukkan di sini melalui JavaScript -->
        </ul>
    </div>

    <script>
        const cardsPerPage = 40;
        let currentPage = 1;
        let totalPages = 0;
        let data = [];
        let filteredData = [];

        const fetchData = async () => {
            try {
                const response = await fetch('https://iptv-org.github.io/api/channels.json');
                data = await response.json();
                filteredData = data;
                totalPages = Math.ceil(data.length / cardsPerPage);
                renderPage(currentPage);
                populateCategories();
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };

        const renderPage = (page) => {
            const start = (page - 1) * cardsPerPage;
            const end = start + cardsPerPage;
            const pageData = filteredData.slice(start, end);

            const cardContainer = document.getElementById('card-container');
            cardContainer.innerHTML = '';

            pageData.forEach(channel => {
                const card = `
                    <div class="card p-4 border rounded-lg bg-white">
                        <img src="${channel.logo}" alt="${channel.name} Logo" class="w-full h-24 object-cover mb-2">
                        <h2 class="text-xl font-bold mb-1">${channel.name}</h2>
                        <p class="text-gray-600 mb-2">${channel.categories.join(', ')}</p>
                        <a href="${channel.website}" target="_blank" class="text-blue-500 hover:underline">Visit Website</a>
                    </div>
                `;
                cardContainer.innerHTML += card;
            });

            renderPagination();
        };

        const renderPagination = () => {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            // Tombol "Previous"
            pagination.innerHTML += `<li><a href="javascript:void(0);" class="${currentPage === 1 ? 'disabled' : ''}" onclick="changePage(${currentPage - 1})">&lt;</a></li>`;

            // Tombol Halaman
            if (totalPages <= 5) {
                for (let i = 1; i <= totalPages; i++) {
                    pagination.innerHTML += `<li><a href="javascript:void(0);" class="${i === currentPage ? 'active' : ''}" onclick="changePage(${i})">${i}</a></li>`;
                }
            } else {
                // Handle large page numbers with ellipsis
                pagination.innerHTML += `<li><a href="javascript:void(0);" class="${1 === currentPage ? 'active' : ''}" onclick="changePage(1)">1</a></li>`;
                if (currentPage > 3) pagination.innerHTML += `<li><span>...</span></li>`;
                for (let i = Math.max(currentPage - 2, 2); i <= Math.min(currentPage + 2, totalPages - 1); i++) {
                    pagination.innerHTML += `<li><a href="javascript:void(0);" class="${i === currentPage ? 'active' : ''}" onclick="changePage(${i})">${i}</a></li>`;
                }
                if (currentPage < totalPages - 2) pagination.innerHTML += `<li><span>...</span></li>`;
                pagination.innerHTML += `<li><a href="javascript:void(0);" class="${totalPages === currentPage ? 'active' : ''}" onclick="changePage(${totalPages})">${totalPages}</a></li>`;
            }

            // Tombol "Next"
            pagination.innerHTML += `<li><a href="javascript:void(0);" class="${currentPage === totalPages ? 'disabled' : ''}" onclick="changePage(${currentPage + 1})">&gt;</a></li>`;
        };

        const changePage = (page) => {
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                renderPage(currentPage);
            }
        };

        // Fetch categories from API
        const populateCategories = async () => {
            try {
                const response = await fetch('https://iptv-org.github.io/api/categories.json');
                const categories = await response.json();
                const categorySelect = document.getElementById('category-select');

                categories.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    categorySelect.appendChild(option);
                });
            } catch (error) {
                console.error('Error fetching categories:', error);
            }
        };

        // Search functionality
        document.getElementById('submit-btn').addEventListener('click', () => {
            const searchInput = document.getElementById('search-input').value.toLowerCase();
            const selectedCategory = document.getElementById('category-select').value;

            filteredData = data.filter(channel => {
                return (channel.name.toLowerCase().includes(searchInput) && (selectedCategory === '' || channel.categories.includes(selectedCategory)));
            });

            totalPages = Math.ceil(filteredData.length / cardsPerPage);
            currentPage = 1;
            renderPage(currentPage);
        });

        // Clear button functionality
        document.getElementById('clear-btn').addEventListener('click', () => {
            document.getElementById('search-input').value = '';
            document.getElementById('category-select').value = '';
            filteredData = data;
            totalPages = Math.ceil(filteredData.length / cardsPerPage);
            currentPage = 1;
            renderPage(currentPage);
        });

        fetchData();
    </script>
</body>
</html>
