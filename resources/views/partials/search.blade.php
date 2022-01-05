<div class="search- media-body">
    <form class="d-flex" action="{{route('products_search')}}">
        <input type="text" name='q' placeholder="Enter your search key ... " value="{{request()->q ?? ''}}" />
        <button><i class="icon-magnifier"></i></button>
    </form>
</div>
