<div class="row">
    <!-- Custom attribute: Component for paginated content. -->
    <div class="col-md-12" <?= attr()->bind(rq(PageContentDb::class)) ?>>
    </div>
    <!-- Custom attribute: Component for pagination links. -->
    <div class="col-md-12" <?= attr()->pagination(rq(PageContentDb::class)) ?>>
    </div>
    <div class="col-md-12 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(PageContentDb::class)->show()) ?>>Refresh</button>
    </div>
</div>
