<?php
/**
 * PART II - HASH TABLE FOR BOOK DETAILS
 * Digital Library Organizer - Hash Table System
 * 
 * This script demonstrates O(1) lookup using PHP associative arrays (hash tables).
 */

// Hash table storing book information
$bookInfo = [
    "Harry Potter" => ["author" => "J.K. Rowling", "year" => 1997, "genre" => "Fantasy"],
    "The Hobbit" => ["author" => "J.R.R. Tolkien", "year" => 1937, "genre" => "Fantasy"],
    "Sherlock Holmes" => ["author" => "Arthur Conan Doyle", "year" => 1887, "genre" => "Mystery"],
    "Gone Girl" => ["author" => "Gillian Flynn", "year" => 2012, "genre" => "Mystery"],
    "A Brief History of Time" => ["author" => "Stephen Hawking", "year" => 1988, "genre" => "Science"],
    "The Selfish Gene" => ["author" => "Richard Dawkins", "year" => 1976, "genre" => "Science"],
    "Steve Jobs" => ["author" => "Walter Isaacson", "year" => 2011, "genre" => "Biography"],
    "Becoming" => ["author" => "Michelle Obama", "year" => 2018, "genre" => "Biography"]
];

/**
 * O(1) Lookup: Retrieve book information by title
 * 
 * @param string $title The book title to search
 * @param array $bookInfo The hash table
 * @return array|null Book details or null if not found
 */
function getBookInfo($title, $bookInfo) {
    // Direct key lookup - O(1) operation
    if (isset($bookInfo[$title])) {
        return $bookInfo[$title];
    }
    return null;
}

/**
 * Display formatted book information
 */
