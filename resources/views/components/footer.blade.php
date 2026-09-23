
<footer>
    <br>
    <div class="footerBox">
        <p class="footerSocial">{{ __('misc.social') }}</p>
        <p class="footerContact">{{ __('misc.contact') }}</p>
        <a class="footerAbout" href="{{ __('misc.about') }}">{{ __('misc.about') }}</a>
    </div>

    <div class="footerBoxInfo">
        <div class="footerSocialImg">
            <a href="twitter"><img src="img/twitter.png">{{ __() }}</a>
            <a href="instagram"><img src="img/instagram.png">{{ __() }}</a>
            <a href="facebook"><img src="img/facebook.png">{{ __() }}</a>
        </div>

        <div class="footerContact">
            <p>Nummer: +31 06 12345678</p>
            <p>Adress: 88 Colin P Kelly Jr Street</p>
            <p>Email: google@gmail.com</p>
        </div>

        <div class="test">
            <p class="footerHidden">e</p>
        </div>
    </div>

    <div class="copyright">© {{ __('misc.copyright') }}</div>
</footer>


<!-- analytics code -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30506707-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Einde analytics code -->

<script language="Javascript" type="text/javascript">

 if (top.location!= self.location) {
  top.location = self.location.href
 }

</script>
