<!--<div class="ganti-warna">-->
<!--    <div class="pilihan-warna">-->
<!--        <ul>-->
<!--            --><?php
//            foreach($propertyMap as $key => $rental_unit){
//                $indexOfHyphen = strrpos($rental_unit['title'],'-') + 1;
//                print '<li><a href="'.$rental_unit['url'].'">'.substr($rental_unit['title'],0,$indexOfHyphen).'<span style="display:block;margin-left: 25px;margin-top: -5px">'.substr($rental_unit['title'],$indexOfHyphen).'</span></a></li>';
//            }
//            ?>
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->
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
                <p><?php print $paragraphBeforeFAQs ?></p>
                <?php
                foreach($listOfFAQ as $key => $question_answer){
                    print '<ul class="nav nav-list">';
                    print '<li class="nav-header"> <i class="icon-wrench"></i>'.$question_answer['question'].'</li>';
                    print '</ul>';
                    print '<p>'.$question_answer['answer'].'</p>';
                }
                ?>
                <p><?php print $paragraphAfterFAQs ?></p>

                <?php print $feed_icons; ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div><!-- end container -->
    <div class="footers">
        <?php print render($page['footer']); ?>
    </div>
</div><!-- end isi -->
    <script type="application/javascript">
        $('.carousel').carousel();
    </script>
