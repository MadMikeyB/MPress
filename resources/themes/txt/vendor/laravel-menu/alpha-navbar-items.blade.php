@foreach($items as $item)
  <li>
    <a href="{!! $item->url() !!}" @if ( $item->hasChildren() )class="icon fa-angle-down"@endif>{!! $item->title !!} </a>
    @if ( $item->hasChildren() )
      <ul>
        @foreach ( $item->children() as $child )
          <li><a href="{!! $child->url() !!}">{!! $child->title !!}</a></li>
          @if ( $child->hasChildren() )
            <ul>
              @foreach( $child->children() as $grandkid )
                <li><a href="{!! $grandkid->url() !!}">{!! $grandkid->title !!}</a></li>
              @endforeach
            </ul>
          @endif
        @endforeach
      </ul>
    @endif
  </li>
@endforeach