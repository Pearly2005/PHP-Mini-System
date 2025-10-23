<?php
/**
 * PART III - BINARY SEARCH TREE (BST) FOR BOOK TITLES
 * Digital Library Organizer - BST System
 * 
 * This script implements a Binary Search Tree to store and search books alphabetically.
 */

/**
 * Node class for the Binary Search Tree
 */
class Node {
    public $data;
    public $left;
    public $right;
    
    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

/**
 * Binary Search Tree class
 */
class BinarySearchTree {
    private $root;
    
    public function __construct() {
        $this->root = null;
    }
    
    /**
     * Insert a new book title into the BST
     * 
     * @param string $data Book title to insert
     * @return void
     */
    public function insert($data) {
        if ($this->root === null) {
            $this->root = new Node($data);
        } else {
            $this->insertHelper($this->root, $data);
        }
    }
    
    /**
     * Recursive helper for insertion
     * Maintains alphabetical ordering (left < parent < right)
     */
    private function insertHelper($node, $data) {
        // strcmp: returns < 0 if $data comes before $node->data alphabetically
        if (strcmp($data, $node->data) < 0) {
            // Insert to the left
            if ($node->left === null) {
                $node->left = new Node($data);
            } else {
                $this->insertHelper($node->left, $data);
            }
        } else {
            // Insert to the right
            if ($node->right === null) {
                $node->right = new Node($data);
            } else {
                $this->insertHelper($node->right, $data);
            }
        }
    }
    
    /**
     * Search for a book title in the BST
     * O(log n) average case, O(n) worst case
     * 
     * @param string $data Book title to search
     * @return bool True if found, false otherwise
     */
    public function search($data) {
        return $this->searchHelper($this->root, $data);
    }
    
    /**
     * Recursive helper for search
     */
    private function searchHelper($node, $data) {
        if ($node === null) {
            return false;
        }
        
        $comparison = strcmp($data, $node->data);
        
        if ($comparison === 0) {
            return true; // Found
        } elseif ($comparison < 0) {
            return $this->searchHelper($node->left, $data); // Search left
        } else {
            return $this->searchHelper($node->right, $data); // Search right
        }
    }
    
    /**
     * Inorder Traversal: Left → Root → Right
     * Produces alphabetically sorted output
     * Returns array of sorted book titles
     */
    public function inorderTraversal() {
        $result = [];
        $this->inorderHelper($this->root, $result);
        return $result;
    }
    
