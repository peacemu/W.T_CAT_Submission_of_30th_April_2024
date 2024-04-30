<?php 
 
?>
<div class="sidebar">
        <div class="side-header">
            <h3>Milk Processing system</h3>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(<?php echo $_SESSION['image']; ?>)"></div>
                <h4><?php //echo $_SESSION['name']; ?></h4>
                <small><?php echo $_SESSION['names']; ?></small>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="./" class="active">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                <?php if($_SESSION['role']!='distributer'){ ?>    <li>
                       <a href="./?page=distributers">
                            <span class="las la-user-alt"></span>
                            <small>Distributers</small>
                        </a>
                    </li>
                    <?php } ?>
                    <li>
                       <a href="./?page=sales">
                            <span class="las la-envelope"></span>
                            <small>Sales</small>
                        </a>
                    </li>
                    <li>
                       <a href="./?page=orders">
                            <span class="las la-clipboard-list"></span>
                            <small>Orders
                            </small>
                        </a>
                    </li>
                    
                    <li>
                       <a href="./?page=products">
                            <span class="las la-tasks"></span>
                            <small>Products</small>
                        </a>
                    </li>
                    <li>
                       <a href="./?page=clients">
                            <span class="las la-tasks"></span>
                            <small>Clients</small>
                        </a>
                    </li>
                    <?php if($_SESSION['role']!='distributer'){ ?>        <li>
                       <a href="./?page=payments">
                            <span class="las la-tasks"></span>
                            <small>Payments</small>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    