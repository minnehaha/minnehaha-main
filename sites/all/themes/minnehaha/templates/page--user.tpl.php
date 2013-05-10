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
<script>
    //    @ToDo this need to be moved into cache
    var propertyTestimonialPhotoMap = Array();
    <?php
    foreach($propertyMap as $key=>$property){
       print 'propertyTestimonialPhotoMap.add({"id":"'.$property['universalId'].'","url":"'.$property['featuredTestimonialPhotoUrl'].'", "alt":"'.$property['featuredTestimonialPhotoAlt'].'"});';
    }
    ?>
    var finalTestimonialMap = propertyTestimonialPhotoMap.groupBy(function(n) {
        return n.id;
    });
</script>
<?php print '<script src="'.base_path() . path_to_theme() .'/js/review-list.js?v=37"></script>';?>
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
                    <li class="active">Guest Account</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class='span3'>
                <div class="pagge">
                    <?php print render($title_prefix); ?>
                    <?php if ($title): ?>
                        <h2>Guest Account</h2>
                    <?php endif; ?>
                    <?php print render($title_suffix); ?>
                    <p>...guest login and profile information</p>
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
                    <?php if (!empty($page['highlighted'])): ?>
                        <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
                    <?php endif; ?>
                    <a id="main-content"></a>
                    <?php print $messages; ?>
                    <?php if (!empty($tabs)): ?>
                        <?php print render($tabs); ?>
                    <?php endif; ?>
                    <?php if (!empty($page['help'])): ?>
                        <div class="well"><?php print render($page['help']); ?></div>
                    <?php endif; ?>
                    <?php if (!empty($action_links)): ?>
                        <ul class="action-links"><?php print render($action_links); ?></ul>
                    <?php endif; ?>
                    <?php print render($page['content']); ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div><!-- end container -->
    <div class="footers">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <h2>Minnehaha<i>Lofts</i></h2>
                </div>
                <div class="span4">
                    <h2><i class="icon-globe icon-white jarak-kecil"></i>Social Networking</h2>
                    <p>
                        <i class="icon-twitter icon-white"></i> <a href="https://twitter.com/minnehahalofts" target="_blank">Follow Us on Twitter</a><i></i>
                    </p>
                    <p>
                        <i class="icon-fb icon-white"></i> <a href="http://www.facebook.com/minnehahalofts" target="_blank">MinnehahaLofts on Facebook</a>
                    </p>
                    <p>
                        <i class="icon-gp icon-white"></i> <a href="https://plus.google.com/u/0/b/100411277821392796298/100411277821392796298/posts" target="_blank">MinnehahaLofts on Google+</a>
                    </p>
                </div>
                <div class="span4">
                    <div id="inquiry-form-small">
                        <div class="message-section">
                            <div class="alert alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        </div>
                        <h2><i class="icon-envelope icon-white jarak-kecil"></i>Inquire</h2>
                        <p><textarea rows="3" id="inqContent" name="inqContent">Type your inquiry here.</textarea></p>
                        <div class="input-prepend">
                            <span class="add-on">E-Mail</span><input class="span2" id="userEmail" name="userEmail" size="16" type="text" >
                            <a class="btn btn-success" id="submitInq" href="#"><i class="icon-ok icon-white"></i>Inquire</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <footer><p>copyright <span class="minilogo">&nbsp;Minnehaha<i>Lofts</i></span> &copy; 2012. Created by : <a href="http://www.kapasoft.com">KapaSoft</a></p</footer>
        </div>
    </div>
</div><!-- end isi -->
