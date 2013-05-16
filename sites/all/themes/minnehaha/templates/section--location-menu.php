
    <li class="nav-header">Articles</li>
    <?php print render($page['article_menu']); ?>
    <li class="divider"></li>
    <li class="nav-header">Locations</li>
    <?php
    foreach($propertyMap as $key => $rental_unit){
        print '<li ><a href="'.$rental_unit['url'].'"><i class="icon-home"></i> '.$rental_unit['title'].'</a></li>';
    }
    ?>
    <li class="divider"></li>