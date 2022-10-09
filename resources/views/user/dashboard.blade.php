@extends('layouts.app')

@section('content')
    @include('components.navbar')
    
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
    </section>    
@endsection