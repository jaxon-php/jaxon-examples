                <div class="row">
                    <!-- Custom attribute: Component for paginated content. -->
                    <div class="col-md-12" <?= attr()->bind(rq(PageContent::class)) ?>>
                    </div>
                    <!-- Custom attribute: Component for pagination links. -->
                    <div class="col-md-12" <?= attr()->pagination(rq(PageContent::class)) ?>>
                    </div>
                </div>
