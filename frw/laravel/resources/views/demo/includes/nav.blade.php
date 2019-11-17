            <div class="col-sm-3 sidebar">
                <ul class="nav nav-sidebar">
@foreach($menuEntries as $filename => $title)
                    <li @if($filename == 'laravel/') class="active" @endif ><a href="{{ $menuSubdir }}{{ $filename }}">{{ $title }}</a></li>
@endforeach
                </ul>
            </div>
