    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div id="jaxon-code">

{!! $jaxonJs !!}

{!! $jaxonScript !!}

{!! $jaxonCss !!}
</div>

<script type="text/javascript">
jaxon.config.postHeaders = {'X-CSRF-TOKEN': "{!! csrf_token() !!}"};
</script>

</body>
</html>
