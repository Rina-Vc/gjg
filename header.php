<div id="block-body">

    <!-- //  в тегах header прописана наша шапка  -->

    <header>

        <!-- // разметка для логотипа -->
        <?php
        if(count($_SESSION) > 0 && $_SESSION['flag']){ ?>
            <div class='logo'>
                    <a href="/">

                        <span class="use">ФОТО</span> - <span class="web">СФЕРА</span>.ru

                    </a>
                <?php
                echo '<div class="logo"><p style="color: whitesmoke">' . $_SESSION['fullName'] . '</p></div>';
                ?>
                </div>
            <?php } else {?>
                <div class="logo">
                    <a href="/">
                        <span class="use">ФОТО</span> - <span class="web">СФЕРА</span>.ru
                    </a>
                </div>

            <?php }


            if(count($_SESSION) > 0 && $_SESSION['flag'] && $_SESSION['roleId'] == 3){ ?>
                <div class="top-menu">
                     <ul>
                         <li><a  href="/index/requests/table.php">Заявки</a></li>
                         <li><a href="/index/history/table.php">История</a></li>
                         <li><a href="/index/services/table.php">Услуги</a></li>
                         <li><a href="/index/categories/table.php">Категории</a></li>
                         <li><a href="/index/users/table.php">Сотрудники</a></li>
                     </ul>

                   </div>
            <?php };
        if(count($_SESSION) > 0 && $_SESSION['flag'] && $_SESSION['roleId'] == 2){ ?>
            <div class="top-menu">
                <ul>
                    <li><a  href="/index/requests/table.php">Заявки</a></li>
                    <li><a href="/index/services/table.php">Услуги</a></li>
                    <li><a href="/index/categories/table.php">Категории</a></li>
                </ul>

            </div>
        <?php }; ?>

        <?php

            if(count($_SESSION) > 0 && $_SESSION['flag']){
        ?>


         <div class="block-top-auth">
             <p><a href="/includes/logout.php">Выйти</a></p>
         </div>
                <div class="block-top-auth">
                    <p><a href="/cart/formCart.php">Оформить заяку</a></p>
                </div>

        <?php } ?>
    </header>

    <div id="block-content"></div>

</div>
