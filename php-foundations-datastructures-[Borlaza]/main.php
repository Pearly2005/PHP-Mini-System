<?php
/**
 * PART IV - INTEGRATION CHALLENGE
 * Digital Library Organizer - Complete Integrated System
 * Combines Recursion, Hash Tables, and Binary Search Tree
 */

// ==================== NODE CLASS ====================
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

// ==================== BINARY SEARCH TREE CLASS ====================
class BinarySearchTree {
    private $root;
    
    public function __construct() {
        $this->root = null;
    }
    
    public function insert($data) {
        if ($this->root === null) {
            $this->root = new Node($data);
        } else {
            $this->insertHelper($this->root, $data);
        }
    }
    
    private function insertHelper($node, $data) {
        if (strcmp($data, $node->data) < 0) {
            if ($node->left === null) {
                $node->left = new Node($data);
            } else {
                $this->insertHelper($node->left, $data);
            }
        } else {
            if ($node->right === null) {
                $node->right = new Node($data);
            } else {
                $this->insertHelper($node->right, $data);
            }
        }
    }
    
    public function search($data) {
        return $this->searchHelper($this->root, $data);
    }
    
    private function searchHelper($node, $data) {
        if ($node === null) return false;
        
        $comparison = strcmp($data, $node->data);
        if ($comparison === 0) return true;
        elseif ($comparison < 0) return $this->searchHelper($node->left, $data);
        else return $this->searchHelper($node->right, $data);
    }
    
    public function inorderTraversal() {
        $result = [];
        $this->inorderHelper($this->root, $result);
        return $result;
    }
    
    private function inorderHelper($node, &$result) {
        if ($node === null) return;
        $this->inorderHelper($node->left, $result);
        $result[] = $node->data;
        $this->inorderHelper($node->right, $result);
    }
}

// ==================== DATA STRUCTURES ====================

// Part I: Library Structure
$library = [
    "Fiction" => [
        "Fantasy" => ["Harry Potter", "The Hobbit"],
        "Mystery" => ["Sherlock Holmes", "Gone Girl"]
    ],
    "Non-Fiction" => [
        "Science" => ["A Brief History of Time", "The Selfish Gene"],
        "Biography" => ["Steve Jobs", "Becoming"]
    ]
];

// Part II: Book Metadata (Hash Table)
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

// Part III: Build BST
$bst = new BinarySearchTree();
foreach (array_keys($bookInfo) as $title) {
    $bst->insert($title);
}

// ==================== FUNCTIONS ====================

// Recursive Display Function
function displayLibrary($library, $indent = 0) {
    $output = "";
    foreach ($library as $key => $value) {
        $indentation = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $indent);
        
        if (is_array($value)) {
            $isBookList = true;
            foreach ($value as $item) {
                if (is_array($item)) {
                    $isBookList = false;
                    break;
                }
            }
            
            if ($isBookList) {
                $output .= $indentation . "<strong>" . htmlspecialchars($key) . "</strong><br>";
                foreach ($value as $book) {
                    $output .= $indentation . "&nbsp;&nbsp;&nbsp;&nbsp;<span class='book-link' data-book='" . htmlspecialchars($book) . "'>" . htmlspecialchars($book) . "</span><br>";
                }
            } else {
                $output .= $indentation . "<strong>" . htmlspecialchars($key) . "</strong><br>";
                $output .= displayLibrary($value, $indent + 1);
            }
        }
    }
    return $output;
}

// Hash Table Lookup Function
function getBookInfo($title, $bookInfo) {
    return isset($bookInfo[$title]) ? $bookInfo[$title] : null;
}

