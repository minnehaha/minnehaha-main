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
<?php print '<script src="'.base_path() . path_to_theme() .'/js/featured-review-list.js?v=19"></script>';?>
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
<!--        <g:render template="top_messaging"/>-->
        <div class="span12">
        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="item  active">
                    <?php print '<img src="'.base_path() . path_to_theme() .'/img/minnehaha/slide_1.jpg" alt="">'; ?>
                    <div class="carousel-caption">
                        <h2>Elegance in Design</h2>
                        <p>Elegantly furnished to ensure a comfortable and quality furnished home experience </p>
                    </div>
                </div>
                <div class="item">
                    <?php print '<img src="'.base_path() . path_to_theme() .'/img/minnehaha/slide_2.jpg" alt="">'; ?>
                    <div class="carousel-caption">
                        <h2>Charm</h2>
                        <p>Restoring its original beauty while attaching today's craftsman touch brings a charm to our places that will please you at every moment</p>
                    </div>
                </div>
                <div class="item">
                    <?php print '<img src="'.base_path() . path_to_theme() .'/img/minnehaha/slide_4.jpg" alt="">'; ?>
                    <div class="carousel-caption">
                        <h2>Feel of Home</h2>
                        <p>Furnished with everything one may wish, with your own back yard while located in lovely south minneapolis neighborhood adds a feel of home while away</p>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
            </div>
        </div>

    </div>


<div class="row">
    <div class="span12 batasdot"></div>
    <div class="clearfix"></div>
</div>

<div class="row">
    <div class="span12">
        <div class="well-small">
            <div class="well-header"><h2>Welcome To Minnehaha Lofts</h2></div>

            <div class="row-fluid">
                <div class="span12">We pride ourselves in providing home-like accommodations for our guests while visiting the Twin Cities. Minneahaha Lofts offers beautifully remodeled properties that offer high quality furnishings and are well maintained. Its important for us that our guests have a memoriable furnished home experience.
                </div>
                <div class="clearfix batas"></div>
            </div>
            <div class="row-fluid">
                <?php
                foreach($propertyMap as $key => $rental_unit){
                    print '<div class="span3 sticker">';
                    print '<h4>'.$rental_unit['title'].'</h4>';
                    print '<div class="clearfix batas"></div>';
                    print '<a class="thumbnail">';
                    print '<img src="'.$rental_unit['featuredPhotoUrl'].'" alt="'.$rental_unit['featuredPhotoAlt'].'">';
                    print '</a>';
                    print '<div class="clearfix batas"></div>';
                    print '<p>'.substr($rental_unit['summary'],0,120).'...</p>';
                    print '<div class="clearfix batas"></div>';
                    print '<a class="btn btn-small" href="'.$rental_unit['url'].'"><i class="icon-info-sign"></i> More Info</a>';
                    print '</div>';
                }
                ?>
                <div class="span3 sticker">
                    <?php
                    print '<h4>Meet Your Hosts</h4>';
                    print '<div class="clearfix batas"></div>';
                    print '<a class="thumbnail">';
                        print '<img src="'.$aboutHost['imgUrl'].'" alt="'.$aboutHost['imgAlt'].'">';
                    print '</a>';
                    print '<div class="clearfix batas"></div>';
                    print '<p>'.substr($aboutHost['summary'],0,120).'...</p>';
                    print '<div class="clearfix batas"></div>';
                    print '<a class="btn btn-small" href="'.$aboutHost['url'].'"><i class="icon-info-sign"></i> More Info</a>';
                    ?>
                </div>
                <div class="span6 sticker">
                    <h1 class="subjudul">Minnehaha Lofts Diary</h1>

                    <?php print render($page['diary_list_front']);?>
                    <p>
                        <a class="btn btn-small" href="/diary"><i class="icon-asterisk"></i> Read All</a>
                    </p>
                </div>
                <div class="span5 sticker">
                    <h5><i class=" icon-comment jarak-kecil"></i> Testimonial</h5>
                    <br />
                    <div id="testimonial-list" class="featured-testimonials">
                        <!-- testimonials are appended here -->
                    </div>
                    <p>
                        <?php print '<a class="btn btn-small" href="'.$testimonialUrl.'"><i class="icon-comment"></i> More</a>';?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="main-container container">-->
<!--    <div class="clearfix bataspanjang"></div>-->
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
    <script type="application/javascript">
//        $('.carousel').carousel();
        jQuery('.carousel').carousel();
    </script>
