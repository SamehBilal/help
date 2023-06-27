@extends('errors::minimal')

@section('title', __('content.Too Many Requests'))
@section('code', '429')
@section('message', __('content.Too Many Requests'))
