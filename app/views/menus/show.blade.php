<ul>
  @foreach($menu->items as $item)
    <li>
      @include('menu_items.show', ['item' => $item])
    </li>
  @endforeach

</ul>