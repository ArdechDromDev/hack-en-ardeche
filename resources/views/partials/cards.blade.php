<script id="cards" type="x-tmpl-mustache">
<div class="card mb-3">
            <div class="card-body">
            <div class="row">
            <div class="col-md-10">
            <h6><a href="/plan/@{{id}}">@{{title}}</a></h6>
        <p class="small">A @{{ commune }}, le @{{date}}</p>
        </div>
        <div class="col-md-2">
            @{{ price }}€
        </div>
        </div>
        </div>
</div>

</script>