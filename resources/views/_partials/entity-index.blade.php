<div class="container">
  <h1 class="text-center my-4">Recent {{ $entityName }}</h1>
  @foreach ($items as $item)
  <div class="card mb-2">
    <div class="card-body py-1">
      <div class="card-title">
        <a class="h4" href="{{ route($entityType . '.show', $item->id) }}">
          {{ $item->name }}
        </a>
      </div>
      <div class="card-text">
        <p class="text-muted text-wrap">{{ substr($item->text, 0, 100) }}...</p>
      </div>
    </div>
  </div>
  @endforeach
</div>