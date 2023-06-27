@extends('errors::minimal')

@section('title', __('content.Internal Server Error'))
@section('code', '500')
@section('message', __('content.Oops, something went wrong'))
