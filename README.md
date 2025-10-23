📚 Digital Library Organizer
A comprehensive PHP system demonstrating three fundamental data structures: Recursion, Hash Tables, and Binary Search Trees applied to a digital library management system.

🎯 Project Purpose
This project simulates a Digital Library Organizer that showcases practical applications of core computer science concepts:

Recursion: Navigate hierarchical folder structures to organize books by categories
Hash Tables (Associative Arrays): Store and retrieve book metadata with O(1) lookup time
Binary Search Trees (BST): Efficiently search and sort books alphabetically with O(log n) operations

Learning Objectives
✅ Apply recursion to solve hierarchical problems
✅ Understand how hash tables provide constant-time data access
✅ Implement binary search trees for efficient searching and sorting
✅ Strengthen algorithmic thinking and problem-solving skills in PHP
✅ Build responsive web applications with Bootstrap 4

📁 Project Structure
php-foundations-datastructures-[YourName]/
│
├── index.html              # Landing page dashboard
├── recursion.php           # Part I: Recursive folder navigation
├── hashtable.php           # Part II: Hash table book lookups
├── bst.php                 # Part III: Binary search tree operations
├── main.php                # Part IV: Integrated system (Bootstrap 4)
└── README.md               # This file

🚀 How to Run
Prerequisites

PHP 7.0 or higher
Web browser (Chrome, Firefox, Safari, Edge)
Terminal/Command Prompt access

Quick Start
Option 1: PHP Built-in Server (Recommended)
bash# Navigate to project folder
cd path/to/php-foundations-datastructures-[YourName]

# Start PHP server
php -S localhost:8000

# Open browser and go to:
http://localhost:8000
Option 2: XAMPP/WAMP

Copy project folder to C:\xampp\htdocs\ (Windows) or /Applications/MAMP/htdocs/ (Mac)
Start Apache in XAMPP/MAMP Control Panel
Open browser and go to: http://localhost/php-foundations-datastructures-[YourName]


📖 Running Each Part
Part I: Recursive Directory Display
File: recursion.php
Purpose: Demonstrates recursive traversal of nested folder structures representing library categories.
How to Run:
bash# Direct access
http://localhost:8000/recursion.php
What It Does:

Displays hierarchical book organization using recursion
Shows proper indentation for nested categories
Traverses Fiction → Fantasy → Books structure
Calculates statistics (total items, max depth)

Expected Output:
Fiction
    Fantasy
        Harry Potter
        The Hobbit
    Mystery
        Sherlock Holmes
        Gone Girl
Non-Fiction
    Science
        A Brief History of Time
        The Selfish Gene
    Biography
        Steve Jobs
        Becoming
Key Features:

✅ Recursive function displayLibrary($library, $indent = 0)
✅ Nested PHP arrays for folder structure
✅ Indentation using &nbsp; for hierarchy
✅ Time Complexity: O(n)
✅ Space Complexity: O(d) where d = max depth


Part II: Hash Table for Book Details
File: hashtable.php
Purpose: Demonstrates O(1) constant-time lookups using PHP associative arrays.
How to Run:
bash# Direct access
http://localhost:8000/hashtable.php
What It Does:

Stores book metadata (author, year, genre)
Provides instant search functionality
Displays all books in responsive grid
Shows hash table statistics

Expected Output:
✅ Harry Potter
Author: J.K. Rowling
Year: 1997
Genre: Fantasy

❌ The Matrix - Book not found
Key Features:

✅ Function getBookInfo($title, $bookInfo)
✅ Interactive search bar
✅ O(1) average lookup time
✅ Book cards with complete metadata
✅ Click-to-view functionality


Part III: Binary Search Tree for Book Titles
File: bst.php
Purpose: Implements BST for efficient searching and alphabetical ordering.
How to Run:
bash# Direct access
http://localhost:8000/bst.php
What It Does:

Inserts books into BST maintaining alphabetical order
Searches for books with O(log n) efficiency
Displays books alphabetically using inorder traversal
Interactive search functionality

