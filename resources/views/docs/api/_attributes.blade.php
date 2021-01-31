@foreach ($rows as $row)
    <div class="attribute-row">
        <div class="my-1">
            <span class="attribute-title">{{ $row['name'] }}</span>
            <span class="attribute-type">{{ $row['type'] }}</span>
        </div>
        <div class="attribute-desc">
            {!! $row['desc'] !!}
        </div>
        @if (isset($row['attributes']))            
            <div class="child-attributes-container">
                <div class="toogle">
                    <div class="d-flex align-items-center">
                        <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--add-svg AddIcon-svg SVG--color-svg SVG--color--gray500-svg" style="width: 10px;height: 10px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd"></path></svg>
                        <span class="toogle-close">Show child attributes</span>
                        <span class="toogle-open">Hide child attributes</span>
                    </div>
                </div>
                <div class="child-attributes">
                    @foreach ($row['attributes'] as $attr)
                        <div class="child-attribute">
                            <div class="attribute-title">{{ $attr['name'] }}</div>
                            <div class="attribute-desc">
                                {{ $attr['desc'] }}
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>            
        @endif
    </div>
@endforeach