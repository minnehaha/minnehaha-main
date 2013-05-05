<div class="ganti-warna">
    <div class="pilihan-warna">
        <ul>
            <?php
            foreach($propertyMap as $key => $rental_unit){
                $indexOfHyphen = strrpos($rental_unit['title'],'-') + 1;
                print '<li><a href="'.$rental_unit['url'].'">'.substr($rental_unit['title'],0,$indexOfHyphen).'<span style="display:block;margin-left: 25px;margin-top: -5px">'.substr($rental_unit['title'],$indexOfHyphen).'</span></a></li>';
            }
            ?>
        </ul>
    </div>
</div>
<div class="isi">
    <div class="container">

        <div class="row">

            <?php print render($page['header_logo']); ?>
            <div class="span5 pull-right">
                <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => array('nav nav-pills')))); ?>

            </div>
        </div>

        <div class="row">
            <div class="span12 batas"></div>
            <div class="clearfix"></div>
                <g:render template="top_messaging"/>
            <div class="span12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Home</a> <span class="divider">/</span>
                    </li>
                    <li class="active"><?php print $title; ?></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class='span3'>
                <div class="pagge">
                    <?php print render($title_prefix); ?>
                    <?php if ($title): ?>
                        <h2>Diary</h2>
                    <?php endif; ?>
                    <?php print render($title_suffix); ?>
                    <p>...sharing information about Minnesota</p>
                </div>
            </div>
            <div class='span9'>
                <div class="bga" style="background:url('<?php if(!empty($image_url)){print $image_url;} ?>') no-repeat;">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span12 batasdot"></div>
            <div class="clearfix"></div>
        </div>

        <div class="row">
            <div class="span3">
<!--                --><?php //print render($page['property_menu']); ?>
                <ul class="nav nav-list">
                    <li class="nav-header">Locations</li>
                    <?php
                    foreach($propertyMap as $key => $rental_unit){
                        print '<li ><a href="'.$rental_unit['url'].'"><i class="icon-home"></i> '.$rental_unit['title'].'</a></li>';
                    }
                    ?>
                    <li class="divider"></li>
                </ul>
                <?php print render($page['other_menu']); ?>
            </div>
            <div class="span9">
                <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
                <?php if ($action_links): ?>
                    <ul class="action-links"><?php print render($action_links); ?></ul>
                <?php endif; ?>
                <?php print $feed_icons; ?>
                <div class="pagge"><h2><?php print $title; ?></h2></div>
                <p>
                    <?php if(!empty($basicPagePars[0])){print $basicPagePars[0];}?>
                </p>
                <div class="row">
                    <div class="span3">
                    <?php if(!empty($basicPagePars[1])){print $basicPagePars[1];}?>
                    </div>
                   <?php
                   if(!empty($basicPagePhotos)){
                        foreach($basicPagePhotos as $key=>$pagePhoto){
                            print '<div class="span3">';
                                print '<div class="thumbnail">';
                                    print '<img src="'.$pagePhoto['contentPhotoImgUrl'].'" alt="'.$pagePhoto['contentPhotoImgAlt'].'">';
                                    print '<div class="caption">';
                                        print '<h5>'.$pagePhoto['contentPhotoTitle'].' </h5>';
                                        print '<p>'.$pagePhoto['contentPhotoDescription'].'</p>';
                                    print '</div>';
                                print '</div>';
                            print '</div>';
                        }
                   }?>
                </div>
                <br>
                <?php
                if(!empty($basicPagePars[2])){
                    $sizeOfPars = count($basicPagePars);
                    for ($i=2; $sizeOfPars>=$i; $i++)
                        {
                        print '<p>'.$basicPagePars[$i].'</p>';
                    }
                }
                ?>
                <hr>
                <?php print render($page['content']); ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div><!-- end container -->
    <div class="footers">
        <?php print render($page['footer']); ?>
    </div>
</div><!-- end isi -->
