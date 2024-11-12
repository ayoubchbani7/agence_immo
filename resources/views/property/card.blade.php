<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['property' => $property->id, 'slug' => $property->getSlug()]) }}">
                {{ $property->title }}
            </a>

        </h5>
        <p class="card-text">
            {{$property->surface}}m - {{$property->city}} {{$property->code_postal}}
        </p>
        <div class="text-primary fw-blod" style="font-size:1.4rem">
            {{number_format($property->price,thousands_separator: ' ')}} $
        </div>
    </div>
</div>
