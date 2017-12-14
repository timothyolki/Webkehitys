<?php
require_once ("navi.php");
?>
<!-- LOGIN MODALI TÄSSÄ TOISTAISEKSI -->

<?php
require_once ("modal.php");
?>



<aside id="hakukentta">
    <form action="search.php">
        Search clips:
        <input type="search" name="clipsearch" id="clipsearch" placeholder="CSGO,Overwatch, ESL, Worlds etc...">
        <input type="submit" id="hakunappi" value="Search">
    </form>
</aside>



    <div id="twitter"> <!--haku vaikuttaisi myös twitteriin-->
        <header id="twitterheader">Latest tweets from #Overwatchleague</header>
        <a class="twitter-timeline"  href="https://twitter.com/hashtag/Overwatchleague" data-widget-id="936184460202168320">#Overwatchleague Tweets</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>


<?php
require_once ("stream.php");
?>







<?php
require_once ("clips.php");
?>


<?php
require_once ("footer.php");
?>


