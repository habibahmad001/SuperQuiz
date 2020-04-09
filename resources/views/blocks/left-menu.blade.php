<div class="left-menu">
  <ul class="">
    <li @if(collect(request()->segments())->last()=='users') class="active" @endif>
      <a href="{{ URL::to('/users') }}">
        <div class="icon">U</div>
        <div class="icon-detail">Users</div>
      </a>
    </li>
    <li @if(collect(request()->segments())->last()=='categories') class="active" @endif>
      <a href="{{ URL::to('/categories') }}">
        <div class="icon">C</div>
        <div class="icon-detail">Categories</div>
      </a>
    </li>
    <li @if(collect(request()->segments())->last()=='level') class="active" @endif>
      <a href="{{ URL::to('/level') }}">
        <div class="icon">L</div>
        <div class="icon-detail">Levels</div>
      </a>
    </li>
    <li @if(collect(request()->segments())->last()=='questions') class="active" @endif>
      <a href="{{ URL::to('/questions') }}">
        <div class="icon">Q</div>
        <div class="icon-detail">Questions</div>
      </a>
    </li>

    <li @if(collect(request()->segments())->last()=='sessions') class="active" @endif>
      <a href="{{ URL::to('/sessions') }}">
        <div class="icon">S</div>
        <div class="icon-detail">Sessions</div>
      </a>
    </li>

    <li @if(collect(request()->segments())->last()=='reports') class="active" @endif>
      <a href="{{ URL::to('/reports') }}">
        <div class="icon">R</div>
        <div class="icon-detail">Reports</div>
      </a>
    </li>

    <li @if(collect(request()->segments())->last()=='manage-rules') class="active" @endif>
      <a href="{{ URL::to('/manage-rules') }}">
        <div class="icon">MR</div>
        <div class="icon-detail">Rules</div>
      </a>
    </li>


  </ul>
</div>
