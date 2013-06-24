<div class="ganti-warna">
    <?php include './'. path_to_theme() .'/templates/section--sticky-property-menu.php';?>
</div>
<div class="isi">
    <div class="container">

        <div class="row">
            <?php include './'. path_to_theme() .'/templates/section--header.php';?>
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
                        <h2><?php print $title; ?></h2>
                    <?php endif; ?>
                    <?php print render($title_suffix); ?>
                    <p><?php if(!empty($page_slogan)){print $page_slogan;} ?></p>
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
                    <?php include './'. path_to_theme() .'/templates/section--location-menu.php';?>
                </ul>
                <?php include './'. path_to_theme() .'/templates/section--other-menu.php';?>
            </div>
            <div class="span9">
                <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
                <?php if ($action_links): ?>
                    <ul class="action-links"><?php print render($action_links); ?></ul>
                <?php endif; ?>
                <?php print $feed_icons; ?>

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
                <hr>
                <?php
                if(!empty($basicPagePars[2])){
                    $sizeOfPars = count($basicPagePars);
                    for ($i=2; $sizeOfPars>=$i; $i++)
                        {
                        if(!empty($basicPagePars[$i])){print '<p>'.$basicPagePars[$i].'</p>';}
                    }
                }
                ?>

                <p>
                    <?php if(!empty($listOfText['description'])){print $listOfText['description'];}?>
                </p>
                <ul style="list-style:none;">
                    <?php
                    if(!empty($listOfText['item'])){
                        foreach($listOfText['item'] as $key=>$item){
                            print '<li><i class="icon-play-circle"></i>'.$item.'</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div><!-- end container -->
    <div class="footers">
        <?php include './'. path_to_theme() .'/templates/section--footer.php';?>
    </div>
</div><!-- end isi -->
