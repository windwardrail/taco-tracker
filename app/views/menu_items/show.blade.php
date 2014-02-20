<div class="media">
  <a class="pull-left" href="#">
    <img class="media-object" src="{{ $item->picture_url or asset('images/taco.png') }}" width="64" height="64">
  </a>
  <div class="media-body">
    <h4 class="media-heading">{{ $item->name }} <small>${{ money_format("%i", $item->price) }}</small> </h4>
    <p>{{ $item->description }}</p>

  </div>
</div>