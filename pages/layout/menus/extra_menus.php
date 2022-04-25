<?php
$id = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id);
?>
<!-- Project Menus -->
<li class="<?php echo $id_url != 101001 && $id_url != 101002 ? 'nav-item menu-close' : 'nav-item menu-open' ?>">
    <a href="#" class="<?php echo $id_url != 101001 && $id_url != 101002 ? 'nav-link' : 'nav-link active' ?>">
        <!-- <i class="nav-icon fa fa-briefcase"></i> -->
        <!-- <i class="nav-icon fas fa-bolt"></i> -->
        <i class="nav-icon fas fa-toolbox"></i>
        <p>
            &nbsp Installation
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../screen/our_project.php?id=101001" class="<?php echo $id_url == 101001 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>All Install Data</p>
            </a>
        </li>
        <?php
        if ($row['level'] == 'Administrator' || $row['level'] == 'Admin Staff') {
        ?>
            <li class="nav-item">
                <a href="../screen/add_project.php?id=101002" class="<?php echo $id_url == 101002 ? 'nav-link active' : 'nav-link' ?>">
                    <i class="fa fa-angle-right nav-icon"></i>
                    <p>Add Installation</p>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</li>
<!-- Client Menus -->
<li class="<?php echo $id_url != 102001 && $id_url != 102002 ? 'nav-item menu-close' : 'nav-item menu-open' ?>">
    <a href="#" class="<?php echo $id_url != 102001 && $id_url != 102002 ? 'nav-link' : 'nav-link active' ?>">
        <i class="nav-icon fa fa-id-card"></i>
        <p>
            &nbsp Customers
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../screen/our_client.php?id=102001" class="<?php echo $id_url == 102001 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>All Customer</p>
            </a>
        </li>
        <?php
        if ($row['level'] != 'Teknisi') {
        ?>
            <li class="nav-item">
                <a href="../screen/add_client.php?id=102002" class="<?php echo $id_url == 102002 ? 'nav-link active' : 'nav-link' ?>">
                    <i class="fa fa-angle-right nav-icon"></i>
                    <p>Add Customer</p>
                </a>
            </li>
        <?php } ?>
    </ul>
</li>
<!-- User Menus -->
<li class="<?php echo $id_url != 103001 && $id_url != 103002 ? 'nav-item menu-close' : 'nav-item menu-open' ?>">
    <a href="#" class="<?php echo $id_url != 103001 && $id_url != 103002 ? 'nav-link' : 'nav-link active' ?>">
        <i class="nav-icon fa fa-user"></i>
        <p>
            &nbsp Users
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../screen/our_user.php?id=103001" class="<?php echo $id_url == 103001 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>All User</p>
            </a>
        </li>
    </ul>
</li>
<!-- Maintenances Menus -->
<li class="<?php echo $id_url != 105001 && $id_url != 105002 && $id_url != 105003 && $id_url != 105004 ? 'nav-item menu-close' : 'nav-item menu-open' ?>">
    <a href="#" class="<?php echo $id_url != 105001 && $id_url != 105002 && $id_url != 105003 && $id_url != 105004 ? 'nav-link' : 'nav-link active' ?>">
        <i class="nav-icon fas fa-tools"></i>
        <p>
            &nbsp Maintenances
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../screen/main_req.php?id=105001" class="<?php echo $id_url == 105001 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>All Maintenance</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../screen/scheduled_detail.php?id=105003" class="<?php echo $id_url == 105003 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Scheduled Visit</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../screen/warranty_detail.php?id=105004" class="<?php echo $id_url == 105004 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Running Out Warranty</p>
            </a>
        </li>
        <?php
        if ($row['level'] == 'Teknisi' || $row['level'] == 'Administrator') {
        ?>
            <li class="nav-item">
                <a href="../screen/add_request.php?id=105002" class="<?php echo $id_url == 105002 ? 'nav-link active' : 'nav-link' ?>">
                    <i class="fa fa-angle-right nav-icon"></i>
                    <p>Request</p>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</li>
<!-- Sales Activity Record Menus -->
<li class="<?php echo
            $id_url != 405001 &&
                $id_url != 405002 &&
                $id_url != 405003 &&
                $id_url != 405004 &&
                $id_url != 405005 &&
                $id_url != 405006 &&
                $id_url != 405007 ? 'nav-item menu-close' : 'nav-item menu-open' ?>">
    <a href="#" class="<?php echo
                        $id_url != 405001 &&
                            $id_url != 405002 &&
                            $id_url != 405003 &&
                            $id_url != 405004 &&
                            $id_url != 405005 &&
                            $id_url != 405006 &&
                            $id_url != 405007 ? 'nav-link' : 'nav-link active' ?>">
        <i class="nav-icon fas fa-book-open"></i>
        <p>
            &nbsp Sales Activity Record
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../screen/tracker.php?id=405001" class="<?php echo $id_url == 405001 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Activity Tracker</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../screen/proposal.php?id=405002" class="<?php echo $id_url == 405002 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Proposal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../screen/presentation.php?id=405003" class="<?php echo $id_url == 405003 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Presentation</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../screen/survey.php?id=405004" class="<?php echo $id_url == 405004 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Survey Activity</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../screen/report.php?id=405005" class="<?php echo $id_url == 405005 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Survey Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../screen/quotation.php?id=405006" class="<?php echo $id_url == 405006 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Quotation</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../screen/purchase_order.php?id=405007" class="<?php echo $id_url == 405007 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Purchase Order</p>
            </a>
        </li>
    </ul>
</li>
<?php
if ($row['level'] == 'Direksi' || $row['level'] == 'Administrator') {
?>
    <!-- Quotes Menus -->
    <li class="<?php echo $id_url != 601101 && $id_url != 601102 ? 'nav-item menu-close' : 'nav-item menu-open' ?>">
        <a href="#" class="<?php echo $id_url != 601101 && $id_url != 601102 ? 'nav-link' : 'nav-link active' ?>">
            <i class="fas fa-quote-right"></i>
            <p>
                &nbsp Weekly Quotes
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="../screen/quotes.php?id=601101" class="<?php echo $id_url == 601101 ? 'nav-link active' : 'nav-link' ?>">
                    <i class="fa fa-angle-right nav-icon"></i>
                    <p>All Quotes</p>
                </a>
            </li>
            <?php
            if ($row['level'] == 'Direksi') {
            ?>
                <li class="nav-item">
                    <a href="../screen/add_quotes.php?id=601102" class="<?php echo $id_url == 601102 ? 'nav-link active' : 'nav-link' ?>">
                        <i class="fa fa-angle-right nav-icon"></i>
                        <p>Add Quotes</p>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </li>
<?php
}
?>
<!-- Relation Menus -->
<li class="<?php echo $id_url != 901001 && $id_url != 901002 ? 'nav-item menu-close' : 'nav-item menu-open' ?>">
    <a href="#" class="<?php echo $id_url != 901001 && $id_url != 901002 ? 'nav-link' : 'nav-link active' ?>">
        <i class="fas fa-project-diagram"></i>
        <p>
            &nbsp;Relations&nbsp;<span class="badge badge-danger">New</span>
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../screen/our_relation.php?id=901001" class="<?php echo $id_url == 901001 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Our Relations</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../screen/add_relation.php?id=901002" class="<?php echo $id_url == 901002 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Add Relation</p>
            </a>
        </li>
    </ul>
</li>
<!-- Attachment Menus -->
<li class="<?php echo $id_url != 9150101 && $id_url != 9150102 ? 'nav-item menu-close' : 'nav-item menu-open' ?>">
    <a href="#" class="<?php echo $id_url != 9150101 && $id_url != 9150102 ? 'nav-link' : 'nav-link active' ?>">
        <i class="fas fa-paperclip"></i>
        <p>
            &nbsp;Attachments&nbsp;<span class="badge badge-danger">New</span>
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../screen/attachments.php?id=9150101" class="<?php echo $id_url == 9150101 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Files</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../screen/attachments.php?id=9150102" class="<?php echo $id_url == 9150102 ? 'nav-link active' : 'nav-link' ?>">
                <i class="fa fa-angle-right nav-icon"></i>
                <p>Upload</p>
            </a>
        </li>
    </ul>
</li>