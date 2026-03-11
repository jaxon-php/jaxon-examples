<div class="row">
    <!-- Custom attribute: Component for paginated content. -->
    <div class="col-md-12" <?= attr()->bind(rq(PageContentCp::class)) ?>>
    </div>
    <!-- Custom attribute: Component for pagination links. -->
    <div class="col-md-12" <?= attr()->pagination(rq(PageContentCp::class)) ?>>
    </div>
</div>
