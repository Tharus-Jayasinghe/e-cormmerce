<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voice Search</title>
</head>
<body>
    <div>
        <button id="start-btn">Start Voice Search</button>
        <input type="text" id="search-input" placeholder="Search products..." value="{{ request('query') }}">
        <div id="voice-input-result"></div>
    </div>

    <h3>Search Results</h3>
    <ul>
        @forelse($products as $product)
            <li>{{ $product->name }} - {{ $product->description }}</li>
        @empty
            <li>No products found.</li>
        @endforelse
    </ul>

    <script>
        const startBtn = document.getElementById('start-btn');
        const searchInput = document.getElementById('search-input');
        const voiceResult = document.getElementById('voice-input-result');
        
        // Check for browser compatibility
        if (!('webkitSpeechRecognition' in window)) {
            alert("Your browser doesn't support speech recognition.");
        } else {
            const recognition = new webkitSpeechRecognition();
            recognition.lang = 'en-US';
            recognition.interimResults = true;
            recognition.maxAlternatives = 1;

            startBtn.addEventListener('click', () => {
                recognition.start();
                voiceResult.innerHTML = "Listening...";
            });

            recognition.onresult = (event) => {
                const transcript = event.results[0][0].transcript;
                voiceResult.innerHTML = `You said: ${transcript}`;
                searchInput.value = transcript;  // Set the search input to voice input
                searchInput.form.submit(); // Automatically submit the search form
            };

            recognition.onerror = (event) => {
                voiceResult.innerHTML = `Error: ${event.error}`;
            };
        }
    </script>
</body>
</html>