Expected Output:
Inorder Traversal (Alphabetical):

1. 1984
2. A Brief History of Time
3. Becoming
4. Gone Girl
5. Harry Potter
6. Sherlock Holmes
7. Steve Jobs
8. The Hobbit

Searching for "The Hobbit": ✅ Found!
Searching for "Inferno": ❌ Not Found
Key Features:

✅ Node class with $data, $left, $right
✅ BinarySearchTree class with methods:

insert($data) - Add book
search($data) - Find book
inorderTraversal() - Alphabetical display


✅ O(log n) average search time
✅ Interactive search bar


Part IV: Integrated System (Bonus)
File: main.php
Purpose: Combines all three parts into one responsive Bootstrap 4 system.
How to Run:
bash# Direct access
http://localhost:8000/main.php
What It Does:

Single-page application with navigation
All three data structures integrated
Responsive Bootstrap 4 design
Interactive modals and search
Professional UI/UX

Key Features:

✅ Navigation menu between pages
✅ Click books in recursion to see details
✅ Search functionality on all pages
✅ Responsive grid layout
✅ Bootstrap cards, modals, alerts
✅ Font Awesome icons

Pages Available:

Home: ?page=home
Recursion: ?page=recursion
Hash Table: ?page=hashtable
BST: ?page=bst

🎨 Screenshots
Landing Page
┌─────────────────────────────────────────┐
│   📚 Digital Library Organizer          │
│   Data Structures in PHP                │
├─────────────────────────────────────────┤
│                                         │
│  ┌─────────┐  ┌─────────┐  ┌─────────┐│
│  │  🔄     │  │  🔍     │  │  🌳     ││
│  │Recursion│  │Hash Tbl │  │  BST    ││
│  │         │  │         │  │         ││
│  │  O(n)   │  │  O(1)   │  │O(log n) ││
│  └─────────┘  └─────────┘  └─────────┘│
│                                         │
└─────────────────────────────────────────┘
Recursion Page
┌─────────────────────────────────────────┐
│ Part I: Recursive Directory Display     │
├─────────────────────────────────────────┤
│ Library Structure:                      │
│                                         │
│ Fiction                                 │
│     Fantasy                             │
│         Harry Potter                    │
│         The Hobbit                      │
│     Mystery                             │
│         Sherlock Holmes                 │
│         Gone Girl                       │
│ Non-Fiction                             │
│     Science                             │
│         A Brief History of Time         │
│         The Selfish Gene                │
│     Biography                           │
│         Steve Jobs                      │
│         Becoming                        │
└─────────────────────────────────────────┘
Hash Table Page
┌─────────────────────────────────────────┐
│ Part II: Hash Table for Book Details    │
├─────────────────────────────────────────┤
│ Search: [Harry Potter        ] [Search] │
│                                         │
│ ✅ Book Details for: "Harry Potter"    │
│    Author: J.K. Rowling                 │
│    Year: 1997                           │
│    Genre: Fantasy                       │
│                                         │
│ All Books in Library:                   │
│ ┌──────────┐ ┌──────────┐ ┌──────────┐│
│ │Harry     │ │The Hobbit│ │Sherlock  ││
│ │Potter    │ │          │ │Holmes    ││
│ └──────────┘ └──────────┘ └──────────┘│
└─────────────────────────────────────────┘
BST Page
┌─────────────────────────────────────────┐
│ Part III: Binary Search Tree            │
├─────────────────────────────────────────┤
│ Search: [The Hobbit        ] [Search]   │
│                                         │
│ ✅ Searching for "The Hobbit": Found!  │
│                                         │
│ Inorder Traversal (Alphabetical):       │
│ 1. 1984                                 │
│ 2. A Brief History of Time              │
│ 3. Becoming                             │
│ 4. Gone Girl                            │
│ 5. Harry Potter                         │
│ 6. Sherlock Holmes                      │
│ 7. Steve Jobs                           │
│ 8. The Hobbit                           │
└─────────────────────────────────────────┘

