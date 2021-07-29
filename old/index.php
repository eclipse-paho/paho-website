<?php include '_includes/bare_header.php' ?>

<!-- Introduction Row -->
<div class="jumbotron home_banner">
    <div class="container text-center">
        <div class="logoandtext">
            <img class="img-responsive logo_image" src="/paho/images/paho_logo_400.png" tite="Eclipse Paho Logo" alt="<Logo>" />
        </div>
        <p>The Eclipse Paho project provides open-source client implementations of MQTT and MQTT-SN messaging protocols aimed at new, existing, and emerging applications for the Internet of Things (IoT).</p>
        <p><a class="btn btn-primary btn-lg" href="/paho/downloads.php" role="button">Download Now &raquo;</a>
        </p>
    </div>
</div>
<!-- **************** -->

<!-- Carousel
   ================================================== -->
<div class="container">
    <div id="myCarousel" class="carousel slide middle-container" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="container ">
                    <!-- Feature Row -->
                    <div class="row">
                        <div class="col-md-4">
                            <h2><i><img src="/paho/images/communication.png"></i></h2>
                            <div>
                                <h2>&nbsp;</h2>
                            </div>
                            <p class="lead">For Constrained Networks</p>
                            <p>IoT systems need to deal with frequent network disruption and intermittent, slow, or poor quality networks. Minimal data costs are crucial on networks with millions and billons of connected devices.</p>

                        </div>
                        <div class="col-md-4">
                            <h2><i><img src="/paho/images/chip.png"></i></h2>
                            <div>
                                <h2>&nbsp;</h2>
                            </div>
                            <p class="lead">Devices and Embedded Platforms</p>
                            <p>Devices and edge-of-network servers often have very limited processing resources available. Paho understands small footprint clients and corresponding server support.</p>

                        </div>
                        <div class="col-md-4">
                            <h2><i><img src="/paho/images/scale.png"></i></h2>
                            <div>
                                <h2>&nbsp;</h2>
                            </div>
                            <p class="lead">Reliable</p>
                            <p>Paho focuses on reliable implementations that will integrate with a wide range of middleware, programming and messaging models.</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="item">

                <div class="container">
                    <div class="row" id="tweet">
                        <div class="col-md-4" id="tweet-0"></div>
                        <div class="col-md-4" id="tweet-1"></div>
                        <div class="col-md-4" id="tweet-2"></div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <div class="col-md-6 article-box">
                        <p class="lead"><span class="quote lquote">&ldquo;</span>Under the Paho banner, open source client libraries for MQTT are being curated and developed; there are already MQTT C and Java libraries with Lua, Python, C++ and JavaScript at various stages of development. In this article we'll be showing how to use the Paho Java MQTT libraries to publish and subscribe.<span class="quote rquote">&rdquo;</span>
                        </p>
                        <p class="article-link"><a href="http://www.infoq.com/articles/practical-mqtt-with-paho">Practical MQTT with Paho &raquo;</a>
                        </p>
                    </div>
                    <div class="col-md-6 article-box">
                        <p class="lead"><span class="quote lquote">&ldquo;</span>How would you connect the information from a temperature sensor on a BeagleBone Black to an LED display on a Raspberry Pi and would your solution scale up to many sensors and displays? In this article we’ll show how MQTT and the Eclipse Paho project can let you answer that challenge.<span class="quote rquote">&rdquo;</span>
                        </p>
                        <p class="article-link"><a href="http://www.eclipse.org/paho/articles/talkingsmall/">Talking Small: Using Eclipse Paho's MQTT on BeagleBone Black and Raspberry Pi &raquo;</a>
                        </p>
                    </div>
                    <div class="col-md-4 article-box">
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /.carousel -->
</div>
<div class="mqtt-row">
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <p class="lead">
                    MQTT is a light-weight publish/subscribe messaging protocol, originally created by IBM and Arcom (later to become part of Eurotech) around 1998. The <a href="http://docs.oasis-open.org/mqtt/mqtt/v3.1.1/os/mqtt-v3.1.1-os.html">MQTT 3.1.1 specification</a> has now been standardised by the <a href="https://www.oasis-open.org/committees/mqtt/charter.php">OASIS consortium</a>. The standard is available in a variety of <a href="https://www.oasis-open.org/standards#mqttv3.1.1">formats</a>.
                </p>
                <p class="lead">
                    As of 2016, MQTT is now an ISO standard <a href="http://www.iso.org/iso/catalogue_detail.htm?csnumber=69466">(ISO/IEC 20922)</a>
                </p>
                <p class="lead">
                    More information about the protocol can be found on the <a href="http://mqtt.org">MQTT.org community site</a>.
                </p>
                <p class="lead">
                    There is a publically accessible sandbox server for the Eclipse IoT projects available at <code>mqtt.eclipseprojects.io</code>, port <code>1883</code>.
                </p>
            </div>
            <div class="col-md-4">
                <div class="span3" style="padding-top: 100px;"><img src="/paho/images/mqttorg-glow.png" />
                </div>
            </div>

        </div>
    </div>
</div>
<script src="/paho/js/twitterFetcher_min.js" type="text/javascript"></script>
<script src="/paho/js/twitterFeed.js" type="text/javascript"></script>
<script src="https://platform.twitter.com/widgets.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    reseizeCarousel();
    $(window).resize(function() {
        reseizeCarousel();
    });

    function reseizeCarousel() {
        var carouselInnerHeight = $('.carousel-inner').height();
        $('#myCarousel').css("height", carouselInnerHeight + 50);
    }
</script>
<?php include '_includes/bare_footer.php' ?>
