@foreach ($items as $item)
<li @if ( $item->hasChildren() )class="treeview"@endif>
  <a href="{!! $item->url() !!}">{!! $item->title !!} @if ( $item->hasChildren() )<i class="fa fa-angle-left pull-right"></i>@endif</a>
  @if ( $item->hasChildren() )
    <ul class="treeview-menu">
    @foreach ( $item->children() as $child )
      <li><a href="{!! $child->url() !!}">{!! $child->title !!}</li>
    @endforeach
    </ul>
  @endif
</li>
@endforeach