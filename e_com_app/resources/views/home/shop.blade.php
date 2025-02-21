<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <title>Voice Search</title>
    <style>
        .voice-search-container {
            text-align: center;
            margin: 20px 0;
        }

        #search-input {
            width: 50%;
            padding: 10px;
            font-size: 16px;
            margin-right: 10px;
        }

        .voice-button {
            padding: 10px 15px;
            background-color: #007BFF;
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .voice-button:hover {
            transform: scale(1.2);
            background-color: #0056b3;
        }

        .product-box {
            width: 30%;
            margin: 15px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #fff;
            text-align: center;
            float: left;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        /* Notification styling */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            display: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .notification.success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .notification.error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
    </style>
</head>

<body>
    @include('home.header')

    <div class="voice-search-container">
        <input type="text" id="search-input" placeholder="Search for a product..." />
        <button class="voice-button" onclick="startVoiceSearch()">🎤</button>
    </div>

    <!-- Display the search result -->
    <div id="search-result" class="product-container"></div>
    @include('home.product')

    <!-- Notification -->
    <div id="notification" class="notification"></div>

    @include('home.footer')

    <script>
        var recognition;
        if ('webkitSpeechRecognition' in window) {
            recognition = new webkitSpeechRecognition();
            recognition.continuous = false;
            recognition.interimResults = false;

            recognition.onresult = function (event) {
                var transcript = event.results[0][0].transcript;
                document.getElementById('search-input').value = transcript;
                searchProduct(transcript);
            };

            recognition.onerror = function (event) {
                console.error("Speech recognition error", event.error);
            };
        } else {
            alert("Your browser does not support voice search.");
        }

        function startVoiceSearch() {
            recognition.start();
        }

        function searchProduct(query) {
            var resultContainer = document.getElementById('search-result');
            var notification = document.getElementById('notification');
            resultContainer.innerHTML = "Searching...";

            // Make AJAX request to Laravel backend
            fetch(`/search?query=${encodeURIComponent(query)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    resultContainer.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(product => {
                            resultContainer.innerHTML += `
                                <div class="product-box">
                                    <h3>${product.title}</h3>
                                    <img src="public/images/${product.image}" alt="${product.title}" width="150" />
                                    <p>Price: $${product.price}</p>
                                    <p>Quantity: ${product.quantity}</p>
                                    <a href="/add_cart/${product.id}" class="btn btn-primary">Add to Cart</a>
                                </div>
                            `;
                        });
                        showNotification("Products found successfully!", "success");
                    } else {
                        // resultContainer.innerHTML = `<p>No products found for "${query}"</p>`;
                        showNotification("😔 We couldn't products found!"${query}". Please try a different product.", "error");

                        // showNotification(😔 We couldn't find "${query}". Try another search!, 'info');
                    }

                })
                .catch(error => {
                    resultContainer.innerHTML = `<p>Error fetching results: ${error.message}</p>`;
                    showNotification("Error fetching results. Please try again.", "error");
                });
        }

        function showNotification(message, type) {
            var notification = document.getElementById('notification');
            notification.innerHTML = message;
            notification.className = `notification ${type}`;
            notification.style.display = "block";

            setTimeout(() => {
                notification.style.display = "none";
            }, 5000); // Hide notification after 5 seconds
        }
    </script>
</body>

</html>
