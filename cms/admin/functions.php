<?php

function confirmQuery($result)
{
    //Validation
    global $connection;
    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    }
}

function insert_categories()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat-title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty.";
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";

            $create_category_query = mysqli_query($connection, $query);

            if (!$create_category_query) {
                die('QuErY fAiLeD ' . mysqli_error($connection));
            }
        }
    }
}

function insert_categories_ajax()
{
    global $connection;
    $responseCode = 200;
    if (isset($_POST['categoryName'])) {
        $cat_title = $_POST['categoryName'];

        $message = '';
        if ($cat_title == "" || empty($cat_title)) {
            $message = "This field should not be empty.";
            $responseCode = 409;
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";

            $create_category_query = mysqli_query($connection, $query);
            $message = "Category added successfully";
            $query = "SELECT * FROM categories";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
            if (!$create_category_query) {
                $message = "Failed to add a new category.";
                $responseCode = 500;
            }
        }
    } else {
        $message = 'Invalid request';
    }
    header('Content-Type: application/json');
    http_response_code($responseCode);
    $response = array(
        'message' => $message,
        'tableData' => $row,
    );
    $test = json_encode($response);
    echo json_encode($response);
}

function findAllCategories()
{
    global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function deleteCategories()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $get_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php"); //refreshes the page so the modifications
        //are visible
    }
}