<div class="row">
    <!-- Custom attribute: Component for paginated content. -->
    <div class="col-md-12" <?= attr()->bind(rq(PageContentCp::class)) ?>>
    </div>
    <!-- Custom attribute: Component for pagination links. -->
    <div class="col-md-12" <?= attr()->pagination(rq(PageContentCp::class)) ?>>
    </div>
    <div class="col-md-12 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(PageContentCp::class)->show()) ?>>Refresh</button>
    </div>
</div>
