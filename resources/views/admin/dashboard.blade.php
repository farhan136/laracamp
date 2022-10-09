@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        My Camps
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Camp</th>
                                    <th>Price</th>
                                    <th>Register Date</th>
                                    <th>Paid Status</th>
                                    <th>Action</th>
                                </tr>    
                            </thead>
                            <tbody>
                                @forelse($checkouts as $checkout)
                                <tr>
                                    <td>{{$checkout->User->name}}</td>
                                    <td>{{$checkout->Camp->title}}</td>
                                    <td>{{$checkout->Camp->price}}</td>
                                    <td>{{$checkout->created_at->format('M d Y')}}</td>
                                    <td>
                                        @if($checkout->is_paid)
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-warning">Waiting</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($checkout->is_paid)
                                            <!-- <span class="badge bg-success">Paid</span> -->
                                        @else
                                            <form action="{{route('admin.checkout.update', $checkout->id)}}" method="POST">
                                                @csrf
                                                <button class="btn btn-primary btn-sm">Set To Paid</button>
                                            </form>
                                        @endif
                                        
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>                          
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- @include('components.navbar')
    
    <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                @include('components.alert')
                <table class="table">
                    <tbody>
                        @forelse($checkouts as $checkout)
                        <tr class="align-middle">
                            <td width="18%">
                                <img src="{{asset('')}}images/item_bootcamp.png" height="120" alt="">
                            </td>
                            <td>
                                <p class="mb-2">
                                    <strong>{{$checkout->title}}</strong>
                                </p>
                                <p>
                                    {{$checkout->created_at}}
                                </p>
                            </td>
                            <td>
                                <strong>{{$checkout->price}}</strong>
                            </td>
                            <td>
                                @if($checkout->is_paid == 1)
                                    <strong>Paid</strong>
                                @else
                                    <strong>Waiting for Payment</strong>
                                @endif
                            </td>
                            <td>
                                <a href="https://wa.me/085723193141?text=Hai, saya ingin bertanya tentang kelas {{$checkout->title}} di bootcamp laracamp" class="btn btn-primary">
                                    Contact Support
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <td colspan="5">
                                No Data
                            </td>
                        </tr>
                        @endforelse
                        

                    </tbody>
                </table>
            </div>
        </div>
    </section> -->