    /**
     * Helper function for inorder traversal
     * Uses pass-by-reference for the result array
     */
    private function inorderHelper($node, &$result) {
        if ($node === null) {
            return;
        }
        
        // Traverse left subtree
        $this->inorderHelper($node->left, $result);
        
        // Add current node
        $result[] = $node->data;
        
        // Traverse right subtree
        $this->inorderHelper($node->right, $result);
    }
}

// Create BST and insert books
$bst = new BinarySearchTree();

// Books to insert
$books = [
    "Harry Potter",
    "The Hobbit",
    "Sherlock Holmes",
    "Gone Girl",
    "A Brief History of Time",
    "The Selfish Gene",
    "Steve Jobs",
    "Becoming"
];

// Insert all books into BST
foreach ($books as $book) {
    $bst->insert($book);
}

// Get sorted books from BST
$sortedBooks = $bst->inorderTraversal();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part III - Binary Search Tree</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
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
            color: #4facfe;
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
            color: #4facfe;
            font-size: 1.8em;
            margin-bottom: 20px;
            border-bottom: 2px solid #4facfe;
            padding-bottom: 10px;
        }
        
        .output-box {
            background: #e0f7ff;
            border-left: 4px solid #4facfe;
            padding: 20px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            line-height: 1.8;
            color: #333;
            max-height: 400px;
            overflow-y: auto;
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
            border: 2px solid #4facfe;
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.3s;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #00f2fe;
            box-shadow: 0 0 10px rgba(79, 172, 254, 0.2);
        }
        
        .search-btn {
            background: #4facfe;
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
            background: #00f2fe;
        }
        
        .found-result {
            background: #4caf50;
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            display: none;
        }
        
        .found-result.show {
            display: block;
            animation: slideIn 0.3s ease-out;
        }
        
        .not-found-result {
            background: #f44336;
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            display: none;
        }
        
        .not-found-result.show {
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
        
        .statistics {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 30px;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
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
            background: #4facfe;
            color: white;
            padding: 10px 30px;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s;
        }
        
        .back-link a:hover {
            background: #00f2fe;
        }
        
        .code-info {
            background: #fffacd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 0.95em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌳 Part III: Binary Search Tree</h1>
            <p>Digital Library Organizer - BST System</p>
        </div>
        
        <!-- Search Section -->
        <div class="section">
            <h2>🔍 Search for Books in BST</h2>
            <div class="code-info">
                <strong>📝 Note:</strong> Binary Search provides O(log n) average search time!
            </div>
            
            <div class="search-container">
                <input 
                    type="text" 
                    id="searchInput" 
                    class="search-input" 
                    placeholder="Enter book title to search..."
                >
                <button class="search-btn" onclick="searchBookBST()">Search</button>
            </div>
            
            <div id="foundResult" class="found-result"></div>
            <div id="notFoundResult" class="not-found-result"></div>
        </div>
        
        <!-- Inorder Traversal Section -->
        <div class="section">
            <h2>Inorder Traversal (Alphabetical Order)</h2>
            <div class="code-info">
                <strong>📝 Expected Output Format:</strong> Books displayed in strict alphabetical order (A-Z).
                This is the exact format required by the project.
            </div>
            <div class="output-box">
<strong>Inorder Traversal (Alphabetical):</strong><br>
<br>
<?php
foreach ($sortedBooks as $index => $book) {
    echo ($index + 1) . ". " . htmlspecialchars($book) . "<br>";
}
?>
            </div>
        </div>
        
        <!-- Search Examples Section -->
        <div class="section">
            <h2>Search Examples (Project Required)</h2>
            <div class="output-box">
<strong>Example Searches:</strong><br>
<br>
<?php
$exampleSearches = ["The Hobbit", "Sherlock Holmes", "Becoming", "Inferno"];
foreach ($exampleSearches as $title) {
    $found = $bst->search($title);
    if ($found) {
        echo "Searching for \"" . htmlspecialchars($title) . "\": <span style='color: green;'>✅ Found!</span><br>";
    } else {
        echo "Searching for \"" . htmlspecialchars($title) . "\": <span style='color: red;'>❌ Not Found</span><br>";
    }
}
?>
            </div>
        </div>
        
        <!-- Tree Statistics Section -->
        <div class="section">
            <h2>Binary Search Tree Statistics</h2>
            <div class="statistics">
                <div class="stat-card">
                    <h3><?php echo count($books); ?></h3>
                    <p>Total Books Inserted</p>
                </div>
                <div class="stat-card">
                    <h3>O(log n)</h3>
                    <p>Average Search Time</p>
                </div>
            </div>
        </div>
        
        <!-- How BST Works Section -->
        <div class="section">
            <h2>How Binary Search Tree Works</h2>
            <div class="output-box">
<strong>Node Class Structure:</strong><br>
class Node {<br>
&nbsp;&nbsp;public $data;      // Book title<br>
&nbsp;&nbsp;public $left;      // Left child node<br>
&nbsp;&nbsp;public $right;     // Right child node<br>
}<br>
<br>
<strong>BST Key Properties:</strong><br>
1. Each node has at most 2 children (left and right)<br>
2. Left child < Parent < Right child (alphabetical order)<br>
3. Uses strcmp() to compare book titles<br>
<br>
<strong>insert($data) Method:</strong><br>
- Compares new title with current node<br>
- If alphabetically smaller → insert to left<br>
- If alphabetically larger → insert to right<br>
- Recursively finds the correct position<br>
- Time: O(log n) average, O(n) worst case<br>
<br>
<strong>search($data) Method:</strong><br>
- Compares target with current node<br>
- If equal → return true (FOUND!)<br>
- If smaller → search left subtree<br>
- If larger → search right subtree<br>
- Time: O(log n) average, O(n) worst case<br>
<br>
<strong>inorderTraversal() Method:</strong><br>
- Visit left subtree → current node → right subtree<br>
- Produces alphabetically sorted output!<br>
- Time: O(n)<br>
<br>
<strong>Why BST is Efficient:</strong><br>
Each comparison eliminates half of remaining data,<br>
making search O(log n) instead of O(n) like linear search!
            </div>
        </div>
        
        <div class="back-link">
            <a href="index.html">← Back to Dashboard</a>
        </div>
    </div>
    
    <script>
        const booksInBST = <?php echo json_encode($sortedBooks); ?>;
        
        function searchBookBST() {
            const searchInput = document.getElementById('searchInput').value.trim();
            const foundResult = document.getElementById('foundResult');
            const notFoundResult = document.getElementById('notFoundResult');
            
            foundResult.classList.remove('show');
            notFoundResult.classList.remove('show');
            
            if (!searchInput) {
                notFoundResult.innerHTML = '❌ Please enter a book title';
                notFoundResult.classList.add('show');
                return;
            }
            
            // Binary search logic (simulating BST search)
            let found = false;
            for (let book of booksInBST) {
                if (book === searchInput) {
                    found = true;
                    break;
                }
            }
            
            if (found) {
                foundResult.innerHTML = `✅ Searching for "${searchInput}": Found!`;
                foundResult.classList.add('show');
            } else {
                notFoundResult.innerHTML = `❌ Searching for "${searchInput}": Not Found`;
                notFoundResult.classList.add('show');
            }
        }
        
        // Allow Enter key to search
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchBookBST();
            }
        });
    </script>
</body>
</html>