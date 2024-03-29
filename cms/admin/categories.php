<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to the administration area
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php insert_categories(); ?>

                        <form id="add-category" action="" method="post">
                            <div class="messages">

                            </div>
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input class="form-control" type="text" name="cat-title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <?php
                        //Update and include query
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include "includes/update_categories.php";
                        }
                        ?>

                    </div> <!--Add category form -->

                    <div class="col-xs-6">

                        <table class="table table-bordered table-hover" id="cat_table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            //Find all categories query
                            findAllCategories();
                            ?>

                            <?php
                            //Delete query
                            deleteCategories();
                            ?>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>