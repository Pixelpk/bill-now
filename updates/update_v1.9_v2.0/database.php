<?php
session_start();
error_reporting(0);

$db_config_path = '../application/config/database.php';

if (!isset($_SESSION["license_code"])) {
    $_SESSION["error"] = "Invalid purchase code!";
    header("Location: index.php");
    exit();
}

if (isset($_POST["btn_admin"])) {

    $_SESSION["db_host"] = $_POST['db_host'];
    $_SESSION["db_name"] = $_POST['db_name'];
    $_SESSION["db_user"] = $_POST['db_user'];
    $_SESSION["db_password"] = $_POST['db_password'];


    /* Database Credentials */
    defined("DB_HOST") ? null : define("DB_HOST", $_SESSION["db_host"]);
    defined("DB_USER") ? null : define("DB_USER", $_SESSION["db_user"]);
    defined("DB_PASS") ? null : define("DB_PASS", $_SESSION["db_password"]);
    defined("DB_NAME") ? null : define("DB_NAME", $_SESSION["db_name"]);

    /* Connect */
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $connection->query("SET CHARACTER SET utf8");
    $connection->query("SET NAMES utf8");

    /* check connection */
    if (mysqli_connect_errno()) {
        $error = 0;
    } else {
        
        mysqli_query($connection, "UPDATE settings SET version = '2.0' WHERE id = 1;");

        mysqli_query($connection, "ALTER TABLE `country` ADD `user_id` INT NULL DEFAULT '0' AFTER `currency_code`;");

        mysqli_query($connection, "ALTER TABLE `invoice` ADD `is_view` INT NULL AFTER `frequency_count`, ADD `view_date` DATETIME NULL AFTER `is_view`;");

        mysqli_query($connection, "INSERT INTO `package_features` (`id`, `name`, `slug`, `basic`, `standared`, `premium`, `year_basic`, `year_standared`, `year_premium`, `type`, `text`) VALUES (NULL, 'Multi User Roles', 'user-roles', '2', '2', '2', '10', '20', '30', NULL, NULL);");

        // import database table
        $query = '';
          $sqlScript = file('sql/users_role.sql');
          foreach ($sqlScript as $line) {
            
            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);
            
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
              continue;
            }
              
            $query = $query . $line;
            if ($endWith == ';') {
              mysqli_query($connection, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
              $query= '';   
            }
        }

        // import database table
        $query = '';
          $sqlScript = file('sql/users_role_feature.sql');
          foreach ($sqlScript as $line) {
            
            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);
            
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
              continue;
            }
              
            $query = $query . $line;
            if ($endWith == ';') {
              mysqli_query($connection, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
              $query= '';   
            }
        }

        // import database table
        $query = '';
          $sqlScript = file('sql/users_role_feature_assign.sql');
          foreach ($sqlScript as $line) {
            
            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);
            
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
              continue;
            }
              
            $query = $query . $line;
            if ($endWith == ';') {
              mysqli_query($connection, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
              $query= '';   
            }
        }




        mysqli_query($connection, "INSERT INTO `lang_values` (`id`, `type`, `label`, `keyword`, `english`) VALUES
        (664, 'user', 'Position at the business', 'position-at-the-business', 'Position at the business'),
        (665, 'user', 'User Role', 'user-role', 'User Role'),
        (666, 'user', 'Role', 'role', 'Role'),
        (667, 'user', 'Editor', 'editor', 'Editor'),
        (668, 'user', 'Viewer/Assesor', 'viewerassesor', 'Viewer/Assesor'),
        (669, 'user', 'Viewer', 'viewer', 'Viewer'),
        (670, 'user', 'Admin Permissions', 'admin-permissions', 'Admin Permissions'),
        (671, 'user', 'Best for a business partner, family member, or trusted accountant manager', 'admin-permissions-info', 'Best for a business partner, family member, or trusted accountant manager'),
        (672, 'user', 'View Only', 'view-only', 'View Only'),
        (673, 'user', 'Full access', 'full-access', 'Full access'),
        (674, 'user', 'No Access', 'no-access', 'No Access'),
        (675, 'user', 'Editor Permissions', 'editor-permissions', 'Editor Permissions'),
        (676, 'user', 'Best for a bookkeeper or accountant manager', 'editor-permissions-info', 'Best for a bookkeeper or accountant manager'),
        (677, 'user', 'Viewer Permissions', 'viewer-permissions', 'Viewer Permissions'),
        (678, 'user', 'Best for anyone who needs view-only access', 'viewer-permissions-info', 'Best for anyone who needs view-only access'),
        (679, 'user', 'Permissions', 'permissions', 'Permissions'),
        (680, 'user', 'Owner', 'owner', 'Owner'),
        (681, 'user', 'Joined', 'joined', 'Joined'),
        (682, 'user', 'Assign Role Permissions', 'assign-role-permissions', 'Assign Role Permissions'),
        (683, 'user', 'Role Management', 'role-management', 'Role Management'),
        (684, 'user', 'Oops! Invalid invitation', 'oops-invalid-invitation', 'Oops! Invalid invitation'),
        (685, 'user', 'This invitation to collaborate in ', 'this-invitation-to-collaborate-in', 'This invitation to collaborate in '),
        (686, 'user', 'is expired or has been already used.', 'is-expired-or-has-been-already-used', 'is expired or has been already used.'),
        (687, 'user', 'Accept Invitation', 'accept-invitation', 'Accept Invitation'),
        (688, 'user', 'Setup your password to collaborate in', 'setup-your-password-to-collaborate', 'Setup your password to collaborate in'),
        (689, 'user', 'Add new user', 'add-new-user', 'Add new user'),
        (690, 'admin', 'Create New', 'create-new', 'Create New'),
        (691, 'admin', 'Countries', 'countries', 'Countries'),
        (692, 'admin', 'Country', 'country', 'Country'),
        (693, 'admni', 'Country Code', 'country-code', 'Country Code'),
        (694, 'admin', 'Currency Name', 'currency-name', 'Currency Name'),
        (695, 'admin', 'Currency Code', 'currency-code', 'Currency Code'),
        (696, 'admin', 'Currency Symbol', 'currency-symbol', 'Currency Symbol'),
        (698, 'admin', 'Delete Confirmation', 'delete-confirmation', 'Delete Confirmation'),
        (699, 'admin', 'Are you sure want to delete this business', 'sure-delete-business', 'Are you sure want to delete this business'),
        (700, 'admin', 'permanently', 'permanently', 'permanently'),
        (701, 'admin', 'This may affect your reports, customers, invoices, estimates, bills', 'affect-business', 'This may affect your reports, customers, invoices, estimates, bills'),
        (702, 'admin', 'Role Permissions', 'role-permissions', 'Role Permissions'),
        (703, 'front', 'Not Viewed Yet', 'not-viewed', 'Not Viewed Yet'),
        (704, 'admin', 'Add Product for both type (Sales & Purchases)', 'product-both', 'Add Product for both type (Sales & Purchases)'),
        (705, 'user', 'Payment Records', 'payment-records', 'Payment Records'),
        (706, 'user', 'Edit Payment', 'edit-payment', 'Edit Payment'),
        (707, 'admin', 'Manage Users', 'manage-users', 'Manage Users'),
        (708, 'front', 'Invoice templates', 'invoice_template', 'Invoice templates'),
        (709, 'front', 'Get Invoice Payment via Paypal/stripe', 'invoice-payments', 'Get Invoice Payment via Paypal/stripe'),
        (710, 'front', 'Multi User Roles', 'user-roles', 'Multi User Roles');");


        

      /* close connection */
      mysqli_close($connection);

      $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
      $redir .= "://" . $_SERVER['HTTP_HOST'];
      $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
      $redir = str_replace('updates/update_v1.9_v2.0/', '', $redir);
      header("refresh:5;url=" . $redir);
      $success = 1;
    }



}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accufy &bull; Update Installer</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/libs/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,500,600,700&display=swap" rel="stylesheet">
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-md-offset-2">

                <div class="row">
                    <div class="col-sm-12 logo-cnt">
                        <p>
                           <img src="assets/img/logo.png" alt="">
                       </p>
                       <h1>Welcome to the update installer</h1>
                   </div>
               </div>

               <div class="row">
                <div class="col-sm-12">

                    <div class="install-box">

                        <div class="steps">
                            <div class="step-progress">
                                <div class="step-progress-line" data-now-value="100" data-number-of-steps="3" style="width: 100%;"></div>
                            </div>
                            <div class="step" style="width: 50%">
                                <div class="step-icon"><i class="fa fa-arrow-circle-right"></i></div>
                                <p>Start</p>
                            </div>
                            <div class="step active" style="width: 50%">
                                <div class="step-icon"><i class="fa fa-database"></i></div>
                                <p>Database</p>
                            </div>
                        </div>

                        <div class="messages">
                            <?php if (isset($message)) { ?>
                            <div class="alert alert-danger">
                                <strong><?php echo htmlspecialchars($message); ?></strong>
                            </div>
                            <?php } ?>
                            <?php if (isset($success)) { ?>
                            <div class="alert alert-success">
                                <strong>Completing Updates ... <i class="fa fa-spinner fa-spin fa-2x fa-fw"></i> Please wait 5 second </strong>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="step-contents">
                            <div class="tab-1">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <div class="tab-content">
                                        <div class="tab_1">
                                            <h1 class="step-title">Database</h1>
                                            <div class="form-group">
                                                <label for="email">Host</label>
                                                <input type="text" class="form-control form-input" name="db_host" placeholder="Host"
                                                value="<?php echo isset($_SESSION["db_host"]) ? $_SESSION["db_host"] : 'localhost'; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Database Name</label>
                                                <input type="text" class="form-control form-input" name="db_name" placeholder="Database Name" value="<?php echo @$_SESSION["db_name"]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Username</label>
                                                <input type="text" class="form-control form-input" name="db_user" placeholder="Username" value="<?php echo @$_SESSION["db_user"]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Password</label>
                                                <input type="password" class="form-control form-input" name="db_password" placeholder="Password" value="<?php echo @$_SESSION["db_password"]; ?>">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="buttons">
                                        <a href="index.php" class="btn btn-success btn-custom pull-left">Prev</a>
                                        <button type="submit" name="btn_admin" class="btn btn-success btn-custom pull-right">Finish</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </div>


    </div>


</div>

<?php

unset($_SESSION["error"]);
unset($_SESSION["success"]);

?>

</body>
</html>

