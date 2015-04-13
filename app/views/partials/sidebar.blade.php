<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    {{--<div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        <!-- /.input-group -->
    </div>--}}

    @if (Auth::check())
    <div class="well">
        <h4>Restaurant</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @foreach($categories as $category)
                    <li class="capitalize"><a href="{{ route('categories.show', $category->id) }}">{{{ $category->name }}}</a></li>
                    @endforeach
                </ul>

                <div>
                    <p>
                        <a class="btn btn-primary" href="{{ route('categories.index') }}">Restaurant Manage</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Side Widget Well -->
    @unless(Auth::check())
    <div class="well">
        <h4>Account</h4>
        <p><a href="{{ route('auth.login') }}">Login</a></p>
        <p><a href="{{ route('auth.registration') }}">Registration</a></p>
    </div>
    @endunless

    @if(Auth::check())
        <div class="well">
            <h4>Account</h4>
            <p>
                <span>Hi </span><span class="capitalize">{{ Auth::user()->username }}</span>
            </p>
             @if(Auth::user()->is_admin)
                <span class="label label-default">Admin</span>
            @endif
            <span class="label label-success">Member</span>

            <a href="{{ route('auth.logout') }}">Logout</a>
        </div>

        @if(Auth::user()->is_admin)

            @if(isset($balances))
            <div class="well balance">
                <h4>Latest Balance</h4>
                <ul>
                @foreach ($balances as $balance)
                    <li class="capitalize">{{ $balance->username }} $ {{ $balance->total }}</li>
                @endforeach
                </ul>
            </div>
            @endif


            @if(isset($history_s))
            <div class="well history">
                <h4>Payment History</h4>

@if(isset($history_s))
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Venue</th>
            <?php $i = 0; ?>
            @foreach($history_s as $key)
                @foreach($key as $k)
                    <?php $i++; ?>
                    @if($i <= $categories_count)
                        <th>{{$k->username}}</th>
                    @endif
                @endforeach
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $i = 0; ?>
            @foreach($history_s as $key)
                @foreach($key as $k)

                    @if($i % $categories_count  == 0)
                    <td><span class="">{{$k->restaurant}}</span></td>
                    @endif
        <?php $i++; ?>
                    <td>
                        <span class="hidden">{{$k->username}}</span>
                        <span>${{$k->total}}</span>
                        @if($i % $categories_count  == 0)
                          </td></tr><tr>
                        @endif
                    </td>
                @endforeach
            @endforeach
        </tr>
    </tbody>
</table>
@endif
            </div>
            @endif

        @endif {{-- !is_admin --}}


        @if(isset($payments) && count($payments) > 0)
        <div class="well">
            <h4>My payment</h4>
            <div>
                <span>I have to pay</span>
            </div>
            <ul>
            @foreach ($payments as $payment)
                <li class="capitalize">{{ $payment->username }} $ {{ $payment->total }}</li>
            @endforeach
            </ul>
        </div>
        @endif


        @if(isset($credits) && count($credits) > 0)
        <div class="well">
            <h4>Credit</h4>
            <div>Co-worker have to pay me</div>
            <ul>
            @foreach ($credits as $credit)
                <li class="capitalize">{{ $credit->username }} $ {{ $credit->total }}</li>
            @endforeach
            </ul>
        </div>
        @endif

    @endif {{-- !if(user) --}}
</div>

