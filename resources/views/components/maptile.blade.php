<div class="col-md-6 col-sm-12 mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">{{ $map->name }}</div>
        <iframe src="{{ $map->url  }}" class="maptile"></iframe>
        <div class="card-body normal-text">
        Tags:
            @foreach ($map->tags as $tag)
               <a href="#" title="Filter maps by this tag"> <span class="badge badge-info">{{ $tag->name }}</span></a>
            @endforeach
            <br>
            <span>Suggested Days: <strong>{{ $map->suggested_days }}</strong></span>
            <br>
            <span class="text-muted h6">Created by: {{ $map->created_by }}</span>
            <br>
            <span class="text-muted h6">Updated at: {{ $map->updated_at }}</span>
            <hr>
            <p class="card-text">{!! $map->details !!}</p>
        </div>
        <div class="card-footer text-muted">
            <a href="#" class="card-link" title="Share this map on social media">Share</a>
            <a href="{{ str_replace('embed', 'viewer', $map->url) }}" class="card-link float-right"
            title="Open the map in a new tab - full page" target="_blank">Open Map in Full Page</a>
        </div>
    </div>
</div>
