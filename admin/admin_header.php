 <!---------------- HEADER ---------------->
 <form action="" method="post" id="my form">
        <header class="header" id="header">
            <nav class="nav container">
                <div class="nav__logo">
                    <img src="../asset/phone.png" alt="header logo" class="header_logo">
                </div>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="../admin/admin_dashboard.php" class="nav__link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="../readapi/admin_read.php" class="nav__link">Products</a>
                        </li>
                        <li class="nav__item">
                            <a href="orders_admin.php" class="nav__link">Orders</a>
                        </li>
                        <li class="nav__item">
                            <a href="users_admin.php" class="nav__link">Users</a>
                        </li>
                        <li class="nav__item">
                            <a href="message_admin.php" class="nav__link">Message</a>
                        </li>
                    </ul>
                </div>

                <div class="nav__icon">
                    <i class="ri-user-fill"></i>
                </div>
            </nav>
        </header>
    </form>

<style>
    .header_logo{
        padding-top: 5px;
        width: 50%;
        height: 50%;
    }
</style>