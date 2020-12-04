@foreach ($rows as $row)
    <div class="attribute-row">
        <div class="my-1">
            <span class="attribute-title">{{ $row['name'] }}</span>
            <span class="attribute-type">{{ $row['type'] }}</span>
        </div>
        <div class="attribute-desc">
            {!! $row['desc'] !!}
        </div>
    </div>
@endforeach