function displayBookInfo($title, $bookInfo) {
    $info = getBookInfo($title, $bookInfo);
    
    if ($info === null) {
        return "<div style='color: red;'><strong>❌ Book not found:</strong> \"" . htmlspecialchars($title) . "\"</div>";
    }
    
    $output = "<div style='background: #e8f5e9; border-left: 4px solid #4caf50; padding: 15px; margin: 10px 0; border-radius: 5px;'>";
    $output .= "<strong style='color: #2e7d32;'>✅ " . htmlspecialchars($title) . "</strong><br>";
    $output .= "<strong>Author:</strong> " . htmlspecialchars($info['author']) . "<br>";
    $output .= "<strong>Year:</strong> " . htmlspecialchars($info['year']) . "<br>";
    $output .= "<strong>Genre:</strong> " . htmlspecialchars($info['genre']);
    $output .= "</div>";
    
    return $output;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part II - Hash Table for Book Details</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            color: #f5576c;
        }
        
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 1.1em;
            color: #666;
        }
        
        .section {
            margin-bottom: 40px;
        }
        
        .section h2 {
            color: #f5576c;
            font-size: 1.8em;
            margin-bottom: 20px;
            border-bottom: 2px solid #f5576c;
            padding-bottom: 10px;
        }
        
        .output-box {
            background: #fff3e0;
            border-left: 4px solid #f5576c;
            padding: 20px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            line-height: 1.8;
            color: #333;
        }
        
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .book-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .book-card:hover {
            transform: translateY(-5px);
        }
        
        .book-card h4 {
            margin-bottom: 8px;
        }
        
        .book-card p {
            font-size: 0.9em;
            opacity: 0.9;
        }
        
        .statistics {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 30px;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        
        .stat-card h3 {
            font-size: 2em;
            margin-bottom: 5px;
        }
        
        .stat-card p {
            font-size: 0.9em;
            opacity: 0.9;
        }
        
        .back-link {
            margin-top: 30px;
            text-align: center;
        }
        
        .back-link a {
            background: #f5576c;
            color: white;
            padding: 10px 30px;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s;
        }
        
        .back-link a:hover {
            background: #f093fb;
        }
        
        .code-info {
            background: #fffacd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 0.95em;
        }
        
        .search-container {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .search-input {
            flex: 1;
            min-width: 250px;
            padding: 12px 15px;
            border: 2px solid #f5576c;
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.3s;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #f093fb;
            box-shadow: 0 0 10px rgba(245, 87, 108, 0.2);
        }
        
        .search-btn {
            background: #f5576c;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 1em;
        }
        
        .search-btn:hover {
            background: #f093fb;
        }
        
        .search-result-box {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            display: none;
        }
        
        .search-result-box.show {
            display: block;
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .search-result-box h3 {
            margin-bottom: 15px;
            font-size: 1.5em;
        }
        
        .search-result-box p {
            margin-bottom: 10px;
            line-height: 1.8;
        }
        
        .search-result-box strong {
            display: block;
            margin-top: 8px;
            opacity: 0.95;
        }
        
        .not-found-msg {
            background: #f44336;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: center;
            font-size: 1.1em;
            display: none;
        }
        
        .not-found-msg.show {
            display: block;
            animation: slideIn 0.3s ease-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📚 Part II: Hash Table for Book Details</h1>
            <p>Digital Library Organizer - Hash Table System</p>
        </div>
        
        <!-- Search Section -->
        <div class="section">
            <h2>🔍 Search for Books</h2>
            <div class="code-info">
                <strong>📝 Note:</strong> These are O(1) instant lookups using the hash table. No matter how many books exist, lookup time is always constant!
            </div>
            
            <div class="search-container">
                <input 
                    type="text" 
                    id="searchInput" 
                    class="search-input" 
                    placeholder="Enter book title (e.g., Harry Potter, The Hobbit)..."
                >
                <button class="search-btn" onclick="searchBook()">Search</button>
            </div>
            
            <div id="searchResultBox" class="search-result-box"></div>
            <div id="notFoundBox" class="not-found-msg"></div>
        </div>
        
        <!-- Example Output Section -->
        <div class="section">
            <h2>Example Book Lookups</h2>
            
            <?php
            echo displayBookInfo("Harry Potter", $bookInfo);
            echo displayBookInfo("The Hobbit", $bookInfo);
            echo displayBookInfo("The Matrix", $bookInfo);
            ?>
        </div>
        
        <!-- All Books Section -->
        <div class="section">
            <h2>All Books in Hash Table</h2>
            <div class="books-grid">
                <?php
                foreach ($bookInfo as $title => $info) {
                    echo "<div class='book-card' onclick=\"searchByCard('" . htmlspecialchars($title) . "')\">";
                    echo "<h4>" . htmlspecialchars($title) . "</h4>";
                    echo "<p><strong>Author:</strong> " . htmlspecialchars($info['author']) . "</p>";
                    echo "<p><strong>Year:</strong> " . htmlspecialchars($info['year']) . "</p>";
                    echo "<p><strong>Genre:</strong> " . htmlspecialchars($info['genre']) . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        
        <!-- Statistics Section -->
        <div class="section">
            <h2>Hash Table Statistics</h2>
            <div class="statistics">
                <div class="stat-card">
                    <h3><?php echo count($bookInfo); ?></h3>
                    <p>Total Books</p>
                </div>
                <div class="stat-card">
                    <h3><?php echo min(array_column($bookInfo, 'year')); ?></h3>
                    <p>Oldest Book</p>
                </div>
                <div class="stat-card">
                    <h3><?php echo max(array_column($bookInfo, 'year')); ?></h3>
                    <p>Newest Book</p>
                </div>
            </div>
        </div>
        
        <!-- How It Works Section -->
        <div class="section">
            <h2>How Hash Tables Work</h2>
            <div class="output-box">
<strong>Function: getBookInfo($title, $bookInfo)</strong><br><br>
1. Takes a book title as input<br>
2. Uses isset() to check if the key exists in the associative array<br>
3. If found → returns the array with author, year, genre<br>
4. If not found → returns null (displays "Book not found")<br><br>
<strong>Complexity Analysis:</strong><br>
- Lookup: O(1) - Direct key access, no iteration needed<br>
- Insert: O(1) - Add new key-value pair<br>
- Delete: O(1) - Remove existing key<br>
- Space: O(n) - Where n is number of books<br><br>
<strong>Key Advantage:</strong> No matter if we have 8 or 8,000 books,<br>
finding a specific book takes the same constant time!
            </div>
        </div>
        
        <div class="back-link">
            <a href="index.html">← Back to Dashboard</a>
        </div>
    </div>
    
    <script>
        const bookData = <?php echo json_encode($bookInfo); ?>;
        
        function searchBook() {
            const searchInput = document.getElementById('searchInput').value.trim();
            const resultBox = document.getElementById('searchResultBox');
            const notFoundBox = document.getElementById('notFoundBox');
            
            resultBox.classList.remove('show');
            notFoundBox.classList.remove('show');
            
            if (!searchInput) {
                notFoundBox.innerHTML = '❌ Please enter a book title';
                notFoundBox.classList.add('show');
                return;
            }
            
            if (bookData[searchInput]) {
                const book = bookData[searchInput];
                resultBox.innerHTML = `
                    <h3>✅ "${searchInput}"</h3>
                    <strong>Author:</strong>
                    <p>${book.author}</p>
                    <strong>Published:</strong>
                    <p>${book.year}</p>
                    <strong>Genre:</strong>
                    <p>${book.genre}</p>
                `;
                resultBox.classList.add('show');
            } else {
                const suggestions = Object.keys(bookData).slice(0, 3).join(', ');
                notFoundBox.innerHTML = `❌ "${searchInput}" not found in the library.<br><br><strong>Try searching for:</strong> ${suggestions}...`;
                notFoundBox.classList.add('show');
            }
        }
        
        function searchByCard(title) {
            document.getElementById('searchInput').value = title;
            searchBook();
            document.querySelector('.search-result-box').scrollIntoView({behavior: 'smooth'});
        }
        
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchBook();
            }
        });
    </script>
</body>
</html>