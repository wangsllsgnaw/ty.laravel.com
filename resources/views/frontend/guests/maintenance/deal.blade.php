@extends('frontend.guests.layout.bases')
@section('content')
    <style>
        th{
            text-align: center;
        }
        td{
            text-align: center;
        }
    </style>
    <div id="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li><a href="/">主页</a></li>
                            <li class="active"><span>理赔</span></li>
                        </ol>
                        <h1>理赔详情</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-box clearfix" style="min-height: 1100px;">
                            <div class="tabs-wrapper tabs-no-header">
                                <ul class="nav nav-tabs">
                                    @if( $type == 'deal' )
                                        <li><a href="{{ url('/backend/claim/get_claim/all') }}">理赔列表</a></li>
                                        <li><a href="{{ url('/backend/claim/get_claim/no_deal') }}">未处理</a></li>
                                        <li class="active"><a href="{{ url('/backend/claim/get_claim/deal') }}">已处理</a></li>
                                    @elseif( $type == 'no_deal' )
                                        <li><a href="{{ url('/backend/claim/get_claim/all') }}">理赔列表</a></li>
                                        <li class="active"><a href="{{ url('/backend/claim/get_claim/no_deal') }}">未处理</a></li>
                                        <li><a href="{{ url('/backend/claim/get_claim/deal') }}">已处理</a></li>
                                    @endif
                                </ul>
                                <div class="col-lg-12">
                                    @include('frontend.guests.layout.alert_info')
                <div class="main-box clearfix">
                    <header class="main-box-header clearfix">
                        @if( $type == 'deal' )
                            <h2 class="pull-left">已处理的理赔列表</h2>
                        @elseif( $type == 'no_deal' )
                            <h2 class="pull-left">未处理的理赔列表</h2>
                        @endif

                    </header>
                    <div class="main-box-body clearfix">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th><span>客户名称</span></th>
                                    <th><span>方案名称</span></th>
                                    <th><span>真实姓名</span></th>
                                    <th><span>手机号码</span></th>
                                    <th><span>身份证号</span></th>
                                    <th><span>理赔申请时间</span></th>
                                    <th><span>理赔状态</span></th>
                                    <th><span>查看</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if( $count == 0 )
                                    <tr>
                                        <td colspan="8" style="text-align: center;">暂无符合条件理赔</td>
                                    </tr>
                                @else
                                    @foreach ( $claim as $value )
                                        <tr>
                                            <td>
                                                <a href="#">{{ $value->name }}</a>
                                            </td>
                                            <td>
                                                2013/08/08
                                            </td>
                                            <td>
                                                <a href="#">{{ $value->real_name }}</a>
                                            </td>
                                            <td>
                                                <a href="#">{{ $value->phone }}</a>
                                            </td>
                                            <td>
                                                <a href="#">{{ $value->code }}</a>
                                            </td>
                                            <td>
                                                <a href="#">{{ $value->created_at }}</a>
                                            </td>
                                            <td class="text-center">
                                                @if( $type == 'deal' )
                                                    <span class="label label-primary"> {{ $value->status_name }}</span>
                                                @elseif( $type == 'no_deal' )
                                                    <span class="label label-success">尚未处理</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/backend/claim/get_detail/{{ $value->id }}">查看详情</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $claim->links() }}
                    </div>
                </div>
            </div>
        </div>




        <footer id="footer-bar" class="row">
            <p id="footer-copyright" class="col-xs-12">
                &copy; 2014 <a href="http://www.adbee.sk/" target="_blank">Adbee digital</a>. Powered by Centaurus Theme.
            </p>
        </footer>
    </div>
@stop

