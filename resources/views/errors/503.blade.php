@extends('errors::minimal')

@section('title', __('content.Service Unavailable'))
@section('code', '503')
@section('message', __('content.The service you requested is not available at this time'))
