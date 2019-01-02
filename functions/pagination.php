<?php
$username = $_SESSION['username'];
if (isset($_GET['pageno'])) {
    $page_number = $_GET['pageno'];
    $_SESSION['page_number'] = $_GET['pageno'];;
} else {
    $_SESSION['page_number'] = 1;
    $page_number = 1;
}

// set the maximum amount of results per page
$no_of_records_per_page = 5;
$offset = ($page_number - 1) * $no_of_records_per_page;

// display the columns name specific to what the page needs
$show_column_name = array("Title", "Author", "Edition", "Year", "Category", "Reserved");

if ($_SESSION['search'] == TRUE) {
    $value_search_category = $_SESSION['search_category'];
    $value_search_input = $_SESSION['search_for'];

    if ($value_search_category == "None") {
        $total_pages_sql = <<<SQL
SELECT *
FROM books
WHERE BookTitle LIKE '%$value_search_input%'
   OR Author LIKE '%$value_search_input%'
SQL;

        $sql = <<<SQL
SELECT ISBN, BookTitle, Author, Edition, Year, CategoryDetails, Reserved
FROM books
       JOIN category c ON books.Category = c.CategoryID
WHERE BookTitle LIKE '%$value_search_input%'
   OR Author LIKE '%$value_search_input%'
ORDER BY Year ASC
LIMIT $offset, $no_of_records_per_page 
SQL;

    } else {
        $total_pages_sql = <<<SQL
SELECT *
FROM books
       JOIN category c ON books.Category = c.CategoryID
WHERE CategoryDetails = '$value_search_category'
SQL;

        $sql = <<<SQL
SELECT ISBN, BookTitle, Author, Edition, Year, CategoryDetails, Reserved
FROM books
       JOIN category c ON books.Category = c.CategoryID
WHERE CategoryDetails = '$value_search_category'
ORDER BY Year ASC
LIMIT $offset, $no_of_records_per_page 
SQL;
    }
    $action = "Reserve";

} else {
    if ($_SESSION['show_all']) {
        $total_pages_sql = "SELECT * FROM books";
        $sql = "SELECT ISBN, BookTitle, Author, Edition, Year, CategoryDetails, Reserved FROM books JOIN category c ON books.Category = c.CategoryID ORDER BY Year ASC LIMIT $offset, $no_of_records_per_page ";
        $action = "Reserve";
    } else {
        $total_pages_sql = "SELECT * FROM reservations WHERE Username ='$_SESSION[username]'";
        $sql = "SELECT reservations.ISBN, BookTitle, Author, Edition, Year, CategoryDetails, ReservationDate FROM reservations JOIN books b ON reservations.ISBN = b.ISBN JOIN category c ON b.Category = c.CategoryID WHERE Username='$_SESSION[username]' LIMIT $offset, $no_of_records_per_page ";
        $action = "Return";
    }
}

// query to get the amount of rows per table
$result = mysqli_query($db, $total_pages_sql);
$total_rows = mysqli_num_rows($result);
$_SESSION['counter'] = $total_rows;
$total_pages = ceil($total_rows / $no_of_records_per_page);

// if query fails, die
$res_data = mysqli_query($db, $sql);
if (!$res_data) {
    die("Error!");
}
?>
<div class="container">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered mb-5">
                <thead class="thead-dark">
                <tr>
                    <?php
                    for ($i = 0; $i < 6; $i++) {
                        echo "<th scope='col'>$show_column_name[$i]</th>";
                    }
                    ?>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_array($res_data)) {
                    echo "<tr>";
                    for ($i = 1; $i < 7; $i++) {
                        if ($row[6] === 'Y' && $_SESSION['action_book'] == "Reserve") {
                            echo "<td class=\"table-secondary\">";
                            echo htmlentities($row[$i]);
                            echo("</td>");
                            continue;
                        } elseif ($row[6] === 'Y' && $_SESSION['action_book'] == "Return") {
                            echo "<td>";
                            echo htmlentities($row[$i]);
                            echo("</td>");
                            continue;
                        } elseif ($row[6] === 'Y' && $_SESSION['search'] == TRUE) {
                            echo "<td class=\"table-secondary\">";
                            echo htmlentities($row[$i]);
                            echo("</td>");
                            continue;
                        }
                        echo "<td>";
                        echo htmlentities($row[$i]);
                        echo("</td>");
                    }
                    if ($row[6] === 'Y' && $_SESSION['action_book'] == "Reserve" && $_SESSION['search'] == FALSE) {
                        echo "<td class=\"table-secondary\">";
                        echo "<a class='btn btn-primary btn-block disabled' href='$_SERVER[PHP_SELF]?action=$action&id=$row[0]'>$action";
                        echo("</td>");
                        echo "</tr>";
                    } elseif ($row[6] === 'Y' && $_SESSION['action_book'] == "Return" && $_SESSION['search'] == FALSE) {
                        echo "<td>";
                        echo "<a class='btn btn-primary btn-block' href='$_SERVER[PHP_SELF]?action=$action&id=$row[0]'>$action";
                        echo("</td>");
                        echo "</tr>";
                    } elseif ($row[6] === 'Y' && $_SESSION['search'] == TRUE) {
                        echo "<td class=\"table-secondary\">";
                        echo "<a class='btn btn-primary btn-block disabled' href='$_SERVER[PHP_SELF]?action=$action&id=$row[0]'>$action";
                        echo("</td>");
                        echo "</tr>";
                    } else {
                        echo "<td>";
                        echo "<a class='btn btn-primary btn-block' href='$_SERVER[PHP_SELF]?action=$action&id=$row[0]'>$action";
                        echo("</td>");
                        echo "</tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--pagination html with php-->
    <div class="row justify-content-center">
        <ul class="pagination mt-3 ">
            <li class="<?php if ($page_number <= 1) {
                echo 'disabled';
            } ?> page-item"><a class="page-link" href="?pageno=1">First</a></li>

            <li class="<?php if ($page_number <= 1) {
                echo 'disabled';
            } ?> page-item">
                <a href="<?php if ($page_number <= 1) {
                    echo '#';
                } else {
                    echo "?pageno=" . ($page_number - 1);
                } ?>" class="page-link">Prev</a>
            </li>

            <li class="page-item active"><a href="<?php echo '#' ?>"
                                            class="page-link "><?php echo $page_number ?></a></li>

            <li class="<?php if ($page_number >= $total_pages) {
                echo 'disabled';
            } ?> page-item">
                <a href="<?php if ($page_number >= $total_pages) {
                    echo '#';
                } else {
                    echo "?pageno=" . ($page_number + 1);
                } ?>" class="page-link">Next</a>
            </li>
            <li class="<?php if ($page_number >= $total_pages) {
                echo 'disabled';
            } ?> page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
        </ul>
    </div>
</div>

