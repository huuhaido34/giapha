<!-- Content
		============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Posts
            ============================================= -->
            <div id="posts" class="post-grid grid-container post-masonry post-timeline grid-2 clearfix">

                <div class="timeline-border"></div>

                <?php
                    if (!empty($userHistory)) {
                        foreach ($userHistory as $history) {
                            ?>
                            <div class="entry entry-date-section notopmargin"><span><?=$history['date']?></span></div>
                            <?php
                            foreach ($history['children'] as $children) {
                                ?>
                                <div class="entry clearfix">
                                    <div class="entry-timeline">
                                        <div class="timeline-divider"></div>
                                    </div>
                                    <div class="entry-image">
                                        <?php
                                        if ('image' == $children['type']) {
                                            ?>
                                            <a href="<?= Yii::$app->request->BaseUrl . $children['link_content'] ?>"
                                               data-lightbox="image"><img class="image_fade"
                                                                          src="<?= Yii::$app->request->BaseUrl . $children['link_content'] ?>"
                                                                          alt="Standard Post with Image"></a>
                                            <?php
                                        } else {
                                            ?>
                                            <iframe src="<?=$children['link_content']?>" width="500"
                                                    height="281"
                                                    frameborder="0" webkitallowfullscreen mozallowfullscreen
                                                    allowfullscreen></iframe>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="entry-title">
                                        <h2><a href="<?= $children['link_url'] ?>"><?= $children['title'] ?></a></h2>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 10th Feb 2014</li>
                                        <li><a href="<?= $children['link_url'] ?>#comments"><i
                                                        class="icon-comments"></i> 13</a></li>
                                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p><?= $children['content'] ?></p>
                                        <a href="<?= $children['link_url'] ?>" class="more-link">Read More</a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                ?>

                <div class="entry entry-date-section notopmargin"><span>November 2014</span></div>

                <div class="entry clearfix">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                    <div class="entry-image">
                        <a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/17.jpg" data-lightbox="image">
                            <img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/small/17.jpg" alt="Standard Post with Image"></a>
                    </div>
                    <div class="entry-title">
                        <h2><a href="blog-single.html">This is a Standard post with a Preview Image</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 10th Feb 2014</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus.</p>
                        <a href="blog-single.html"class="more-link">Read More</a>
                    </div>
                </div>

                <div class="entry clearfix">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                    <div class="entry-image">
                        <iframe src="http://player.vimeo.com/video/87701971" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <div class="entry-title">
                        <h2><a href="blog-single-full.html">This is a Standard post with an Embedded Video</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 16th Feb 2014</li>
                        <li><a href="blog-single-full.html#comments"><i class="icon-comments"></i> 19</a></li>
                        <li><a href="#"><i class="icon-film"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt!</p>
                        <a href="blog-single-full.html"class="more-link">Read More</a>
                    </div>
                </div>

                <div class="entry clearfix">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                    <div class="entry-image">
                        <div class="fslider" data-arrows="false" data-lightbox="gallery">
                            <div class="flexslider">
                                <div class="slider-wrap">
                                    <div class="slide"><a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/10.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/masonry/10.jpg" alt="Standard Post with Gallery"></a></div>
                                    <div class="slide"><a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/20.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/masonry/20.jpg" alt="Standard Post with Gallery"></a></div>
                                    <div class="slide"><a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/21.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/masonry/21.jpg" alt="Standard Post with Gallery"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry-title">
                        <h2><a href="blog-single-small.html">This is a Standard post with a Slider Gallery</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 24th Feb 2014</li>
                        <li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li>
                        <li><a href="#"><i class="icon-picture"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
                        <a href="blog-single-small.html"class="more-link">Read More</a>
                    </div>
                </div>

                <div class="entry clearfix">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                    <div class="entry-image">
                        <blockquote>
                            <p>"When you are courting a nice girl an hour seems like a second. When you sit on a red-hot cinder a second seems like an hour. That's relativity."</p>
                            <footer>Albert Einstein</footer>
                        </blockquote>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 3rd Mar 2014</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 23</a></li>
                        <li><a href="#"><i class="icon-quote-left"></i></a></li>
                    </ul>
                </div>

                <div class="entry clearfix">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                    <div class="entry-image clearfix">
                        <div class="portfolio-single-image masonry-thumbs col-4" data-big="3" data-lightbox="gallery">
                            <a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/small/2.jpg" alt=""></a>
                            <a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/3.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/small/3.jpg" alt=""></a>
                            <a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/6-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/small/6-1.jpg" alt=""></a>
                            <a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/6-2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/small/6-2.jpg" alt=""></a>
                            <a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/12.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/small/12.jpg" alt=""></a>
                            <a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/12-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/small/12-1.jpg" alt=""></a>
                            <a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/13.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/small/13.jpg" alt=""></a>
                            <a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/18.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/small/18.jpg" alt=""></a>
                            <a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/19.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/small/19.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="entry-title">
                        <h2><a href="blog-single-thumbs.html">This is a Standard post with Masonry Thumbs Gallery</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 3rd Mar 2014</li>
                        <li><a href="blog-single-thumbs.html#comments"><i class="icon-comments"></i> 21</a></li>
                        <li><a href="#"><i class="icon-picture"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo!</p>
                        <a href="blog-single-thumbs.html"class="more-link">Read More</a>
                    </div>
                </div>

                <div class="entry clearfix">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                    <div class="entry-image">
                        <a href="http://themeforest.net" class="entry-link" target="_blank">
                            Themeforest.net
                            <span>- http://themeforest.net</span>
                        </a>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 17th Mar 2014</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 26</a></li>
                        <li><a href="#"><i class="icon-link"></i></a></li>
                    </ul>
                </div>

                <div class="entry entry-date-section"><span>October 2014</span></div>

                <div class="entry clearfix">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                    <div class="entry-image">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, laudantium, iusto saepe eius ea architecto voluptatem veniam. Nisi, pariatur, optio minima dolor iste non quae reprehenderit ullam culpa fugit aut.
                            </div>
                        </div>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 21st Mar 2014</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 11</a></li>
                        <li><a href="#"><i class="icon-align-justify2"></i></a></li>
                    </ul>
                </div>

                <div class="entry clearfix">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                    <div class="entry-image clearfix">
                        <div class="fslider" data-animation="fade" data-pagi="false" data-pause="6000" data-lightbox="gallery">
                            <div class="flexslider">
                                <div class="slider-wrap">
                                    <div class="slide"><a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/6-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/masonry/6-1.jpg" alt="Standard Post with Gallery"></a></div>
                                    <div class="slide"><a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/6-2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/masonry/6-2.jpg" alt="Standard Post with Gallery"></a></div>
                                    <div class="slide"><a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/12-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/masonry/12-1.jpg" alt="Standard Post with Gallery"></a></div>
                                    <div class="slide"><a href="<?=Yii::$app->request->BaseUrl?>/images/blog/full/22.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->BaseUrl?>/images/blog/masonry/22.jpg" alt="Standard Post with Gallery"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry-title">
                        <h2><a href="blog-single-thumbs.html">This is a Standard post with Fade Gallery</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 3rd Apr 2014</li>
                        <li><a href="blog-single-thumbs.html#comments"><i class="icon-comments"></i> 21</a></li>
                        <li><a href="#"><i class="icon-picture"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo!</p>
                        <a href="blog-single-thumbs.html"class="more-link">Read More</a>
                    </div>
                </div>

                <div class="entry clearfix">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                    
                    <div class="entry-title">
                        <h2><a href="blog-single.html">This is an Embedded Audio Post</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 28th April 2014</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 16</a></li>
                        <li><a href="#"><i class="icon-music2"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur voluptate rerum.</p>
                        <a href="blog-single.html"class="more-link">Read More</a>
                    </div>
                </div>

                <div class="entry clearfix">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                    <div class="entry-image">
                        <iframe width="560" height="315" src="http://www.youtube.com/embed/SZEflIVnhH8" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="entry-title">
                        <h2><a href="blog-single-full.html">This is a Standard post with a Youtube Video</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 30th Apr 2014</li>
                        <li><a href="blog-single-full.html#comments"><i class="icon-comments"></i> 34</a></li>
                        <li><a href="#"><i class="icon-film"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt!</p>
                        <a href="blog-single-full.html"class="more-link">Read More</a>
                    </div>
                </div>

                <div class="entry clearfix">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                   
                    <div class="entry-title">
                        <h2><a href="blog-single.html">This is another Embedded Audio Post</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> 15th May 2014</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 2</a></li>
                        <li><a href="#"><i class="icon-music2"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo!</p>
                        <a href="blog-single.html"class="more-link">Read More</a>
                    </div>
                </div>

            </div><!-- #posts end -->

            <div id="load-next-posts" class="center">
                <a href="<?=Yii::$app->request->BaseUrl?>/blog-timeline-2.html" class="button button-3d button-dark button-large button-rounded">Load more..</a>
            </div>

        </div>

    </div>
    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
    <!-- Footer Scripts
        ============================================= -->
    <script type="text/javascript" src="<?=Yii::$app->request->BaseUrl?>/js/functions.js"></script>
    <script type="text/javascript">

        $(window).load(function(){

            var $container = $('#posts');

            $container.isotope({
                itemSelector: '.entry',
                masonry: {
                    columnWidth: '.entry:not(.entry-date-section)'
                }
            });

            $container.infinitescroll({
                    loading: {
                        finishedMsg: '<i class="icon-line-check"></i>',
                        msgText: '<i class="icon-line-loader icon-spin"></i>',
                        img: "<?=Yii::$app->request->BaseUrl?>/images/preloader-dark.gif",
                        speed: 'normal'
                    },
                    state: {
                        isDone: false
                    },
                    nextSelector: "#load-next-posts a",
                    navSelector: "#load-next-posts",
                    itemSelector: "div.entry",
                    behavior: 'portfolioinfiniteitemsloader'
                },
                function( newElements ) {
                    $container.isotope( 'appended', $( newElements ) );
                    var t = setTimeout( function(){ $container.isotope('layout'); }, 2000 );
                    SEMICOLON.initialize.resizeVideos();
                    SEMICOLON.widget.loadFlexSlider();
                    SEMICOLON.widget.masonryThumbs();
                    var t = setTimeout( function(){
                        SEMICOLON.initialize.blogTimelineEntries();
                    }, 2500 );
                });

            var t = setTimeout( function(){
                SEMICOLON.initialize.blogTimelineEntries();
            }, 2500 );

            $(window).resize(function() {
                $container.isotope('layout');
                var t = setTimeout( function(){
                    SEMICOLON.initialize.blogTimelineEntries();
                }, 2500 );
            });

        });

    </script>

</section><!-- #content end -->