@extends('admin.layouts.master')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-paypal-list" data-toggle="list" href="#list-paypal" role="tab">Paypal</a>
                                        <a class="list-group-item list-group-item-action" id="list-stripe-list" data-toggle="list" href="#list-stripe" role="tab">Stripe</a>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="tab-content" id="nav-tabContent">
                                        @include('admin.payment-settings.sections.paypal-setting')
                                        @include('admin.payment-settings.sections.stripe-setting')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    .select2-container {
        width: 100% !important;
    }
</style>