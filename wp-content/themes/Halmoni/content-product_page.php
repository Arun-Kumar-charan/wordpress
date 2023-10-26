<?php
/*
Template Name: Category Products
*/
get_header();
?>

<style>
        /* Add your CSS styling here */
        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 2px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            text-decoration: none;
            cursor: pointer;
        }

        .pagination a.active {
            background-color: #007BFF;
            color: #fff;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        #productDisplay {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<input type="checkbox" id="categoryCheckbox" />
<label for="categoryCheckbox">Filter by Category</label>

<!-- Category dropdown -->
<select id="categorySelect">
    <!-- Add your category options here -->
    <option value="category1">Category 1</option>
    <option value="category2">Category 2</option>
    <option value="category3">Category 3</option>
</select>

<!-- Pagination links -->
<div id="pagination" class="pagination"></div>

<!-- Product display container -->
<div id="productDisplay"></div>

<script>

<?php get_footer(); ?>

