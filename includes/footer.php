    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.0.0/dist/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.min.js"></script>

<div id="jaxon-code">
<?php
$jaxon = Jaxon\jaxon();
echo $jaxon->getCss(), "\n", $jaxon->getJs(), "\n", $jaxon->getScript(), "\n";
echo "<!-- HTTP comment  -->\n"
?>
</div>

</body>
</html>
