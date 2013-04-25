<div class="ganti-warna">
    <div class="pilihan-warna">
        <ul>
            <?php
            foreach($propertyMenu as $key => $rental_unit){
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
                    <li class="active">
                        <?php if($title){print $title;} ?>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class='span3'>
                <div class="pagge">
                    <h2><?php print $property_character ?></h2>
                    <p><?php print $property_slogan; ?></p>
                </div>
            </div>
            <div class='span9'>
                <ul class="thumbnails">
                    <li class="span3">
                        <a href="#" class="thumbnail">
                            <img src="<?php print $propertyPhotos[0]['url'];?>"
                                 alt="<?php print $propertyPhotos[0]['alt'];?>">
                        </a>
                    </li>
                    <li class="span3">
                        <a href="#" class="thumbnail">
                            <img src="<?php print $propertyPhotos[1]['url'];?>"
                                 alt="<?php print $propertyPhotos[1]['alt'];?>">
                        </a>
                    </li>
                    <li class="span3">
                        <a href="#" class="thumbnail">
                            <img src="<?php print $propertyPhotos[2]['url'];?>"
                                 alt="<?php print $propertyPhotos[2]['alt'];?>">
                        </a>
                    </li>
                    <li class="span3">
                        <a href="#" class="thumbnail">
                            <img src="<?php print $propertyPhotos[3]['url'];?>"
                                 alt="<?php print $propertyPhotos[3]['alt'];?>">
                        </a>
                    </li>
                    <li class="span3">
                        <a href="#" class="thumbnail">
                            <img src="<?php print $propertyPhotos[4]['url'];?>"
                                 alt="<?php print $propertyPhotos[4]['alt'];?>">
                        </a>
                    </li>
                    <li class="span3">
                        <a href="#" class="thumbnail">
                            <img src="<?php print $propertyPhotos[5]['url'];?>"
                                 alt="<?php print $propertyPhotos[5]['alt'];?>">
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="span12 batasdot"></div>
            <div class="clearfix"></div>
        </div>


        <div class="row">
            <div class="span3">
                <ul class="nav nav-list">
                    <li class="nav-header">About <?php print $fieldPropertyType;?></li>
                    <li class="active"><a href="#about" data-toggle="tab"><i class="icon-info-sign"></i> About</a></li>
                    <li><a href="#map" data-toggle="tab"><i class="icon-map-marker"></i> Map</a></li>
                    <li><a href="#price" data-toggle="tab"><i class="icon-briefcase"></i> Price</a></li>
                    <li><a href="#availability" data-toggle="tab"><i class="icon-zoom-in"></i> Availability</a></li>
                    <li><a href="#unit-inquiry" data-toggle="tab"><i class="icon-question-sign"></i> Inquire</a></li>
                    <li><a href="#unit-testimonial" data-toggle="tab"><i class="icon-comment"></i> Testimonials</a></li>
                    <li><a href="#leave-testimonial" data-toggle="tab"><i class="icon-pencil"></i>Leave Testimonial</a></li>
                    <li class="divider"></li>
                </ul>
                <ul class="nav nav-list">
                    <li class="nav-header">Other</li>
                    <?php
                    foreach($propertyMenuWithoutThis as $key => $rental_unit){
                        print '<li><a href="'.$rental_unit['url'].'"><i class="icon-home"></i>'.$rental_unit['title'].'</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="about">
                    <div class="span9">
                        <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
                        <?php if ($action_links): ?>
                            <ul class="action-links"><?php print render($action_links); ?></ul>
                        <?php endif; ?>
                        <?php
                        hide($content['field_title_description']);
                        print render($page['content']);
                        ?>
                        <?php print $feed_icons; ?>
                        <p>
                            <?php print $propertyParagraphs[0];?>
                        </p>
                        <div class="row">
                            <div class="span3">
                                <?php print $propertyParagraphs[1];?>
                            </div>
                            <div class="span3">
                                <div class="thumbnail">
                                    <img src="<?php print $contentPhotoImageUrl1; ?>"
                                         alt="<?php print $contentPhotoImageAlt1; ?>">
                                    </a>
                                    <div class="caption">
                                        <h5><?php print $contentPhotoTitle1; ?> </h5>
                                        <p><?php print $contentPhotoDescription1 ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="thumbnail">
                                    <img src="<?php print $contentPhotoImageUrl2?>"
                                         alt="<?php print $contentPhotoImageAlt2; ?>">
                                    <div class="caption">
                                        <h5><?php print $contentPhotoTitle2; ?></h5>
                                        <p><?php print $contentPhotoDescription2; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php
                        $sizeOfPars = count($propertyParagraphs);
                        for ($i=2; $sizeOfPars>=$i; $i++)
                        {
                            print '<p>'.$propertyParagraphs[$i].'</p>';
                        }
                        ?>
                        <hr>
                        <p>
                            Features and amenities
                        </p>
                        <ul style="list-style:none;">
                            <?php
                            $sizeOfAmenities = count($propertyFeatures);
                            for ($i = 0; $sizeOfAmenities > $i; $i++)
                            {
                                print '<li><i class="icon-play-circle"></i>'.$propertyFeatures[$i].'</li>';
                            }
                            ?>

                        </ul>

                       <?php print $fieldPropertyOtherInfo;?>
                    </div>
                </div>
                <div class="tab-pane" id="map">
                    <div class="span9">
                        <div class=span9 style="padding:0;margin: 0">
                            <iframe width="100%" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=3324+23rd+Ave+S,+Minneapolis,+mn+55407&amp;aq=&amp;sll=44.970697,-93.261478&amp;sspn=0.411942,0.952377&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=3324+23rd+Ave+S,+Minneapolis,+Hennepin,+Minnesota+55407&amp;ll=44.966377,-93.261223&amp;spn=0.058298,0.102825&amp;z=13&amp;iwloc=A&amp;output=embed"></iframe>
                        </div>

                        <div class="row">
                            <div class="span12 batasdot"></div>
                            <div class="clearfix"></div>
                        </div>
                        <dl class="dl-horizontal">
                            <dt>Located: </dt>
                            <dd>
                                <address>
                                    <?php print $fieldPropertyAddress;?>
                                </address>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="tab-pane" id="price">
                    <div class="span9">
                        <table class="table">
                            <?php print "<tr><td>High Season</td><td>".$fieldHighSeasonDates."</td><td>".$fieldHighSeasonDailyRate."</td><td>".$fieldHighSeasonWeeklyRate."</td><td>".$fieldHighSeasonMonthlyRate."</td></tr>";
                                  print "<tr><td>Low Season</td><td>".$fieldLowSeasonDates."</td><td>".$fieldLowSeasonDailyRate."</td><td>".$fieldLowSeasonWeeklyRate."</td><td>".$fieldLowSeasonMonthlyRate."</td></tr>";
                                  print "<tr><td>Cleaning Fee</td><td colspan=\"4\">".$fieldCleaningFee."</td></tr>";?>
                            <tr><td>Min Stay</td><td colspan="4">2 nights</td></tr>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="availability">
                    <div class="span9">
                        ..online calendar is coming soon. Please call 612-234-STAY (7829) or <button class="btn">Submit Inquiry</button>
                    </div>
                </div>
                <div class="tab-pane" id="unit-inquiry">
                    <div class="span9">
                        <?php print render($page['unit_inquiry']); ?>
                    </div>
                </div>
                <div class="tab-pane" id="unit-testimonial">
                    <div class="span9">
                        <g:each var="review" in="${unit?.getReviewsSorted()}">
                            <g:if test="${review.isApproved}">
                                <div class="row">
                                    <div class="span3">
                                        <img alt="" class="img-circle" src="${createLinkTo(dir: review.imgUrl.tokenize('/')[0..-2].join('/').toLowerCase(), file: review.imgUrl.tokenize('/')[-1])}">
                                    </div>
                                    <div class="span6">
                                        <blockquote>
                                            <p>${review.content} </p>
                                            <small>${review.submittedBy} ${review.dateReceived.toString("MMM d, yyyy")}</small>
                                        </blockquote>
                                    </div>
                                </div>
                                <hr>
                            </g:if>
                        </g:each>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="tab-pane" id="leave-testimonial">
                    <div class="span9">
                        <?php print render($page['leave_testimonial']); ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="clearfix"></div>
    </div><!-- end container -->
    <div class="footers">
        <?php print render($page['footer']); ?>
    </div>
</div><!-- end isi -->
