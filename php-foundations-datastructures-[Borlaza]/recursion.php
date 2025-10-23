<?php
/**
 * PART I - RECURSIVE DIRECTORY DISPLAY
 * Digital Library Organizer - Recursion System
 * 
 * This script demonstrates recursive traversal of nested folder structures.
 */

// Nested PHP array representing folder structures
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

/**
 * Recursive function to display library structure with indentation
 * 
 * @param array $library The library array to traverse
 * @param int $indent Current indentation level (in multiples of 4 spaces)
 * @return void
 */
function displayLibrary($library, $indent = 0) {
    foreach ($library as $key => $value) {
        // Generate indentation (4 spaces per level)
        $indentation = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $indent);
        
        // Check if value is an array (contains subcategories or books)
        if (is_array($value)) {
            // Check if the array contains only strings (books) or contains arrays (subcategories)
            $isBookList = true;
            foreach ($value as $item) {
                if (is_array($item)) {
                    $isBookList = false;
                    break;
                }
            }
            
            if ($isBookList) {
                // This is a category with books (leaf level)
                echo $indentation . "<strong>" . htmlspecialchars($key) . "</strong><br>";
                
                // Display each book in this category
                foreach ($value as $book) {
                    echo $indentation . "&nbsp;&nbsp;&nbsp;&nbsp;" . htmlspecialchars($book) . "<br>";
                }
            } else {
                // This is a main category with subcategories
                echo $indentation . "<strong>" . htmlspecialchars($key) . "</strong><br>";
                
                // RECURSIVE CALL - processes the next level with increased indentation
                displayLibrary($value, $indent + 1);
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part I - Recursive Directory Display</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            color: #667eea;
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
            color: #667eea;
            font-size: 1.8em;
            margin-bottom: 20px;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
        }
        
        .output-box {
            background: #f8f9ff;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            line-height: 2;
            color: #333;
        }
        
        .statistics {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 30px;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            background: #667eea;
            color: white;
            padding: 10px 30px;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s;
        }
        
        .back-link a:hover {
            background: #764ba2;
        }
        
        .code-info {
            background: #fffacd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 0.95em;
        }
        
        .code-block {
            background: #f8f9ff;
            border-left: 4px solid #667eea;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            font-size: 0.95em;
            line-height: 1.6;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📚 Part I: Recursive Directory Display</h1>
            <p>Digital Library Organizer - Recursion System</p>
        </div>
        
        <!-- Expected Output Section -->
        <div class="section">
            <h2>Expected Output Format (Project Required)</h2>
            <div class="code-info">
                <strong>📝 Note:</strong> This is the exact format as specified in the project requirements.
                Each indentation level represents one level deeper in the hierarchy.
            </div>
            <div class="output-box">
<?php
// Display the library using the recursive function
displayLibrary($library);
?>
            </div>
        </div>
        
        <!-- Data Structure Section -->
        <div class="section">
            <h2>Library Data Structure</h2>
            <div class="code-info">
                <strong>📝 PHP Array Structure:</strong>
            </div>
            <div class="code-block">
$library = [<br>
&nbsp;&nbsp;"Fiction" => [<br>
&nbsp;&nbsp;&nbsp;&nbsp;"Fantasy" => ["Harry Potter", "The Hobbit"],<br>
&nbsp;&nbsp;&nbsp;&nbsp;"Mystery" => ["Sherlock Holmes", "Gone Girl"]<br>
&nbsp;&nbsp;],<br>
&nbsp;&nbsp;"Non-Fiction" => [<br>
&nbsp;&nbsp;&nbsp;&nbsp;"Science" => ["A Brief History of Time", "The Selfish Gene"],<br>
&nbsp;&nbsp;&nbsp;&nbsp;"Biography" => ["Steve Jobs", "Becoming"]<br>
&nbsp;&nbsp;]<br>
];
            </div>
        </div>
        
        <!-- How Recursion Works Section -->
        <div class="section">
            <h2>How the Recursive Function Works</h2>
            <div class="output-box">
<strong>Function: displayLibrary($library, $indent = 0)</strong><br>
<br>
<strong>Step-by-Step Process:</strong><br>
<br>
1. Loop through each item in the $library array<br>
<br>
2. Generate indentation based on current level<br>
&nbsp;&nbsp;$indentation = str_repeat("&nbsp;", $indent * 4)<br>
<br>
3. Check if value is an array (category or books)<br>
<br>
4a. If it contains only strings → Display category and books<br>
<br>
4b. If it contains arrays → Display category and RECURSIVELY CALL<br>
&nbsp;&nbsp;function with increased indentation ($indent + 1)<br>
<br>
5. The recursion continues until all nested levels are displayed<br>
<br>
<strong>Indentation Levels:</strong><br>
- Level 0 (Main category): No indentation<br>
- Level 1 (Subcategory): 4 spaces<br>
- Level 2 (Books): 8 spaces<br>
            </div>
        </div>
        
        <!-- Recursion Trace Section -->
        <div class="section">
            <h2>Recursion Call Trace</h2>
            <div class="output-box">
<strong>Execution Flow:</strong><br>
<br>
displayLibrary($library, 0)<br>
&nbsp;&nbsp;├─ Print "Fiction" at indent 0<br>
&nbsp;&nbsp;├─ Recursively call displayLibrary(Fiction_array, 1)<br>
&nbsp;&nbsp;│&nbsp;&nbsp;├─ Print "Fantasy" at indent 1<br>
&nbsp;&nbsp;│&nbsp;&nbsp;├─ Print "Harry Potter" at indent 1<br>
&nbsp;&nbsp;│&nbsp;&nbsp;├─ Print "The Hobbit" at indent 1<br>
&nbsp;&nbsp;│&nbsp;&nbsp;├─ Print "Mystery" at indent 1<br>
&nbsp;&nbsp;│&nbsp;&nbsp;├─ Print "Sherlock Holmes" at indent 1<br>
&nbsp;&nbsp;│&nbsp;&nbsp;└─ Print "Gone Girl" at indent 1<br>
&nbsp;&nbsp;│<br>
&nbsp;&nbsp;├─ Print "Non-Fiction" at indent 0<br>
&nbsp;&nbsp;└─ Recursively call displayLibrary(NonFiction_array, 1)<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ Print "Science" at indent 1<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ Print "A Brief History of Time" at indent 1<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ Print "The Selfish Gene" at indent 1<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ Print "Biography" at indent 1<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ Print "Steve Jobs" at indent 1<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ Print "Becoming" at indent 1
            </div>
        </div>
        
        <!-- Statistics Section -->
        <div class="section">
            <h2>Library Statistics</h2>
            <div class="statistics">
                <div class="stat-card">
                    <h3>2</h3>
                    <p>Main Categories</p>
                </div>
                <div class="stat-card">
                    <h3>4</h3>
                    <p>Subcategories</p>
                </div>
                <div class="stat-card">
                    <h3>8</h3>
                    <p>Total Books</p>
                </div>
            </div>
        </div>
        
        <!-- Complexity Analysis Section -->
        <div class="section">
            <h2>Complexity Analysis</h2>
            <div class="output-box">
<strong>Time Complexity: O(n)</strong><br>
where n = total number of items (categories + books)<br>
<br>
The function visits each item exactly once.<br>
In this example: n = 2 + 4 + 8 = 14 items<br>
<br>
<strong>Space Complexity: O(d)</strong><br>
where d = maximum depth of recursion<br>
<br>
Each recursive call adds to the call stack.<br>
In this example: d = 3 levels (main category → subcategory → books)<br>
<br>
Maximum call stack depth = 3 function calls simultaneously
            </div>
        </div>
        
        <!-- Key Concepts Section -->
        <div class="section">
            <h2>Key Recursion Concepts</h2>
            <div class="output-box">
<strong>1. Base Case:</strong><br>
When array contains only strings (books), print them and stop<br>
<br>
<strong>2. Recursive Case:</strong><br>
When array contains arrays (subcategories), print category<br>
and call function again with next indentation level<br>
<br>
<strong>3. Indentation Parameter:</strong><br>
$indent parameter tracks nesting depth<br>
Increases by 1 with each recursive call<br>
<br>
<strong>4. Loop + Recursion:</strong><br>
foreach loop processes items at current level<br>
Recursive call processes nested level<br>
<br>
<strong>5. Termination:</strong><br>
Recursion stops when all nested levels are processed
            </div>
        </div>
        
        <div class="back-link">
            <a href="index.html">← Back to Dashboard</a>
        </div>
    </div>
</body>
</html>