// Get current page
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library Organizer - Integrated System</title>
    
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: bold;
            color: #667eea !important;
            font-size: 1.5rem;
        }
        
        .nav-link {
            color: #333 !important;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-link:hover, .nav-link.active {
            color: #667eea !important;
        }
        
        .main-container {
            margin-top: 30px;
            margin-bottom: 30px;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .output-box {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            line-height: 1.8;
        }
        
        .book-link {
            color: #667eea;
            cursor: pointer;
            text-decoration: underline;
            transition: color 0.3s;
        }
        
        .book-link:hover {
            color: #764ba2;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 10px 30px;
            transition: transform 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
        }
        
        .search-result {
            background: #e8f5e9;
            border-left: 4px solid #4caf50;
            padding: 15px;
            margin-top: 15px;
            border-radius: 8px;
            animation: slideIn 0.3s;
        }
        
        .not-found {
            background: #ffebee;
            border-left: 4px solid #f44336;
            padding: 15px;
            margin-top: 15px;
            border-radius: 8px;
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
        
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .stat-card h3 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .hero-section {
            background: white;
            border-radius: 15px;
            padding: 50px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        }
        
        .hero-section h1 {
            color: #667eea;
            font-size: 3rem;
            margin-bottom: 20px;
        }
        
        .feature-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 15px;
        }
        
        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        footer {
            background: rgba(255, 255, 255, 0.95);
            padding: 20px 0;
            margin-top: 50px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="?page=home">
            <i class="fas fa-book"></i> Digital Library
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == 'home' ? 'active' : ''; ?>" href="?page=home">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == 'recursion' ? 'active' : ''; ?>" href="?page=recursion">
                        <i class="fas fa-folder-open"></i> Recursion
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == 'hashtable' ? 'active' : ''; ?>" href="?page=hashtable">
                        <i class="fas fa-search"></i> Hash Table
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == 'bst' ? 'active' : ''; ?>" href="?page=bst">
                        <i class="fas fa-sitemap"></i> BST
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container main-container">
    
    <?php if ($page == 'home'): ?>
        <!-- HOME PAGE -->
        <div class="hero-section">
            <h1><i class="fas fa-book-open"></i> Digital Library Organizer</h1>
            <p class="lead">A Complete PHP System Demonstrating Data Structures</p>
            <p>Recursion • Hash Tables • Binary Search Trees</p>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="feature-icon">
                            <i class="fas fa-folder-tree"></i>
                        </div>
                        <h5 class="card-title">Part I: Recursion</h5>
                        <p class="card-text">Navigate hierarchical folder structures using recursive algorithms.</p>
                        <a href="?page=recursion" class="btn btn-primary">Explore <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="feature-icon">
                            <i class="fas fa-hashtag"></i>
                        </div>
                        <h5 class="card-title">Part II: Hash Tables</h5>
                        <p class="card-text">O(1) instant lookups for book metadata using associative arrays.</p>
                        <a href="?page=hashtable" class="btn btn-primary">Explore <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="feature-icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <h5 class="card-title">Part III: Binary Search Tree</h5>
                        <p class="card-text">Efficient O(log n) searching and alphabetical ordering.</p>
                        <a href="?page=bst" class="btn btn-primary">Explore <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <h3>8</h3>
                    <p>Total Books</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <h3>4</h3>
                    <p>Categories</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <h3>3</h3>
                    <p>Data Structures</p>
                </div>
            </div>
        </div>
    
    <?php elseif ($page == 'recursion'): ?>
        <!-- RECURSION PAGE -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-folder-open"></i> Part I: Recursive Directory Display
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <strong><i class="fas fa-info-circle"></i> About Recursion:</strong> 
                    This demonstrates how recursive functions traverse nested folder structures.
                    Click on any book title to view its details using the hash table!
                </div>
                
                <div class="output-box">
                    <strong>Library Structure:</strong><br><br>
                    <?php echo displayLibrary($library); ?>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5><i class="fas fa-code"></i> How It Works</h5>
                                <p>The <code>displayLibrary()</code> function:</p>
                                <ol>
                                    <li>Loops through each item</li>
                                    <li>Checks if it's a category or book</li>
                                    <li>Calls itself recursively for subcategories</li>
                                    <li>Indents based on depth level</li>
                                </ol>
                                <p><strong>Time Complexity:</strong> O(n)</p>
                                <p><strong>Space Complexity:</strong> O(d)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5><i class="fas fa-chart-bar"></i> Statistics</h5>
                                <ul class="list-unstyled">
                                    <li><strong>Main Categories:</strong> 2</li>
                                    <li><strong>Subcategories:</strong> 4</li>
                                    <li><strong>Total Books:</strong> 8</li>
                                    <li><strong>Max Depth:</strong> 3 levels</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <?php elseif ($page == 'hashtable'): ?>
        <!-- HASH TABLE PAGE -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-search"></i> Part II: Hash Table for Book Details
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <strong><i class="fas fa-info-circle"></i> About Hash Tables:</strong> 
                    Hash tables provide O(1) constant-time lookups. Search for any book to see instant results!
                </div>
                
                <div class="form-group">
                    <label><strong>Search for a Book:</strong></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="bookSearch" placeholder="Enter book title...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="searchHashTable()">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </div>
                
                <div id="searchResult"></div>
                
                <hr>
                
                <h5><i class="fas fa-book"></i> All Books in Library</h5>
                <div class="row">
                    <?php foreach ($bookInfo as $title => $info): ?>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title text-primary"><?php echo htmlspecialchars($title); ?></h6>
                                    <p class="card-text mb-1"><strong>Author:</strong> <?php echo htmlspecialchars($info['author']); ?></p>
                                    <p class="card-text mb-1"><strong>Year:</strong> <?php echo $info['year']; ?></p>
                                    <p class="card-text mb-0"><strong>Genre:</strong> <?php echo htmlspecialchars($info['genre']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    
    <?php elseif ($page == 'bst'): ?>
        <!-- BST PAGE -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-sitemap"></i> Part III: Binary Search Tree
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <strong><i class="fas fa-info-circle"></i> About BST:</strong> 
                    Binary Search Trees provide O(log n) search time and automatic alphabetical ordering!
                </div>
                
                <div class="form-group">
                    <label><strong>Search in BST:</strong></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="bstSearch" placeholder="Enter book title...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="searchBST()">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </div>
                
                <div id="bstSearchResult"></div>
                
                <hr>
                
                <h5><i class="fas fa-sort-alpha-down"></i> Inorder Traversal (Alphabetical Order)</h5>
                <div class="output-box">
                    <strong>Inorder Traversal (Alphabetical):</strong><br><br>
                    <?php
                    $sorted = $bst->inorderTraversal();
                    foreach ($sorted as $index => $title) {
                        echo ($index + 1) . ". " . htmlspecialchars($title) . "<br>";
                    }
                    ?>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5><i class="fas fa-code"></i> BST Structure</h5>
                                <pre class="mb-0">class Node {
    public $data;
    public $left;
    public $right;
}</pre>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5><i class="fas fa-chart-line"></i> Complexity</h5>
                                <ul class="list-unstyled mb-0">
                                    <li><strong>Search:</strong> O(log n) avg</li>
                                    <li><strong>Insert:</strong> O(log n) avg</li>
                                    <li><strong>Traversal:</strong> O(n)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <?php endif; ?>
    
</div>

<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <p class="mb-0">
            <strong>Digital Library Organizer</strong> | PHP Data Structures Project<br>
            <small>Demonstrating Recursion, Hash Tables, and Binary Search Trees</small>
        </p>
    </div>
</footer>

<!-- Book Details Modal -->
<div class="modal fade" id="bookModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookModalTitle">Book Details</h5>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bookModalBody"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 4 JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Book data for JavaScript
    const bookData = <?php echo json_encode($bookInfo); ?>;
    const bstBooks = <?php echo json_encode($bst->inorderTraversal()); ?>;
    
    // Handle book link clicks
    $(document).on('click', '.book-link', function() {
        const bookTitle = $(this).data('book');
        if (bookData[bookTitle]) {
            const book = bookData[bookTitle];
            $('#bookModalTitle').text(bookTitle);
            $('#bookModalBody').html(`
                <p><strong>Author:</strong> ${book.author}</p>
                <p><strong>Year:</strong> ${book.year}</p>
                <p><strong>Genre:</strong> ${book.genre}</p>
            `);
            $('#bookModal').modal('show');
        }
    });
    
    // Hash table search
    function searchHashTable() {
        const query = document.getElementById('bookSearch').value.trim();
        const resultDiv = document.getElementById('searchResult');
        
        if (!query) {
            resultDiv.innerHTML = '<div class="not-found"><i class="fas fa-exclamation-circle"></i> Please enter a book title</div>';
            return;
        }
        
        if (bookData[query]) {
            const book = bookData[query];
            resultDiv.innerHTML = `
                <div class="search-result">
                    <h5><i class="fas fa-check-circle"></i> "${query}" Found!</h5>
                    <p><strong>Author:</strong> ${book.author}</p>
                    <p><strong>Year:</strong> ${book.year}</p>
                    <p class="mb-0"><strong>Genre:</strong> ${book.genre}</p>
                </div>
            `;
        } else {
            resultDiv.innerHTML = `<div class="not-found"><i class="fas fa-times-circle"></i> "${query}" not found in library</div>`;
        }
    }
    
    // BST search
    function searchBST() {
        const query = document.getElementById('bstSearch').value.trim();
        const resultDiv = document.getElementById('bstSearchResult');
        
        if (!query) {
            resultDiv.innerHTML = '<div class="not-found"><i class="fas fa-exclamation-circle"></i> Please enter a book title</div>';
            return;
        }
        
        const found = bstBooks.includes(query);
        
        if (found) {
            resultDiv.innerHTML = `
                <div class="search-result">
                    <h5><i class="fas fa-check-circle"></i> Searching for "${query}": Found!</h5>
                </div>
            `;
        } else {
            resultDiv.innerHTML = `<div class="not-found"><i class="fas fa-times-circle"></i> Searching for "${query}": Not Found</div>`;
        }
    }
    
    // Enter key support
    $('#bookSearch').keypress(function(e) {
        if (e.which == 13) searchHashTable();
    });
    
    $('#bstSearch').keypress(function(e) {
        if (e.which == 13) searchBST();
    });
</script>

</body>
</html>